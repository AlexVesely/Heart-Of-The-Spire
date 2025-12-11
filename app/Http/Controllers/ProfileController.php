<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    public function updateProfile(Request $request, Profile $profile)
    {
        $userProfile = Auth::user()->profile;

        // Only allow the logged-in user to update their own profile
        if ($profile->id !== $userProfile->id) {
            abort(403, 'Unauthorized action.');
        }

        $validated = $request->validate([
            'bio' => 'nullable|string|max:500',
            'fav_class' => 'nullable|in:ironclad,silent,defect,watcher',
        ]);

        $profile->update($validated);

        return redirect()->back()->with('message', 'Profile updated successfully!');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function show($id)
    {
        $profile = Profile::with(['posts', 'comments.post'])->findOrFail($id);

        return view('profiles.show', compact('profile'));
    }


}

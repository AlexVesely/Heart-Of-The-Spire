<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Card;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('profile')->paginate(10);
        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cards = Card::all(); // get all cards
        return view('posts.create', compact('cards'));
    }

    /**
     * Store a newly created post in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'content' => 'required|string|max:500',
        'post_id' => 'required|exists:posts,id',
    ]);

    $profile = Auth::user()->profile;

    $comment = Comment::create([
        'content' => $request->content,
        'post_id' => $request->post_id,
        'profile_id' => $profile->id,
    ]);

    return response()->json([
        'success' => true,
        'comment' => [
            'id' => $comment->id,
            'content' => $comment->content,
            'profile_id' => $profile->id,
            'profile_name' => $profile->profile_name,
            'profile_img_id' => $comment->profile->profile_img_id,
            'can_edit' => true,
            'can_delete' => true,
        ],
    ]);
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        $userProfile = Auth::user()->profile;

        // Check if user logged in has permission to edit this post
        if ($post->profile_id !== $userProfile->id && !$userProfile->is_admin) {
            abort(403, 'Unauthorized action.');
        }

        // Fetch all available cards
        $cards = Card::all();

        return view('posts.edit', [
            'post'  => $post,
            'cards' => $cards,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $post = Post::findOrFail($id);
         $userProfile = Auth::user()->profile;

        // Check if user logged in has permission to edit this post
        if ($post->profile_id !== $userProfile->id && !$userProfile->is_admin) {
            abort(403, 'Unauthorized action.');
        }

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required|max:1000',

            // Cards validation
            'cards'   => 'array',
            'cards.*' => 'exists:cards,id', 
        ]);

        // Update post fields
        $post->update([
            'title'   => $validatedData['title'],
            'content' => $validatedData['content'],
        ]);

        // Sync selected cards (attach/detach)
        // If no cards were selected, sync with an empty array to detach all
        $post->cards()->sync($request->input('cards', []));

        session()->flash('message', 'Post updated successfully!');
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $userProfile = Auth::user()->profile;

        // Only allow deletion if:
        // The user owns the post OR The user is admin
        // This should not be needed anyone because if the user is not authorised 
        // to delete they cannot see delete button
        if ($post->profile_id !== $userProfile->id && !$userProfile->is_admin) {
            abort(403, 'Unauthorized action.');
        }

        $post->delete();

        session()->flash('message', 'Post was deleted');
        return redirect()->route('posts.index');
    }

}

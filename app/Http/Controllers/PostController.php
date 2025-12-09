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
        $userProfile = Auth::user()->profile;

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required|max:1000',
            'cards' => 'nullable|array',
            'cards.*' => 'exists:cards,id',
        ]);

        $post = new Post;
        $post->title = $validatedData['title'];
        $post->content = $validatedData['content'];
        $post->profile_id = $userProfile->id;
        $post->save();

        // Attach selected cards (many-to-many)
        if (!empty($validatedData['cards'])) {
            $post->cards()->attach($validatedData['cards']);
        }

        session()->flash('message', 'Post was created!');
        return redirect()->route('posts.index');
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

        return view('posts.edit', compact('post'));
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
        ]);

        $post->update($validatedData);

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

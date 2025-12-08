<?php

namespace App\Http\Controllers;

use App\Models\Post;
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
        return view('posts.create');
    }

    /**
     * Store a newly created post in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required|max:1000',
        ]);

        $a = new Post;
        $a->title = $validatedData['title'];
        $a->content = $validatedData['content'];
        $a->profile_id = Auth::user()->profile->id;  // attach logged in user's profile
        $a->save();

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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
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

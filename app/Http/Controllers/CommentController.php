<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userProfile = Auth::user()->profile;

        $validatedData = $request->validate([
            'post_id' => 'required|exists:posts,id',
            'content' => 'required|max:1000',
        ]);

        $comment = new Comment;
        $comment->post_id = $validatedData['post_id']; // link to the post
        $comment->content = $validatedData['content'];
        $comment->profile_id = $userProfile->id; // attach logged in user's profile
        $comment->save();

        session()->flash('message', 'Comment was added!');
        
        return response()->json([
        'success' => true,
        'comment' => [
            'id' => $comment->id,
            'content' => $comment->content,
            'profile_id' => $userProfile->id,
            'profile_name' => $userProfile->profile_name,
            'can_edit' => true,   // because the logged-in user just created it
            'can_delete' => true, // same reason
        ]
    ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $comment = Comment::findOrFail($id);
        $userProfile = Auth::user()->profile;

        // Check if user logged in has permission to edit this comment
        if ($comment->profile_id !== $userProfile->id && !$userProfile->is_admin) {
            abort(403, 'Unauthorized action.');
        }

        return view('comments.edit', compact('comment'));
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $comment = Comment::findOrFail($id);
        $userProfile = Auth::user()->profile;


        if ($comment->profile_id !== $userProfile->id && !$userProfile->is_admin) {
            abort(403, 'Unauthorized action.');
        }

        $validated = $request->validate([
            'content' => 'required|max:500',
        ]);

        $comment->update($validated);

        return redirect()->route('posts.show', $comment->post_id)
                        ->with('message', 'Comment updated!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comment = Comment::findOrFail($id);
        $userProfile = Auth::user()->profile;

        if ($comment->profile_id !== $userProfile->id && !$userProfile->is_admin) {
            abort(403, 'Unauthorized action.');
        }

        $comment->delete();

        return redirect()->back()->with('message', 'Comment deleted!');
    }
}

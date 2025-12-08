@extends('layouts.master')

@section('title', 'Edit Comment')

@section('content')
    <form method="POST" action="{{ route('comments.update', $comment->id) }}">
        @csrf
        @method('PUT')

        <p>Content:
            <input type="text" name="content"
                value="{{ old('content', $comment->content) }}">
        </p>

        <input type="submit" value="Update">
        <a href="{{ route('posts.show', $comment->post_id) }}">GO BACK</a>
    </form>
@endsection

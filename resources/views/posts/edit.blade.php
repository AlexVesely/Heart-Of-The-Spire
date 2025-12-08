@extends('layouts.master')

@section('title', 'Edit Post')

@section('content')
    <form method="POST" action="{{ route('posts.update', $post->id) }}">
        @csrf
        @method('PUT')

        <p>Title:
            <input type="text" name="title"
                value="{{ old('title', $post->title) }}">
        </p>

        <p>Content:
            <input type="text" name="content"
                value="{{ old('content', $post->content) }}">
        </p>

        <input type="submit" value="Update">
        <a href="{{ route('posts.index') }}">GO BACK</a>
    </form>
@endsection

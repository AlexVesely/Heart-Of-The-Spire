@extends('layouts.master')

@section('title', 'Create Post')

@section('content')
    <form method="POST" action="{{ route('posts.store') }}">
        @csrf
        <p>Title: <input type="text" name="title"
            value="{{ old('name') }}"></p>
        <p>Content: <input type="text" name="content"
            value="{{ old('title') }}"></p>
        <input type="submit" value="Submit">
        <a href="{{ route('posts.index') }}">GO BACK</a>
    </form>

@endsection
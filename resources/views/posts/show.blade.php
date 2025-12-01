@extends('layouts.master')

@section('title','Selected Post Details')

@section('content')
    <ul>
        <li>Profile: {{ $post->profile->profile_name ?? 'Unknown' }}</li>
        <li>Title: {{ $post->title}}</li>
        <li>Content: {{ $post->content}}</li>
    </ul>

    <a href="{{route('posts.index')}}">GO BACK</a>
@endsection 
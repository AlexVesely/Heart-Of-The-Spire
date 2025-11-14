@extends('layouts.master')

@section('title', 'Cards')

@section('content')
    <p>The cards in Slay the Spire:</p>
    <ul>
        @foreach ($cards as $card)
            <li><a href="{{ route('cards.show', ['id' => $card->id]) }}">{{$card->name}}</a></li>
        @endforeach
    </ul>

    <a href="{{ route('cards.create')}}">Create Card</a>

@endsection
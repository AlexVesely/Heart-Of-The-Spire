@extends('layouts.master')

@section('title', 'Cards')

@section('content')
    <p>The cards in Slay the Spire:</p>
    <ul>
        @foreach ($cards as $card)
            <li>{{$card->name}}</li>
        @endforeach
    </ul>
@endsection
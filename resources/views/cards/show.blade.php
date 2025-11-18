@extends('layouts.master')

@section('title','Selected Card Details')

@section('content')
    <ul>
        <li>Name: {{ $card->name}}</li>
        <li>Energy Cost: {{ $card->energy_cost}}</li>
        <li>Rarity: {{ $card->rarity}}</li>
        <li>Type: {{ $card->type}}</li>
        <li>Class: {{ $card->class}}</li>
    </ul>

    <form method="POST"
        action="{{ route('cards.destroy', ['id' => $card->id]) }}">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>

    <a href="{{route('cards.index')}}">GO BACK</a>
@endsection        
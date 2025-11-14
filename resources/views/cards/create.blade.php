@extends('layouts.master')

@section('title', 'Create Card')

@section('content')
    <form method="POST" action="{{ route('cards.store') }}">
        @csrf
        <p>Name: <input type="text" name="name"></p>
        <p>Energy Cost: <input type="text" name="energy_cost"></p>
        <p>Rarity: <input type="text" name="rarity"></p>
        <p>Type: <input type="text" name="type"></p>
        <p>Class: <input type="text" name="class"></p>
        <input type="submit" value="Submit">
        <a href="{{ route('cards.index') }}">GO BACK</a>
    </form>

@endsection
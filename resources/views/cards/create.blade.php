@extends('layouts.master')

@section('title', 'Create Card')

@section('content')
    <form method="POST" action="{{ route('cards.store') }}">
        @csrf
        <p>Name: <input type="text" name="name"
            value="{{ old('name') }}"></p>
        <p>Energy Cost: <input type="text" name="energy_cost"
            value="{{ old('energy_cost') }}"></p>
        <p>Rarity: <input type="text" name="rarity"
            value="{{ old('rarity') }}"></p>
        <p>Type: <input type="text" name="type"
            value="{{ old('type') }}"></p>
        <p>Class: <input type="text" name="class"
            value="{{ old('class') }}"></p>
        <input type="submit" value="Submit">
        <a href="{{ route('cards.index') }}">GO BACK</a>
    </form>

@endsection
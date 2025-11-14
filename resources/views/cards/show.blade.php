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
@endsection        
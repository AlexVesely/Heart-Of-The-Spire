<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cards = Card::paginate(10);
        return view('cards.index', ['cards' => $cards]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cards.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'energy_cost' => 'required|numeric',
            'rarity' => 'required',
            'type' => 'required',
            'class' => 'required',
        ]);

        $a = new Card;
        $a->name = $validatedData['name'];
        $a->energy_cost = $validatedData['energy_cost'];
        $a->rarity = $validatedData['rarity'];
        $a->type = $validatedData['type'];
        $a->class = $validatedData['class'];
        $a->save();

        session()->flash('message', 'Card was created!');
        return redirect()->route('cards.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $card = Card::findOrFail($id);
        return view('cards.show', ['card' => $card]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $card = Card::findOrFail($id);
        $card->delete();

        session()->flash('message', 'Card was deleted');
        return redirect()->route('cards.index');
    }
}

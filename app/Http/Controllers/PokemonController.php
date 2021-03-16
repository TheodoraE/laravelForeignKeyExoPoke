<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PokemonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.createPokemon');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            "name" => 'required',
            "level" => 'integer|min:1|max:100',
            "url" => 'required',
        ]);

        $store = new Pokemon;
        $store->name = $request->name;
        $store->level = $request->level;
        Storage::put('public/img', $request->url);
        $store->url = $request->file('url')->hashName();
        $store->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show = Pokemon::find($id);
        return view('pages.showPokemon', compact('show'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = Pokemon::find($id);
        return view('pages.editPokemon', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validation = $request->validate([
            "name" => 'required',
            "level" => 'integer|min:1|max:100',
            "url" => 'required',
        ]);
        
        $update = Pokemon::find($id);

        $update->name = $request->name;
        $update->level = $request->level;

        Storage::delete('public.img/'.$update->url);

        Storage::put('public/img', $request->url);
        $update->url = $request->file('url')->hashName();
        $update->save();

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = Pokemon::find($id);
        Storage::delete('public/img/'.$destroy->url);
        $destroy->delete();
        return redirect('/');
    }
}

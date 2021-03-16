<?php

use App\Http\Controllers\PokemonController;
use App\Http\Controllers\TypeController;
use App\Models\Pokemon;
use App\Models\Type;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $pokemons = Pokemon::all();
    $types = Type::all();
    return view('welcome', compact('pokemons', 'types'));
});

Route::resource('/pokemons', PokemonController::class);
Route::resource('/types', TypeController::class);
<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::apiResource('pokemons', 'PokedexController');

// $pokedex = json_decode(DB::table('Pokedex')->get(), true);
// $return = ["pokemons" => []];

// foreach ($pokedex as $respons) {
//     $type1 = DB::table('Types')->where('id_pok', $respons['id_pok'])->value('type1');
//     $type2 = DB::table('Types')->where('id_pok', $respons['id_pok'])->value('type2');

//     $pokemon = (object) [
//         "id" => $respons["id_pok"],
//         "name" => $respons["nom_pok"],
//         "types" =>
//         [
//             "type1" => $type1,
//             "type2" => $type2
//         ],
//         "image" => $respons["id_pok"] . ".png"
//     ];
//     array_push($return["pokemon"], $pokemon);
// };

// return response()->json($return, 200);

<?php

namespace App\Http\Controllers;

use App\Models\Pokedex;
use App\Models\Types;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PokedexController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    // $type1 = Types::select('type1')->get();
    // $type2 = Types::select('type2')->get();
    // $id_pok = Pokedex::select('id_pok')->get();
    // $name_pok = Pokedex::select('nom_pok')->get();


    // $pokedex = Pokedex::all();
    $pokedex = json_decode(DB::table('Pokedex')->get(), true);
    $return = ["pokemons" => []];

    foreach ($pokedex as $respons) {
      $type1 = DB::table('Types')->where('id_pok', $respons['id_pok'])->value('type1');
      $type2 = DB::table('Types')->where('id_pok', $respons['id_pok'])->value('type2');

      $pokemon = (object) [
        "id" => $respons["id_pok"],
        "name" => $respons["nom_pok"],
        "types" =>
        [
          "type1" => $type1,
          "type2" => $type2
        ],
        "image" => $respons["id_pok"] . ".png"
      ];
      array_push($return["pokemons"], $pokemon);
    };

    return response()->json($return, 200);


    // $return = ["pokemons" =>
    // [
    //   (object) [
    //     "id" => $id_pok,
    //     "name" => $name_pok,
    //     "types" =>
    //     [
    //       "type1" => $type1,
    //       "type2" => $type2
    //     ],
    //     "image" => $id_pok . ".png",
    //     "description" => "y en a pas"
    //     // "stats" => ,
    //     // "weaknesses" => ,
    //     // "evolutions" => ,

    //   ]
    // ]];

    // return $return;
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Pokedex  $pokedex
   * @return \Illuminate\Http\Response
   */
  public function show(Pokedex $pokedex)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Pokedex  $pokedex
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Pokedex $pokedex)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Pokedex  $pokedex
   * @return \Illuminate\Http\Response
   */
  public function destroy(Pokedex $pokedex)
  {
    //
  }
}

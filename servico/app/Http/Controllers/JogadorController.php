<?php

namespace App\Http\Controllers;

use App\Models\Jogador;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class JogadorController extends Controller
{
    public function index(){
        return response()->json(Jogador::orderBy('name')->paginate(20));
    }

    public function store(Request $request){
        $data = $this->validate($request, ['jogador'=>'required']);
        $jogador = Jogador::create($data);
        return $jogador;
    }

    public function update(Request $request, Jogador $jogador){
        $data = $this->validate ($request, ['jogador' => 'required']);
    }

    public function show(Jogador $jogador){
        return response()->json($jogador);
    }

    public function destroy(Jogador $jogador){
        $jogador->delete();
        return response()->json($jogador);
    }
}

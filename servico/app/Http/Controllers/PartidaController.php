<?php

namespace App\Http\Controllers;

use App\Models\Partida;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class PartidaController extends Controller
{

    public function index(){
        return response()->json(Partida::with('jogadores')->paginate(20));
    }

    public function store(Request $request){
        $data = $this->validate($request, [
            'titulo'=>'required',
            'descricao' => 'required'
        ]);
        $partida = Partida::create($data);
        return $partida;
    }

    public function show(Partida $partida){
        return response()->json($partida);
    }

    public function update(Request $request, Partida $partida){
        $data = $this->validate($request,[
            'titulo' => 'sometimes',
            'descricao' => 'sometimes',
        ]);
    }

    public function destroy (Partida $partida){
        //
    }

    public function associarJogador(Partida $partida, Request $request)
    {
        $this->validate($request, [
            'jogador_id' => 'required|exists:jogadores,id'
        ]);

        $partida->jogadores()->attach($request->get('jogador_id'));

        $partida->load('jogadores');

        return response()->json($partida);
    }


}

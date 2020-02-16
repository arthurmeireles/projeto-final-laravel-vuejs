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
        return response()->json(Partida::paginate(20));
    }

    public function show(Partida $partida){
        return response()->json($partida);
    }

    public function update(Request $request, Partida $partida){
        $data = $this->validate($request,[
            'titulo' => 'sometimes',
            'descricao' => 'sometimes',
            'jogadores' => 'sometimes|exists:jogadores,id'
        ]);
    }

    public function destroy (Partida $partida){
        //
    }

    public function associarJogador(Partida $partida, Request $request)
    {
        $data = $this->validate($request, [
            'jogador_id' => 'required|exists:jogadores,id',
            'posicao_id' => 'required|exists:posicoes,id'
        ]);

        $partida->jogadores()->attach($data['jogador_id'], [
            'posicao_id' => $data['posicao_id']
        ]);

        $partida->load('jogadores');

        return response()->json($partida);
    }


}

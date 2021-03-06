<?php

namespace App\Http\Controllers;

use App\Models\Jogador;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class JogadorController extends Controller
{
    public function index(){
        return response()->json(Jogador::orderBy('nome')->paginate(20));
    }

    public function store(Request $request){
        $data = $this->validate($request, [
            'nome'=>'required',
            'idade' => 'required',
            'posicao_id' => 'required|exists:posicoes,id'
        ]);
        $jogador = Jogador::create($data);
        return $jogador;
    }

    public function update(Request $request, int $id){
        $data = $this->validate ($request, ['nome' => 'required', 'idade' => 'required', 'posicao_id' => 'required']);



        Jogador::where('id', $id)->update($data);
        $jogador = Jogador::findOrFail($id);
        
        return response()->json($jogador);

    }

    public function show( $id){
        $jogador = Jogador::findOrFail($id);
        return response()->json($jogador);
    }

    public function destroy(Int $id){
        $jogador = Jogador::findOrFail($id);
        $jogador->delete();
        return response()->json($jogador);
    }
}

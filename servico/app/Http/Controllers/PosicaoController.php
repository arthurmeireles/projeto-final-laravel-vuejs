<?php

namespace App\Http\Controllers;

use App\Models\Posicao;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class PosicaoController extends Controller
{
    public function index()
    {
        return response()->json(Posicao::orderBy('posicoes')->paginate(20));
    }

    public function store(Request $request){
        $data = $this->validate($request, [
            'nome' => 'required'
        ]);
        $posicao = Posicao::create($data);
        return $posicao;
    }
    public function show(Posicao $posicao){
        return response()->json($posicao);
    }

    public function update(Request $request, int $id){
        $data = $this->validate ($request, [
            'nome' => 'required'
        ]);

        Posicao::where('id', $id)->update($data);
        $posicao = Posicao::findOrFail($id);
        
        return response()->json($posicao);

    }

    public function destroy(int $id)
    {
        $posicao = Posicao::findOrFail($id);
        $posicao->delete();
        return response()->json($posicao);
    }
}

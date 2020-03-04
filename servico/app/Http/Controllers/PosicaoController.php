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

    public function update(Request $request, Posicao $posicao){
        $data = $this->validate ($request, ['posicao' => 'required']);
    }
    public function destroy(Posicao $posicao)
    {
        $posicao->delete();
        return response()->json($posicao);
    }
}

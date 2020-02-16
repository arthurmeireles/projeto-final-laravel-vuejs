<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Partida extends Model
{
    protected $fillable = [
        'titulo', 'descricao'
    ];

    public  function jogadores(){
        return $this->belongsTo(Jogador::class,
            'jogadores_relacionados')->using(Jogador::class)
            ->withPivot(posicao_id);
    }

}

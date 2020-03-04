<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partida extends Model
{
    protected $fillable = [
        'titulo', 'descricao'
    ];

    public  function jogadores(){
        return $this->belongsToMany(Jogador::class, 'jogador_partida', 'partida_id', 'jogador_id');
    }
}

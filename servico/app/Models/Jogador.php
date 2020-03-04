<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Jogador extends Pivot
{
    protected  $table = "jogadores";
    protected $fillable = [
        'nome', 'idade', 'posicao_id'
    ];

    /**
     * @return BelongsTo
     */
    public function posicao()
    {
        return $this->belongsTo(Posicao::class, 'posicao_id');
    }

    public function partidas()
    {
        return $this->belongsToMany(Partida::class, 'jogadores_partidas', 'jogador_id');
    }
}

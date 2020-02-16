<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Jogador extends Pivot
{
    protected $fillable = [
        'nome', 'idade', 'posicao_id'
    ];


    /**
     * @return BelongsTo
     */
    public function partida()
    {
        return $this->belongsTo(Partida::class, 'partida_id');
    }

    /**
     * @return BelongsTo
     */
    public function posicao()
    {
        return $this->belongsTo(Posicao::class, 'posicao_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Posicao extends Model
{
    protected $fillable = [
        'nome'
    ];

    protected $table = 'posicoes';
}

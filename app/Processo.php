<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Processo extends Model
{
    protected $fillable = [
        'numero', 'acao', 'requerente', 'adv_requerente','requerido', 'adv_requerido', 'juiz', 'promotor'
    ];

    public $timestamps = false;
}

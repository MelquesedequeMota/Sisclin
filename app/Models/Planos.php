<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planos extends Model
{
    protected $primaryKey = 'plan_id';
    protected $fillable = [
        'prod_nome',
        'prod_desc',
        'prod_qtddep',
        'prod_valor',
        'prod_servicos',
        'prod_itens',
    ];
    public $timestamps = false;
}

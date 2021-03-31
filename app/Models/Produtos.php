<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produtos extends Model
{
    protected $primaryKey = 'prod_id';
    protected $fillable = [
        'prod_nome',
        'prod_desc',
        'prod_cate',
        'prod_tipo',
        'prod_quant',
        'prod_estqmin',
        'prod_valor',
        'prod_serviitens',

    ];
    public $timestamps = false;
}

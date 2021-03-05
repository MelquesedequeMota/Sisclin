<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientesJuridicos extends Model
{
    protected $primaryKey = 'clijur_id';
    protected $table="clientesjur";
    protected $fillable = [
        'clijur_nome',
        'clijur_cnpj',
        'clijur_cep',
        'clijur_logradouro',
        'clijur_num',
        'clijur_complemento',
        'clijur_bairro',
        'clijur_cidade',
        'clijur_uf',
        'clijur_tel1',
        'clijur_tel2',
        'clijur_celular',
        'clijur_email',
        'clijur_website',
        'clijur_inscest',
        'clijur_razaosocial',
        'clijur_areaatuacao',
        'clijur_nomerep',
        'clijur_emailrep',
        'clijur_contatorep',
        'clijur_obs',
    ];
    public $timestamps = false;
}

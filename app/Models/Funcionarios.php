<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionarios extends Model
{
    protected $primaryKey = 'func_id';
    protected $fillable = [
        'func_nome',
        'func_cpf',
        'func_rg',
        'func_estadocivil',
        'func_sexo',
        'func_datanasc',
        'func_cep',
        'func_logradouro',
        'func_num',
        'func_complemento',
        'func_bairro',
        'func_cidade',
        'func_uf',
        'func_tel1',
        'func_tel2',
        'func_celular',
        'func_email',
        'func_dep',
        'func_setor',
        'func_func',
        'func_ctps',
        'func_serie',
        'func_pis',
        'func_ufctps',
        'func_salario',
        'func_conjugue',
        'func_nomepai',
        'func_nomemae',
        'func_dataadm',
        'func_obs',
    ];
    public $timestamps = false;
}

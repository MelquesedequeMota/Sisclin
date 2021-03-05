<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pacientes extends Model
{
    protected $primaryKey = 'pac_id';
    protected $fillable = [
        'pac_nome',
        'pac_cpf',
        'pac_estadocivil',
        'pac_sexo',
        'pac_datanasc',
        'pac_profissao',
        'pac_cep',
        'pac_logradouro',
        'pac_num',
        'pac_complemento',
        'pac_bairro',
        'pac_cidade',
        'pac_uf',
        'pac_tel1',
        'pac_tel2',
        'pac_celular',
        'pac_rg',
        'pac_email',
        'pac_nomeres',
        'pac_telres',
        'pac_obseti',
        'pac_situ',
        'pac_obj',
        'pac_obs',
    ];
    public $timestamps = false;
}

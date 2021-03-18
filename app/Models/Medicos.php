<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicos extends Model
{
    protected $primaryKey = 'med_id';
    protected $fillable = [
        'med_nome',
        'med_crn',
        'med_cpf',
        'med_estadocivil',
        'med_sexo',
        'med_datanasc',
        'med_profissao',
        'med_cep',
        'med_logradouro',
        'med_num',
        'med_complemento',
        'med_bairro',
        'med_cidade',
        'med_uf',
        'med_tel1',
        'med_tel2',
        'med_celular',
        'med_rg',
        'med_email',
        'med_espec',
        'med_servi',
        'med_comissao',
        'med_diapag',
        'med_status',
    ];
    public $timestamps = false;
}

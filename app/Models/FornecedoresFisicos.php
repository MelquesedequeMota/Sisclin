<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FornecedoresFisicos extends Model
{
    protected $primaryKey = 'forfis_id';
    protected $table= 'fornecedoresfis';
    protected $fillable = [
        'forfis_nome',
        'forfis_cpf',
        'forfis_estadocivil',
        'forfis_sexo',
        'forfis_datanasc',
        'forfis_cep',
        'forfis_logradouro',
        'forfis_num',
        'forfis_complemento',
        'forfis_bairro',
        'forfis_cidade',
        'forfis_uf',
        'forfis_tel1',
        'forfis_tel2',
        'forfis_celular',
        'forfis_rg',
        'forfis_email',
        'forfis_website',
        'forfis_razaosocial',
        'forfis_areaatuacao',
        'forfis_obs',
    ];
    public $timestamps = false;
}

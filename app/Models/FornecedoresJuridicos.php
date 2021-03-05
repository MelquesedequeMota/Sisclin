<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FornecedoresJuridicos extends Model
{
    protected $primaryKey = 'forjur_id';
    protected $table="fornecedoresjur";
    protected $fillable = [
        'forjur_nome',
        'forjur_cnpj',
        'forjur_cep',
        'forjur_logradouro',
        'forjur_num',
        'forjur_complemento',
        'forjur_bairro',
        'forjur_cidade',
        'forjur_uf',
        'forjur_tel1',
        'forjur_tel2',
        'forjur_celular',
        'forjur_email',
        'forjur_website',
        'forjur_inscest',
        'forjur_razaosocial',
        'forjur_areaatuacao',
        'forjur_nomerep',
        'forjur_emailrep',
        'forjur_contatorep',
        'forjur_obs',
    ];
    public $timestamps = false;
}

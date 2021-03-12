<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico_Atendimento extends Model
{
    protected $primaryKey = 'medat_id';
    protected $table= 'medico_atendimento';
    protected $fillable = [
        'med_id',
        'medat_domingo',
        'medat_segunda',
        'medat_terca',
        'medat_quarta',
        'medat_quinta',
        'medat_sexta',
        'medat_sabado',
    ];
    public $timestamps = false;
}

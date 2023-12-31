<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contratos extends Model
{
    protected $primaryKey = 'cont_id';
    protected $fillable = [
        'cont_id',
        'cont_plano',
        'cont_diapag',
        'cont_status',
    ];
    public $timestamps = false;
}

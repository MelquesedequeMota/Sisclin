<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laboratorios extends Model
{
    protected $primaryKey = 'lab_id';
    protected $fillable = [
        'lab_num',
        'lab_nome',
    ];
    public $timestamps = false;
}

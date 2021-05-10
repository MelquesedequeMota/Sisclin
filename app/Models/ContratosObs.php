<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContratosObs extends Model
{
    protected $primaryKey = 'contobs_id';
    protected $table= 'contratosobs';
    protected $fillable = [
        'contobs_id',
        'contobs_idpessoa',
        'contobs_tipo',
        'contobs_status',
    ];
    public $timestamps = false;
}

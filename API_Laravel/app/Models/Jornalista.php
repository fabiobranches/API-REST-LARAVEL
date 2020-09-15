<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jornalista extends Model
{
    protected $table = "jornalista";
    protected $fillable = [
        'nome', 'rg', 'dataAdimissao', 'statusPerfil'
    ];
    
    use HasFactory;

}

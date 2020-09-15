<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artigo extends Model
{
    protected $table = "artigo";
    protected $fillable = [
        'titulo', 'chamada', 'conteudo', 'statusPubli', 'dataPubli', 'jornalista_id'
    ];
    use HasFactory;
}

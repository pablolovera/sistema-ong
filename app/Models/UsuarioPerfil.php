<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UsuarioPerfil extends Model 
{
    use SoftDeletes;

    protected $table = 'usuario_perfil';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'usuario_id',
        'perfil_id'
    ];

}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PerfilPermissao extends Model 
{
    use SoftDeletes;

    protected $table = 'perfil_permissao';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'perfil_id',
        'permissao_id'
    ];

}
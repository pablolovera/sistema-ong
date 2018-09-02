<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permissao extends Model 
{
    use SoftDeletes;

    protected $table = 'permissao';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'nome',
        'permissao'
    ];

}
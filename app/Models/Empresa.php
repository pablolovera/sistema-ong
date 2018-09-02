<?php

namespace App\Models;

use App\Services\Utils;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empresa extends Model 
{
    use SoftDeletes;

    protected $table = 'empresa';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'razao_social',
        'fantasia',
        'cnpj',
        'ie',
        'im',
        'cep',
        'rua',
        'numero',
        'bairro',
        'cidade',
        'uf',
        'complemento',
        'telefone_1',
        'telefone_2',
    ];
}
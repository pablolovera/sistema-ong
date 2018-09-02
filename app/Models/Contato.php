<?php

namespace App\Models;

use App\Scopes\EmpresaScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contato extends Model 
{
    use SoftDeletes;

    protected $table = 'site_contato';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'empresa_id',
        'cep',
        'rua',
        'numero',
        'bairro',
        'cidade',
        'uf',
        'complemento',
        'latitude',
        'longitude',
        'telefone_1',
        'telefone_2',
        'email',
        'facebook',
        'instagran'
    ];

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new EmpresaScope);
    }
}
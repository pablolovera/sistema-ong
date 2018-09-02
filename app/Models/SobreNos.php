<?php

namespace App\Models;

use App\Scopes\EmpresaScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SobreNos extends Model 
{
    use SoftDeletes;

    protected $table = 'site_sobre_nos';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'empresa_id',
        'historia',
        'missao',
        'visao',
        'valores'
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
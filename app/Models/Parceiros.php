<?php

namespace App\Models;

use App\Scopes\EmpresaScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Parceiros extends Model 
{
    use SoftDeletes;

    protected $table = 'site_parceiros';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'empresa_id',
        'nome',
        'endereco',
        'logo',
        'site'
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
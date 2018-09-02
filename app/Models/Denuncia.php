<?php

namespace App\Models;

use App\Scopes\EmpresaScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Denuncia extends Model 
{
    use SoftDeletes;

    protected $table = 'denuncia';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'empresa_id',
        'usuario_id',
        'mensagem',
        'status',
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
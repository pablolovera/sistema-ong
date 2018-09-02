<?php

namespace App\Models;

use App\Scopes\EmpresaScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoColaboracao extends Model 
{
    use SoftDeletes;

    protected $table = 'tipo_colaboracao';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'empresa_id',
        'nome',
        'status'
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

    public function colaboracoes()
    {
        return $this->hasMany(Colaboracao::class, 'tipo_colaboracao_id');
    }

}
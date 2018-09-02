<?php

namespace App\Models;

use App\Scopes\EmpresaScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Colaboracao extends Model 
{
    use SoftDeletes;

    protected $table = 'colaboracao';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'empresa_id',
        'tipo_colaboracao_id',
        'mensagem'
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

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }

    public function tipo()
    {
        return $this->belongsTo(TipoColaboracao::class, 'tipo_colaboracao_id');
    }

}
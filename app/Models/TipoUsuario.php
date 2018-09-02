<?php

namespace App\Models;

use App\Scopes\EmpresaScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoUsuario extends Model 
{
    use SoftDeletes;

    protected $table = 'tipo_usuario';

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

    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'tipo_usuario_id');
    }

}
<?php

namespace App\Models;

use App\Scopes\EmpresaScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Perfil extends Model 
{
    use SoftDeletes;

    protected $table = 'perfil';

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

    public function permissao()
    {
        return $this->hasManyThrough(Permissao::class, PerfilPermissao::class, 'permissao_id');
    }

    public function permissaoPerfil()
    {
        return $this->hasMany(PerfilPermissao::class, 'perfil_id');
    }

    public function usuarios()
    {
        return $this->hasManyThrough(Usuario::class, UsuarioPerfil::class, 'usuario_id');
    }

    public function usuarioPerfil()
    {
        return $this->hasMany(UsuarioPerfil::class, 'perfil_id');
    }

}
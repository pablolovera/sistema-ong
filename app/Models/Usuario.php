<?php

namespace App\Models;

use App\Scopes\EmpresaScope;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Usuario extends Authenticatable
{
    use HasApiTokens, Notifiable, SoftDeletes;

    protected $table = 'usuario';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'empresa_id',
        'tipo_usuario_id',
        'nome',
        'email',
        'foto',
        'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dates = ['deleted_at'];

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
//    protected static function boot()
//    {
//        parent::boot();
//
//        static::addGlobalScope(new EmpresaScope);
//    }

    public function perfil()
    {
        return $this->hasManyThrough(UsuarioPerfil::class, UsuarioPerfil::class, 'usuario_id');
    }

    public function denuncias()
    {
        return $this->hasMany(Denuncia::class, 'usuario_id');
    }

    public function colaboracao()
    {
        return $this->hasMany(Colaboracao::class, 'usuario_id');
    }

}
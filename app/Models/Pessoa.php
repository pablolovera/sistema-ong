<?php

namespace App\Models;

use App\Scopes\EmpresaScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pessoa extends Model 
{
    use SoftDeletes;

    protected $table = 'pessoa';

    protected $dates = ['deleted_at'];

    protected $appends = ['route_edit'];

    protected $fillable = [
        'empresa_id',
        'razao_social',
        'nome',
        'cpf',
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
        'status',
        'observacao',
        'email',
        'sexo',
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

    public function larTemporario()
    {
        return $this->hasMany(LarTemporario::class, 'pessoa_id');
    }

    public function getRouteEditAttribute()
    {
        return $this->attributes['route_edit'] = route('cadastros.pessoa.edit', $this->id);
    }
}
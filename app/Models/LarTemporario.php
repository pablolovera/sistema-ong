<?php

namespace App\Models;

use App\Scopes\EmpresaScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LarTemporario extends Model 
{
    use SoftDeletes;

    protected $table = 'lar_temporario';

    protected $dates = ['deleted_at'];

    protected $appends = ['route_edit'];

    protected $fillable = [
        'empresa_id',
        'pessoa_id',
        'nome',
        'cep',
        'rua',
        'numero',
        'bairro',
        'cidade',
        'uf',
        'complemento',
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function capacidades()
    {
        return $this->hasMany(LarTemporarioCapacidade::class, 'lar_temporario_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class, 'pessoa_id');
    }

    /**
     * @return string
     */
    public function getRouteEditAttribute()
    {
        return $this->attributes['route_edit'] = route('cadastros.lar-temporario.edit', $this->id);
    }
}
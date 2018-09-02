<?php

namespace App\Models;

use App\Scopes\EmpresaScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Animal extends Model 
{
    use SoftDeletes;

    protected $table = 'animal';

    protected $dates = ['deleted_at'];

    protected $appends = ['route_edit'];

    protected $fillable = [
        'empresa_id',
        'raca_id',
        'pessoa_id',
        'lar_temporario_id',
        'nome',
        'data_nascimento',
        'sexo',
        'peso',
        'temperamento',
        'pelagem',
        'observacao',
        'eh_castrado',
        'status',
        'foto',
        'dados_adicionais',
        'publicado',
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function responsavel()
    {
        return $this->belongsTo(Pessoa::class, 'pessoa_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function vacinas()
    {
        return $this->hasManyThrough(Vacina::class, AnimalVacina::class, 'animal_id', 'vacina_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function animalVacinas()
    {
        return $this->hasMany(AnimalVacina::class, 'animal_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function raca()
    {
        return $this->belongsTo(Raca::class, 'raca_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function larTemporario()
    {
        return $this->belongsTo(LarTemporario::class, 'lar_temporario_id');
    }

    /**
     * @return string
     */
    public function getRouteEditAttribute()
    {
        return $this->attributes['route_edit'] = route('cadastros.animal.edit', $this->id);
    }
}
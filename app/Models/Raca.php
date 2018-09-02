<?php

namespace App\Models;

use App\Scopes\EmpresaScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Raca extends Model 
{
    use SoftDeletes;

    protected $table = 'raca';

    protected $fillable = [
        'empresa_id',
        'especie_id',
        'nome',
        'status'
    ];

    protected $dates = ['deleted_at'];

    protected $appends = ['route_edit'];

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
    public function animais()
    {
        return $this->hasMany(Animal::class, 'raca_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function especie()
    {
        return $this->belongsTo(Especie::class, 'especie_id');
    }

    /**
     * @return string
     */
    public function getRouteEditAttribute()
    {
        return $this->attributes['route_edit'] = route('cadastros.raca.edit', $this->id);
    }

}
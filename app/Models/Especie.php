<?php

namespace App\Models;

use App\Scopes\EmpresaScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Especie extends Model 
{
    use SoftDeletes;

    protected $table = 'especie';

    protected $dates = ['deleted_at'];

    protected $appends = ['route_edit'];

    protected $fillable = [
        'empresa_id',
        'nome',
        'status'
    ];

    public function racas()
    {
        return $this->hasMany(Raca::class, 'especie_id');
    }

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

    public function getRouteEditAttribute()
    {
        return $this->attributes['route_edit'] = route('cadastros.especie.edit', $this->id);
    }

}
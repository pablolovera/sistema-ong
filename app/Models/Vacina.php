<?php

namespace App\Models;

use App\Scopes\EmpresaScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vacina extends Model 
{
    use SoftDeletes;

    protected $table = 'vacina';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'empresa_id',
        'nome',
        'observacao',
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

    public function animais()
    {
        return $this->hasManyThrough(Animal::class, AnimalVacina::class, 'animal_id', 'vacina_id');
    }

    public function vacinaAnimais()
    {
        return $this->hasMany(AnimalVacina::class, 'animal_id');
    }

}
<?php

namespace App\Models;

use App\Scopes\EmpresaScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AnimalVacina extends Model 
{
    use SoftDeletes;

    protected $table = 'animal_vacina';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'empresa_id',
        'animal_id',
        'vacina_id',
        'lembrete_proprietario',
        'aplicado',
        'data_aplicado'
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

}
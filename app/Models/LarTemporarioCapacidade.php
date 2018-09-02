<?php

namespace App\Models;

use App\Scopes\EmpresaScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LarTemporarioCapacidade extends Model 
{
    use SoftDeletes;

    protected $table = 'lar_temporario_capacidade';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'especie_id',
        'lar_temporario_id',
        'capacidade',
        'status'
    ];

    public function especie()
    {
        return $this->belongsTo(Especie::class, 'especie_id');
    }
}
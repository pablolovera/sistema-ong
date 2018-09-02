<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Http\Request;

class EmpresaScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $builder
     * @param  \Illuminate\Database\Eloquent\Model $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        if ( is_null(auth()->user()))
            $empresa_id = Request::capture()->has('empresa_id') ? Request::capture()->get('empresa_id') : null;
        else
            $empresa_id = auth()->user()->empresa_id;

        $builder->where($model->getTable() . '.empresa_id', $empresa_id);
    }
}
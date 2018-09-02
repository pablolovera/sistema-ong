<?php

namespace App\Http\Controllers\WEB\Relatorios;

use App\Http\Controllers\Controller;
use App\Http\Resources\DefaultCollection;
use App\Models\Animal;
use App\Models\LarTemporario;
use App\Models\Pessoa;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return DefaultCollection|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query  = [];
        $params = [];
        if ( $request->method() == 'POST' ) :

            $publicado = collect();

            if ( $request->has('sim_publicado') ? (is_null($request->sim_publicado) ? false : true) : false )
                $publicado->push(1);

            if ( $request->has('nao_publicado') ? (is_null($request->nao_publicado) ? false : true) : false )
                $publicado->push(0);


            $castrado = collect();

            if ( $request->has('eh_castrado_sim') ? (is_null($request->eh_castrado_sim) ? false : true) : false )
                $castrado->push(1);

            if ( $request->has('eh_castrado_nao') ? (is_null($request->eh_castrado_nao) ? false : true) : false )
                $castrado->push(0);

                $query = Animal::query()->with(['raca', 'raca.especie', 'responsavel', 'larTemporario'])
                ->when($request->has('pessoa_id') ? (is_null($request->pessoa_id) ? false : true) : false, function ($query) use ($request) {
                    return $query->whereIn('pessoa_id', explode(',', $request->pessoa_id));
                })
                ->when($request->has('lar_temporario_id') ? (is_null($request->lar_temporario_id) ? false : true) : false, function ($query) use ($request) {
                    return $query->whereIn('lar_temporario_id', explode(',', $request->lar_temporario_id));
                })
                ->when($request->has('raca_id') ? (is_null($request->raca_id) ? false : true) : false, function ($query) use ($request) {
                    return $query->whereIn('raca_id', explode(',', $request->raca_id));
                })
                ->when($request->has('status') ? (is_null($request->status) ? false : true) : false, function ($query) use ($request) {
                    return $query->whereIn('status', explode(',', $request->status));
                })
                ->when($request->has('sexo') ? (is_null($request->sexo) ? false : true) : false, function ($query) use ($request) {
                    return $query->whereIn('sexo', explode(',', $request->sexo));
                })
                ->when($castrado->isNotEmpty(), function ($query) use ($castrado) {
                    return $query->whereIn('eh_castrado', $castrado->toArray());
                })
                ->when($publicado->isNotEmpty(), function ($query) use ($publicado) {
                    return $query->whereIn('publicado', $publicado->toArray());
                })->orderBy('nome')->get();

            $params = $request;

        endif;

        $dados['dados']             = $params;
        $dados['pessoas']           = Pessoa::all();
        $dados['lares_temporarios'] = LarTemporario::all();
        $dados['rel_data']          = $query;

        return view('relatorios.animal', $dados);
    }
}

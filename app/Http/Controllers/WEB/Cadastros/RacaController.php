<?php

namespace App\Http\Controllers\WEB\Cadastros;

use App\Http\Controllers\Controller;
use App\Http\Requests\WEB\RacaRequest;
use App\Http\Resources\DefaultCollection;
use App\Models\Especie;
use App\Models\Raca;

class RacaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return DefaultCollection|\Illuminate\Http\Response
     */
    public function index()
    {
        $dados['route_create']  = route('cadastros.raca.create');
        $dados['title']         = 'Cadastro de Raças';
        $dados['id_grid']       = 'gridRacas';
        $dados['route_list']    = route('cadastros.raca.datagrid');

        return view('layouts.partials.base-list', $dados);
    }

    /**
     * @return DefaultCollection
     */
    public function datagrid()
    {
        return new DefaultCollection(Raca::all());
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function listItens()
    {
        return response()->json(Raca::query()->where('status', 1)->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dados['route_cancel']  = route('cadastros.raca.index');
        $dados['route_back']    = route('cadastros.raca.index');
        $dados['route']         = route('cadastros.raca.store');
        $dados['title']         = 'Cadastro de Raças';
        $dados['dados']         = [];

        return view('cadastros.raca', $dados);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RacaRequest $request)
    {
        $dados = new Raca();
        $dados->fill($request->all());
        $dados->empresa_id = auth()->user()->empresa_id;
        $dados->save();

        if ( $request->ajax() )
            return response()->json($dados);

        return redirect()->route('cadastros.raca.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dados['route_cancel']  = route('cadastros.raca.index');
        $dados['route_back']    = route('cadastros.raca.index');
        $dados['route']         = route('cadastros.raca.update', $id);
        $dados['title']         = 'Cadastro de Raças';
        $dados['dados']         = Raca::query()->findOrFail($id);

        return view('cadastros.raca', $dados);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RacaRequest $request, $id)
    {
        $dados = Raca::query()->findOrFail($id);
        $dados->fill($request->all());
        $dados->empresa_id = auth()->user()->empresa_id;
        $dados->save();

        return redirect()->route('cadastros.raca.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Raca::destroy(explode(',', $id));

        return redirect()->route('cadastros.raca.index');
    }
}

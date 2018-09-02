<?php

namespace App\Http\Controllers\WEB\Cadastros;

use App\Http\Controllers\Controller;
use App\Http\Requests\WEB\EspecieRequest;
use App\Http\Resources\DefaultCollection;
use App\Models\Especie;
use Illuminate\Http\Request;

class EspecieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return DefaultCollection|\Illuminate\Http\Response
     */
    public function index()
    {
        $dados['route_create']  = route('cadastros.especie.create');
        $dados['route_list']    = route('cadastros.especie.datagrid');
        $dados['title']         = 'Cadastro de Espécies';
        $dados['id_grid']       = 'gridEspecies';

        return view('layouts.partials.base-list', $dados);
    }

    /**
     * @return DefaultCollection
     */
    public function datagrid()
    {
        return new DefaultCollection(Especie::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dados['route_cancel']  = route('cadastros.especie.index');
        $dados['route_back']    = route('cadastros.especie.index');
        $dados['route']         = route('cadastros.especie.store');
        $dados['title']         = 'Cadastro de Espécie';

        return view('cadastros.especie', $dados);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EspecieRequest $request)
    {
        $dados = new Especie();
        $dados->fill($request->all());
        $dados->empresa_id = auth()->user()->empresa_id;
        $dados->save();

        return redirect()->route('cadastros.especie.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dados['route_back']    = route('cadastros.especie.index');
        $dados['route']         = route('cadastros.especie.update', $id);
        $dados['title']         = 'Cadastro de Espécies';
        $dados['dados']         = Especie::query()->findOrFail($id);

        return view('cadastros.especie', $dados);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Especie::query()->findOrFail($id)->fill($request->all())->save();

        return redirect()->route('cadastros.especie.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($ids)
    {
        Especie::destroy(explode(',', $ids));

        return redirect()->route('cadastros.especie.index');
    }
}

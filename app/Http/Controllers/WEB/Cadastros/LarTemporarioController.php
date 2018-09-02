<?php

namespace App\Http\Controllers\WEB\Cadastros;

use App\Http\Controllers\Controller;
use App\Http\Requests\WEB\LarTemporarioRequest;
use App\Http\Resources\DefaultCollection;
use App\Models\Especie;
use App\Models\LarTemporario;
use App\Models\LarTemporarioCapacidade;
use App\Models\Pessoa;
use App\Models\Raca;
use Illuminate\Http\Request;

class LarTemporarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return DefaultCollection|\Illuminate\Http\Response
     */
    public function index()
    {
        $dados['route_create']  = route('cadastros.lar-temporario.create');
        $dados['route_list']    = route('cadastros.lar-temporario.datagrid');
        $dados['title']         = 'Cadastro de Lar Temporario';
        $dados['id_grid']       = 'gridLaresTemporarios';

        return view('layouts.partials.base-list', $dados);
    }

    /**
     * @return DefaultCollection
     */
    public function datagrid()
    {
        return new DefaultCollection(LarTemporario::query()->with(['pessoa'])->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dados['route_cancel']      = route('cadastros.lar-temporario.index');
        $dados['route_back']        = route('cadastros.lar-temporario.index');
        $dados['route']             = route('cadastros.lar-temporario.store');
        $dados['title']             = 'Cadastro de Lar Temporário';
        $dados['form_id']           = 'form-lar-temporario';
        $dados['especies']          = Especie::all();
        $dados['pessoas']           = Pessoa::all();
        $dados['dados']             = [];

        return view('cadastros.lar-temporario', $dados);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LarTemporarioRequest $request)
    {
        $dados = new LarTemporario();
        $dados->fill($request->all());
        $dados->empresa_id = auth()->user()->empresa_id;
        $dados->save();

        if ( $request->has('capacidades') )

            foreach ($request->capacidades as $capacidade)

                LarTemporarioCapacidade::query()->create([
                    'lar_temporario_id' => $dados->id,
                    'especie_id'        => $capacidade['especie_id'],
                    'capacidade'        => $capacidade['capacidade'],
                ]);

        return redirect()->route('cadastros.lar-temporario.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dados['route_cancel']      = route('cadastros.lar-temporario.index');
        $dados['route_back']        = route('cadastros.lar-temporario.index');
        $dados['route']             = route('cadastros.lar-temporario.update', $id);
        $dados['route_delete']      = route('cadastros.lar-temporario.delete', $id);
        $dados['title']             = 'Cadastro de Lar Temporário';
        $dados['form_id']           = 'form-lar-temporario';
        $dados['dados']             = LarTemporario::query()->findOrFail($id);
        $dados['especies']          = Especie::all();
        $dados['pessoas']           = Pessoa::all();

        return view('cadastros.lar-temporario', $dados);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LarTemporarioRequest $request, $id)
    {
        $dados = LarTemporario::query()->findOrFail($id);
        $dados->fill($request->all());
        $dados->save();

        LarTemporarioCapacidade::query()->where('lar_temporario_id', $dados->id)->delete();

        if ( $request->has('capacidades') )

            foreach ($request->capacidades as $capacidade)

                LarTemporarioCapacidade::query()->create([
                    'lar_temporario_id' => $dados->id,
                    'especie_id'        => $capacidade['especie_id'],
                    'capacidade'        => $capacidade['capacidade'],
                ]);

        return redirect()->route('cadastros.lar-temporario.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($ids)
    {
        LarTemporario::destroy(explode(',', $ids));

        return redirect()->route('cadastros.lar-temporario.index');
    }
}

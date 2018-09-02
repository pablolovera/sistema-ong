<?php

namespace App\Http\Controllers\WEB\Cadastros;

use App\Http\Controllers\Controller;
use App\Http\Requests\WEB\PessoaRequest;
use App\Http\Resources\DefaultCollection;
use App\Models\Pessoa;
use Illuminate\Http\Request;

class PessoaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return DefaultCollection|\Illuminate\Http\Response
     */
    public function index()
    {
        $dados['route_create']  = route('cadastros.pessoa.create');
        $dados['route_list']    = route('cadastros.pessoa.datagrid');
        $dados['title']         = 'Cadastro de Pessoas';
        $dados['id_grid']       = 'gridPessoas';

        return view('layouts.partials.base-list', $dados);
    }

    /**
     * @return DefaultCollection
     */
    public function datagrid()
    {
        return new DefaultCollection(Pessoa::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dados['route_cancel']      = route('cadastros.pessoa.index');
        $dados['route_back']        = route('cadastros.pessoa.index');
        $dados['route']             = route('cadastros.pessoa.store');
        $dados['title']             = 'Cadastro de Pessoa';

        return view('cadastros.pessoa', $dados);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PessoaRequest $request)
    {
        $dados = new Pessoa();
        $dados->fill($request->all());
        $dados->empresa_id = auth()->user()->empresa_id;
        $dados->save();

        return redirect()->route('cadastros.pessoa.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dados['route_cancel']        = route('cadastros.pessoa.index');
        $dados['route_back']        = route('cadastros.pessoa.index');
        $dados['route_delete']      = route('cadastros.pessoa.delete', $id);
        $dados['route']             = route('cadastros.pessoa.update', $id);
        $dados['title']             = 'Cadastro de Animais';
        $dados['dados']             = Pessoa::query()->findOrFail($id);

        return view('cadastros.pessoa', $dados);
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
        Pessoa::query()->findOrFail($id)->fill($request->all())->save();

        return redirect()->route('cadastros.pessoa.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($ids)
    {
        Pessoa::destroy(explode(',', $ids));

        return redirect()->route('cadastros.pessoa.index');
    }
}

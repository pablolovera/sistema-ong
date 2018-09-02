<?php

namespace App\Http\Controllers\WEB\Cadastros;

use App\Http\Controllers\Controller;
use App\Http\Requests\WEB\AnimalRequest;
use App\Http\Resources\DefaultCollection;
use App\Models\Animal;
use App\Models\LarTemporario;
use App\Models\Pessoa;
use App\Models\Raca;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return DefaultCollection|\Illuminate\Http\Response
     */
    public function index()
    {
        $dados['route_create']  = route('cadastros.animal.create');
        $dados['route_list']    = route('cadastros.animal.datagrid');
        $dados['title']         = 'Cadastro de Animais';
        $dados['id_grid']       = 'gridAnimais';

        return view('layouts.partials.base-list', $dados);
    }

    /**
     * @return DefaultCollection
     */
    public function datagrid()
    {
        return new DefaultCollection(Animal::query()->with(['raca', 'raca.especie', 'responsavel', 'larTemporario'])->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dados['route_cancel']      = route('cadastros.animal.index');
        $dados['route_back']        = route('cadastros.animal.index');
        $dados['route']             = route('cadastros.animal.store');
        $dados['title']             = 'Cadastro de Animal';
        $dados['dados']             = [];
        $dados['racas']             = Raca::all();
        $dados['pessoas']           = Pessoa::all();
        $dados['lares_temporarios'] = LarTemporario::all();

        return view('cadastros.animal', $dados);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AnimalRequest $request)
    {
        $dados = new Animal();
        $dados->fill($request->all());
        $dados->empresa_id = auth()->user()->empresa_id;

        $dados->eh_castrado = 0;
        if ( $request->has('eh_castrado') )
            if ( $request->eh_castrado == 'on')
                $dados->eh_castrado = 1;

        if ($request->hasFile('files_upload')) :
            $file = $request->file('files_upload');
            $nome = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/animais/', $nome);
            $dados->foto = $nome;
        endif;

        $dados->save();

        return redirect()->route('cadastros.animal.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dados['route_cancel']      = route('cadastros.animal.index');
        $dados['route_back']        = route('cadastros.animal.index');
        $dados['route']             = route('cadastros.animal.update', $id);
        $dados['route_delete']      = route('cadastros.animal.delete', $id);
        $dados['title']             = 'Cadastro de Animais';
        $dados['dados']             = Animal::query()->findOrFail($id);
        $dados['racas']             = Raca::all();
        $dados['pessoas']           = Pessoa::all();
        $dados['lares_temporarios'] = LarTemporario::all();

        return view('cadastros.animal', $dados);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AnimalRequest $request, $id)
    {
        $dados = Animal::query()->findOrFail($id);
        $dados->fill($request->all());

        $dados->eh_castrado = 0;
        if ( $request->has('eh_castrado') )
            if ( $request->eh_castrado == 'on')
                $dados->eh_castrado = 1;

        if ($request->hasFile('files_upload')) :
            $file = $request->file('files_upload');
            $nome = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/animais/', $nome);
            $dados->foto = $nome;
        endif;

        $dados->save();

        return redirect()->route('cadastros.animal.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($ids)
    {
        Animal::destroy(explode(',', $ids));

        return redirect()->route('cadastros.animal.index');
    }
}

<?php

namespace App\Http\Controllers\WEB\Cadastros;

use App\Http\Controllers\Controller;
use App\Http\Requests\WEB\UsuarioRequest;
use App\Http\Resources\DefaultCollection;
use App\Models\TipoUsuario;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return DefaultCollection|\Illuminate\Http\Response
     */
    public function index()
    {
        $dados['route_create']  = route('cadastros.usuario.create');
        $dados['route_list']    = route('cadastros.usuario.datagrid');
        $dados['title']         = 'Cadastro de Usuários';
        $dados['id_grid']       = 'gridUsuarios';

        return view('layouts.partials.base-list', $dados);
    }

    /**
     * @return DefaultCollection
     */
    public function datagrid()
    {
        return new DefaultCollection(Usuario::query()->with(['tipo', 'pessoa'])->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dados['route_cancel']      = route('cadastros.usuario.index');
        $dados['route_back']        = route('cadastros.usuario.index');
        $dados['route']             = route('cadastros.usuario.store');
        $dados['title']             = 'Cadastro de Usuario';
        $dados['dados']             = [];
        $dados['tipos']             = TipoUsuario::all();

        return view('cadastros.usuario', $dados);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsuarioRequest $request)
    {
        $dados = new Usuario();
        $dados->fill($request->all());
        $dados->empresa_id = auth()->user()->empresa_id;
        $dados->save();

        return redirect()->route('cadastros.usuario.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dados['route_cancel']      = route('cadastros.usuario.index');
        $dados['route_back']        = route('cadastros.usuario.index');
        $dados['route']             = route('cadastros.usuario.update', $id);
        $dados['route_delete']      = route('cadastros.usuario.delete', $id);
        $dados['title']             = 'Cadastro de Usuários';
        $dados['dados']             = Usuario::query()->findOrFail($id);
        $dados['tipos']             = TipoUsuario::all();

        return view('cadastros.usuario', $dados);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsuarioRequest $request, $id)
    {
        $dados = Usuario::query()->findOrFail($id);
        $dados->fill($request->all());
        $dados->password = bcrypt($request->password);
        $dados->save();

        return redirect()->route('cadastros.usuario.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($ids)
    {
        Usuario::destroy(explode(',', $ids));

        return redirect()->route('cadastros.usuario.index');
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\TipoUsuarioRequest;
use App\Http\Resources\DefaultCollection;
use App\Http\Resources\DefaultResource;
use App\Models\TipoUsuario;
use App\Traits\HandleQueryString;

class TipoUsuarioController extends Controller
{
    use HandleQueryString;

    /**
     * @var TipoUsuarioRequest
     */
    private $request;

    /**
     * TipoUsuarioController constructor.
     * @param TipoUsuarioRequest $request
     */
    public function __construct(TipoUsuarioRequest $request)
    {
        $this->request = $request;
    }

    /**
     * Display a listing of the resource.
     *
     * @return DefaultCollection|\Illuminate\Http\Response
     */
    public function index()
    {
        $result = $this->getResults(TipoUsuario::query(), $this->request);

        return new DefaultCollection($result);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return DefaultResource
     */
    public function store(TipoUsuarioRequest $request)
    {
        $dados = new TipoUsuario();
        $dados->fill($request->all());
        $dados->save();

        return new DefaultResource($dados);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return DefaultResource
     */
    public function show($id)
    {
        return new DefaultResource(TipoUsuario::query()->findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return DefaultResource
     */
    public function update($id)
    {
        $dados = TipoUsuario::query()->findOrFail($id);
        $dados->fill($this->request->all());
        $dados->save();

        return new DefaultResource($dados);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TipoUsuario::destroy($id);

        return response()->json(['id' => $id, 'deleted' => true]);
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\PerfilRequest;
use App\Http\Resources\DefaultCollection;
use App\Http\Resources\DefaultResource;
use App\Models\Perfil;
use App\Traits\HandleQueryString;

class PerfilController extends Controller
{
    use HandleQueryString;

    /**
     * @var PerfilRequest
     */
    private $request;

    /**
     * PerfilController constructor.
     * @param PerfilRequest $request
     */
    public function __construct(PerfilRequest $request)
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
        $result = $this->getResults(Perfil::query(), $this->request);

        return new DefaultCollection($result);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return DefaultResource
     */
    public function store(PerfilRequest $request)
    {
        $dados = new Perfil();
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
        return new DefaultResource(Perfil::query()->findOrFail($id));
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
        $dados = Perfil::query()->findOrFail($id);
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
        Perfil::destroy($id);

        return response()->json(['id' => $id, 'deleted' => true]);
    }
}

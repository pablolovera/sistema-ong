<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\RacaRequest;
use App\Http\Resources\DefaultCollection;
use App\Http\Resources\DefaultResource;
use App\Models\Raca;
use App\Traits\HandleQueryString;

class RacaController extends Controller
{
    use HandleQueryString;

    /**
     * @var RacaRequest
     */
    private $request;

    /**
     * RacaController constructor.
     * @param RacaRequest $request
     */
    public function __construct(RacaRequest $request)
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
        $result = $this->getResults(Raca::query(), $this->request);

        return new DefaultCollection($result);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return DefaultResource
     */
    public function store(RacaRequest $request)
    {
        $dados = new Raca();
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
        return new DefaultResource(Raca::query()->findOrFail($id));
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
        $dados = Raca::query()->findOrFail($id);
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
        Raca::destroy($id);

        return response()->json(['id' => $id, 'deleted' => true]);
    }
}

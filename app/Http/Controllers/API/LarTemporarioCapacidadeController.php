<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\LarTemporarioCapacidadeRequest;
use App\Http\Resources\DefaultCollection;
use App\Http\Resources\DefaultResource;
use App\Models\LarTemporarioCapacidade;
use App\Traits\HandleQueryString;

class LarTemporarioCapacidadeController extends Controller
{
    use HandleQueryString;

    /**
     * @var LarTemporarioCapacidadeRequest
     */
    private $request;

    /**
     * LarTemporarioCapacidadeController constructor.
     * @param LarTemporarioCapacidadeRequest $request
     */
    public function __construct(LarTemporarioCapacidadeRequest $request)
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
        $result = $this->getResults(LarTemporarioCapacidade::query(), $this->request);

        return new DefaultCollection($result);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return DefaultResource
     */
    public function store(LarTemporarioCapacidadeRequest $request)
    {
        $dados = new LarTemporarioCapacidade();
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
        return new DefaultResource(LarTemporarioCapacidade::query()->findOrFail($id));
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
        $dados = LarTemporarioCapacidade::query()->findOrFail($id);
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
        LarTemporarioCapacidade::destroy($id);

        return response()->json(['id' => $id, 'deleted' => true]);
    }
}

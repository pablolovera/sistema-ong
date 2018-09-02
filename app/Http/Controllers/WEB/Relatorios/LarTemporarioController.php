<?php

namespace App\Http\Controllers\WEB\Relatorios;

use App\Http\Controllers\Controller;
use App\Http\Resources\DefaultCollection;
use Illuminate\Http\Request;

class LarTemporarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return DefaultCollection|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('relatorios.lar-temporario');
    }
}

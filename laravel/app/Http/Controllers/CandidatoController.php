<?php

namespace App\Http\Controllers;

use App\Models\Candidato;

class CandidatoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Candidato::all();
    }
}

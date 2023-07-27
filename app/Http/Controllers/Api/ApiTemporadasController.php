<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Serie;

class ApiTemporadasController extends Controller
{
    public function show(int $id)
    {
        $temporada = Serie::find($id)->temporadas;
        
        return $temporada;
    }
}
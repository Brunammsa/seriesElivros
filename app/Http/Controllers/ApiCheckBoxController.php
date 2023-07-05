<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Response;

class ApiCheckBoxController extends Controller
{
    public function toggle(Serie $serie): Response
    {
        $isDone = $serie->read;

        if ($isDone) {
            $serie->read = false;
            $serie->save();

            return response('Marcado com sucesso', 200);
        };

        $serie->read = true;
        $serie->save();

        return response('Desmarcado com sucesso', 200);
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Response;

class ApiCheckBoxController extends Controller
{
    public function toggle(Serie $serie): Response
    {
        $isDone = $serie->read;

        $text = 'marcado com sucesso'; 

        if ($isDone) {
            $text = 'desmarcado com sucesso';
        };

        $serie->read = !$serie->read;
        $serie->save();
        
        return response($text, 200);
    }
}
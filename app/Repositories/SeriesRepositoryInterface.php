<?php

namespace App\Repositories;
use App\Http\Requests\SeriesFormRequest;
use App\Models\Serie;

interface SeriesRepositoryInterface
{
    public function add(SeriesFormRequest $request): Serie;
    public function update(Serie $serie, SeriesFormRequest $request): Serie;
}
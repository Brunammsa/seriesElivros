<?php

namespace App\Providers;

use App\Repositories\EloquentSeriesRepository;
use App\Repositories\SeriesRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class SeriesRepositoryProvider extends ServiceProvider
{

    public array $bindings = [
        SeriesRepositoryInterface::class => EloquentSeriesRepository::class
    ];
}

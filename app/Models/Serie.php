<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'read', 'cover'];

    public function temporadas()
    {
        return $this->hasMany(Temporadas::class, 'series_id');
    }

    public function episodios()
    {
        return $this->hasManyThrough(Episodios::class, Temporadas::class, 'series_id', 'temporadas_id');
    }

    protected static function booted()
    {
        self::addGlobalScope('ordered', function(Builder $queryBuilder) {
            $queryBuilder->orderBy('name');
        });
    }
}

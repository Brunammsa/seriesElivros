<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'read', 'cover'];
    protected $appends = ['links'];

    public function usuarios()
    {
        return $this->belongsToMany(User::class, 'series_users', 'series_id', 'users_id');
    }

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

    public function links(): Attribute
    {
        return new Attribute(
            get: fn() => [
                [
                    'rel' => 'self',
                    'url' => "/api/series/{$this->id}"
                ],
                [
                    'rel' => 'temporadas',
                    'url' => "/api/series/{$this->id}/temporadas"
                ],
                [
                    'rel' => 'episodios',
                    'url' => "/api/series/{$this->id}/episodios"
                ],
            ],
        );
    }
}

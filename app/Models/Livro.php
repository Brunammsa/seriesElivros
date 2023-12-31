<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    protected static function booted()
    {
        self::addGlobalScope('ordered', function(Builder $querybuilder) {
            $querybuilder->orderBy('name');
        });
    }

    public function usuarios()
    {
        return $this->belongsToMany(User::class);
    }
}

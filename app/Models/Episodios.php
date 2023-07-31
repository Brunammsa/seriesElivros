<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episodios extends Model
{
    use HasFactory;
    protected $fillable = [
        'numero',
        'read'
    ];
    
    protected $casts = ['read' => 'boolean'];

    public $timestamps = false;

    public function temporadas()
    {
        return $this->belongsTo(Temporadas::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Animal extends Model
{
    protected $table = "animals";
    protected $fillable = [
        'name',
        'height',
        'weight',
        'color',
        'lifespan',
        'diet',
        'habitat',
        'predators',
        'avgspeed',
        'topspeed',
        'countries',
        'conservationStatus',
        'family',
        'gestationPeriod',
        'socialStructure',
        'image',
        'description'
    ];
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}

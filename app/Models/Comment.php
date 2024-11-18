<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    protected $fillable = [
        'title',
        'comment',
        'user_id',
        'animal_id'
    ];
    public function animal(): BelongsTo
    {
        return $this->belongsTo(Animal::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

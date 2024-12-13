<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Comment extends Model
{
    protected $fillable = [
        'title',
        'comment',
        'user_id',
        'animal_id',
        'parent_id'
    ];
    public function replies(): HasMany
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }
    public static function boot()
    {
        parent::boot();

        // Cascade delete replies when a main comment is deleted
        static::deleting(function ($comment) {
            $comment->replies()->each(function ($reply) {
                $reply->delete();
            });
        });
    }

    public function animal(): BelongsTo
    {
        return $this->belongsTo(Animal::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function likes(){
        return $this->belongsToMany(User::class, 'comment_like')->withTimestamps();
    }
}

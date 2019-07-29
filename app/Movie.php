<?php

namespace App;
use App\Http\Traits\VotableTrait;
use App\Genre;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use VotableTrait;

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    protected $with = ['genre'];

    protected $appends = [
        'user_has_liked',
        'user_has_disliked',
        'likes_count',
        'dislikes_count'
    ];
}

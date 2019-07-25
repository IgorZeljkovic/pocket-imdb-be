<?php

namespace App;
use App\Http\Traits\VotableTrait;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use VotableTrait;

    protected $appends = ['user_has_liked', 'user_has_disliked', 'likes_count', 'dislikes_count'];
}

<?php

namespace App\Http\Traits;

trait VotableTrait
{
    public function votes()
    {
        return $this->morphMany('App\Vote', 'votable');
    }

    public function getUserHasLikedAttribute()
    {
        if (!auth()->check()) {
            return false;
        }

        return $this->votes->contains(static function ($vote) {
            return $vote->user_id === auth()->id() && $vote->type === 'like';
        });
    }

    public function getUserHasDislikedAttribute()
    {
        if (!auth()->check()) {
            return false;
        }

        return $this->votes->contains(static function ($vote) {
            return $vote->user_id === auth()->id() && $vote->type === 'dislike';
        });
    }

    public function getLikesCountAttribute()
    {
        return $this->votes->reduce(static function ($sum, $vote) {
            return $vote->type === 'like' ? $sum + 1 : $sum;
        }, 0);
    }

    public function getDislikesCountAttribute()
    {
        return $this->votes->reduce(static function ($sum, $vote) {
            return $vote->type === 'dislike' ? $sum + 1 : $sum;
        }, 0);
    }
}
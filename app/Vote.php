<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{

    protected $fillable = ['user_id', 'votable_id', 'votable_type', 'type'];

    public function votable()
    {
        return $this->morphTo();
    }
}

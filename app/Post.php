<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'body'];

    /**
     * Polymorphic: An entity can have zero or many approvals.
     *
     * This function will get all comment's approvals.
     * See: post's comments() method for the inverse
     *
     * @return void
     */
    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }
}

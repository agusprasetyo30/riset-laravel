<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Video extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $fillable = ['title', 'url'];

    /**
     * Polymorphic: An entity can have zero or many approvals.
     *
     * This function will get all comment's approvals.
     * See: video's comments() method for the inverse
     *
     * @return void
     */
    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }

    public function tags()
    {
        return $this->morphToMany('App\Tag', 'taggable');
    }
}
 
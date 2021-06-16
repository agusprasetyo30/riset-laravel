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
     * See: comment's videos () method for the inverse
     *
     * @return void
     */
    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }

    /**
     * Many-to-Many: A Position may have many or many Benefit.
     *
     * This function will retrieve all the Positions of a given Benefit.
     * See: tag's videos() method for the inverse
     *
     * @return mixed
     */
    public function tags()
    {
        return $this->morphToMany('App\Tag', 'taggable');
    }

    /**
     * Attributes to include in the Audit.
     *
     * @var array
     */
    protected $auditInclude = [
        'title', 
        'url'
    ];
}
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \OwenIt\Auditing\Auditable;

class Comment extends Model
{

    protected $fillable = ['body'];
    /**
     * Polymorphic: An entity can have zero or many approvals.
     *
     * This function will get all of the owning approvable models.
     * 
     * ex: 
     *  - post's comments() method for the inverse
     *  - video's comments()'method for the inverse
     * 
     * @return void
     */
    public function commentable()
    {
        return $this->morphTo();
    }
}

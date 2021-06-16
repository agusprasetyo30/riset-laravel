<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Tag extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $fillable = ['name'];

    /**
     * Many-to-Many: A Position may have many or many Benefit.
     *
     * This function will retrieve all the Positions of a given Benefit.
     * See: post's tags() method for the inverse
     *
     * @return mixed
     */
    public function posts()
    {
        return $this->morphedByMany('App\Post', 'taggable');
    }

    /**
     * Many-to-Many: A Position may have many or many Benefit.
     *
     * This function will retrieve all the Positions of a given Benefit.
     * See: Video's tags() method for the inverse
     *
     * @return mixed
     */
    public function videos()
    {
        return $this->morphedByMany('App\Video', 'taggable');
    }

    /**
     * Attributes to include in the Audit.
     *
     * @var array
     */
    protected $auditInclude = [
        'name'
    ];
}

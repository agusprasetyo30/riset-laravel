<?php

namespace Modules\Toko\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    protected $fillable = ['name'];

    /**
     * Many-to-Many: A Position may have many or many Benefit.
     * 
     * This function will retrieve all the Positions of a given Benefit.
     * See: item's category() method for the inverse
     *
     * @return void
     */
    public function item()
    {
        return $this->morphedByMany(Item::class, 'categoriables');
    }
}

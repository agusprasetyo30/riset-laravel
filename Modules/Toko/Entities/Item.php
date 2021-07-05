<?php

namespace Modules\Toko\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item extends Model
{
    protected $fillable = ['name', 'price', 'created_by'];

    /**
     * Polymorphic: An entity can have zero or many approvals.
     *
     * This function will get all comment's approvals.
     * See: category's item() method for the inverse
     *
     * @return void
     */
    public function category()
    { 
        return $this->morphToMany(Category::class, 'categoriable');
    }
}

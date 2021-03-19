<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mata_kuliah extends Model
{
    protected $table = 'mata_kuliah';
    
    // Menyambungkan many to many
    public function mahasiswa()
    {
        return $this->belongsToMany('App\Mahasiswa', 'mahasiswa_mata_kuliah', 
            'mata_kuliah_id', 'mahasiswa_id');
    }

    public function getRouteKeyName()
    {
        return 'uuid';
    }
}

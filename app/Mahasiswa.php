<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswa';

    protected $fillable = [
        "uuid",
        "nama",
        "kelas",
        "jk",
        "alamat",
        'origin_mahasiswa'
    ];  

    public function mata_kuliah()
    {
        return $this->belongsToMany('App\Mata_kuliah', 'mahasiswa_mata_kuliah', 
            'mahasiswa_id', 'mata_kuliah_id');
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'uuid';
    }
}

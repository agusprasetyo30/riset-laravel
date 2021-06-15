<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Mata_kuliah extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $table = 'mata_kuliah';
    
    // Menyambungkan many to many
    public function mahasiswa()
    {
        return $this->belongsToMany('App\Mahasiswa', 'mahasiswa_mata_kuliah', 
            'mata_kuliah_id', 'mahasiswa_id');
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function getRouteKeyName()
    {
        return 'uuid';
    }

    /** RISET GetAttribute & ScopeOf **/

    /**
     * Mencari/menampilkan gender berdasarkan type jenis kelamin yang diinput sesuai dengan type
     *
     * @param [type] $query
     * @param [type] $genderType
     * @return void
     */
    public function scopeOfStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    /**
     * Menampilkan mahasiswa yang memiliki/mengambil mata kuliah
     *
     * @return void
     */
    public function getAmbilMahasiswaAttribute()
    {
        return $this->mahasiswa()->paginate(5);
    }
}

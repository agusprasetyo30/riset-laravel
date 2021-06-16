<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Mahasiswa extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    
    protected $table = 'mahasiswa';

    protected $fillable = [
        "uuid",
        "nama",
        "kelas",
        "jk",
        "alamat",
        'origin_mahasiswa'
    ];  

    /**
     * Undocumented function
     *
     * @return void
     */
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

    /** RISET GetAttribute & ScopeOf **/

    /**
     * Mencari/menampilkan gender berdasarkan type jenis kelamin yang diinput sesuai dengan type
     *
     * @param [type] $query
     * @param [type] $genderType
     * @return void
     */
    public function scopeOfGender($query, $genderType)
    {
        return $query->where('jk', $genderType);
    }

    /**
     * Menampilkan mahasiswa yang memiliki/mengambil mata kuliah
     *
     * @return void
     */
    public function getAmbilMataKuliahAttribute()
    {
        return $this->mata_kuliah()->get();
    }

    /**
     * Attributes to include in the Audit.
     *
     * @var array
     */
    protected $auditInclude = [
        "nama",
        "kelas",
        "jk",
        "alamat"
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class Mata_kuliah extends Model implements Auditable
// , Sortable
{
    // use SortableTrait;
    use \OwenIt\Auditing\Auditable;

    protected $table = 'mata_kuliah';

    protected $fillable = [
        "uuid",
        "nama",
        "status",
    ];
    
    public $sortable = [
        'order_column_name' => 'nama',
        'sort_when_creating' => true,
    ];

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

    /**
     * Attributes to include in the Audit.
     *
     * @var array
     */
    protected $auditInclude = [
        "nama",
        "status",
    ];
}

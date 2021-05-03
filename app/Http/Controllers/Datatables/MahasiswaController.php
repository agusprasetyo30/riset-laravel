<?php

namespace App\Http\Controllers\Datatables;

use App\Http\Controllers\Controller;
use App\Mahasiswa;
use App\Mata_kuliah;
use DataTables;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mahasiswas = Mahasiswa::all(); 

        return DataTables::of($mahasiswas)
            ->addColumn('action', function($mahasiswa) {
                return '
                <div class="btn-group-sm">
                    <button type="button" data-toggle="modal" data-target="#mahasiswa_modal" class="btn btn-primary btn-sm edit-mahasiswa" title="edit" ' .
                    'data-uuid=' . $mahasiswa->uuid . ' >Edit</button>' .
                    '<button type="button" class="btn btn-sm btn-danger delete" title="Hapus" data-uuid= '. $mahasiswa->uuid .'>Hapus</button>' .
                '</div>';
            })
            ->make(true);
    }

    /**
     * Untuk menampilkan tabel datatable
     *
     * @return void
     */
    public function indexDatatable()
    {
        // $mahasiswa = Mata_kuliah::all();

        // dd($mahasiswa);
        // dd(json_decode($mahasiswa->origin_mahasiswa)->origin_mahasiswa);
        
        return view('mmf.riset.datatables.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        return response()->json($mahasiswa);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();

        return response()->json();
    }
}

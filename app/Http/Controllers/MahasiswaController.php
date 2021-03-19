<?php

namespace App\Http\Controllers;

use App\Mahasiswa;
use App\Mata_kuliah;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Webpatser\Uuid\Uuid;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mahasiswa = Mahasiswa::all();

        return view('mmf.mahasiswa.index', compact('mahasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mmf.mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Generate UUID
        $uuid = (string)Uuid::generate();

        $mahasiswa = new Mahasiswa();
        
        $mahasiswa->nama = $request->get('nama');
        $mahasiswa->kelas = $request->get('kelas');
        $mahasiswa->jk = $request->get('jk');
        $mahasiswa->alamat = $request->get('alamat');
        $mahasiswa->uuid = $uuid;

        $mahasiswa->save();

        return redirect()
            ->route('test.mahasiswa.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Mahasiswa $mahasiswa)
    {

        return view('mmf.mahasiswa.show', compact('mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        try {
            return view('mmf.mahasiswa.edit', compact('mahasiswa'));

        } catch (ModelNotFoundException $m) {
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        try {
            $mahasiswa->nama = $request->get('nama');
            $mahasiswa->kelas = $request->get('kelas');
            $mahasiswa->jk = $request->get('jk');
            $mahasiswa->alamat = $request->get('alamat');

            $mahasiswa->save();

            return redirect()
                ->route('test.mahasiswa.index');
        
        } catch (ModelNotFoundException $m) {
            abort(404);
        }
    }

    /**
     * Undocumented function
     *
     * @param [type] $id
     * @return void
     */
    public function ambilMataKuliah($uuid)
    {
        try {
            // Untuk load mahasiswa sesuai ID
            $mahasiswa = Mahasiswa::where("uuid", "=", $uuid)->firstOrFail();

            // Untuk load mata kuliah
            $mata_kuliah = Mata_kuliah::where("status", "ACTIVE")->get();
            
            // dd($mahasiswa->mata_kuliah[1]->pivot->mata_kuliah_id);

            return view('mmf.mahasiswa.ambil-matkul', compact('mahasiswa', 'mata_kuliah'));

        } catch (ModelNotFoundException $m) {
            abort(404);
        }
    }

    public function prosesPenambahanMatkul(Request $request, $id, $matkul)
    {
        $type = $request->get('type');

        $mahasiswa = Mahasiswa::findOrFail($id);

        // jika tipenya 'ADD'
        if ($type == 'add') {
            $mahasiswa->mata_kuliah()->attach($matkul);

            return redirect()->back();
        
        } else if (($type == 'delete')) {
            $mahasiswa->mata_kuliah()->detach($matkul);

            return redirect()->back();

        } else {
            abort(404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();

        return redirect()->back();
    }
}
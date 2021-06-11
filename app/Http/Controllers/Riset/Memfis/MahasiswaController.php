<?php

namespace App\Http\Controllers\Riset\Memfis;

use App\Http\Controllers\Controller;
use App\Http\Requests\MahasiswaRequest;
use App\Mahasiswa;
use App\Mata_kuliah;
use DataTables;
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
    public function index(Request $request)
    {
        if ($request->get('gender') == 'L' || $request->get('gender') == 'P') {
            $mahasiswa = Mahasiswa::ofGender($request->get('gender'))->paginate(5); 
        
        } else if ($request->get('gender') == 'all' || empty($request->get('gender'))) {
            $mahasiswa = Mahasiswa::paginate(5);
        
        } else {
            abort(404);
        }

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
    public function store(MahasiswaRequest $request)
    {
        // Generate UUID
        $uuid = (string)Uuid::generate();

        $mahasiswa = new Mahasiswa();
        // $mahasiswa = $request->all(); // untuk mengambil semua request

        $mahasiswa->nama = $request->get('nama');
        $mahasiswa->kelas = $request->get('kelas');
        $mahasiswa->jk = $request->get('jk');
        $mahasiswa->alamat = $request->get('alamat');
        $mahasiswa->uuid = $uuid;
        $mahasiswa->origin_mahasiswa = $request->get('origin_mahasiswa');

        // $mahasiswa->save();

        return response()->json($mahasiswa, 200);

        // return redirect()
        //     ->route('test.mahasiswa.index');
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
            // dd(optional($mahasiswa->first())->toJson());
            // dd($mahasiswa);
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
    public function update(MahasiswaRequest $request, Mahasiswa $mahasiswa)
    {
        try {
            // Mahasiswa::where('uuid', $request->mahasiswa_uuid)->update([
            //     'nama'              => $request->nama,
            //     'kelas'             => $request->kelas,
            //     'jk'                => $request->jk,
            //     'alamat'            => $request->alamat,
            //     'origin_mahasiswa'  => optional($mahasiswa)->toJson(),
            // ]);

            $mahasiswa->update($request->all());

            return response()->json($mahasiswa, 200);
            
            // dd($mahasiswa, $request->all());
            // return redirect()
            //     ->route('test.mahasiswa.index');

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
            $mata_kuliah = Mata_kuliah::where("status", "ACTIVE")->paginate(10);

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

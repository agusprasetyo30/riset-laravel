<?php

namespace App\Http\Controllers\Riset\Memfis;

use App\Http\Controllers\Controller;
use App\Http\Requests\MataKuliahRequest;
use App\Mata_kuliah;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Webpatser\Uuid\Uuid;

class MatakuliahController extends Controller
{
    /**
     * Undocumented function
     *
     * @return void
     */
    public function index()
    {
        $mata_kuliah = Mata_kuliah::paginate(5);

        return view('mmf.mata-kuliah.index', compact('mata_kuliah'));
    }


    /**
     * Undocumented function
     *
     * @return void
     */
    public function create()
    {
        return view('mmf.mata-kuliah.create');
    }

    /**
     * Undocumented function
     *
     * @param Mata_kuliah $mata_kuliah
     * @return void
     */
    public function show(Mata_kuliah $mata_kuliah)
    {
        try {
            return view('mmf.mata-kuliah.show', compact('mata_kuliah'));
        
        } catch (ModelNotFoundException $m) {
            abort(404, $m->getMessage());
            // dd($m->getMessage());
        }
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function store(MataKuliahRequest $request)
    {
        $mata_kuliah = new Mata_kuliah;

        // Generate UUID
        $uuid = (string)Uuid::generate();

        $mata_kuliah->nama = $request->get('nama');
        $mata_kuliah->status = $request->get('status');
        $mata_kuliah->uuid = $uuid;

        $mata_kuliah->save();

        return response()->json($mata_kuliah, 200);
        // return redirect()
        //     ->route('test.matakuliah.index');
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function edit(Mata_kuliah $mata_kuliah)
    {
        try {
            return view('mmf.mata-kuliah.edit', compact('mata_kuliah'));
        
        } catch (ModelNotFoundException $m) {
            abort(404, $m->getMessage());
            // dd($m->getMessage());
        }
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function update(MataKuliahRequest $request, Mata_kuliah $mata_kuliah)
    {
        $mata_kuliah->nama = $request->get('nama');
        $mata_kuliah->status = $request->get('status');
        
        $mata_kuliah->save();

        return response()->json($mata_kuliah, 200);
        // return redirect()
        //     ->route('test.matakuliah.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mata_kuliah $mata_kuliah)
    {
        try {
            $mata_kuliah->delete();

            return redirect()
                ->back();
        } catch (ModelNotFoundException $m) {
            abort(404, $m->getMessage());
            // dd($m->getMessage());
        }
    }
}

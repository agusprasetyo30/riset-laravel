<?php

namespace App\Http\Controllers;

use App\Mata_kuliah;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    /**
     * Undocumented function
     *
     * @return void
     */
    public function index()
    {
        $mata_kuliah = Mata_kuliah::all();

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
     * @return void
     */
    public function store(Request $request)
    {
        $mata_kuliah = new Mata_kuliah;

        $mata_kuliah->nama = $request->get('nama');
        $mata_kuliah->status = $request->get('status');

        $mata_kuliah->save();

        return redirect()
            ->route('test.matakuliah.index');
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function edit($id)
    {
        try {
            $mata_kuliah = Mata_kuliah::findOrFail($id);

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
    public function update(Request $request, $id)
    {
        $mata_kuliah = Mata_kuliah::findOrFail($id);

        $mata_kuliah->nama = $request->get('nama');
        $mata_kuliah->status = $request->get('status');

        $mata_kuliah->save();

        return redirect()
            ->route('test.matakuliah.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $mata_kuliah = Mata_kuliah::findOrFail($id);

            $mata_kuliah->delete();

            return redirect()
                ->back();
        } catch (ModelNotFoundException $m) {
            abort(404, $m->getMessage());
            // dd($m->getMessage());
        }
    }
}

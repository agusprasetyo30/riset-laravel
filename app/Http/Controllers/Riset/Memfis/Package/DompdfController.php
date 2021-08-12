<?php

namespace App\Http\Controllers\Riset\Memfis\Package;

use App\Http\Controllers\Controller;
use App\Mahasiswa;
use App\Mata_kuliah;
use Illuminate\Http\Request;

class DompdfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('mmf.riset.package.laravel-dompdf.index');
    }

    
    public function printDompdf()
    {
        // Referensi : https://stackoverflow.com/questions/30231862/laravel-eloquent-has-with-wherehas-what-do-they-mean

        $pdf = \PDF::loadView('mmf.riset.package.laravel-dompdf.print-dompdf', [
            "data_mahasiswa"            => Mahasiswa::all(),
            "data_mata_kuliah"          => Mata_kuliah::all(),
            'data_mahasiswa_matakuliah' => Mahasiswa::has('mata_kuliah')->get()   
        ])->setPaper('a4', 'potrait');
            
        return $pdf->stream('document.pdf');
            
        // $data_mahasiswa = Mahasiswa::all();
        // $data_mata_kuliah = Mata_kuliah::all();
        // $data_mahasiswa_matakuliah = Mahasiswa::has('mata_kuliah')->get();
        
        // return view('mmf.riset.package.laravel-dompdf.print-dompdf', compact('data_mahasiswa', 'data_mata_kuliah', 'data_mahasiswa_matakuliah'));
    }

    public function printDompdfFilter()
    {
        $mahasiswa = Mahasiswa::all();

        return view('mmf.riset.package.laravel-dompdf.print-dompdf-filter', compact('mahasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

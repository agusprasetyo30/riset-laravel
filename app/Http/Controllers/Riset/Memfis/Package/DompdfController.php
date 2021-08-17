<?php

namespace App\Http\Controllers\Riset\Memfis\Package;

use App\Http\Controllers\Controller;
use App\Mahasiswa;
use App\Mata_kuliah;
use iio\libmergepdf\Merger;
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

    /**
     * Undocumented function
     *
     * @return void
     */
    public function dompdfFilter()
    {
        $mahasiswa = Mahasiswa::all();

        return view('mmf.riset.package.laravel-dompdf.index-filter', compact('mahasiswa'));
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @return void
     */
    public function printDompdfFilter(Request $request)
    {
        // Jika Pencarian/Filter berdasarkan Kelas
        if ($request->get('kelas')) {
            // $data_mahasiswa = Mahasiswa::with('mata_kuliah')->where("kelas", $request->get('kelas'))->get();
            // "data_mahasiswa" => Mahasiswa::has('mata_kuliah')->where("kelas", $request->get('kelas'))->get(),

            $pdf = \PDF::loadView('mmf.riset.package.laravel-dompdf.print-dompdf-filter', [
                "data_mahasiswa" => Mahasiswa::with('mata_kuliah')->where("kelas", $request->get('kelas'))->get(),
            ])->setPaper('a4', 'potrait');

            return $pdf->stream('document.pdf');
        }

        // Jika pencarian/filter berdasarkan nama mahasiswa
        if ($request->get('mahasiswa')) {
            // $data_mahasiswa = Mahasiswa::with('mata_kuliah')->where("uuid", $request->get('mahasiswa'))->first();

            $pdf = \PDF::loadView('mmf.riset.package.laravel-dompdf.print-dompdf-filter', [
                "data_mahasiswa" => Mahasiswa::with('mata_kuliah')->where("uuid", $request->get('mahasiswa'))->first(),
            ])->setPaper('a4', 'potrait');

            return $pdf->stream('document.pdf');
        }
    }

    public function mergePdfPrint()
    {
        // echo asset('public/combined.pdf');
        return response()->file(asset('combined.pdf'));
        // $m = new Merger;

        // $file1 = \PDF::loadView('mmf.riset.package.laravel-dompdf.page1-merge', [
        //     "data_mahasiswa"            => Mahasiswa::all(),
        // ])->setPaper('a5', 'potrait');
        
        // $file1->stream();

        // $m->addRaw($file1->output());

        // file_put_contents('combined.pdf', $m->merge());
        // return $m->merge();
        // return $file1->stream('document.pdf');
        // $file1 = \PDF::loadView()
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

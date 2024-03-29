<?php

namespace App\Http\Controllers\Riset\Memfis\Package;

use App\Http\Controllers\Controller;
use App\Mahasiswa;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class QueryBuilderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginationLength = 5;
        $numberPagination = numberPagination($paginationLength);

        // $mahasiswas = Mahasiswa::paginate($paginationLength);
        $mahasiswas = QueryBuilder::for(Mahasiswa::class)
            ->allowedSorts('nama', 'kelas', 'jk')
            ->allowedFilters(['kelas'])
            // ->paginate($paginationLength);
            ->get();
        
        
        $kelas = ["MI-3A", "MI-3B", "MI-3C", "MI-3D", "MI-3E", "MI-3F"];
        
        return view('mmf.riset.package.laravel-query-builder.index', compact('mahasiswas', 'numberPagination', 'kelas'));
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

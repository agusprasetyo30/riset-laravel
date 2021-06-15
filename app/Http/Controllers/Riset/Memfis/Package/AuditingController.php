<?php

namespace App\Http\Controllers\Riset\Memfis\Package;

use App\Http\Controllers\Controller;
use App\Mahasiswa;
use App\Post;
use Illuminate\Http\Request;
use OwenIt\Auditing\Models\Audit;

class AuditingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $audit = Audit::find(15);
        // dd($audit->getModified());

        $model = $request->get('model');
        $type = "App" .'\\'. $model;
        $audits = Audit::with('user')->where('auditable_type', $type)->first();

        if (!$audits) { 
            abort(404);
        }

        // dd($audits->old_values, $audits->new_values);

        return view('mmf.riset.package.laravel-auditing.index', compact('audits'));
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function getPostAudits()
    {
        
        // $audits = Post::find(13)->audits()->first();

        // dd($audits);
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

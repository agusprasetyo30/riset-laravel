<?php

namespace App\Http\Controllers\Riset\Memfis\Polymorphisme;

use App\Comment;
use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use App\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::paginate(5);

        return view('mmf.riset.polymorphic.videos.index-1tm', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mmf.riset.polymorphic.videos.create-1tm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Video::create([
            'title' => $request->get('title'),
            'url'   => $request->get('url'),
        ]);

        return redirect()->route('test.poly.video.index-1tm');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $video = Video::find($id);

        return view('mmf.riset.polymorphic.videos.show-1tm', compact('video'));
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
        $video = Video::find($id);

        $video->comments()->where('commentable_id', $id)->delete();
        
        $video->delete();

        return redirect()->back();
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function addCommentVideo(Request $request, $id)
    {
        Video::find($id)->comments()->create([
            "body" => $request->get("comment"),
        ]);

        return redirect()->back();
    }

    /**** Many to Many Polymorphic ***/

    /**
     * Index many to many
     *
     * @return void
     */
    public function indexManyToMany()
    {
        $videos = Video::paginate(5);

        // $a = Post::find(2)->tags()->create([
        //     'name' => 'Post',
        // ]);

        return view('mmf.riset.polymorphic.videos.index-mtm', compact('videos'));
    }

    /**
     * Show many to many
     *
     * @param [type] $id
     * @return void
     */
    public function showManyToMany($id)
    {
        $video = Video::find($id);

        $tags = Tag::all();

        return view('mmf.riset.polymorphic.videos.show-mtm', compact('video', 'tags'));
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @param [type] $id
     * @return void
     */
    public function addTagVideo(Request $request, $id)
    {
        Video::find($id)->tags()->attach([
            'name' => $request->tag,
        ]);

        return redirect()->route('test.poly.mtm.video.index');
    }
}

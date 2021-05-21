<?php

namespace App\Http\Controllers\Riset\Memfis\Polymorphisme;

use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use App\Video;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**** One to Many Polymorphic ***/

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(5);

        return view('mmf.riset.polymorphic.posts.index-1tm', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mmf.riset.polymorphic.posts.create-1tm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Post::create([
            'title' => $request->get('title'),
            'body'   => $request->get('body'),
        ]);

        return redirect()->route('test.poly.post.index-1tm');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        return view('mmf.riset.polymorphic.posts.show-1tm', compact('post'));
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
        $post = Post::find($id);

        $post->comments()->where('commentable_id', $id)->delete();
        
        $post->delete();

        return redirect()->back();
    }

    /**
     * Undocumented function
     *
     * @param [type] $id
     * @return void
     */
    public function addCommentPost(Request $request, $id)
    {
        Post::find($id)->comments()->create([
            'body' => $request->get('comment'),
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
        $posts = Post::paginate(5);

        return view('mmf.riset.polymorphic.posts.index-mtm', compact('posts'));
    }

    /**
     * Show many to many
     *
     * @param [type] $id
     * @return void
     */
    public function showManyToMany($id)
    {
        $post = Post::find($id);

        $tags = Tag::all();

        return view('mmf.riset.polymorphic.posts.show-mtm', compact('post', 'tags'));
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @param [type] $id
     * @return void
     */
    public function addTagPost(Request $request, $id)
    {
        Post::find($id)->tags()->attach([
            'name' => $request->tag,
        ]);

        return redirect()->route('test.poly.mtm.post.index');
    }
}

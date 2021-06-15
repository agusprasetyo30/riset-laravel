<?php

namespace App\Http\Controllers\Riset\Memfis\Polymorphisme;

use App\Comment;
use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use App\Video;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**** One to Many Polymorphic ***/

    /**
     * Menampilkan tampilan index Post
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(5);

        return view('mmf.riset.polymorphic.posts.index-1tm', compact('posts'));
    }

    /**
     * Menampilkan tampilan untuk menambahkan data Post
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

        return redirect()->route('test.poly.post.index');
    }

    /**
     * Menyimpan/save data Post
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
     * Menampilkan tampilan edit Post
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update data Post
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
     * Menghapus data Post beserta komentar
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
     * Fungsi untuk menambahkan komentar di Post 
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

    /**
     * Fungsi untuk menghapus komentar pada Post
     *
     * @param [type] $id
     * @return void
     */
    public function deleteCommentPost(Request $request, $id)
    {
        // Mengambil value variabel URL
        $commentPost = $request->get('del');

        $post = Post::find($id);

        $post->comments()
            ->where('id', $commentPost)->delete();

        return redirect()->back();
    }

    /***** Many to Many Polymorphic ****/

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
     * menambahkan tag pada Post
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

    /**
     * menghapus tag post
     *
     * @param Request $request
     * @param [type] $id
     * @return void
     */
    public function deleteTagPost(Request $request, $id)
    {
        $tagPostId = $request->get('del');

        Post::find($id)
            ->tags()
            // ->detach(['id' => $tagVideoId]);
            ->detach($tagPostId);

        return redirect()->back();
    }
}

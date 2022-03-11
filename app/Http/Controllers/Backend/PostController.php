<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $title = request()->get('title');
        $status = request()->get('status');
        $posts_query = DB::table('posts')->orderBy('id','desc')->select('*');
        // dd($posts_query);

        if(!empty($title)){
            $posts_query = $posts_query->where('title','LIKE',"%$title%");
        }
        // dd($title);


        if(!empty($status)){
            $posts_query = $posts_query->where('status','LIKE',"%$status%")();
        }
        // dd($status);


        $posts = $posts_query->get();
        return view('backend.posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request();
        DB::table('posts')->insert([
            'title' =>  $data['title'],
           'slug' =>  $data['slug'],
           'content' =>  $data['content'],
           'user_created_id' => 1,
           'category_id' =>  1,
           'status' => 1,
           'created_at' => now(),
           'updated_at' => now()

        ]);
        return redirect()->route('backend.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('backend.posts.show', 1);
        $post = DB::table('posts')->find($id);
        // dd($post);
        return view('backend.posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = DB::table('posts')->find($id);
        return view('backend.posts.edit', ['post' => $post]);
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
        $data = request();
        DB::table('posts')->where('id', $id)->update([
            'title' =>  $data['title'],
        //    'slug' =>  $data['slug'],
           'content' =>  $data['content'],
        //    'user_create_id' => 1,
        //    'category_id' =>  1,
           'status' => $data['status'],
           'updated_at' => now()
        ]);
        return redirect()->route('backend.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('posts')->where('id', $id)->delete();
        return redirect()->route('backend.posts.index');
    }
}

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
    public function index(Request $request)
    {
        //
        $title = request()->get('title');
        $status = request()->get('status');
        $categories = Category::get();
        $posts_query = DB::table('posts')->orderBy('created_at','desc')->select('*')->paginate(5);
        // dd($posts_query);

        if(!empty($title)){
            $posts_query = Post::where('title','LIKE',"%$title%")->paginate(1);
        }
        // dd($title);


        if(!empty($status)){
            $posts_query = Post::where('status','LIKE',"%$status%")->paginate(1);
        }
        // dd($status);


        $posts = $posts_query;
        return view('backend.posts.index', ['posts' => $posts , 'categories' => $categories ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::get();
        return view('backend.posts.create')->with([
            'categories' => $categories
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only(['title', 'content','status','user_id']);
        $post = new Post();
        $post->title = $data['title'];
        // $post->slug= $data['title'];
        // $post->status=$data['status'];
        $post->user_created_id = 1;
        $post->category_id= 1;
        $post->content=$data['content'];
        $post->save();

        // DB::table('posts')->insert([
        //     'title' =>  $data['title'],
        //    'slug' =>  $data['slug'],
        //    'content' =>  $data['content'],
        //    'user_created_id' => 1,
        //    'category_id' =>  1,
        //    'status' => 1,
        //    'created_at' => now(),
        //    'updated_at' => now()

        // ]);
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
        // DB::table('posts')->where('id', $id)->update([
        //     'title' =>  $data['title'],
        // //    'slug' =>  $data['slug'],
        //    'content' =>  $data['content'],
        // //    'user_create_id' => 1,
        // //    'category_id' =>  1,
        //    'status' => $data['status'],
        //    'updated_at' => now()
        // ]);
        $post = Post::find($id);
        $post->title = $data['title'];
        // $post->slug= $data['title'];
        // $post->status=$data['status'];
        $post->user_created_id = 1;
        $post->category_id= 1;
        $post->content=$data['content'];
        $post->save();
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
        // DB::table('posts')->where('id', $id)->delete();
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('backend.posts.index');
    }
}

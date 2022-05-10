<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{

    //
    public function __construct()
    {
        // $this->authorizeResource(Post::class,'post');
    }
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
        // $posts_query = DB::table('posts')->orderBy('created_at','desc')->select('*')->paginate(5);
        $posts_query = Post::orderBy('created_at','desc')->select('*')->paginate(5);
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
        $tags = Tag::get();

        return view('backend.posts.create')->with([
            'categories' => $categories,
            'tags' => $tags
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
        $disk = 'public';
        if( $request->hasFile('image')){
        //   $path =  $request->file('image')->store('posts','public');
        $name = $request->file('image')->getClientOriginalName();
        $path =  $request->file('image')->storeAs('posts',$name,$disk);

        }else{

        }
        // if($request->user()->cannot('update',Post::class)){
        //     abort(403);
        // }
        // $validated = $request->validate([
        //     'title' => 'required|unique:posts|min:20|max:255',
        //     'content' => 'required',
        //     ]);

        // $validator = Validator::make($request->all(), [
        //     'title' => 'required|unique:posts|min:20|max:255',
        //     'content' => 'required',
        // ],
        // [
        //     'required' => 'Thuộc tính :attribute là bắt buộc.',
        //     'content.require' => 'Nội dung không được để trống'
        // ]

        // );

        //     // dd($validator->fails());
        //     if ($validator->fails()) {
        //         return redirect('backend/posts/create')
        //         ->withErrors($validator)
        //         ->withInput();
        //         }



        $data = $request->only(['title', 'content','status','user_id']);
        $tags = $request->get('tags');
        // dd($tags);
        $post = new Post();
        $post->title = $data['title'];
        if(isset($path)){
            $post->image=$path;
            $post->disk = $disk;
        }
        // $post->slug= $data['title'];
        // $post->status=$data['status'];
        $post->user_created_id = 1;
        $post->category_id= 1;
        $post->content=$data['content'];
        $post->save();

        $user = User::find(1);
        $user->posts()->save($post);

        $post->tags()->attach($tags);


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


        $request->session()->flash('success', 'Thêm mới thành công');
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


        // return view('backend.posts.show', $id);
        $post = DB::table('posts')->find($id);
        // foreach($post->tags as $tag){
        //     echo $tag->name;
        // }
        // dd($post);
        return view('backend.posts.show',$id,
        [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories=Category::get();
        // $post = DB::table('posts')->find($id);
        $tags = Tag::get();


        return view('backend.posts.edit',
        [
            'post' => $post,
            'categories'=>$categories,
            'tags' => $tags
        ]);
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

        // $validated= $request->validate([
        //     'name' => 'required|max:255',

        // ]);


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
        // if(! Gate::allows('update-post',$post)){
        //     abort(403);
        // }
        if($request->user()->cannot('update',$post)){
            abort(403);
        }

        if($request->hasFile('image'))
        {
            $disk = 'public';
            $path = $request->file('image')->store('blogs', $disk);
            $post->disk = $disk;
            $post->image = $path;
        }


        $data = request()->only(['title','content']);
        $tags = $request->get('tags');
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

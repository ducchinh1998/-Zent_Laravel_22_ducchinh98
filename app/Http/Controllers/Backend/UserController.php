<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Auth\Access\Gate;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $email = request()->get('email');
        $name = request()->get('name');
        // $users = User::withTrashed()->get();
        // $users_query = DB::table('users')->orderBy('created_at','desc')->select('*')->paginate(5);
        $users_query = User::orderBy('created_at','desc')->select('*')->paginate(5);
        // dd($users_query);

        if(!empty($email)){
            $users_query = User::where('email','LIKE',"%$email%")->paginate(1);
        }


        if(!empty($name)){
            $users_query = User::where('name','LIKE',"%$name%")->paginate(1);
        }
        // $email = $request -> get('email');

        $users = $users_query;
        return view('backend.users.index', ['users' => $users]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.users.create');
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
         DB::table('users')->insert([
            'name' => $data['name'],
            'avatar' => $data['avatar'],
            'email' => $data['email'],
            'status' => '1',
            'password' => $data['password'],
            // 'updated_at' => now()


        ]);

        $user= DB::table('users')->latest('id')->first();
        // dd($user);
        DB::table('user_infos')->insert([

            'user_id' => $user->id,
            'address' => $data['address'],
            'phone' => $data['phone'],
        ]);
        return redirect()->route('backend.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        $posts = $user->posts;
        // dd($posts);

        // $userInfo = UserInfo::where('phone','')->first();
        // $user = $userInfo->user;
        // dd($userInfo);
        return view('backend.users.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = DB::table('users')->find($id);
        return view('backend.users.edit', ['user' => $user]);
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
        DB::table('users')->updateOrInsert([
            'name' => $data['name'],
            'avatar' => $data['avatar'],
            'email' => $data['email'],
            'status' => $data['status'],
            'address' => $data['address'],
            'phone' => $data['phone'],
            'password' => $data['password'],
            // 'updated_at' => now()
        ]);
        return redirect()->route('backend.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // DB::table('users')->where('id', $id)->delete();
          $user = User::find($id);

        if(! Gate::allows('delete-user',$user)){
            abort(403);
        }

        User::destroy($id);
        return redirect()->route('backend.users.index');
    }
}

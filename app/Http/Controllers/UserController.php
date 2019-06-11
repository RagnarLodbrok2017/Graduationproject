<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function initial()
//    {
//        return view('AdminDashboard.users.users');
//    }
    public function index()
    {
        return view('AdminDashboard.master');
//        return response()->json(['users' => $users = User::all()]);
//        return view('user.user');
//        return view('AdminDashboard.user.user', compact($users = User::all()));
    }
    public function profile()
    {
//        if (true){
//            return response()->json(['user'=>$user]);
//        }
        return view('AdminDashboard.master');
//        return view('AdminDashboard.users.users');
    }
    public function AnyUserProfile($id)
    {
//        if (true){
//            return response()->json(['user'=>$user]);
//        }
        if (!is_null($id)) {
            $user = User::findOrFail($id);
            $posts = $user->post()->get();
//            return view('AdminDashboard.users.users', $id);
            return view('AdminDashboard.master')->with(compact('user', 'posts'));
        }
//        return view('AdminDashboard.users.users');
    }

//    UserPanek  UserProfile
    public function UserPanelProfile()
    {
        $id = \Auth::user()->id;
//        if (true){
//            return response()->json(['user'=>$user]);
//        }
        if (!is_null($id)) {
            $user = User::findOrFail($id);
            $posts = $user->post()->get();
//            return view('AdminDashboard.users.users', $id);
            return view('UserDashboard.master')->with(compact('user', 'posts'));
        }
//        return view('AdminDashboard.users.users');
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

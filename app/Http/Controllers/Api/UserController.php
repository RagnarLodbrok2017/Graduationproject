<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(['users' => $users = User::all()]);
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'name' => 'required|max:30|min:10|max:30',
                'email' => 'required|max:30|email|unique:users',
                'password' => 'required|max:30|min:8',
                'type' => 'required',
            ]);
            $user = new User();
            $user->name = $request->name;
            $user->password = bcrypt($request->password);
            $user->email = $request->email;
            $user->type = $request->type;
            $user->save();
        }
        return response()->json(['newUser' => $user]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return response()->json(['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
//        $user = User::find($id);
//        $user->update($request->all());
//        return response()->json(['user' => $user]);
        if ($request->isMethod('patch')) {
            $this->validate($request, [
                'name' => 'required|max:30|min:10',
                'password' => 'max:30|min:8',
                'email' => 'required|max:30|email|unique:users,email,'.$request->get('id'),
                'type' => 'required',
                'country' => 'nullable',
//                'status' => 'required',
            ]);
//            if (strlen($request->password) !== 0)
            $user  = User::find($id);
            if (!is_null($user) && isset($user)) {
                $user->name = $request->name;
                $user->country = $request->country;
                $user->facebook_link = $request->facebook_link;
                $user->email = $request->email;
                $user->type = $request->type;
                if ($request->status) {
                    $user->status = $request->status;
                }
                if (strlen($request->password) !== 0)
                {
                    $user->password = bcrypt($request->password);
                }
                $user->save();
            }
        }
        return response()->json(['user' => $user]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json(['user' => $user]);
    }

    public function UserProfile($id)
    {
        if (!is_null($id))
        {
            $user = User::findorFail($id);
            return response()->json(['user'=> $user]);
        }
    }
}

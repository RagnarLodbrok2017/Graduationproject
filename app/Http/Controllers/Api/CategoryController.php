<?php

namespace App\Http\Controllers\Api;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(['categories' => $categories = Category::all()]);
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
                'name' => 'required|max:30|min:6|max:40|unique:category',
                'description' => 'nullable|min:10|max:400',
            ]);
            $category = new Category();
            $category->name = $request->name;
            if(isset($request->description)){
                $category->description = $request->description;
            }
            $category->save();
        }
        return response()->json(['newCategory' => $category]);
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
                'status' => 'required',
            ]);
//            if (strlen($request->password) !== 0)
            $user  = User::find($id);
            if (!is_null($user) && isset($user)) {
                $user->name = $request->name;
                $user->email = $request->email;
                $user->type = $request->type;
                $user->status = $request->status;
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

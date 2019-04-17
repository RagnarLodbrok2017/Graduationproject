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
        $category = Category::findOrFail($id);
        return response()->json(['category' => $category]);
    }

    public function update(Request $request, $id)
    {
        if ($request->isMethod('patch')) {
            $this->validate($request, [
                'name' => 'required|max:30|min:6|max:40|unique:category,name,'.$request->get('id'),
                'description' => 'nullable|min:10|max:400',
            ]);
            $category  = Category::find($id);
            if (!is_null($category) && isset($category)) {
                $category->name = $request->name;
                if (strlen($request->description) !== 0)
                {
                    $category->description = $request->description;
                }
                $category->save();
            }
        }
        return response()->json(['category' => $category]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return response()->json(['category' => $category]);
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

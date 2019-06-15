<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\History;
use App\Sessions;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Sessions::first()->user_id;
        $histories = History::where('users_id', $user_id)->get();
        return response()->json(['histories' => $histories]);
    }

    public function GetmyHistories($id)
    {
        $user_id = $id;
        $histories = History::where('users_id', $user_id)->get();
        return response()->json(['histories' => $histories]);
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

    public function deleteHistories($id)
    {
        $histories = History::where('users_id', $id)->get(['id']);
        History::destroy($histories->toArray());

//        if (is_array($histories))
//        {
//            History::destroy($histories);
//        }
//        else
//        {
//            History::findOrFail($histories)->delete();
//        }
//        $histories->delete();
        return response()->json(['histories' => $histories]);
    }

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


    public function show($id)
    {
        //
    }


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


    public function destroy($id)
    {
        $history = History::findOrFail($id);
        $history->delete();
        return response()->json(['history' => $history]);
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

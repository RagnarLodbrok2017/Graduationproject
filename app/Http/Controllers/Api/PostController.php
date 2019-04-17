<?php

namespace App\Http\Controllers\Api;

use App\Post;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('user', 'category')->get();
        return response()->json(['posts' => $posts]);
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
                'title' => 'required|max:30|min:6|max:40|unique:post',
                'description' => 'nullable|min:10|max:400',
                'image' => 'required|min:10|max:400',
                'video' => 'nullable|min:10|max:400',
                'about' => 'nullable|min:10|max:400',
                'color' => 'nullable|min:10|max:400',
                'keyword' => 'nullable|max:20',
                'search' => 'nullable|max:40',
                'type' => 'nullable|max:400',
                'image_url' => 'nullable|min:10|max:400',
                'video_url' => 'nullable|min:10|max:400',
                'posts_id' => 'required|min:10|max:400',
            ]);
            $post = new Post();
            $post->title = $request->title;
            $post->description = $request->description;
            $post->image = $request->image;
            if(Input::hasFile('image')){
                $file = Input::file('image');
                $file -> move(public_path(). '/posts/', $file->getClientOriginalName());
                $url = URL::to("/") . '/posts/' . $file->getClientOriginalName();
            }
            $post->image= $url;
//            $post->video = $request->video;
//            $post->video_url = $request->video_url;
            $post->about = $request->about;
            $post->keyword = $request->keyword;
            $post->type = $request->type;
            $post->color = $request->color;
            $post->posts_id = $request->posts_id;
            if(isset($request->description)){
                $post->description = $request->description;
            }
            $post->save();
        }
        return response()->json(['newPost' => $post]);
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
        $post = Post::findOrFail($id);
        return response()->json(['post' => $post]);
    }

    public function update(Request $request, $id)
    {
        if ($request->isMethod('patch')) {
            $this->validate($request, [
                'title' => 'required|max:30|min:6|max:40|unique:post',
                'description' => 'nullable|min:10|max:400',
                'image' => 'required|min:10|max:400',
                'video' => 'nullable|min:10|max:400',
                'about' => 'nullable|min:10|max:400',
                'color' => 'nullable|min:10|max:400',
                'keyword' => 'nullable|max:20',
                'search' => 'nullable|max:40',
                'type' => 'nullable|max:400',
                'image_url' => 'nullable|min:10|max:400',
                'video_url' => 'nullable|min:10|max:400',
                'posts_id' => 'required|min:10|max:400',
            ]);
            $post  = Post::find($id);
            if (!is_null($post) && isset($post)) {
                $post->name = $request->name;
                if (strlen($request->description) !== 0)
                {
                    $post->description = $request->description;
                }
                $post->save();
            }
        }
        return response()->json(['post' => $post]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return response()->json(['post' => $post]);
    }
    public function PostProfile($id)
    {
        if (!is_null($id))
        {
            $post = Post::findorFail($id);
            return response()->json(['post'=> $post]);
        }
    }
}

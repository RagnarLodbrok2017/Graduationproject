<?php

namespace App\Http\Controllers;

use App\History;
use App\Like;
use App\Post;
use App\Category;
use App\Sessions;
use App\User;
use File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use phpDocumentor\Reflection\DocBlock\Tags\Method;

class HomeUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->with('user', 'category', 'like')->get();
        $categories = Category::all();
        return response()->json(['posts' => $posts, 'categories' => $categories]);
    }


    public function likePost($id)
    {
        $post = Post::findOrFail($id);
        if ($post != null) {
            $like = new Like();
            $like->post_id = $id;
            $like->like = 1;
            $like->users_id = Auth::user()->id;
            $like->save();

//        Add History
            $sessions = Sessions::first();
            $user = Auth::user();
            $history = new History();
            $history->action = 'Delete';
            $history->about = 'You Likes a Post';
            $history->users_id = $user->id;
            $history->user_name = $user->name;
            $history->post_title = $post->title;
            $history->save();
            return response()->json(['post' => $post]);
        }
    }
    public function dislikePost($id)
    {
        $like = Like::findOrFail($id);
        $post = Post::findOrFail($like->post_id);
        $like->delete();
        if ($post)
        {
            //        Add History
            $sessions = Sessions::first();
            $user = Auth::user();
            $history = new History();
            $history->action = 'Delete';
            $history->about = 'You made a disLikes on a Post';
            $history->users_id = $user->id;
            $history->user_name = $user->name;
            $history->post_title = $post->title;
            $history->save();
            return response()->json(['post' => $post]);
        }
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
//    public function store(Request $request)
//    {
//        \Log::info($request->all());
//        if ($request->isMethod('post')) {
//            $this->validate($request, [
//                'title' => 'required|max:30|min:6|max:40|unique:post',
//                'description' => 'nullable|min:10|max:400',
////                'image' => 'required|min:10|max:400',
////                'video' => 'nullable|min:10|max:400',
////                'image' => 'mimes:jpeg,bmp,png,jpg',
//                'about' => 'nullable|min:10|max:400',
//                'subtitle' => 'nullable|min:10|max:400',
//                'color' => 'nullable|min:10|max:400',
//                'meta_keyword' => 'nullable|max:400',
//                'meta_title' => 'nullable|max:400',
//                'type' => 'nullable|max:400',
//                'status' => 'nullable|max:10',
//                'image_url' => 'nullable|min:10|max:400',
//                'video_url' => 'nullable|min:10|max:400',
//                'users_id' => 'required|min:1|max:100',
//            ]);
//        }
//
////        if ($request->hasFile('image') || $request->image != NULL){
////            dd($request->all());
////            $file = $request->file('image');
////            $name_image = time().$file->getClientOriginalName();
////            $file->move(public_path().'/images/', $name_image);
////        }
//        $post = new Post();
//        $post->title = $request->title;
//        $post->description = $request->description;
//        $post->image = $request->image;
//        if (Input::hasFile('image')) {
//            $file = Input::file('image');
//            $file->move(public_path() . '/posts/', $file->getClientOriginalName());
//            $url = URL::to("/") . '/posts/' . $file->getClientOriginalName();
//            $post->image = $url;
//        }
//        $post->about = $request->about;
//        $post->meta_keyword = $request->meta_keyword;
//        $post->meta_title = $request->meta_title;
//        $post->type = $request->type;
//        $post->color = $request->color;
//        $post->users_id = $request->users_id;
//        if (isset($request->description)) {
//        $post->description = $request->description;
//    }
//        $post->save();
//        return response()->json(['newPost' => $post]);
//    }
    public function store(Request $request)
    {
        \Log::info($request->all());
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'title' => 'required|max:30|min:6|max:40|unique:post',
                'description' => 'nullable|min:10|max:400',
//                'image' => 'required|min:10|max:400',
//                'video' => 'nullable|min:10|max:400',
                'image' => 'mimes:jpeg,bmp,png,jpg',
                'about' => 'nullable|max:400',
                'subtitle' => 'nullable|max:400',
                'color' => 'nullable|min:3|max:400',
                'meta_keyword' => 'nullable|max:400',
                'meta_title' => 'nullable|max:400',
                'type' => 'nullable|max:400',
                'status' => 'nullable|max:10',
                'image_url' => 'nullable|min:10|max:400',
                'video_url' => 'nullable|min:10|max:400',
                'users_id' => 'required|min:1|integer|max:100',
            ]);
        }
        $post = new Post();
        $post->title = $request->title;
        $post->subtitle = $request->subtitle;
        if ($request->hasFile('image')) {
            $UploadedImage = Input::file('image');
            $imageName = $request->title.'.'.$UploadedImage->getClientOriginalExtension();
            $post->image = $imageName;
            $UploadedImage->move(public_path('uploads/posts/images'), $imageName);
            $post->image_url = '../../../../../public/uploads/posts/images/images/';
        } else {
            $post->image = 'chair.jpg';
            $post->image_url = '../../../../../public/uploads/posts/images/images/';
        }
//        if ($request->hasFile('video')) {
//            $UploadedVideo = Input::file('video');
//            $videoName = $request->title . '.' . $UploadedVideo->getClientOriginalExtension();
//            $UploadedVideo->move(public_path('uploads/posts/videos'), $videoName);
//            $post->video = $videoName;
//            $post->video_url = '../../../../../public/uploads/posts/videos/';
//            $post->has_video = 0;
//        } else {
//            $post->has_video = 0;
//        }
        $post->status = $request->status;
        $post->meta_keyword = $request->meta_keyword;
        $post->meta_title = $request->meta_title;
        $post->type = $request->type;
        $post->color = $request->color;
        $post->users_id = $request->users_id;
        if ($request->description != null) {
            $post->description = $request->description;
        }
        if ($request->about != null) {
            $post->about = $request->about;
        }

        $post->save();
        $post->category()->attach($request->categoriesIds);

//        Add a History
        $nPost = Post::where('title', $request->title)->first();
        $user = User::findOrFail($request->users_id);
        $history = new History();
        $history->action = 'Add';
        $history->about = 'User added a Post';
        $history->users_id = $request->users_id;
        $history->post_id = $nPost->id;
        $history->post_title = $nPost->title;
        $history->user_name = $user->name;
        $history->save();

        return response()->json(['newPost' => $post]);
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
        $post = Post::findOrFail($id)->with('category', 'user')->get();
//        $post = Post::where('id', $id)->with('category:name', 'user')->get();
//        $post = Post::findOrFail($id)->with(array('user','category'=>function($query){
//            $query->select('id');
//        }))->get();
        $categoriesIds = Post::find($id)->category->pluck('id');
        return response()->json(['post' => $post, 'categoriesIds' => $categoriesIds]);
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
                'users_id' => 'required|min:10|max:10',
            ]);
            $post = Post::find($id);
            if (!is_null($post) && isset($post)) {
                $post->name = $request->name;
                $post->category()->sync($request->categoriesIds);
                if (strlen($request->description) !== 0) {
                    $post->description = $request->description;
                }
                $post->save();
            }
        }
        return response()->json(['post' => $post]);
    }


    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->category()->detach();
        $post->delete();

//        Add History
        $sessions = Sessions::first();
        $user = User::findOrFail($sessions->user_id);
        $history = new History();
        $history->action = 'Delete';
        $history->about = 'User deleted a Post';
        $history->users_id = $user->id;
        $history->user_name = $user->name;
//            $history->users_id = Sentry::getUser()->id;
//        $history->user_name = Auth::user()->name;
        $history->post_title = $post->title;
        $history->save();

        $image = public_path("uploads/posts/images/$post->image");
        if ($image != null) {
            File::delete(public_path("uploads/posts/images/$post->image"));
        }
        $video = public_path("uploads/posts/videos/$post->video");
        if ($video != null) {
            File::delete(public_path("uploads/posts/videos/$post->video"));
        }
        return response()->json(['post' => $post]);
    }

    public function PostProfile($id)
    {
        if (!is_null($id)) {
            $post = Post::findorFail($id);
            $image = public_path("uploads/posts/images/$post->image");
            if ($image != null) {
                File::delete(public_path("uploads/posts/images/$post->image"));
            }
//            $image_path = public_path().'/uploads/posts/images'.$imageName;
//            if(File::exists($image_path)) {
//                File::delete($image_path);
//            }
            return response()->json(['post' => $post]);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\History;
use App\Post;
use App\Category;
use App\User;
use File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('AdminDashboard.master');
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
    public function uploadVideo(Request $request)
    {
        $post = Post::find($request->id)->first();
//        dd($UploadedVideo);
        if ($request->hasFile('video')) {
            $UploadedVideo = Input::file('video');
            $videoName = $post->title . '.' . $UploadedVideo->getClientOriginalExtension();
            $UploadedVideo->move(public_path('uploads/posts/videos'), $videoName);
            $post->video = $videoName;
            $post->video_url = '../../../../../public/uploads/posts/videos/';
            $post->has_video = 1;
        } else {
            $post->has_video = 0;
        }
        $post->save();
        return redirect('../admin-dashboard/posts');
    }

   public function AnyPostProfile($id){
       if (!is_null($id)) {
//           $post = Post::findOrFail($id)->with('comment', 'category', 'like', 'user')->get();
//           $post_id = Post::findOrFail($id)->id;
//           $post = Post::findOrFail($id);
//            return view('AdminDashboard.users.users', $id);
           $post = Post::where('id', $id)->with('comment', 'category', 'like', 'user', 'comment.user')->first();
           return view('UserDashboard.post.postProfile')->with(compact('post'));
       }
   }


    public function store(Request $request)
    {
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'title' => 'required|max:30|min:6|max:40|unique:post',
                'description' => 'min:10|max:400',
//                'image' => 'required|min:10|max:400',
//                'video' => 'nullable|min:10|max:400',
                'image' => 'mimes:jpeg,bmp,png,jpg',
                'about' => 'nullable|max:400',
                'subtitle' => 'nullable|max:400',
                'color' => 'nullable|min:3|max:400',
                'meta_keyword' => 'nullable|max:400',
                'meta_title' => 'nullable|max:400',
                'type' => 'nullable|max:400',
                'status' => 'required|max:10',
                'image_url' => 'nullable|min:10|max:400',
                'video_url' => 'nullable|min:10|max:400',
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
            $post->image_url = '../../../../../public/uploads/posts/images/';
        } else {
            $post->image = 'chair.jpg';
            $post->image_url = '../../../../../public/uploads/posts/images/';
        }
        if ($request->hasFile('video')) {
            $UploadedVideo = Input::file('video');
            $videoName = $request->title.'.'.$UploadedVideo->getClientOriginalExtension();
            $post->video = $videoName;
            $UploadedVideo->move(public_path('uploads/posts/videos'), $videoName);
            $post->video_url = '../../../../../public/uploads/posts/videos/';
            $post->has_video = 1;
        }
        else {
            $post->has_video = 0;
        }
        if ($request->status){
            $post->status = $request->status;
        }
        else{
            $post->status = 1;
        }
        if ($request->meta_title){
            $post->meta_title = $request->meta_title;
            $post->meta_keyword = $request->meta_keyword;
        }
        else{
            $post->meta_title = $request->title;
            $post->meta_keyword = $request->title;
        }

        $post->type = $request->type;
        $post->color = $request->color;
        $post->users_id = Auth::user()->id;
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
        $history->about = 'You added a Post';
        $history->users_id = $request->users_id;
        $history->post_id = $nPost->id;
        $history->post_title = $nPost->title;
        $history->user_name = $user->name;
        $history->save();
        return redirect()->back();
//        return view('UserDashboard.master');
//        return redirect('../../home');
//        return Redirect::intended('../../dashboard')->with(['msg', 'The Message']);
//        return Redirect('../../dashboard');

//        return response()->json(['newPost' => $post]);
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

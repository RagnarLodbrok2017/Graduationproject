<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
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
        return view('AdminDashboard.users.users');
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

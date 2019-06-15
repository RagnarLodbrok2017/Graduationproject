<?php

namespace App\Http\Controllers;

use App\Category;
use App\Favourite;
use App\History;
use App\Post;
use App\Sessions;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use PhpParser\ErrorHandler\Collecting;

class FavouriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $posts = Post::join('favourite', 'post.id', '=', 'post_id')
//                ->get();
//        $posts = Post::orderBy('created_at', 'desc')->with('user', 'category', 'like', 'comment')->get();

//        $posts = Post::with('favourite')->where('users_id' , Auth::user()->id)->get();
//        dd($posts);
//        $favourites = Favourite::join('post', 'favourite.post_id', '=', 'post.id')
//                ->join('users', 'favourite.users_id', '=', 'users.id')->get();
//        dd($posts);
        $favourites = Favourite::where('users_id' , Auth::user()->id)->orderBy('created_at', 'desc')->with('user', 'post','post.like', 'post.comment','post.comment.user')->get();
//        dd($favourites);
//        dd($favourites);
//        $posts = Post::whereIn('id', $favourites)->with('user', 'category', 'like', 'comment')->get();
//        foreach ($favourites as $favourite) {
//            $post = Post::where('id', $favourite->post_id)->get();
////            $posts[$i] = $post;
////            $i++;
//            array_push($nposts, $post);
//        }
//        dd(posts);
//        dd($favourites);
//         $favourites->map(function ($favourite) {
//        });
//        $posts = $favourites->map(function ($favourite) {
//            return collect($favourite->toArray())
//                ->only(['post'])
//                ->all();
//        });
//        dd($posts[0]->title);
//        dd($favourites[0]->post);
//        $posts = Post::orderBy('created_at', 'desc')->with('user', 'category', 'like', 'comment')->get();
        return response()->json(['favourites' => $favourites]);
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
     * @param  \App\Favourite  $favourite
     * @return \Illuminate\Http\Response
     */
    public function show(Favourite $favourite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Favourite  $favourite
     * @return \Illuminate\Http\Response
     */
    public function edit(Favourite $favourite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Favourite  $favourite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Favourite $favourite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Favourite  $favourite
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $favourite = Favourite::findOrFail($id);
        if ($favourite){
            $post = Post::findOrFail($favourite->post_id);
            $favourite->delete();
            $history = new History();
            $user = User::findOrFail(Auth::user()->id);
            $history->action = 'Delete';
            $history->about = 'You deleted a Saved Post';
            $history->users_id = Auth::user()->id;
            $history->user_name = $user->name;
            $history->post_title = $post->title;
            $history->save();
        }
    }
}

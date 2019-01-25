<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('show');

        $this->middleware('can:update,post')->only(['edit','update','destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('post.index');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = auth()->user()->posts()->create($request->all());
        return redirect()->route('feed');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('post.show',compact('post'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('post.edit',compact('post'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post->update($request->all());
        return redirect('home');//->with('flash_message', 'Post edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return back();
    }

    public function like(Request $request, Post $post)
    {
        
        $user = auth()->user();
        $user->toggleLike($post);
        return response()->json(['likeResult'=>$user->hasLiked($post)]);
            
        // $likeCount = $post->likesCount;
        // return response()->json(compact('likeCount'));
      
    }

    // public function repost(Post $post)
    // {
    //     $action = $request->get('action');
    //     if ($action=='like'){
    //         $post->increment('likes');
    //         $likeCount = $post->likes;
    //         return response()->json(compact('likeCount'));
    //     }
    //     else if ($action=='reply'){
    //         $post->increment('replies');
    //         $replyCount = $post->replies;
    //         return response()->json(compact('replyCount'));
    //     }
    // }
}

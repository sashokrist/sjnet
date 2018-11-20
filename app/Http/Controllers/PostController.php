<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Auth;

class PostController extends Controller
{
    public function getDashboard(){
        //$post = Post::all()->sortBy('id');
        $post = Post::orderByDesc('created_at')->get();
        return view('/profile', ['posts' => $post]);
    }
    public function postCreatePost(Request $request){

        $post = new Post();
        $post->body = $request['body'];
        $request->user()->posts()->save($post);
        $message = 'There was an error';
        if($request->user()->posts()->save($post)){
            $message = 'Post successfuly created!';
        }
        return redirect()->route('profile')->with(['massage' => $message]);
    }

    public function getDelete($post_id){
        $post = Post::where('id', $post_id);
        $post->delete();
        return redirect()->route('profile');
    }
}

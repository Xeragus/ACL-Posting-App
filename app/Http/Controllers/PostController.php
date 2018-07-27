<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function onCreatePost(Request $request) {
        $post = new Post();
        $post->title = $request['title'];
        $post->subtitle = $request['subtitle'];
        $post->body = $request['body'];
        // save the post as related to the currently authenticated user
        $request->user()->posts()->save($post);
        return redirect()->route('home');
    }
}

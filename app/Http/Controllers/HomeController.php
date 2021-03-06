<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('home',compact('posts'));
    }

    public function showPost($id)
    {
        $post = Post::findOrFail($id);

        return view('show',compact('post'));
    }
}

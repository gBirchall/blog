<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        //use with + get instead of ::all() to prevent n+1
        //if not using $with property in the model
        // $posts = Post::latest()->with(['category', 'author'])->get();
        return view(
            'posts.index',
            [
                //filter is defined in scopeFilter in the model
                'posts' => Post::latest()->filter(
                    request(['search', 'category', 'author'])
                )->paginate(6)->withQueryString(),

            ]
        );
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }
}

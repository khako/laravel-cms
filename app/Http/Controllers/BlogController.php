<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class BlogController extends Controller
{
    protected $limit = 4;

    public function index()
    {
        $posts = Post::with('author')
                    ->latestFirst()
                    ->published()
                    ->paginate($this->limit);
        return view('blog.index')->with([
            'posts' => $posts
        ]);
    }

    public function show(Post $post)
    {
        return view('blog.show')->with([
            'post' => $post
        ]);
    }
}

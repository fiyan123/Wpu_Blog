<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {

        $title = '';
        // Mengambil nama category
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title    = ' in ' . $category->name;
        }

        // Mengambil username author
        if (request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title  = ' By ' . $author->name;
        }

        return view('posts', [

            "title" => "All Post" . $title,
            "active" => "posts",
            "posts" => Post::latest()->filter( request(['search','category','author']) )
                                        ->paginate(4)->withQueryString()

        ]);
    }

    // Model Banding
    public function show(Post $post)
    {
        return view('post', [

            "title" => "Single post",
            "active" => "posts",
            "post"  => $post
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DashboardPostController extends Controller
{
 
    public function index()
    {
        return view('dashboard.posts.index', [
            'posts' => Post::where('user_id', auth()->user()->id)->get()   // Mengambil data berdasarkan user
        ]);
    }

    public function create()
    {
        return view('dashboard.posts.create', [
            'categories' => Category::all()
        ]);
    }

    public function store(Request $request)
    {
         
        $validasi = $request->validate([
            'title'       => 'required|max:255',
            'slug'        => 'required|unique:posts',
            'category_id' => 'required',
            'image'       => 'image|file|max:1024',
            'body'        => 'required'
        ]);

        // Pengecekan Gambar Yang Diupload
        if($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validasi['image'] = $request->file('image')->store('post-image');
        }

        $validasi['user_id'] = auth()->user()->id;
        $validasi['excerpt'] = Str::limit(strip_tags($request->body), 200);

        Post::create($validasi);

        return redirect('/dashboard/posts')->with('success', 'New Post Added!');
    }

    public function show(Post $post)
    {
        return view('dashboard.posts.show', [
            'post' => $post
        ]);
    }

    public function edit(Post $post)
    {
        return view('dashboard.posts.edit', [
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    public function update(Request $request, Post $post)
    {
        $rules = [
            'title'       => 'required|max:255',
            'category_id' => 'required',
            'image'       => 'image|file|max:1024',
            'body'        => 'required'
        ];

        // Kondisi Upadate dari slug 
        if ($request->slug != $post->slug) {
            $rules['slug'] = 'required|unique:posts';
        }

        $validasi = $request->validate($rules);

        // Pengecekan Gambar Yang Diupload
        if($request->file('image')) {
            $validasi['image'] = $request->file('image')->store('post-image');
        }

        $validasi['user_id'] = auth()->user()->id;
        $validasi['excerpt'] = Str::limit(strip_tags($request->body), 200);

        Post::where('id', $post->id)
                    ->update($validasi);

        return redirect('/dashboard/posts')->with('success', 'Your Post Updated!');
    }

    public function destroy(Post $post)
    {
        // Menghapus Image
        if ($post->image) {
            Storage::delete($post->image);
        }
        
        Post::destroy($post->id);

        return redirect('/dashboard/posts')->with('success', 'Post Deleted!');
    }

    // Method Slug Otomatis
    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }

}

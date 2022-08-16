<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Storage;



class PostController extends Controller
{
    //
    public function index()
    {

        $title = '';
        if (request('kategori')) {
            $kategori = kategori::firstWhere('slug', request('kategori'));
            $title = 'in ' . $kategori->nama;
        }

        if (request('user')) {
            $user = User::firstWhere('username', request('user'));
            $title = 'in ' . $user->name;
        }
        return view('post', [
            "title" => "All Post " . $title,
            "active" => 'post',
            "post" => Post::latest()->filter(request(['cari', 'kategori', 'user']))->paginate(9)->withQueryString()

        ]);
    }

    public function show(Post $Posts) {
        return view('posts',[
            "title" => "Single Post",
            "active" => 'post',
            "posts" => $Posts
        ]);
    }
    public function destroy(Post $posts)
    {
        if($posts->image) {
            Storage::delete($posts->image);
        }
        Post::destroy($posts->id);

        return redirect('/post')->with('success', 'Post has been deleted!');    }

}

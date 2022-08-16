<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\kategori;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class beliController extends Controller
{
    public function index()
    {
        return view('beli',[
        'posts' => Post::where('user_id', auth()->user()->id)->get()
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'namaBarang' => 'required|max:255',
            'slug' => 'required|unique:posts',
            'kategori_id' => 'required',
            'image' => 'image|file||max:1024',
            'harga' => 'required',
            'descBarang' => 'required'
        ]);

        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-images');
        }
        $validatedData['user_id']  = auth()->user()->id;
        $validatedData['excerpt']  = Str::limit(strip_tags($request->descBarang), 200, '...');

        Post::create($validatedData);
    }


}

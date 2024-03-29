<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\kategori;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;



class jualPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('jual.posts.index',[
        'posts' => Post::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('jual.posts.create', [
            'kategoris' => kategori::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

        return redirect('/jual/posts')->with('success', 'New Post has beed added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
    //     if($post->name->id !== auth()->user()->id) {
    //         abort(403);
    //    }
        return view ('jual.posts.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
    //     if($post->author->id !== auth()->user()->id) {
    //         abort(403);
    //    }
        return view('jual.posts.edit',[
        'post' => $post,
        'kategoris' => kategori::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $rules =[
            'namaBarang' => 'required|max:255',
            'kategori_id' => 'required',
            'image' => 'image|file||max:1024',
            'harga' => 'required',
            'descBarang' => 'required'
        ];

        if($request->slug != $post->slug) {
            $rules['slug'] = 'required|unique:posts';
        }

        $validatedData = $request->validate($rules);
        if($request->file('image')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('post-images');
        }
        $validatedData['user_id']  = auth()->user()->id;
        $validatedData['excerpt']  = Str::limit(strip_tags($request->descBarang), 200, '...');

        Post::where('id', $post->id)
        ->update($validatedData);

        return redirect('/jual/posts')->with('success', 'Post has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if($post->image) {
            Storage::delete($post->image);
        }
        Post::destroy($post->id);

        return redirect('/jual/posts')->with('success', 'Post has been deleted!');
    }

    public function checkSlug(Request $request) {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->namaBarang);
        return response()->json(['slug' => $slug]);
    }
}

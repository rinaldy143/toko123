<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\country;
use App\Models\beli;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
// use LDAP\Result;

class beliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $country = country::all();

        return view('beli',[
            'posts' => Post::where('slug', auth()->user()->slug)->get()
            ], compact('country'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//
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
            'fullName' => 'required',
            'address' => 'required',
            'country' => 'required',
            'state' => 'required',
            'zip' => 'required',
            'upload_file' => 'required|file'
        ]);

        if($request->file('upload_file')) {
            $validatedData['upload_file'] = $request->file('upload_file')->store('beli-upload_file');
        }
        beli::create($validatedData);

        return redirect('/post')->with('success', 'item has been buyed!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\beli  $beli
     * @return \Illuminate\Http\Response
     */
    public function show(beli $beli)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\beli  $beli
     * @return \Illuminate\Http\Response
     */
    public function edit(beli $beli)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\beli  $beli
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, beli $beli)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\beli  $beli
     * @return \Illuminate\Http\Response
     */
    public function destroy(beli $beli)
    {
        //
    }
}

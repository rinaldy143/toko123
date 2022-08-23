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
        // return view('beli',[
        //     'posts' => Post::where('slug', auth()->user()->slug)->get()
        //     ], compact('country'));
        return view('beli.create',[
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
        $beli = beli::all();
        $barang = post::all();
        return view('beli.index', compact('beli','barang'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validatedData = $request->validate([
        //     'namaLengkap' => 'required',
        //     'alamat' => 'required',
        //     'country' => 'required',
        //     'state' => 'required',
        //     'zip' => 'required',
        //     'upload_file' => 'image|file||max:1024'
        // ]);

        // $imgName = null;
        // if ($request->image) {
        //     $imgName = $request->image->getClientOriginalName();
        //     $request->image->move(public_path('/img/bukti-bayar'), $imgName);
        // }
        // beli::create($validatedData);

        $request->validate([
            'namaLengkap' => 'required',
            'alamat' => 'required',
            'country' => 'required',
            'state' => 'required',
            'zip' => 'required',
            'upload_file' => 'image|file||max:1024'
        ]);

        $imgName = null;
        if ($request->upload_file) {
            $imgName = $request->upload_file->getClientOriginalName();
            $request->upload_file->move(public_path('/img/bukti-bayar'), $imgName);
        }
        beli::create([
            'namaLengkap' => $request->namaLengkap,
            'alamat' =>  $request->alamat,
            'country' =>  $request->country,
            'state' =>  $request->state,
            'zip' =>  $request->zip,
            'upload_file' => $imgName
        ]);



        return redirect('/makasih')->with('success', 'item has been buyed!');
        // $request->validate([
        //     'namaLengkap' => 'required',
        //     'alamat' => 'required',
        //     'country' => 'required',
        //     'state' => 'required',
        //     'zip' => 'required',
        //     'upload_file' => 'image|file||max:1024'
        // ]);

        // beli::create([
        //     'namaLengkap' => $request->namaLengkap,
        //     'alamat' => $request->alamat,
        //     'country_id' => $request->country,
        //     'state' => $request->state,
        //     'zip' => $request->zip,
        //     'upload_file' => $request->upload_file
        // ]);
        // return redirect('/post')->with('success', 'item has been buyed!');


        // return redirect()->to('/');

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
    public function destroy($id)
    {
        beli::find($id)->delete();

        return redirect()->route('beli.create', ['success' => 'asset delete successfully']);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Resep;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ResepController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reseps = Resep::all();
        
        return view('resep.index', compact('reseps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('resep.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'name' => 'required',
            'description' => 'required',
            'jenis' => 'required',
            'gambar' => 'required|image'
        ]);

        $imagePath = $request->gambar->store('uploads', 'public');

        Resep::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'jenis' => $data['jenis'],
            'gambar' => $imagePath,
        ]);

        return redirect('/resep');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Resep  $resep
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $resep = Resep::find($id);
        return view('resep.lihat', ['reseps' => $resep]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Resep  $resep
     * @return \Illuminate\Http\Response
     */
    public function edit(Resep $resep)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Resep  $resep
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Resep $resep)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Resep  $resep
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $resep = Resep::find($id);

        //dd($resep['gambar']);

        if(Storage::exists('public/'.$resep['gambar'])){

            Storage::delete('public/'.$resep['gambar']);

        }else{

            dd('File does not exists.');

        }

        $resep->delete();

        return redirect('/resep')->with('success', 'Resep dihapus!');
    }
}

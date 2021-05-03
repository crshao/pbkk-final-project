<?php

namespace App\Http\Controllers;

use App\Models\Bahanbaku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BahanbakuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bahanBakus = Bahanbaku::paginate(6);

        return view('bahanbaku.index', compact('bahanBakus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bahanbaku.create');
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
            'price' => 'required',
            'pricetag' => "",
            'gambar' => 'required|image'
        ]);

        $imagePath = request('gambar')->store('uploads', 'public');

        BahanBaku::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'jenis' => $data['jenis'],
            'price' => $data['price'],
            'pricetag' => 'test',
            'gambar' => 'storage/' . $imagePath,
        ]);

        return redirect('/bahanbaku/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bahanbaku  $bahanbaku
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bahanBaku = Bahanbaku::find($id);
        return view('bahanbaku.lihat', ['bahanbakus' => $bahanBaku]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bahanbaku  $bahanbaku
     * @return \Illuminate\Http\Response
     */
    public function edit(Bahanbaku $bahanbaku)
    {
        return view('bahanbaku.edit', compact('bahanbaku'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bahanbaku  $bahanbaku
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bahanbaku $bahanbaku)
    {
        $data = request()->validate([
            'name' => 'required',
            'description' => 'required',
            'jenis' => 'required',
        ]);

        $bahanbaku->update($request->all());

        return redirect('/bahanbaku')->with('success', 'Bahan Baku telah diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bahanbaku  $bahanbaku
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bahanbaku = Bahanbaku::find($id);

        //dd($bahanbaku['gambar']);

        // if(Storage::exists('public/'.$bahanbaku['gambar'])){
        //     Storage::delete('public/'.$bahanbaku['gambar']);
        // }else{
        //     dd('File does not exists.');
        // }

        $bahanbaku->delete();

        return redirect('/bahanbaku')->with('success', 'Bahan Baku dihapus');
    }
}

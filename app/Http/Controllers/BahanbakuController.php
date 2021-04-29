<?php

namespace App\Http\Controllers;

use App\Models\Bahanbaku;
use Illuminate\Http\Request;

class BahanbakuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bahanBakus = Bahanbaku::all();

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
    public function show(Bahanbaku $bahanbaku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bahanbaku  $bahanbaku
     * @return \Illuminate\Http\Response
     */
    public function edit(Bahanbaku $bahanbaku)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bahanbaku  $bahanbaku
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bahanbaku $bahanbaku)
    {
        //
    }
}

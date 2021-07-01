<?php

namespace App\Http\Controllers;

use App\Models\Bahanbaku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

use App\Repositories\BahanbakuRepository;

class BahanbakuController extends Controller
{
    private $bahanbakuRepository;

    public function __construct(BahanbakuRepository $bahanbakuRepository)
    {
        $this->bahanbakuRepository = $bahanbakuRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $bahanBakus = Bahanbaku::paginate(6);
        $bahanBakus = $this->bahanbakuRepository->all();
        $filteredBahan = $this->bahanbakuRepository->filter();
        return view('bahanbaku.index', compact('bahanBakus', 'filteredBahan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(! auth()->user()->hasRole('3'))
        {
            abort(401, 'This action is unauthorized.');
        }
        else
        {
            return view('bahanbaku.create');
        }
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
        $user = Auth::User();

        BahanBaku::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'jenis' => $data['jenis'],
            'price' => $data['price'],
            'pricetag' => "Rp." . strval($data['price']) . "/Ons",
            'gambar' => 'storage/' . $imagePath,
            'user_id' => $user->id,
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
        // $bahanBaku = Bahanbaku::find($id);
        $bahanBaku = $this->bahanbakuRepository->findById($id);
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
        // $bahanbaku = Bahanbaku::find($id);
        // $bahanbaku->delete();
        $this->bahanbakuRepository->delete($id);
        return redirect('/bahanbaku')->with('success', 'Bahan Baku dihapus');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Resep;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Repositories\ResepRepository;
use App\Repositories\BahanbakuRepository;

class ResepController extends Controller
{

    public function __construct(ResepRepository $resepRepository, BahanbakuRepository $bahanbakuRepository){
        $this->resepRepository = $resepRepository;
        $this->bahanbakuRepository = $bahanbakuRepository;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        //$reseps = Resep::all();
        $reseps = $this->resepRepository->all();
        
        
        return view('resep.index', compact('reseps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! auth()->user()->hasRole('3')) {
            abort(401, 'This action is unauthorized.');
        }else{
            $bahanbaku = $this->bahanbakuRepository->list();
            return view('resep.tambah', ['bahanbaku' => $bahanbaku]);
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
        //dd($request->all());
        $data = request()->validate([
            'name' => 'required',
            'description' => 'required',
            'jenis' => 'required',
            'gambar' => 'required|image',
            'bahanbaku' => 'required',
            'jumlah' => 'required',
        ]);
        
        $this->resepRepository->createResep($data);

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
        //$resep = Resep::find($id);
        $resep = $this->resepRepository->findById($id);

        $simpleQR = app()->make('simpleQR');
        $qr = $simpleQR->generate($id . "/" . $resep->name);

        $bahanbaku = $this->resepRepository->getBahanbaku($id);
        $total = $this->resepRepository->getTotalHarga($bahanbaku);
        return view('resep.lihat', ['reseps' => $resep, 'qr' => $qr, 'bahanbaku' => $bahanbaku, 'total' => $total]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Resep  $resep
     * @return \Illuminate\Http\Response
     */
    public function edit(Resep $resep)
    {
        if (! auth()->user()->hasRole('3')) {
            abort(401, 'This action is unauthorized.');
        }
        $bahanbaku = $this->bahanbakuRepository->list();
        $br = $this->resepRepository->getBahanbaku($resep->id);
        return view('resep.edit', ['resep' => $resep, 'bahanbaku' => $bahanbaku, 'br' => $br]);
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
        //dd($request->all());
        if (! auth()->user()->hasRole('3')) {
            abort(401, 'This action is unauthorized.');
        }
        $data = request()->validate([
            'name' => 'required',
            'description' => 'required',
            'jenis' => 'required',
        ]);

        if(count($request->input('bahanbaku')) != count(array_unique($request->input('bahanbaku')))){
            return redirect('/resep/edit/'.$resep->id)->with('dupe', 'Update gagal, Bahan baku duplicate');;
        }

        $resep->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'jenis' => $request->input('jenis')
        ]);

        $this->resepRepository->updateResep($resep->id, $request->input('bahanbaku'), $request->input('jumlah'));

        return redirect('/resep')->with('success', 'Resep diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Resep  $resep
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! auth()->user()->hasRole('3')) {
            abort(401, 'This action is unauthorized.');
        }
        $this->resepRepository->delete($id);

        return redirect('/resep')->with('success', 'Resep dihapus!');
    }

    public function qrcode()
    {
        $simpleQR = app()->make('simpleQR');
        echo $simpleQR->generate("Vachri");
    }
}

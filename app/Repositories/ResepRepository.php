<?php

namespace App\Repositories;

use App\Models\Resep;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ResepRepository
{
    public function all()
    {
        return $reseps = Resep::paginate(6);
    }

    public function findById($id)
    {
        return Resep::findOrFail($id);
    }

    public function delete($id)
    {
        $resep = Resep::findOrFail($id);

        $var = preg_split("/\//", $resep['gambar'])[2];

        if(Storage::exists('public/uploads/'.$var)){
            Storage::delete('public/uploads/'.$var);
        }

        $resep->delete();
        return 204;
    }

    public function getBahanbaku($id){
        $bahanbaku = DB::table('reseps')
            ->join('bahanbaku_resep', 'reseps.id', '=', 'id_resep')
            ->join('bahanbakus', 'id_bahanbaku', '=', 'bahanbakus.id')
            ->select('bahanbakus.name', 'bahanbakus.price', 'bahanbakus.jenis', 'bahanbakus.gambar', 'jumlah')
            ->where('reseps.id', '=', $id)
            ->get();
        if(!$bahanbaku->isEmpty()){
            return $bahanbaku;
        }else{
            throw new \Illuminate\Database\Eloquent\ModelNotFoundException;
        }
        
    }

    public function getTotalHarga($bahanbakus){
        $total = 0;

        foreach($bahanbakus as $bb){
            $total = $total + ($bb->price * $bb->jumlah);
        }
        
        return $total;
        
    }

    public function getTotalHargaById($id){
        return $this->getTotalHarga($this->getBahanbaku($id));
    }
}
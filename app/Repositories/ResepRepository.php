<?php

namespace App\Repositories;

use App\Models\Resep;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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

        // DB::table('reseps')
        // ->where('reseps.id', '=', $id)->delete();

        $resep->delete();
        return 204;
    }

    public function getBahanbaku($id){
        $bahanbaku = DB::table('reseps')
            ->join('bahanbaku_resep', 'reseps.id', '=', 'id_resep')
            ->join('bahanbakus', 'id_bahanbaku', '=', 'bahanbakus.id')
            ->select('bahanbakus.name', 'bahanbakus.price', 'bahanbakus.jenis', 'bahanbakus.gambar', 'jumlah', 'id_bahanbaku')
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

    public function updateResep($id, $bahanbaku, $jumlah){
        //delete all recipe
        DB::table('bahanbaku_resep')->where('id_resep', '=', $id)->delete();

        $count = 0;
        foreach($bahanbaku as $b){
            DB::table('bahanbaku_resep')->insert([
                'id_bahanbaku' => $b,
                'jumlah' => $jumlah[$count],
                'id_resep' => $id,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
            $count = $count + 1;
        }
        
    }

    public function createResep($data){
        //dd($data);
        $imagePath = $data['gambar']->store('uploads', 'public');

        //Buat resep baru di tabel resep
        $resepBaru = Resep::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'jenis' => $data['jenis'],
            'gambar' => 'storage/' . $imagePath,
        ]);

        //masukkan relasi ke dalam pivot
        $count = 0;
        foreach($data['bahanbaku'] as $b){
            DB::table('bahanbaku_resep')->insert([
                'id_bahanbaku' => $b,
                'jumlah' => $data['jumlah'][$count],
                'id_resep' => $resepBaru->id,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
            $count = $count + 1;
        }
    }
}
<?php

namespace App\Repositories;

use App\Models\Resep;
use Illuminate\Support\Facades\Storage;

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

        // if(Storage::exists('public/'.$resep['gambar'])){
        //     Storage::delete('public/'.$resep['gambar']);
        // }

        if(Storage::exists('public/uploads/'.$var)){
            Storage::delete('public/uploads/'.$var);
        }

        $resep->delete();
        return 204;
    }
}
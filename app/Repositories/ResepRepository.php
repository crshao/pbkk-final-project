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

        if(Storage::exists('public/'.$resep['gambar'])){
            Storage::delete('public/'.$resep['gambar']);
        }

        $resep->delete();
        return 204;
    }
}
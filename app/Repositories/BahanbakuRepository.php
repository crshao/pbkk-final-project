<?php

namespace App\Repositories;

use App\Models\Bahanbaku;

class BahanbakuRepository
{
    public function all()
    {
        return $bahanBakus = Bahanbaku::paginate(6);
    }

    public function list(){
        return Bahanbaku::all();
    }

    public function findById($id)
    {
        return Bahanbaku::findOrFail($id);
    }

    public function delete($id)
    {
        $bahanBaku = Bahanbaku::findOrFail($id);
        $bahanBaku->delete();
        return 204;
    }
}
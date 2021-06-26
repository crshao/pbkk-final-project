<?php

namespace App\Repositories;

use App\Models\Bahanbaku;

class BahanbakuRepository
{
    public function all()
    {
        return $bahanBakus = Bahanbaku::paginate(6);
    }

    public function findById($id)
    {
        return Bahanbaku::find($id);
    }
}
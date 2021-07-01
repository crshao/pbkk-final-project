<?php

namespace App\Repositories;

use App\Models\Bahanbaku;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BahanbakuRepository
{
    public function all()
    {
        return $bahanBakus = Bahanbaku::paginate(6);
    }

    public function filter()
    {
        $user = Auth::User();
        $filteredBahan = DB::table('bahanbakus')
                ->where('user_id', '=', $user->id)
                ->paginate(6);
                

        return $filteredBahan;
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
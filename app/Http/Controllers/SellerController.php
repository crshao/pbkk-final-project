<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('role:seller');
    }

    public function index(){
        return view('seller.dashboard');
    }
}

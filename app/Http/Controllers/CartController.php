<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Models\Bahanbaku;
// use App\Models\Cart-origin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;

use App\Repositories\ResepRepository;

class CartController extends Controller
{

    public function __construct(ResepRepository $resepRepository){
        $this->resepRepository = $resepRepository;
    }

    public function getAddToCart(Request $request, $id){
        $bahanBaku  = Bahanbaku::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($bahanBaku, $bahanBaku->id);

        $request->session()->put('cart', $cart);
        return redirect()->route('bahanbaku');
    }

    public function getAddToCartQty(Request $request, $id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);

        //insert all the bahanbaku
        $bahanbakus = $this->resepRepository->getBahanbaku($id);
        foreach($bahanbakus as $b){
            $bModel = Bahanbaku::find($b->id_bahanbaku);
            $cart->addQty($bModel, $b->id_bahanbaku, $b->jumlah);
        }

        $request->session()->put('cart', $cart);
        return redirect()->route('resep.index')->with('success', 'Bahanbaku ditambahkan ke cart!');
    }

    public function getCart(){
        if(!Session::has('cart')){
            return view('bahanbaku.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('bahanbaku.shopping-cart', ['bahanBakus' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    public function getCheckout(){
        if(!Session::has('cart')){
            return view('bahanbaku.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        return view('bahanbaku.checkout', ['total' => $total]);
    }

    public function postCheckout(){
        return view('bahanbaku.postcheckout');
    }

    public function getReducedByOne($id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);

        if(count($cart->items) > 0){
            Session::put('cart', $cart);
        } else{
            Session::forget('cart');
        }
        
        return redirect()->route('bahanBaku.shoppingCart');
    }

    public function getRemoveFromCart($id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->remove($id);

        if(count($cart->items) > 0){
            Session::put('cart', $cart);
        } else{
            Session::forget('cart');
        }

        return redirect()->route('bahanBaku.shoppingCart');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check())
        {
            // $carts = Cart::where('id_user', Auth::id())->get();
            // return view('cart.index', compact('carts'));

            $carts = DB::table('carts')
            ->join('users', 'users.id', '=', 'carts.id_user')
            ->join('bahanbakus', 'bahanbakus.id', '=', 'carts.id_bahanbaku')
            ->where('id_user', Auth::id())
            ->get();

            return view('cart.index', ['carts' => $carts]);
        }else{
            return "please login";
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        //
    }
}

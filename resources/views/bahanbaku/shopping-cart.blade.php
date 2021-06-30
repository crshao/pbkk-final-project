@extends('layouts.app')

@section('title')
    Shopping Cart
@endsection

@section('content')
    @if(Session::has('cart'))
        <div class="row container mw-100 d-flex justify-content-center">
            <div class="col-sm-6 col-md-6">
                <ul class="list-group">
                    @foreach($bahanBakus as $bahanBaku)
                        <li class="list-group-item">
                            <span class="badge">{{ $bahanBaku['quantity'] }}</span>
                            <strong>{{ $bahanBaku['item']['name'] }}</strong>
                            <span class="label label-success">{{ $bahanBaku['price'] }}</span>
                            <div class="btn-group">
                                <a class="btn btn-warning" href="{{ route('bahanBaku.reduceByOne', [ 'id' => $bahanBaku['item']['id'] ]) }}">Kurangi Satu</a>
                                <a class="btn btn-danger" href="{{ route('bahanBaku.remove', [ 'id' => $bahanBaku['item']['id'] ]) }}">Batalkan</a>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="row container mw-100 justify-content-center">
            <div class="col-sm-6 col-md-6">
                <strong>Total {{$totalPrice}}</strong>
            </div>
        </div>
        <br>
        <div class="row container mw-100 justify-content-center">
            <div class="col-sm-6 col-md-6">
                <a href="{{ route('checkout')}}" type="button" class="btn btn-success">Checkout</a>
            </div>
        </div>
    @else
        <div class="row mw-100 justify-content-center">
            <div class="col-sm-6 col-md-6">
                <h2>Anda belum memilih barang yang ingin dibeli!</h2>
            </div>
        </div>
    @endif
@endsection
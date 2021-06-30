@extends('layouts.app')

@section('title')
    Checkout
@endsection

@section('content')
    <div class="row container mw-100 justify-content-center">
        <div class="col-sm-6 col-md-6">
            <h1>Checkout</h1>
            <h4>Your Total: Rp. {{ $total }}</h4>
            <form action="{{ route('postcheckout')}}" method="post" id="checkout-form">
            <input type="hidden" value="{{ Auth::user()->id}}" name="id_user">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" id="name" class="form-control" value="{{ Auth::user()->name }}" required>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="address">Alamat</label>
                            <input type="text" id="address" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="card-name">Nama Pemegang Kartu</label>
                            <input type="text" id="card-name" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="card-number">Nomor Kartu Kredit</label>
                            <input type="text" id="card-number" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="card-expiry-month">Bulan Expired</label>
                                    <input type="text" id="card-expiry-month" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="card-expiry-year">Tahun Expired</label>
                                    <input type="text" id="card-expiry-year" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="card-cvc">CVV/CVC</label>
                            <input type="password" id="card-cvc" class="form-control" required>
                        </div>
                    </div>
                </div>
                {{ csrf_field() }}
                <button type="submit" class="btn btn-success">Konfirmasi Bayar</button>
            </form>
        </div>
    </div>
@endsection
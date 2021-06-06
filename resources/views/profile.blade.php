@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Informasi Akun') }}</div>
                    <div class="row">
                        <div class="col-sm-6">
                            <h6 style="text-align:center; font-size:160%;"><b>Nama</b></h6>
                            <h7>{{ Auth::user()->name }}</h7>
                        </div>
                        <div class="col-sm-6">
                            <h6 style="text-align:center; font-size:160%;"><b>Email</b></h6>
                            <h7>{{ Auth::user()->email }}</h7>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <h8 style="font-size:160%;"><b>QR Code</b></h8>
                        </div>
                    </div>
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

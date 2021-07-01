@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-4">
            <h1>{{ $reseps->name }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <img class="img-thumbnail" src="/{{ $reseps->gambar }}">
        </div>
        
        <div class="col-8">
            <div class="row">
                <div class="col">
                    <p>{{$reseps->description}}</p>
                </div>
            </div>
            <div class="row">
                <div class="col align-self-end">{{ $qr }}</div>
            </div>
        </div>

    </div>

    <div class="row my-3">
        <div class="col">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Bahan Baku</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $bahanbaku as $bb )
                        <tr>
                            <td>{{ $bb->name }}</td>
                            <td>{{ $bb->jumlah }}</td>
                            <td>{{ $bb->price }}</td>
                        </tr>
                    @endforeach
                    <tr>
                    <td colspan="2">  </td>
                    <td><b>{{ $total }}</b></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
 
    @if(Auth::user()->hasRole('3'))
        <div class="row">
            <div class="col">
                <a href="/resep/edit/{{$reseps->id}}" class="btn btn-info mx-2">Edit</a>
                <a href="/resep/hapus/{{$reseps->id}}" class="btn btn-danger">Hapus</a>
            </div>
        </div>
    @elseif(Auth::user()->hasRole('2'))
        <div class="row">
            <div class="col">
                <a href="{{ route('resep.addToCart', ['id' => $reseps->id]) }}" class="btn btn-success mx-2">Tambah ke Keranjang</a>
            </div>
        </div>
    @endif

    
    
</div>
@endsection
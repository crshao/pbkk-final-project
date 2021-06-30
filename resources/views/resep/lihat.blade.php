@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <h1>{{ $reseps->name }}</h1>
            <p>{{$reseps->description}}</p>
            <img class="img-thumbnail" src="/{{ $reseps->gambar }}">

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Bahan Baku</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $bahanbaku as $bb )
                        <tr>
                            <td>{{ $bb->name }}</td>
                            <td>{{ $bb->price }}</td>
                            <td>{{ $bb->jumlah }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
            <div class="row mb-5 mt-5">
                <div>{{ $qr }}</div>
            </div>
            @if(Auth::user()->hasRole('3'))
                <div class="row">
                    <a href="/resep/edit/{{$reseps->id}}" class="btn btn-info">Edit</a>
                    <a href="/resep/hapus/{{$reseps->id}}" class="btn btn-danger">Hapus</a>
                </div>
            @endif

            
            
        </div>
    </div>
</div>
@endsection
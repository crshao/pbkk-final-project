@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <h1>{{ $reseps->name }}</h1>
            <p>{{$reseps->description}}</p>
            <img class="img-thumbnail" src="/{{ $reseps->gambar }}">
            <div class="row mb-5 mt-5">
                <div>{{ $qr }}</div>
            </div>
            @if(Auth::user()->hasRole('3'))
                <div class="row">
                    <a href="/resep/edit/{{$reseps->id}}" class="btn btn-info">Edit</a>
                    <a href="/resep/hapus/{{$reseps->id}}" class="btn btn-danger">Hapus</a>
                </div>
            @endif

            @foreach ( $bahanbaku as $bb )
                <ul>{{ $bb->name }} {{ $bb->price }} {{ $bb->jumlah }}</ul>
            @endforeach
            
        </div>
    </div>
</div>
@endsection
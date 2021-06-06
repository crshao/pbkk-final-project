@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <h1>{{ $reseps->name }}</h1>
            <p>{{$reseps->description}}</p>
            <img class="img-thumbnail" src="/storage/{{ $reseps->gambar }}">
            <div class="row mb-5 mt-5">
                <div>{{ $qr }}</div>
            </div>
            <div class="row">
                <a href="/resep/edit/{{$reseps->id}}" class="btn btn-info">Edit</a>
                <a href="/resep/hapus/{{$reseps->id}}" class="btn btn-danger">Hapus</a>
            </div>
        </div>
    </div>
</div>
@endsection
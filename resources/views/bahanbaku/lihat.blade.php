@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <h1>{{ $bahanbakus->name }}</h1>
            <p>{{$bahanbakus->description}}</p>
            <img class="img-thumbnail" src="/storage/{{ $bahanbakus->gambar }}">
            <div class="row">
                <a href="/bahanbaku/edit/{{$bahanbakus->id}}" class="btn btn-info">Edit</a>
                <a href="/bahanbaku/hapus/{{$bahanbakus->id}}" class="btn btn-danger">Hapus</a>
            </div>
        </div>
    </div>
</div>
@endsection
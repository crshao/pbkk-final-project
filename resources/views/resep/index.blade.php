<!-- <html>
    <head>
        <title>Resep</title>
    </head>
    <body>
        <div class="col-sm-12">  
            @if(session()->get('success'))
            <div class="alert alert-success">
              {{ session()->get('success') }}  
            </div>
            @endif
        </div>
        <a href="/resep/tambah">tambah resep</a>
        <table>
            <tr>
                <td>nama</td>
                <td>desk</td>
                <td>jenis</td>
            </tr>
            @foreach($reseps as $resep)
            <tr>
                <td>{{ $resep->name }}</td>
                <td>{{ $resep->description }}</td>
                <td>{{ $resep->jenis }}</td>
                <td> <a href="#">edit</a></td>
                <td> <a href="/resep/hapus/{{$resep->id}}">delete</a></td>
            </tr>
            @endforeach
        </table>
    </body>
    
</html>
-->

@extends('layouts.app')

@section('content')
    <div class="col-sm-12">  
        @if(session()->get('success'))
        <div class="alert alert-success">
        {{ session()->get('success') }}  
        </div>
        @endif
    </div>
    <div class="container">
        <div class="row">
            <h1>Resep</h1>
        </div>
        <div class="row">
            <a class="btn btn-primary" href="/resep/tambah">Tambah Resep</a>
        </div>
        <div class="container">
            <div class="row">
                @foreach($reseps->chunk(3) as $resepChunk)
                <div class="card-deck">
                @foreach($resepChunk as $resep)
                    <div class="card">
                        <img class="card-img" width="200" height="200" src="/storage/{{ $resep->gambar }}">
                        <div class="figure-caption">
                        <h3 class="card-title">{{$resep->name}}</h3>
                        <div class="card-subtitle">
                            <a href="/resep/lihat/{{ $resep->id }}" class="btn btn-success" role="button">Lihat</a>
                        </div>
                        </div>
                    </div>
                @endforeach
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

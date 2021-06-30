@extends('layouts.app')

@section('title')
    Resep
@endsection

{{-- Untuk menghilangkan tanda panah besar --}}
<style>
  .w-5 {
    display: none
  }
</style>

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">  
                @if(session()->get('success'))
                <div class="alert alert-success">
                {{ session()->get('success') }}  
                </div>
                @endif
            </div>
        </div>
        
        <div class="row">
            <div class="col">
                <h1>Resep</h1>
            </div>
        </div>

        @if(Auth::user()->hasRole('3'))
            <div class="row">
                <div class="col">
                    <a class="btn btn-primary" href="/resep/tambah">Tambah Resep</a>
                </div>
            </div>
        @endif

        
        <div class="row">
            <div class="col">
                @foreach($reseps->chunk(3) as $resepChunk)
                <div class="card-deck">
                @foreach($resepChunk as $resep)
                    <div class="col-sm-6 col-md-4">
                        <div class="card my-2">
                            <img class="card-img" width="200" height="200" src="/{{ $resep->gambar }}">
                            <div class="figure-caption">
                                <h3 class="card-title px-2 py-2">{{$resep->name}}</h3>
                                <div class="card-subtitle">
                                    <a href="/resep/lihat/{{ $resep->id }}" class="btn btn-success mx-2 my-2" role="button">Lihat</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
                @endforeach
            </div>
        </div>

        <div class="row">
            <div class="col">
                {{ $reseps->links() }}
            </div>
        </div>
        
    </div>
    
@endsection

@extends('layouts.app')

@section('title')
    Bahan Baku
@endsection

{{-- Untuk menghilangkan tanda panah besar --}}
<style>
  .w-5 {
    display: none
  }
</style>

@section('content')
<div class="container">
      <div class="d-flex justify-content-start">
        <h1>Bahan Baku</h1>
      </div>

      @if(Auth::user()->hasRole('3'))
            <div class="row">
                <div class="col">
                    <a class="btn btn-success" href="/bahanbaku/create">Tambah</a>
                </div>
            </div>
        @endif

    <hr>

  @if (Auth::user()->hasRole(3))
  <h3> Bahan yang anda jual </h3>
    @if ($filteredBahan->count() == 0)
    <h5 style="text-align:center"> Belum memasukkan Bahan Baku </h5>
    @endif
    @foreach($filteredBahan->chunk(3) as $filteredBahanChunk)
      <div class="card-deck">
        @foreach($filteredBahanChunk as $bahanBaku)
          <div class="col-sm-6 col-md-4">
            <div class="card">
              <img class="card-img" width="200" height="200" src="{{ $bahanBaku->gambar }}">
              <div class="figure-caption">
                <h3 class="card-title">{{$bahanBaku->name}}</h3>
                <div class="card-subtitle">
                  <h6 class="card-text">{{$bahanBaku->pricetag}}</h6>                
                  {{-- <a href="/bahanbaku/lihat/{{ $bahanBaku->id }}" class="btn btn-success" role="button">Lihat</a> --}}
    
                </div> 
              </div>
            </div>
          </div>
        @endforeach
      </div>
    @endforeach
  
  @else
    @foreach($bahanBakus->chunk(3) as $bahanBakuChunk)
      <div class="card-deck">
        @foreach($bahanBakuChunk as $bahanBaku)
          <div class="col-sm-6 col-md-4">
            <div class="card">
              <img class="card-img" width="200" height="200" src="{{ $bahanBaku->gambar }}">
              <div class="figure-caption">
                <h3 class="card-title">{{$bahanBaku->name}}</h3>
                <div class="card-subtitle">
                  <h6 class="card-text">{{$bahanBaku->pricetag}}</h6>                
                  {{-- <a href="/bahanbaku/lihat/{{ $bahanBaku->id }}" class="btn btn-success" role="button">Lihat</a> --}}
                  <a href="{{ route('bahanBaku.addToCart', ['id' => $bahanBaku->id]) }}" class="btn btn-success" role="button">Tambah</a>
                </div> 
              </div>
            </div>
          </div>
        @endforeach
      </div>
    @endforeach
  @endif

  <span>
    {{ $bahanBakus->links()}}
  </span>
</div>
@endsection
@extends('layouts.app')

@section('title')
    Bahan Baku
@endsection

@section('content')
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
                {{-- <a href="{{ route('bahanBaku.addToCart', ['id' => $bahanBaku->id]) }}" class="btn btn-success" role="button">Tambah</a> --}}
              </div> 
            </div>
          </div>
        </div>
      @endforeach
    </div>
  @endforeach
@endsection
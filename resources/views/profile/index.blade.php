@extends('layouts.app')

@section('title')
  Bahan Baku
@endsection

@section('content')
  @foreach($pesanans->chunk(3) as $pesananChunk)
    <div class="card-deck">
      @foreach($pesananChunk as $pesanan)
        <div class="col-sm-6 col-md-4 text-center">
          @if ($pesanan->state == 1)
            <div class="card bg-dark">
                <div class="figure-caption">
                  
                  <h3 class="card-title text-secondary">{{ $pesanan->created_at->format('Y-m-d') }}</h3>
                  <h4 class="text-secondary">Sedang Dipersiapkan</h4>
                  <h5 class="text-secondary">{{ $pesanan->courier_name }}</h5>
                  <h5 class="text-secondary">{{ $pesanan->phone_number }}</h5>
                </div>
            </div>
          @else
            @if($pesanan->state == 2)
              <div class="card bg-info">
                  <div class="figure-caption">
                    <h3 class="card-title text-secondary">{{ $pesanan->created_at->format('Y-m-d') }}</h3>
                    <h4 class="text-secondary">Dalam Perjalanan</h4>
                    <h5 class="text-secondary">{{ $pesanan->courier_name }}</h5>
                    <h5 class="text-secondary">{{ $pesanan->phone_number }}</h5>
                  </div>
              </div>
            @else
              <div class="card bg-success">
                  <div class="figure-caption">
                    <h3 class="card-title text-secondary">{{ $pesanan->created_at->format('Y-m-d') }}</h3>
                    <h4 class="text-secondary">Telah Tiba</h4>
                    <h5 class="text-secondary">{{ $pesanan->courier_name }}</h5>
                    <h5 class="text-secondary">{{ $pesanan->phone_number }}</h5>
                  </div>
              </div>
            @endif
          @endif
        </div>
      @endforeach
    </div>
  @endforeach
@endsection
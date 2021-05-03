@extends('layouts.app')

@section('content')

<div class="px-4 px-lg-0">
  
    <div class="pb-5">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">
  
            <!-- Shopping cart table -->
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col" class="border-0 bg-light">
                      <div class="p-2 px-3 text-uppercase">Product</div>
                    </th>
                    <th scope="col" class="border-0 bg-light">
                      <div class="py-2 text-uppercase">Price</div>
                    </th>
                    <th scope="col" class="border-0 bg-light">
                      <div class="py-2 text-uppercase">Quantity</div>
                    </th>
                    <th scope="col" class="border-0 bg-light">
                      <div class="py-2 text-uppercase">Remove</div>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($carts as $cart)
                  <tr>
                    <th scope="row" class="border-0">
                      <div class="p-2">
                        <img src="/{{ $cart->gambar }}" alt="" width="70" class="img-fluid rounded shadow-sm">
                        <div class="ml-3 d-inline-block align-middle">
                          <h5 class="mb-0"> <a href="#" class="text-dark d-inline-block align-middle">{{ $cart->name }}</a></h5><span class="text-muted font-weight-normal font-italic d-block">Jenis: {{ $cart->jenis }}</span>
                        </div>
                      </div>
                    </th>
                    <td class="border-0 align-middle"><strong>{{ $cart->pricetag }}</strong></td>
                    <td class="border-0 align-middle"><strong>{{ $cart->jumlah }}</strong></td>
                    <td class="border-0 align-middle"><a href="#" class="text-dark"><i class="fa fa-trash"></i>hapus</a></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <div>
                  <button class="btn btn-info">Checkout</button>
                </div>
            </div>
            <!-- End -->
          </div>
        </div>
  
      </div>
    </div>
  </div>
@endsection
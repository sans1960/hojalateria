@extends('layouts.app')
@section('title')
     {{ $product->name }}
@endsection
@section('content')

  <div class="container">
    <div class="row mt-3">
        <div class="col-md-6 mx-auto">
            <div class="card mb-3">
                <div class="row g-0">
                  <div class="col-md-4">
                    <img src="{{ asset('storage/producto/'.$product->imagen) }}" class="img-fluid rounded-start" alt="...">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h4 class="card-title">{{ $product->name }}</h4>
                      <p>{{ $product->category->name }}</p>
                      <p>{{ $product->referencia }}</p>
                      <p class="card-text">{{ $product->descripcion }}</p>
                      <div class="row">
                           <div class="col">
                            {{ $product->largo }} metro
                           </div>
                           <div class="col">
                            {{ $product->diametro }} pulgadas
                           </div>
                      </div>
                      <div class="row">
                        <div class="col">
                        ${{ $product->precio}}
                        </div>
                        <div class="col">
                           $ {{ round($product->precio*$product->iva/100,2)}} iva
                            </div>

                   </div>
                         <p class="fw-bold text-danger">TOTAL: $ {{round($product->precio +  $product->precio*$product->iva/100,2)}}</p>
                    </div>
                  </div>
        </div>
        <div class="d-flex justify-content-center mb-5">
            <form action="{{ route('cart.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{ $product->id }}" name="id">
                <input type="hidden" value="{{ $product->name }}" name="name">
                <input type="hidden" value="{{ $product->precio }}" name="price">
                <input type="hidden" value="{{ $product->imagen }}"  name="image">
                <input type="hidden" value="1" name="quantity">
                <button type="submit" class="btn btn-success"><i class="bi bi-cart-plus-fill"></i></button>
            </form>
        </div>


    </div>
    <div class="row mt-5">
        <div class="col-md-4 mt-5 mx-auto d-flex justify-content-center">
            <a class="text-success" href="{{ url()->previous()}}"><i style="font-size: 1.5em" class="bi bi-arrow-left-square-fill"></i></a>

        </div>
    </div>
  </div>
@endsection

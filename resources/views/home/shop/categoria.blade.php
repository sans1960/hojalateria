@extends('layouts.app')
@section('title')
     {{ $categoria->name }}
@endsection
@section('content')

  <div class="container">
    <div class="row">
        <h1 class="text-center">{{ $categoria->name }}</h1>
        @foreach ($products as $product)
            <div class="col-md-3">
                <div class="card mt-2 mb-2" >
                    <img src="{{ asset('storage/producto/'.$product->imagen) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h6 class="card-title fw-bold">{{ $product->name }}</h6>
                      <p class="card-text">$ {{ $product->precio }}.</p>
                      <div class="d-flex justify-content-around align-items-center">
                        <a href="{{ route('home.shop.show',$product) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Mostrar Detalles" class="text-success"><i class="bi bi-eye-fill"  style="font-size: 1.5em;"></i></a>
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
                  </div>
            </div>
        @endforeach
    </div>
  </div>
@endsection

@extends('layouts.app')
@section('title')
    Cart-list
@endsection
@section('content')
<div class="container">
    <div class="row">
        @if(session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div>
    @endif
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <h4 class="text-center">Cart-List</h4>
            <table class="table">
                <thead>
                    <tr>
                        <th>IMG</th>
                        <th>Name</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cartItems as $item)
                    <tr>
                        <td><img width="50" src="{{ asset('storage/producto/'.$item->attributes->image) }}" alt=""></td>
                        <td>{{ $item->name }}</td>
                        <td>
                            <form action="{{ route('cart.update') }}" method="post" class="d-flex justify-content-center">
                                @csrf
                                <input type="hidden" name="id" value="{{ $item->id}}" >
                                <input type="number" class="form-control w-25" name="quantity" id="" value="{{ $item->quantity }}">
                                <button type="submit" class="ms-5 btn btn-success btn-sm">update</button>
                            </form>
                            </td>
                        <td>${{ $item->price }}</td>
                        <td class="">
                            <form action="{{ route('cart.remove') }}" method="POST">
                              @csrf
                              <input type="hidden" value="{{ $item->id }}" name="id">
                              <button class="btn btn-danger btn-sm">remove</button>
                          </form>

                          </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
             <div class="row mt-5">
                <div class="col-md-6 mt-5 d-flex justify-start">

                        <h5 class=" fw-bold text-success">  Total: $ {{ Cart::getTotal() }}</h5>


                </div>
                <div class="col-md-6 mt-5 d-flex justify-content-end">
                    <form action="{{ route('cart.clear') }}" method="POST">
                        @csrf
                        <button class="btn btn-danger ">Remove All Cart</button>
                      </form>
                </div>
             </div>
        </div>
    </div>
</div>

@endsection

@extends('layouts.admin')
@section('title')
    Show
@endsection
@section('content')
<div class="container mt-3">
    <div class="row mt-3">
        <div class="col-md-6 mx-auto">
            <div class="card mb-3">
                <div class="row g-0">
                  <div class="col-md-4">
                    <img src="{{ asset('storage/producto/'.$producto->imagen) }}" class="img-fluid rounded-start" alt="...">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h4 class="card-title">{{ $producto->name }}</h4>
                      <p>{{ $producto->category->name }}</p>
                      <p>{{ $producto->referencia }}</p>
                      <p class="card-text">{{ $producto->descripcion }}</p>
                      <div class="row">
                           <div class="col">
                            {{ $producto->largo }}
                           </div>
                           <div class="col">
                            {{ $producto->diametro }} pulgadas
                           </div>
                      </div>
                      <div class="row">
                        <div class="col">
                        ${{ $producto->precio}}
                        </div>
                        <div class="col">
                            iva {{ $producto->iva}} %
                            </div>

                   </div>

                    </div>
                  </div>
                </div>
              </div>
        </div>
    </div>
</div>
@endsection

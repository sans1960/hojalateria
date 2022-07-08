@extends('layouts.admin')
@section('title')
    Productos-Edit
@endsection
@section('content')
<div class="container">
<div class="row">
    <div class="col-md-12 mx-auto">
        <div class="card">
            <div class="card-header text-center bg-primary fw-bold text-white">
                Edit Producto
            </div>
            <div class="card-body">
                <form action="{{ route('admin.productos.update',$producto) }}" method="post" enctype="multipart/form-data" >
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <div class="col">
                            <input type="text" name="referencia" id="" class="form-control" value="{{ $producto->referencia }}">
                        </div>
                        <div class="col">
                            <input type="text" name="name" id="" class="form-control" value="{{ $producto->name }}">
                        </div>
                        <div class="col">
                            <select class="form-select"  name="category_id">
                                <option>Escoje</option>
                                <option value="">-------</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach

                              </select>
                        </div>

                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <textarea name="descripcion" id=""  cols="30" rows="10" class="form-control">
                                {!! $producto->descripcion !!}
                            </textarea>
                        </div>
                        <div class="col">
                            <textarea name="comentarios" id="" cols="30" rows="10" class="form-control">
                                 {!! $producto->comentarios !!}
                            </textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 mx-auto">
                            <img  id="preview-image-before-upload" class="img-fluid d-block mx-auto" src="{{ asset('storage/producto/'.$producto->imagen) }}" alt="">
                        </div>
                    </div>
                    <div class="row mb-3">
                         <div class="col">
                            <label for="image" class="form-label">Imagen</label>
                            <input class="form-control" name="imagen" type="file" id="image">

                         </div>
                    </div>
                    <div class="row mb-3">
                         <div class="col">
                            <input type="number" name="largo" id="" class="form-control" value="{{ $producto->largo }}">
                         </div>
                         <div class="col">
                            <input type="number" step="any" name="diametro" id="" class="form-control" value="{{ $producto->diametro }}">
                         </div>
                         <div class="col">
                            <input type="number" name="precio" id="" step="any" class="form-control" value="{{ $producto->precio }}">
                         </div>
                         <div class="col">
                            <input type="number" name="iva" id="" class="form-control" value="{{ $producto->iva }}">
                         </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 mx-auto">
                        <button type="submit" class="btn btn-primary d-block mx-auto"> <i class="bi bi-plus-circle"></i></button>
                    </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>


</div>
@endsection
@section('js')
<script type="text/javascript">

    $(document).ready(function (e) {


       $('#image').change(function(){

        let reader = new FileReader();

        reader.onload = (e) => {

          $('#preview-image-before-upload').attr('src', e.target.result);
        }

        reader.readAsDataURL(this.files[0]);

       });

    });

    </script>
@endsection

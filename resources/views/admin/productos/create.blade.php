@extends('layouts.admin')
@section('title')
    Productos-Create
@endsection
@section('content')
<div class="container">
<div class="row">
    <div class="col-md-12 mx-auto">
        <div class="card">
            <div class="card-header text-center bg-primary fw-bold text-white">
                Add Producto
            </div>
            <div class="card-body">
                <form action="{{ route('admin.productos.store') }}" method="post" enctype="multipart/form-data" >
                    @csrf
                    <div class="row mb-3">
                        <div class="col">
                            <input type="text" name="referencia" id="" class="form-control">
                        </div>
                        <div class="col">
                            <input type="text" name="name" id="" class="form-control" placeholder="Name" autofocus>
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
                            <textarea name="descripcion" id="" cols="30" rows="10" class="form-control">
                                descripcion
                            </textarea>
                        </div>
                        <div class="col">
                            <textarea name="comentarios" id="" cols="30" rows="10" class="form-control">
                                comentarios
                            </textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 mx-auto">
                            <img  id="preview-image-before-upload" class="img-fluid d-block mx-auto" src="https://cdn.pixabay.com/photo/2022/02/22/17/25/stork-7029266_960_720.jpg" alt="">
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
                            <input type="number" name="largo" id="" class="form-control" placeholder="largo">
                         </div>
                         <div class="col">
                            <input type="number" step="any" name="diametro" id="" class="form-control" placeholder="diametro">
                         </div>
                         <div class="col">
                            <input type="number" name="precio" id="" step="any" class="form-control" placeholder="precio">
                         </div>
                         <div class="col">
                            <input type="number" name="iva" id="" class="form-control" placeholder="iva">
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

@extends('layouts.admin')
@section('title')
    Categories-Edit
@endsection
@section('content')
<div class="container">
<div class="row">
    <div class="col-md-10 mx-auto">
        <div class="card">
            <div class="card-header text-center bg-primary fw-bold text-white">
                Edit Category
            </div>
            <div class="card-body">
                <form action="{{ route('admin.categories.update',$category) }}" method="post" >
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <div class="col">
                            <input type="text" name="name" id="" class="form-control" value="{{ $category->name }}">
                        </div>




                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 mx-auto">
                        <button type="submit" class="btn btn-primary d-block mx-auto"><i class="bi bi-save"></i></button>
                    </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>


</div>
@endsection

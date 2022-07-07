@extends('layouts.admin')
@section('title')
    Categories
@endsection
@section('content')
<div class="container d-flex justify-content-around">
    <h4>Categories</h4>
    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary ">Add</a>


</div>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <table class="table table-success table-striped">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th colspan="3">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td>
                                <a class="btn btn-success btn-sm" href="{{ route('admin.categories.edit',$category) }}">
                                edit
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('admin.categories.destroy',$category) }}" method="post">
                                  @csrf
                                  @method('delete')
                                  <button class="btn btn-danger btn-sm" type="submit">delete</button>
                              </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection

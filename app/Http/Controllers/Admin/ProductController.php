<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Product::all();
        return view('admin.productos.index',compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.productos.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->imagen->store('producto', 'public');
        $producto = new Product();
        $producto->name = $request->name;
        $producto->imagen = $request->imagen->hashName();
        $producto->slug = Str::slug($request->name);
        $producto->category_id = $request->category_id;
        $producto->referencia = $request->referencia;
        $producto->descripcion = $request->descripcion;
        $producto->comentarios = $request->comentarios;
        $producto->largo = $request->largo;
        $producto->diametro = $request->diametro;
        $producto->precio = $request->precio;
        $producto->iva = $request->iva;
        $producto->save();
        return redirect()->route('admin.productos.index')->with('message','Producto creaado') ;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $producto)
    {
        return view('admin.productos.show',compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $producto)
    {
        $categories = Category::all();
        return view('admin.productos.edit',compact('producto','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $producto)
    {
        if($request->hasFile('imagen')){
            unlink(storage_path('app/public/producto/'.$producto->imagen));
            $request->imagen->store('producto','public');
            $producto->imagen = $request->imagen->hashName();
        }
        $producto->name = $request->name;
        $producto->slug = Str::slug($request->name);
        $producto->category_id = $request->category_id;
        $producto->referencia = $request->referencia;
        $producto->descripcion = $request->descripcion;
        $producto->comentarios = $request->comentarios;
        $producto->largo = $request->largo;
        $producto->diametro = $request->diametro;
        $producto->precio = $request->precio;
        $producto->iva = $request->iva;
        $producto->update();
        return redirect()->route('admin.productos.index')->with('message','Producto actualizado') ;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $producto)
    {
        if(file_exists(storage_path('app/public/producto/'.$producto->imagen))){
            unlink(storage_path('app/public/producto/'.$producto->imagen));

        }
        $producto->delete();
        return redirect()->route('admin.productos.index')->with('message','Producto Eliminado');
    }
}

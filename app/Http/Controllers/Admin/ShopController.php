<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class ShopController extends Controller
{
    public function index(){

        $products = Product::all();
        return view('home.shop.index',compact('products'));
    }
    public function category(Category $categoria){
        $products = Product::where('category_id',$categoria->id)->get();
        return view('home.shop.categoria',compact('products','categoria'));
    }
    public function showProduct(Product $product){
        return view('home.shop.show',compact('product'));

    }
}

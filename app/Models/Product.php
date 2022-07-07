<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name','slug','descripcion','comentarios','imagen','category_id','largo','diametro','precio','iva'];
    public function getRouteKeyName(){
        return 'slug';
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
}

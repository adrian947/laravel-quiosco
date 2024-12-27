<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($categorieId){
        return ProductResource::collection(Product::where('categorie_id', $categorieId)->get());
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategorieResource;
use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function index(){
        // return response()->json(['categories' => Categorie::all()]);

        return CategorieResource::collection(Categorie::all());

    }
}

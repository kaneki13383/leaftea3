<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function all(){
        return Product::all();
    }

    public function get($id){
        return Product::find($id);
    }
}

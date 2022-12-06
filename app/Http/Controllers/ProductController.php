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
    public function index($id){
        return Product::find($id);
    }
    public function editProduct(Request $request)
    {
        $id = $request->input('id');
        $name_product = $request->input('name_product');
        $price = $request->input('price');
        $discription = $request->input('discription');
        $discription2 = $request->input('discription2');
     

        DB::table('products')->where('id',$id)->update([
            'name_product' => $name_product,
            'price' => $price,
            'discription' => $discription,
            'discription2' => $discription2,
         ]);
    }
    public function get($id){
        return Product::find($id);
    }
}

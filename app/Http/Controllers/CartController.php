<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function addCart(Request $request)
    {
        $id_user = $request->input('id_user');
        $id_product = $request->input('id_product');
        $count = $request->input('count');
        $summ = $request->input('summ');

        DB::table('carts')->insert([
            'id_user' => $id_user,
            'id_product' => $id_product,
            'count' => $count,
            'summ' => $summ
        ]);
    }

    public function getProduct(Request $request)
    {
        $id_user = $request->input('id_user');
        
        return DB::table('carts')->select('id', 'id_product', 'count', 'summ')->where('id_user', '=', $id_user)->get();
    }

    public function product(Request $request){
        $id = $request->input('id_products');
        $id = explode(',',$id);
        // dd($id);
        $products = [];
        for($i = 0; $i < count($id); $i++){
            array_push($products,Product::find($id[$i]));
        }
        return $products;
    }

    public function delcart($id){
        Cart::find($id)->delete();
    }
}

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
        $sql = DB::table('carts')->select('id_product')->where('id_user', '=', $id_user)->get();
        $sql_count = DB::table('carts')->where('id_product',$id_product)->first();

        foreach($sql as $item){
            if($id_product ==  $item->id_product){

                $count += $sql_count->count;
                $summ += $sql_count->summ;
                DB::table('carts')->where('id_user', '=', $id_user)->where('id_product',$id_product)->update([
                    'count' => $count,
                    'summ' => $summ
                ]);
                return response()->json(['message' => 'Товар обновился']);
            } 
        }

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
        return DB::table('carts')->select('summ')->where('id', '=', $id)->get();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    public function add_order(Request $request)
    {
        $id_user = $request->input('id_user');
        $id_products = $request->input('id_products');
        $adress = $request->input('adress');
        $total = $request->input('total');
        $count = $request->input('count');
        $summ = $request->input('summ');

        $id_products = explode(',',$id_products);
        $count = explode(',', $count);
        $summ = explode(',', $summ);

        for($i = 0; $i < count($id_products); $i++){
            DB::table('orders')->insert([
                'id_user' => $id_user,
                'id_product' => $id_products[$i],
                'summ' => $summ[$i],
                'count' => $count[$i],
                'total' => $total,
                'adress' => $adress
            ]);
        }  
        
        DB::table('carts')->where('id_user',$id_user)->delete();
    }

    public function output_order(Request $request)
    {
        $id_user = $request->input('id_user');

        return DB::table('orders')->where('id_user',$id_user)->get();
    }

    public function output_all_order()
    {
        return Orders::all();
    }

    public function setStatus(Request $request)
    {
        $status = $request->input('status');
        $id_product = $request->input('id_product');

        DB::table('orders')->where('id_product',$id_product)->update([
            'status' => $status
        ]);

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AddProductController extends Controller
{
    public function addproduct(Request $request){
           
        $fileName = $request->file->getClientOriginalName();  

        $name_product = $request->input('name_product');
        $price = $request->input('price');
        $discription = $request->input('discription');
     
        $request->file->move(public_path('products'), $fileName);

        DB::table('products')->insert([
            'name_product' => $name_product,
            'price' => $price,
            'discription' => $discription,
            'img' => '../products/'.$fileName
         ]);

        // DB::table('users')
        //     ->where('id', "=", $request->input('id'))
        //     ->update(['avatar' => '../products/'.$fileName]);  
     
        return back()
            ->with('success','You have successfully upload file.')
            ->with('file', $fileName);
    }
}

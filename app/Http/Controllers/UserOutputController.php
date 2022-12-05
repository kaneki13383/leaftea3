<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserOutputController extends Controller
{
    public function all(){
        return User::all();
    }

    public function find_user(Request $request){
        $id = $request->input('id_user');
        $id = explode(',',$id);
        // dd($id);
        $products = [];
        for($i = 0; $i < count($id); $i++){
            array_push($products,User::find($id[$i]));
        }
        return $products;
    }
}

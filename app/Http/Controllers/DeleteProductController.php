<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeleteProductController extends Controller
{
    public function delete($id){
        DB::table('products')->where('id', '=', $id)->delete();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    public function addreview(Request $request){
        
        $review = $request->input('review');
        $name_user = $request->input('name_user');
        $img_user = $request->input('avatar');


        DB::table('reviews')->insert([
            'name_user' => $name_user,
            'img_user' => $img_user,
            'review' => $review,
        ]);
    }

    public function getreview(){
        return Review::all();
    }

    public function deletereview($id){
        DB::table('reviews')->where('id', '=', $id)->delete();
    }
}

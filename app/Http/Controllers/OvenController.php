<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Oven;
use Illuminate\Http\Request;

class OvenController extends Controller
{
    public function getOven(Request $request){
        Oven::oven($request->slug);

    }

    public function cardOven(Request $request){
        dump($request);
        $cards= Category::card($request->id);
        return view('home',['cards'=>$cards]);
    }
}

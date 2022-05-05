<?php

namespace App\Http\Controllers;

use App\Models\Call;
use App\Models\Category;
use App\Models\Oven;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function cardOven(Request $request){
      //  dump($request);
        return view('home',['cards'=>Category::card($request->slug)]);
    }
    public function call(Request $request){

        Call::create([
              'name'=>$request->input('name'),
              'phone'=>$request->input('phone'),
     ]);
      // return dump($request->phone);
       return redirect()->back();
    }
    public function getOven(Request $request){
        return view('ovennfo',['ovens'=>Oven::oven($request->slug)]);
    }
}

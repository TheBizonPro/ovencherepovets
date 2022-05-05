<?php

namespace App\Http\Controllers;
use App\Models\Call;
use Illuminate\Http\Request;

class CallContrller extends Controller
{
    public function callCreate(Request $request){
        Call::create([

        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Unitmodel;
use Illuminate\Http\Request;

class VendController extends Controller
{
    public function otc_create(){
        return view('vend.otc');
    }
    public function unit_create(){
       
        return view('vend.unit');
    }
    
    public function purchage(Request $request){
        return dd($request);
    }
}

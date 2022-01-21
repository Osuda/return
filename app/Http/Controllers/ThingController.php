<?php

namespace App\Http\Controllers;

use App\Thing;
use Illuminate\Http\Request;

class ThingController extends Controller


{
  public function register(Thing $thing)
    {
        return view('register');  
    }  
    
  public function things(Thing $thing)
    {
        return view('things')->with(['things' => $thing->get()]);  
    }
    
  public function sums(Thing $thing)
    {
        return view('sums');  
    }  
    
     
}



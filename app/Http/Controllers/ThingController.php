<?php

namespace App\Http\Controllers;

use App\Thing;
use App\Sum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ThingController extends Controller


{
  public function register(Thing $thing)
    {
        return view('register');  
    }  
    
    
  public function things(Thing $thing)
    {
        $things = DB::table('things')->where('type', 'object')->get();
        $sums = DB::table('things')->where('type', 'money')->get();
        return view('things')->with(['things' => $things, 'sums' => $sums]);

    } 
    
  
    
  public function sums(Thing $thing)
    {
        return view('sums');  
    }  
    
  public function show(Thing $thing)
    {
        return view('show')->with(['thing' => $thing]);
    }  
    
  public function store(Request $request, Thing $thing)
    {
        $input = $request['thing'];
        $input['user_id']=0;
        $thing->fill($input)->save();
        if ('type' == 'money') {
          $sum->fill($input)->save();
        }
        return redirect('things');
    }
    
    public function who(Thing $thing)
    {
        $things = DB::table('things')->where('type', 'object')->where('from_who', $thing)->first();
        $sums = DB::table('things')->where('type', 'money')->where('from_who', $thing)->first();
        return view('who')->with(['things' => $things, 'sums' => $sums]);

    } 
    
  public function delete(Thing $thing)
    {
        $thing->delete();
        return redirect('things');
    }
    
  
}



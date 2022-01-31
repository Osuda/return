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
    
    
  public function things(Thing $thing, Sum $sum)
    {
        $things = $thing->where('type', 'もの')->get();
        $sums = $sum->get();
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
    
  public function store(Request $request, Thing $thing, Sum $sum)
    {
        $input_to_things = $request['thing'];
        $input_to_things['user_id']=0;
        $thing->fill($input_to_things)->save();
        if ($thing->type == 'お金') {
          if ($sum->where('from_who', $thing->from_who)->exists()) {
            //sumsテーブルのデータのうち，from_whoが入力されたfrom_whoと同じ値のデータのcust_sum＋入力したcosts。
            $cust_sum = $sum['cost_sum']->where('from_who', $thing->from_who)+$thing['costs'];
            //上記のデータでアップデート
            $sum['cost_sum'] = update($cost_sum);
          } else {
          $input_to_sums['user_id']=$thing->user_id;
          $input_to_sums['cost_sum']=$thing->costs;
          $input_to_sums['from_who']=$thing->from_who;
          $sum->fill($input_to_sums)->save();
          }
        }
        return redirect('things');
    }
    
    public function who($who, Thing $thing, Sum $sum)
    {
        $things = $thing->where('from_who', $who)->get();
        $sum_data = $sum->firstWhere('from_who', $who);
        return view('who')->with(['things' => $things, 'sum' => $sum_data, 'who' => $who]);

    } 
    
  public function delete(Thing $thing)
    {
        $thing->delete();
        return redirect('things');
    }
    
  
}



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
        $sums_cost = $sum->sum('cost_sum');
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
            $sum_data = $sum->firstWhere('from_who', $thing->from_who);
            $thing_costs = $thing->costs;
            $new_cost_sum = $sum_data->cost_sum+$thing_costs;
            $sum_data->fill(['cost_sum' => $new_cost_sum])->save();
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
    
  public function delete(Thing $thing, Sum $sum)
    {
        $thing->delete();
        if ($thing->type == 'お金') {
           if ($sum->where('from_who', $thing->from_who)->exists()) {
            $sum_data = $sum->firstWhere('from_who', $thing->from_who);
            $thing_costs = $thing->costs;
            $new_cost_sum = $sum_data->cost_sum-$thing_costs;
            $sum_data->fill(['cost_sum' => $new_cost_sum])->save();
           }
        }
        //同じfrom_whoのデータがまだある場合，who.{who}に戻るようにしたい。
        //$who = $thing->from_who;
        //return redirect('who/{who}')->with(['who' => $who]);
         return redirect('things');
    }
    
  public function returned(Thing $thing, Sum $sum)
    {
        $things = $thing->onlyTrashed()->whereNotNull('id')->get();
        $sums = $sum->onlyTrashed()->whereNotNull('id')->get();
        return view('returned')->with(['things' => $things, 'sums' => $sums]);
    }
  
   public function returned_show(Thing $thing)
    {
        $thing->onlyTrashed()->whereNotNull('id')->get();
        return view('returned_show')->with(['things' => $things]);
    } 
    
    
  
}



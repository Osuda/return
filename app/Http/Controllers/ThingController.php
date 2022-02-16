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
        $total_count = $sum->sum('cost_sum');
        return view('things')->with(['things' => $things, 'sums' => $sums, 'total_count' => $total_count]);

    } 
    
  public function show(Thing $thing)
    {   
        return view('show')->with(['thing' => $thing]);
    }  
    
  public function store(Request $request, Thing $thing, Sum $sum)
    {
        $input_to_things = $request['thing'];
        $input_to_things['user_id']=0;
        if ($input_to_things['type'] == 'もの') {
         $input_to_things['costs']=0;
        }
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
        $things_total_cost = $things->sum('costs');
        return view('who')->with(['things' => $things, 'sum' => $sum_data, 'who' => $who, 'things_total_cost' => $things_total_cost]);

    } 
    
  public function delete(Thing $thing, Sum $sum)
    {
        if ($thing->type == 'お金') {
          if ($sum->where('from_who', $thing->from_who)->exists()) {
            $sum_data = $sum->firstWhere('from_who', $thing->from_who);
            $thing_costs = $thing->costs;
            $new_cost_sum = $sum_data->cost_sum-$thing_costs;
              if($new_cost_sum == 0) {
                $sum->where('from_who', $thing->from_who)->delete();
              } else {
              $sum_data->fill(['cost_sum' => $new_cost_sum])->save();
              }
          }
        }
        $who = $thing->from_who;
        $thing->delete();
        if ($thing->where('from_who', $thing->from_who)->exists()) {
              return redirect('/things/who/' . $who);
        } else {
              return redirect('things');
        }
        
    }
    
  public function forcedelete(Thing $thing, $thing_id)
    {
      $forcedelete_thing = $thing->onlyTrashed()->find($thing_id);
      $forcedelete_thing->forcedelete();
      return redirect('/things/returned');
    }
    
  public function returned(Thing $thing)
    {
        $things = $thing->onlyTrashed()->get();
        return view('returned')->with(['things' => $things]);
    }
  
   public function returned_show(Thing $thing, $thing_id)
    {
        $thing_data = $thing->onlyTrashed()->find($thing_id);
        return view('returned_show')->with(['thing' => $thing_data]);
    } 
  
}



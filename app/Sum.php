<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sum extends Model
{
            use SoftDeletes;
            
            protected $fillable = [
            
           'id',
           'user_id',
           'cost_sum',
           'from_who',
        ];
        
        
        
        public function getPaginateByLimit(int $limit_count = 3)
    {
    //、limitで件数制限をかける
        return $this->orderBy('id', 'ASC')->paginate($limit_count);
    }
        
}

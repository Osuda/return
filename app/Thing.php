<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class Thing extends Model
{
        use SoftDeletes;
        
        protected $fillable = [
            
           'id',
           'user_id',
           'thing',
           'type',
           'costs',
           'from_who',
           'from_when',
           'to_when',
        ];
        
        
        public function getPaginateByLimit(int $limit_count = 3)
    {
    // updated_atで降順に並べたあと、limitで件数制限をかける
        return $this->orderBy('id', 'ASC')->paginate($limit_count);
    }
        
}


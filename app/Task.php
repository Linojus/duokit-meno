<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /*
    public static function incomplete()
    {
        return static::where('completed', 0)->get();
    }
    */

    //public function scopeIncomplete($query, $val) //leidzia Task::incomplete('fas')
    public function scopeIncomplete($query) //leidzia Task::incomplete()
    {
        return $query->where('completed', 0);
    }


}

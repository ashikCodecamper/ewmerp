<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leaveapplication extends Model
{
    public function employee()
    {
        return $this->belongsTo('App\Leaveapplication');
    }
}

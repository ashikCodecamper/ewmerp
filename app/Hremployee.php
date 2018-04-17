<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hremployee extends Model
{
    public $table = "hremployees";
    protected $guarded =[];
    public function leaveapplications()
    {
        return $this->hasMany('App\Leaveapplication','employee_id');
    }
}

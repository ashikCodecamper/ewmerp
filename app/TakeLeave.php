<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TakeLeave extends Model
{
    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function leavetype()
    {
        return $this->hasOne('App\HrLeaveType', 'id', 'leave_type_id');
    }
}

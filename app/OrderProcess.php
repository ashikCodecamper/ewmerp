<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProcess extends Model
{
    public function dcpstepone()
    {
        return $this->belongsTo('App\Dcpstepone', 'srcno');
    }
}

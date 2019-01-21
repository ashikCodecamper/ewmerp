<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SealFour extends Model
{
    protected $table = 'seal_fours';

    public function dcpone()
    {
        return $this->belongsTo('App\Dcpstepone', 'proto_id', 'id');
    }

    public function rejects()
    {
        return $this->hasMany('App\SealFourReject', 'sealfour_id', 'id');
    }
}

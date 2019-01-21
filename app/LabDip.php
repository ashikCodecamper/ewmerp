<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LabDip extends Model
{
    protected $table = 'labdips';

    public function colors()
    {
        return $this->hasMany('App\LabdipColor', 'labdip_id');
    }

    public function dcp()
    {
        return $this->belongsTo('App\Dcpstepone', 'proto_id', 'id');
    }
}

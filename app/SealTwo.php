<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SealTwo extends Model
{
    protected $table = 'seal_twos';
    protected $gaurded = ['id'];

    public function dcpone()
    {
        return $this->belongsTo('App\Dcpstepone', 'proto_id', 'id');
    }

    public function rejects()
    {
        return $this->hasMany('App\SealtwoReject', 'sealtwo_id', 'id');
    }
}

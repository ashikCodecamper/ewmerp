<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SealOne extends Model
{
    protected $table = "sealones";
    protected $gaurded = ['id'];

    // this editor is really beautiful
    // i want to work with it all the time
    // this is cool ain't it?

    public function dcpone()
    {
    	return $this->belongsTo('App\Dcpstepone', 'proto_id', 'id');
    }

    public function rejects()
    {
      return $this->hasMany('App\SealoneReject','sealone_id', 'id');
    }

}

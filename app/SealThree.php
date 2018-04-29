<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SealThree extends Model
{
  protected $table = "seal_threes";
  protected $gaurded = ['id'];

  public function dcpone()
  {
    return $this->belongsTo('App\Dcpstepone', 'proto_id', 'id');
  }

  public function rejects()
  {
    return $this->hasMany('App\SealthreeReject', 'sealthree_id', 'id');
  }
}

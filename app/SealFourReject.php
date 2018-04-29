<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SealFourReject extends Model
{
  protected $table = "seal_four_rejects";


  public function sealone()
  {
    return $this->belongsTo('App\SealOne', 'id', 'sealfour_id');
  }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DcpStepTwo extends Model
{
  protected $table = "dcp_step_twos";

  public function dcpstepone()
  {
    return $this->belongsTo('App\Dcpstepone', 'source_id', 'id');
  }
}

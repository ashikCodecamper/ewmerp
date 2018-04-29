<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\DcpSeason;
use App\DcpProductCategory;

class Dcpstepone extends Model
{
	protected $table="dcpstepones";

    public function dcpseason()
    {
    	return $this->belongsTo('App\DcpSeason');
    }

    public function dcpsteptwos()
    {
    	return $this->hasMany('App\DcpStepTwo');
    }

    public function orderprocess()
    {
        return $this->hasMany('App\OrderProcess', 'srcno', 'id');
    }
}

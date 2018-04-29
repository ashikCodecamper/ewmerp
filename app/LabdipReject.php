<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LabdipReject extends Model
{
    protected $table = "labdip_rejects";


    public function labdipColor()
    {
    	return $this->belongsTo('App\labdipColor', 'labdip_color_id', 'id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LabdipColor extends Model
{
    public function labdip()
    {
        return $this->belongsTo('App\LabDip');
    }

    // public function step()
    // {
    // 	return $this->hasOne('App\LabdipStep', 'color_id', 'id');
    // }

    public function order_process()
    {
        return $this->belongsTo('App\OrderProcess', 'order_process_id', 'id');
    }

    public function rejects()
    {
        return $this->hasMany('App\LabdipReject', 'labdip_color_id', 'id');
    }
}

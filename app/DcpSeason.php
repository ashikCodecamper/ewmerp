<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DcpSeason extends Model
{
    protected $table = 'dcp_seasons';
    protected $guarded = ['id'];

    public function dcpstepone()
    {
        return $this->belongsTo('App\dcpstepone', 'season_id', 'id');
    }
}

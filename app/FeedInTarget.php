<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeedInTarget extends Model
{
    protected $table = 'feed_in_targets';

    public function dcpone()
    {
        return $this->belongsTo('App\Dcpstepone', 'proto_id', 'id');
    }
}

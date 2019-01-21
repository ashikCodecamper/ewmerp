<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SealtwoReject extends Model
{
    protected $table = 'sealtwo_rejects';

    public function sealone()
    {
        return $this->belongsTo('App\SealTwo', 'id', 'sealtwo_id');
    }
}

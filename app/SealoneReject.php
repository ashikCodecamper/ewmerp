<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SealoneReject extends Model
{
    protected $table = "sealone_rejects";


    public function sealone()
    {
      return $this->belongsTo('App\SealOne', 'id', 'sealone_id');
    }
}

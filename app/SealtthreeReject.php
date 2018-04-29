<?php


namespace App;

use Illuminate\Database\Eloquent\Model;

class SealthreeReject extends Model
{
    protected $table = 'sealtthree_rejects';

    public function sealthree()
    {
      return $this->belongsTo('App\SealThree', 'id', 'sealthree_id');
    }
}

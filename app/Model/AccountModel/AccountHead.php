<?php

namespace App\Model\AccountModel;

use Illuminate\Database\Eloquent\Model;

class AccountHead extends Model
{
    protected $guarded = [
        'id',
    ];

    public function subheads()
    {
    	return $this->hasMany('App\Model\AccountModel\AccountSubHead', 'head_id', 'id');
    }
}

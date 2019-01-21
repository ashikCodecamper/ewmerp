<?php

namespace App\Model\AccountModel;

use Illuminate\Database\Eloquent\Model;

class AccountSubHead extends Model
{
    protected $guarded = [
        'id',
    ];

    public function head()
    {
        return $this->belongsTo('App\Model\AccountModel\AccountHead', 'head_id', 'id');
    }
}

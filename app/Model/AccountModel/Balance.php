<?php

namespace App\Model\AccountModel;

use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    protected $guarded = [
        'id',
    ];
     protected $hidden = ['id', 'created_at', 'updated_at'];
}

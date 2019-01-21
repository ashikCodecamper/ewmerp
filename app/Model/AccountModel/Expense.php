<?php

namespace App\Model\AccountModel;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $guarded = [
        'id',
    ];

    protected $hidden = ['id', 'created_at', 'updated_at'];

    public function head()
    {
        return $this->belongsTo('App\Model\AccountModel\AccountHead', 'head_id', 'id');
    }

    public function party()
    {
        return $this->belongsTo('App\Model\AccountModel\Party', 'party_id', 'id');
    }

    public function subhead()
    {
        return $this->belongsTo('App\Model\AccountModel\AccountSubHead', 'subhead_id', 'id');
    }
}

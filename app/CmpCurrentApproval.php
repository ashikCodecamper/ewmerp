<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CmpCurrentApproval extends Model
{
    protected $table = 'current_approvals';
    protected $gaurded = [
        'id',
    ];

    public function supplier()
    {
        return $this->belongsTo('App\CmpSupplier');
    }
}

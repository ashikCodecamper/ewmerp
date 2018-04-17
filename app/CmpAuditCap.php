<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CmpAuditCap extends Model
{
    protected $table = 'cmp_audit_caps';
    protected $gaurded = [
        'id'
    ];


    public function audit()
    {
        return $this->belongsTo('App\CmpAudit', 'audit_id', 'id');
    }
    

    
    

}

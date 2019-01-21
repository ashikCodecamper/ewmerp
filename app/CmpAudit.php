<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CmpAudit extends Model
{
    protected $table = 'cmp_audits';
    protected $gaurded = [
        'id',
    ];

    public function smeta()
    {
        return $this->belongsTo('App\CmpSmeta', 'smeta_id', 'id');
    }

    public function caps()
    {
        return $this->hasMany('App\CmpAuditCap', 'audit_id', 'id');
    }
}

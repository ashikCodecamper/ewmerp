<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CmpSmeta extends Model
{
    protected $table = 'cmp_smetas';
    protected $gaurded = [
        'id'
    ];

    public function audit()
    {
        return $this->hasOne('App\CmpAudit', 'smeta_id', 'id');
    }
    
    public function supplier()
    {
        return $this->belongsTo('App\CmpSupplier', 'supplier_id', 'id');
    }
}

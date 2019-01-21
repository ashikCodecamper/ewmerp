<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CmpSupplier extends Model
{
    protected $table = 'cmp_suppliers';
    protected $gaurded = [
        'id',
    ];

    public function smeta()
    {
        return $this->hasOne('App\CmpSmeta', 'supplier_id', 'id');
    }

    public function alliance()
    {
        return $this->hasOne('App\CmpAccordAlliance', 'supplier_id', 'id');
    }

    public function approval()
    {
        return $this->hasOne('App\CmpCurrentApproval', 'supplier_id', 'id');
    }
}

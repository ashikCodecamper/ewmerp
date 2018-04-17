<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CmpAccordAlliance extends Model
{
    protected $table = 'cmp_accord_alliances';
    protected $gaurded = [
        'id'
    ];

    public function supplier()
    {
        return $this->belongsTo('App\CmpSupplier');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HrDesignation extends Model
{
    protected $fillable = ['deg_name'];
    protected $table = 'designations';
}

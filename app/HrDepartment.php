<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HrDepartment extends Model

{
	protected $table = 'departments';
    protected $fillable = ['dep_name','description'];
}

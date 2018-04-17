<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmploymentType extends Model
{
    protected $table= "employmenttypes";
    protected $fillable = ['emp_name'];
}

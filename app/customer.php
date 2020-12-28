<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    protected $fillable=["nid","name", "email", "mobile", "address", "student_image"];
}

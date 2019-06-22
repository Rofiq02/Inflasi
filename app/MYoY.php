<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MYoY extends Model
{
    //
    protected $table ="tb_yoy";
    public $timestamps = false;
    protected $guarded = ['kd_YoY'];
}

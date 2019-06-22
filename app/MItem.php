<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MItem extends Model
{
    //
    protected $table ="tb_item";
    public $timestamps = false;
    protected $guarded = ['kd_item'];
}


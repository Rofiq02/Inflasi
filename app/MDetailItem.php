<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MDetailItem extends Model
{
    //
    protected $table ="tb_detail_item";
    public $timestamps = false;
    protected $guarded = ['id'];
}


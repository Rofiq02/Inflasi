<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MBulanan extends Model
{
    //
    protected $table ="tb_inflasi_bulanan";
    public $timestamps = false;
    protected $guarded = ['kd_inflasi'];
}

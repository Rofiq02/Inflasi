<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MBulan extends Model
{
    //
    protected $table ="tb_bulan";
    public $timestamps = false;
    protected $guarded = ['kd_bulan'];
}

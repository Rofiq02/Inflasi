<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MTahunKalender extends Model
{
    //
    protected $table ="tb_tahun_kalender";
    public $timestamps = false;
    protected $guarded = ['kd_kalender'];
}

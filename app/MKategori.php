<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MKategori extends Model
{
    //
    protected $table ="tb_kategori";
    public $timestamps = false;
    protected $guarded = ['kd_kategori'];
}

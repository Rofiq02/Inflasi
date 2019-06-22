<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MInflasiKategori extends Model
{
    //
    protected $table ="tb_inflasi_kategori";
    public $timestamps = false;
    protected $guarded = ['id'];
}

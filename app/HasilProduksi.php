<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HasilProduksi extends Model
{
    public $primaryKey  = 'id_produksi';
    public $table = 'produksi';
    protected $fillable = ['tgl','id_barang','first_qty','qty','reject_qty'];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    public $primaryKey  = 'id_barang';
    protected $fillable = ['nama_barang','warna'];
}

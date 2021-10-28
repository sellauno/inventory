<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HasilProduksiController extends Controller
{
    public function toHasilProduksi()
    {
        return view('hasilproduksi');
    }
}

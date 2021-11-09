<?php

namespace App\Http\Controllers;

use App\Pembelian;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    public function toPembelian()
    {
        $data = Pembelian::all();
        return view('pembelian', ['pembelian' => $data]);
    }

    public function add()
    {
        return view('pembelianadd');
    }

    public function create(Request $request)
    {
        Pembelian::create([
            'tgl_pembelian' => $request->tgl_pembelian,
            'id_barang' => $request->id_barang,
            'id_aksesoris' => $request->id_aksesoris,
            'jml_pembelian' => $request->jml_pembelian,
            'total_harga' => $request->total_harga
        ]);
        return redirect('/pembelian');
    }

    public function edit($id)
    {
        $data = Pembelian::find($id);
        return view('pembelianedit', ['pembelian' => $data]);
    }

    public function update($id, Request $request)
    {
        $pembelian = Pembelian::find($id);
        $pembelian->tgl_pembelian = $request->tgl_pembelian;
        $pembelian->id_barang = $request->id_barang;
        $pembelian->id_aksesoris = $request->id_aksesoris;
        $pembelian->jml_pembelian = $request->jml_pembelian;
        $pembelian->total_harga = $request->total_harga;
        $pembelian->save();
        return redirect('/pembelian');
    }

    public function delete($id)
    {
        $pembelian = Pembelian::find($id);
        $pembelian->delete();
        return redirect('/pembelian');
    }
}

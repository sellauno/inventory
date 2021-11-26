<?php

namespace App\Http\Controllers;

use App\Pembelian;
use App\Barang;
use App\Aksesoris;
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
        $data = Barang::all();
        $data2 = Aksesoris::all();
        return view('pembelianadd', ['barang' => $data, 'aksesoris' => $data2, 'id' => null]);
    }

    public function create(Request $request)
    {
        Pembelian::create([
            'tgl_pembelian' => $request->tgl_pembelian,
            'id_barang' => $request->id_barang,
            'id_aksesoris' => $request->id_aksesoris,
            'id_produksi' => $request->id_produksi,
            'jml_pembelian' => $request->jml_pembelian,
            'total_harga' => $request->total_harga,
            'no_pembelian' => $request->no_pembelian
        ]);
        // return redirect('/pembelian');
        echo '<script type="text/javascript">'
  		   , 'history.go(-2);'
  		   , '</script>';
    }

    public function edit($id)
    {
        $data = Pembelian::find($id);
        $data2 = Barang::all();
        $data3 = Aksesoris::all();
        return view('pembelianedit', ['pembelian' => $data, 'barang' => $data2, 'aksesoris' => $data3]);
    }

    public function update($id, Request $request)
    {
        $pembelian = Pembelian::find($id);
        $pembelian->tgl_pembelian = $request->tgl_pembelian;
        $pembelian->id_produksi = $request->id_produksi;
        $pembelian->id_barang = $request->id_barang;
        $pembelian->id_aksesoris = $request->id_aksesoris;
        $pembelian->jml_pembelian = $request->jml_pembelian;
        $pembelian->total_harga = $request->total_harga;
        $pembelian->no_pembelian = $request->no_pembelian;
        $pembelian->save();
        // return redirect('/pembelian');
        echo '<script type="text/javascript">'
  		   , 'history.go(-2);'
  		   , '</script>';
    }

    public function delete($id)
    {
        $pembelian = Pembelian::find($id);
        $pembelian->delete();
        // return redirect('/pembelian');
        return back();
    }

    public function addFromOrder($id, $brg, $acc, $no)
    {
        $data = Barang::all();
        $data2 = Aksesoris::all();
        return view('pembelianadd', [
            'barang' => $data,
            'aksesoris' => $data2, 
            'id' => $id,
            'brg' => $brg,
            'acc' => $acc,
            'no' => $no,            
        ]);
    }
}

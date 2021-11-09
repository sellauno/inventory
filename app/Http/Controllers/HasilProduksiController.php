<?php

namespace App\Http\Controllers;

use App\HasilProduksi;
use App\Barang;
use Illuminate\Http\Request;

class HasilProduksiController extends Controller
{
    public function toHasilProduksi()
    {
        $data = HasilProduksi::all();        
        $data2 = Barang::all();
        return view('hasilproduksi', ['produksi' => $data, 'barang' => $data2]);
    }

    public function add()
    {
        $data = Barang::all();
        return view('hasilproduksiadd', ['barang' => $data]);
    }

    public function create(Request $request)
    {
        HasilProduksi::create([
            'tgl' => $request->tgl,
            'id_barang' => $request->id_barang,
            'first_qty' => $request->first_qty,
            'qty' => $request->qty,
            'reject_qty' => $request->reject_qty
        ]);
        return redirect('/hasilproduksi');
    }

    public function edit($id)
    {
        $data = HasilProduksi::find($id);
        $data2 = Barang::all();
        return view('hasilproduksiedit', ['produksi' => $data, 'barang' => $data2]);
    }

    public function update($id, Request $request)
    {
        $produksi = HasilProduksi::find($id);
        $produksi->tgl = $request->tgl;
        $produksi->id_barang = $request->id_barang;
        $produksi->first_qty = $request->first_qty;
        $produksi->qty = $request->qty;
        $produksi->reject_qty = $request->reject_qty;
        $produksi->save();
        return redirect('/hasilproduksi');
    }

    public function delete($id)
    {
        $produksi = HasilProduksi::find($id);
        $produksi->delete();
        return redirect('/hasilproduksi');
    }

    public function detail($id)
    {
        $data = HasilProduksi::find($id);   
        $data2 = Barang::all();
        return view('hasilproduksidetail', ['produksi' => $data, 'barang' => $data2]);
    }
}

<?php

namespace App\Http\Controllers;
use App\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function toBarang()
    {
        $data = Barang::all();
        return view('barang', ['barang' => $data]);
    }
    public function add()
    {
        return view('barangadd');
    }

    public function create(Request $request)
    {
        Barang::create([
            'nama_barang' => $request->nama_barang,
            'warna' => $request->warna
        ]);
        return redirect('/barang');
    }

    public function edit($id)
    {
        $data = Barang::find($id);
        return view('barangedit', ['barang' => $data]);
    }

    public function update($id, Request $request)
    {
        $barang = barang::find($id);
        $barang->nama_barang = $request->nama_barang;
        $barang->warna = $request->warna;
        $barang->save();
        return redirect('/barang');
    }

    public function delete($id)
    {
        $barang = barang::find($id);
        $barang->delete();
        return redirect('/barang');
    }
}

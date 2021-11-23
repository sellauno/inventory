<?php

namespace App\Http\Controllers;

use App\HasilProduksi;
use App\Order;
use App\Pembelian;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use \Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function toOrderDetail($id)
    {
        $data = Order::find($id);
        // $data2 = DB::table('barang')
        //     ->rightjoin('hasilproduksi', 'hasilproduksi.id_barang', '=', 'barang.id_barang')
        //     ->leftjoin('kebutuhan', 'kebutuhan.id_barang', '=', 'barang.id_barang')
        //     ->select('hasilproduksi.*', 'barang.*', 'kebutuhan.id_barang', 'kebutuhan.jumlah')
        //     ->where('hasilproduksi.id_order', '=', $id)
        //     ->get();
        $data2 = DB::table('barang')
            ->rightjoin('hasilproduksi', 'hasilproduksi.id_barang', '=', 'barang.id_barang')
            ->select('hasilproduksi.*', 'barang.*')
            ->where('hasilproduksi.id_order', '=', $id)
            ->get();
        $datax = DB::table('hasilproduksi')->where('id_order', '=', $id);
        $data3 = DB::table('pembelian')
            ->joinSub($datax, 'hasilproduksi', function ($join) {
                $join->on('pembelian.id_produksi', '=', 'hasilproduksi.id_produksi');
            })
            ->leftjoin('barang', 'barang.id_barang', '=', 'pembelian.id_barang')
            ->leftjoin('aksesoris', 'aksesoris.id_aksesoris', '=', 'pembelian.id_aksesoris')
            ->select('pembelian.*', 'barang.nama_barang', 'barang.warna', 'aksesoris.nama_aksesoris')
            ->orderBy('pembelian.id_barang')
            ->get();
        $datakbt = DB::table('kebutuhan')
        ->join('hasilproduksi', 'hasilproduksi.id_barang', '=', 'kebutuhan.id_barang')
        ->join('barang', 'barang.id_barang', '=', 'kebutuhan.id_barang')
        ->join('aksesoris', 'aksesoris.id_aksesoris', '=', 'kebutuhan.id_aksesoris')
        ->select('aksesoris.id_aksesoris','aksesoris.nama_aksesoris', 'kebutuhan.*', 'hasilproduksi.id_produksi')
        ->where('hasilproduksi.id_order', '=', $id)
        ->get();
        return view('orderdetail', ['order' => $data, 'produksi' => $data2, 'pembelian' => $data3, 'kebutuhan' => $datakbt]);
    }
    public function add()
    {
        return view('orderadd');
    }

    public function create(Request $request)
    {
        Order::create([
            'kode_order' => $request->kode_order,
            'tgl' => $request->tgl,
            'keterangan' => $request->keterangan
        ]);
        return redirect('/dashboard');
    }

    public function edit($id)
    {
        $data = Order::find($id);
        return view('orderedit', ['order' => $data]);
    }

    public function update($id, Request $request)
    {
        $order = Order::find($id);
        $order->kode_order = $request->kode_order;
        $order->tgl = $request->tgl;
        $order->keterangan = $request->keterangan;
        $order->save();
        return redirect('/dashboard');
    }

    public function delete($id)
    {
        $order = order::find($id);
        $order->delete();
        return redirect('/dashboard');
    }
}

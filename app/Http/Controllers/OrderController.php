<?php

namespace App\Http\Controllers;

use App\HasilProduksi;
use App\Order;
use App\Pembelian;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function toOrderDetail($id)
    {
        $data = Order::find($id);
        $data2 = HasilProduksi::where('id_order', '=', $id)->get();
        $idproduksi = HasilProduksi::select('id_produksi')->where('id_order', '=', $id)->get();
        $data3 = Pembelian::where('id_produksi', '=', $idproduksi)->get();
        return view('orderdetail', ['order' => $data, 'produksi' => $data2, 'pembelian' => $data3]);
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

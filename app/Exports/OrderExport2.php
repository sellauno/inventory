<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Barang;
use App\Order;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use \Illuminate\Support\Facades\DB;

class OrderExport2 implements FromView
{
    protected $id;

    function __construct($id)
    {
        $this->id = $id;
    }

    public function view(): View
    {
        $data = Order::find($this->id);
        $data2 = DB::table('barang')
            ->rightjoin('hasilproduksi', 'hasilproduksi.id_barang', '=', 'barang.id_barang')
            ->select('hasilproduksi.*', 'barang.*')
            ->where('hasilproduksi.id_order', '=', $this->id)
            ->get();
        $datakbt = DB::table('kebutuhan')
            ->join('hasilproduksi', 'hasilproduksi.id_barang', '=', 'kebutuhan.id_barang')
            ->join('barang', 'barang.id_barang', '=', 'kebutuhan.id_barang')
            ->join('aksesoris', 'aksesoris.id_aksesoris', '=', 'kebutuhan.id_aksesoris')
            ->select('aksesoris.id_aksesoris', 'aksesoris.nama_aksesoris', 'kebutuhan.*', 'hasilproduksi.id_produksi')
            ->where('hasilproduksi.id_order', '=', $this->id)
            ->get();
        $data3 = DB::table('pembelian')
            ->join('hasilproduksi', 'pembelian.id_produksi', '=', 'hasilproduksi.id_produksi')
            ->join('aksesoris', 'aksesoris.id_aksesoris', '=', 'pembelian.id_aksesoris')
            ->selectRaw('pembelian.id_barang, pembelian.tgl_pembelian, pembelian.total_harga, pembelian.id_aksesoris, aksesoris.nama_aksesoris, SUM(pembelian.jml_pembelian) as jml_pembelian, SUM(pembelian.jml_pembelian) as jml_pembelian')
            ->groupByRaw('id_aksesoris')
            ->where('hasilproduksi.id_order', '=', $this->id)
            ->get();
        $dataused = DB::table('hasilproduksi')
            ->join('kebutuhan', 'kebutuhan.id_barang', '=', 'hasilproduksi.id_barang')
            ->select('kebutuhan.*')
            ->where('hasilproduksi.id_order', '=', $this->id)
            ->get();
        $dataacc = DB::table('aksesoris')
            ->join('pembelian', 'aksesoris.id_aksesoris', '=', 'pembelian.id_aksesoris')
            ->join('hasilproduksi', 'pembelian.id_produksi', '=', 'hasilproduksi.id_produksi')
            ->select('aksesoris.nama_aksesoris')
            ->where('hasilproduksi.id_order', '=', $this->id)
            ->groupBy('aksesoris.id_aksesoris')
            ->get();
        $datatotal = DB::table('aksesoris')
            ->join('pembelian', 'aksesoris.id_aksesoris', '=', 'pembelian.id_aksesoris')
            ->join('hasilproduksi', 'pembelian.id_produksi', '=', 'hasilproduksi.id_produksi')
            ->selectRaw('SUM(pembelian.jml_pembelian) as jml')
            ->where('hasilproduksi.id_order', '=', $this->id)
            ->groupBy('pembelian.id_aksesoris')
            ->get();
        return view('data', [
            'order' => $data,
            'produksi' => $data2,
            'pembelian' => $data3,
            'kebutuhan' => $datakbt,
            'aksesoris' => $dataacc,
            'total' => $datatotal,
            'used' => $dataused
        ]);
        return view('data2', [
            'order' => $data,
            'produksi' => $data2,
            'pembelian' => $data3,
            'kebutuhan' => $datakbt,
            'aksesoris' => $dataacc,
            'total' => $datatotal,
            'used' => $dataused
        ]);
    }
}

@extends('layouts.pagelayout')

@section('pagetitle', 'Produksi')
@section('sidebar')
<li class="nav-item">
    <a class="nav-link collapsed" href="/dashboard">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
    </a>
</li><!-- End Dashboard Nav -->

<li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#components-nav" href="/barang">
        <i class="bi bi-menu-button-wide"></i><span>Barang</span></i>
    </a>
</li><!-- End Barang Nav -->

<li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#forms-nav" href="/pembelian">
        <i class="bi bi-journal-text"></i><span>Pembelian</span>
    </a>
</li><!-- End Pembelian Nav -->

<li class="nav-item">
    <a class="nav-link " data-bs-target="#tables-nav" href="/hasilproduksi">
        <i class="bi bi-layout-text-window-reverse"></i><span>Produksi</span>
    </a>
</li><!-- End Produksi Nav -->

<li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#icons-nav" href="/aksesoris">
        <i class="bi bi-gem"></i><span>Aksesoris</span>
    </a>
</li><!-- End Aksesoris Nav -->
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Detail Produksi</h5>

        <!-- Horizontal Form -->
        <form>
            @csrf
            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Tanggal</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name="tgl" value="{{$produksi->tgl}}">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Barang</label>
                <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="id_barang">
                        <option>Pilih Barang</option>
                        @foreach($barang as $row)
                        <option <?php if($produksi->id_barang == $row->id_barang) echo "selected"; ?> value="{{$row->id_barang}}">{{$row->nama_barang}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">First Quantity</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="first_qty" value="{{$produksi->first_qty}}">
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Quantity</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="qty" value="{{$produksi->qty}}">
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Reject</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="reject_qty" value="{{$produksi->reject_qty}}">
                </div>
            </div>
            <div class="text-center">
                <a href="/hasilproduksi"><button type="button" class="btn btn-danger">Kembali</button></a>

            </div>
        </form><!-- End Horizontal Form -->
    </div>
</div>

@endsection
@extends('layouts.pagelayout')

@section('pagetitle', 'Pembelian')
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
    <a class="nav-link collapsed" data-bs-target="#tables-nav" href="/hasilproduksi">
        <i class="bi bi-layout-text-window-reverse"></i><span>Produksi</span>
    </a>
</li><!-- End Produksi Nav -->

<li class="nav-item">
    <a class="nav-link " data-bs-target="#icons-nav" href="/aksesoris">
        <i class="bi bi-gem"></i><span>Aksesoris</span>
    </a>
</li><!-- End Aksesoris Nav -->
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Form Tambah Data</h5>

        <!-- Horizontal Form -->
        <form action="/pembelian/update/{{$pembelian->id_pembelian}}" method="post">
            {{csrf_field()}}
            <input type="hidden" name="id" value="{{$pembelian->id_pembelian}}"></br>
            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Tanggal</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="tgl_pembelian" value="{{$pembelian->tgl_pembelian}}">
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Barang</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="id_barang" value="{{pembelian->id_barang}}">
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Aksesoris</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="id_aksesoris" value="{{pembelian->id_aksesoris}}">
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Jumlah</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="jml_pembelian" value="{{pembelian->jml_pembelian}}">
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Total</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="total_harga" value="{{pembelian->total_harga}}">
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
                <a href="/pembelian"><button type="button" class="btn btn-danger">Cancel</button></a>

            </div>
        </form><!-- End Horizontal Form -->

    </div>
</div>

@endsection

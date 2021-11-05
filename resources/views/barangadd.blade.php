@extends('layouts.pagelayout')

@section('pagetitle', 'Barang')
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
        <form action="/barang/create" method="post">
            @csrf
            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama_barang">
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Warna</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="warna">
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Detail</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="detail">
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
                <a href="/barang"><button type="button" class="btn btn-danger">Cancel</button></a>

            </div>
        </form><!-- End Horizontal Form -->

    </div>
</div>

@endsection

@extends('layouts.pagelayout')

@section('pagetitle', 'Dashboard')
@section('sidebar')
<li class="nav-item">
  <a class="nav-link " href="/dashboard">
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
  <a class="nav-link collapsed" data-bs-target="#icons-nav" href="/aksesoris">
    <i class="bi bi-gem"></i><span>Aksesoris</span>
  </a>
</li><!-- End Aksesoris Nav -->
@endsection

@section('content')
<!-- Barang Card -->
<div class="col-xxl-4 col-md-6">
  <div class="card info-card sales-card">

    <div class="card-body">
      <h5 class="card-title">Barang</h5>

      <div class="d-flex align-items-center">
        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
          <i class="bi bi-cart"></i>
        </div>
        <div class="ps-3">
          <h6>15</h6>
          <span class="text-muted small pt-2 ps-1">item</span>

        </div>
      </div>
    </div>

  </div>
</div><!-- End Barang Card -->

<!-- Aksesoris Card -->
<div class="col-xxl-4 col-md-6">
  <div class="card info-card revenue-card">

    <div class="card-body">
      <h5 class="card-title">Aksesoris</h5>

      <div class="d-flex align-items-center">
        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
          <i class="bi bi-currency-dollar"></i>
        </div>
        <div class="ps-3">
          <h6>10</h6>
          <span class="text-muted small pt-2 ps-1">data</span>

        </div>
      </div>
    </div>

  </div>
</div><!-- End Aksesoris Card -->

<!-- Pembelian Card -->
<div class="col-xxl-4 col-xl-12">

  <div class="card info-card customers-card">
    <div class="card-body">
      <h5 class="card-title">Pembelian</h5>

      <div class="d-flex align-items-center">
        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
          <i class="bi bi-people"></i>
        </div>
        <div class="ps-3">
          <h6>1244</h6>
          <span class="text-muted small pt-2 ps-1">data</span>

        </div>
      </div>

    </div>
  </div>

</div><!-- End Pembelian Card -->
<!-- Hasil Produksi Card -->
<div class="col-xxl-4 col-xl-12">

  <div class="card info-card customers-card">
    <div class="card-body">
      <h5 class="card-title">Hasil Produksi</h5>

      <div class="d-flex align-items-center">
        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
          <i class="bi bi-people"></i>
        </div>
        <div class="ps-3">
          <h6>1244</h6>
          <span class="text-muted small pt-2 ps-1">data</span>

        </div>
      </div>

    </div>

  </div><!-- Hasil Produksi -->
</div>

@endsection
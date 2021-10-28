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
  <a class="nav-link " data-bs-target="#forms-nav" href="/pembelian">
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


@endsection
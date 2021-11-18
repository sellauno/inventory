@extends('layouts.pagelayout')

@section('pagetitle', 'Order Detail')
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

<!-- Order Card -->
<div class="col-xxl-4 col-xl-12">

  <div class="card info-card customers-card">
    <div class="card-body">
      <h5 class="card-title">Order</h5>

      <div class="d-flex align-items-center">
        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
          <i class="bi bi-box"></i>
        </div>
        <div class="ps-3">
          <h6>{{$order->tgl}}</h6>
          <span class="text-muted small pt-2 ps-1">{{$order->keterangan}}</span>
        </div>
      </div>
      <br><br>
      <div class="d-flex align-items-center">
        <h6>Produksi</h6>
        <div class="ps-3">
          <a href="/hasilproduksi/add/{{$order->id_order}}">
            <i class="bi bi-plus-circle"></i>
          </a>
        </div>
      </div>
      <!-- Table with stripped rows -->
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Order</th>
            <th scope="col">Barang</th>
            <th scope="col">First Quantity</th>
            <th scope="col">Quantity</th>
            <th scope="col">Reject</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 0; ?>
          @foreach($produksi as $row)
          <tr>
            <th scope="row"><?php $no++;
                            echo $no; ?></th>
            <td>{{$row->id_order}}</td>
            <td>{{$row->id_barang}}</td>
            <td>{{$row->first_qty}}</td>
            <td>{{$row->qty}}</td>
            <td>{{$row->reject_qty}}</td>
            <td><a href="/pembelian/add/{{$row->id_produksi}}">
            <i class="bi bi-plus-circle"></i>
          </a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <!-- End Table with stripped rows -->

      <br><br>
      <h6>Pembelian</h6>
      <!-- Table with stripped rows -->
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Barang</th>
            <th scope="col">Aksesoris</th>
            <th scope="col">Jumlah</th>
            <th scope="col">Total</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 0; ?>
          @foreach($pembelian as $row)
          <tr>
            <th scope="row">1</th>
            <td>Brandon Jacob</td>
            <td>Designer</td>
            <td>28</td>
            <td>2016-05-25</td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <!-- End Table with stripped rows -->
    </div>
  </div>

</div><!-- End Order Card -->


@endsection
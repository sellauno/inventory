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
    <a class="nav-link collapsed" data-bs-target="#icons-nav" href="/aksesoris">
        <i class="bi bi-gem"></i><span>Aksesoris</span>
    </a>
</li><!-- End Aksesoris Nav -->
@endsection

@section('content')

<div class="card info-card customers-card">
    <div class="card-body">
        <br>
        <h6>{{$barang->nama_barang}} ({{$barang->warna}})</h6>
    </div>
</div>
<!-- Default Table -->

@foreach($kebutuhan as $kbt)
<div class="card info-card customers-card">
    <div class="card-body">
        <div>
            <h5 class="card-title">{{$kbt->nama_aksesoris}}</h5>
        </div>
        <!-- Table with stripped rows -->
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 0;
                $purchased = 0;
                $used = 0;
                ?>
                @foreach($pembelian as $row)
                <?php
                if ($kbt->id_aksesoris == $row->id_aksesoris) {
                ?>
                    <tr>
                        <th scope="row"><?php $no++;
                                        echo $no; ?></th>
                        <td>{{$row->tgl_pembelian}}</td>
                        <td>{{$row->jml_pembelian}}</td>
                        <td>{{$row->total_harga}}</td>
                    </tr>
                <?php
                    $purchased += $row->jml_pembelian;
                    $used = ($kbt->jumlah * $produksi->qty) + ($kbt->jumlah * $produksi->reject_qty);
                }
                $left = $purchased - $used;
                ?>
                @endforeach
            </tbody>
        </table>
        <?php
        // if ($no == 0) {
        //   echo "<p>Tidak ada data</p>";
        // }
        ?>

        <div class="d-flex align-items-center">
            <h6><a href="/pembelian/add/{{$produksi->id_produksi}}/{{$produksi->id_barang}}/{{$kbt->id_aksesoris}}/{{$no+=1}}">
                    <i class="bi bi-plus-circle"></i>
                </a></h6>
            <div class="ps-3">
                Tambah Data
            </div>
        </div>
        <br><br>
        <!-- List group With Contextual classes -->
        <ul class="list-group">
            <li class="list-group-item list-group-item-primary">Purchased &nbsp;: {{$purchased}}</li> <br>
            <li class="list-group-item list-group-item-success">Used &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{$used}} </li> <br>
            <li class="list-group-item list-group-item-danger">Estimated Left &nbsp;: {{$left}} </li> <br>
        </ul><!-- End List Group With Contextual classes -->

    </div>
</div>

@endforeach
<!-- End Default Table Example -->


@endsection
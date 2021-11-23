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
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Form Tambah Data</h5>

        <!-- Horizontal Form -->
        <form action="/pembelian/create" method="post">
            @csrf
            <?php if ($id != null) { ?>
                <input type="hidden" name="id_produksi" value="{{$id}}">
            <?php } ?>

            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Tanggal</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name="tgl_pembelian">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Barang</label>
                <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="id_barang">
                        <option selected>Pilih Barang</option>
                        @foreach($barang as $row)
                        <option value="{{$row->id_barang}}">{{$row->nama_barang}} {{$row->warna}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Aksesoris</label>
                <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="id_aksesoris">
                        <option selected>Pilih Aksesoris</option>
                        @foreach($aksesoris as $row)
                        <option value="{{$row->id_aksesoris}}" id="ddacc">{{$row->nama_aksesoris}} </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <input type="hidden" id="harga" value="0">
            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Jumlah</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="jml_pembelian" id="jml_pembelian" onblur="myFunction()">
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Total</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="total_harga" id="total">
                </div>
            </div>
            <script  type="text/javascript">
                function myFunction() {
                    // Declare variables
                    var jml, harga, txtValue;
                    jml = document.getElementById("jml_pembelian");
                    harga = 10;
                    // document.getElementById("harga");

                    txtValue = jml * harga;

                    // Loop through all table rows, and hide those who don't match the search query
                    document.getElementById('total').value = txtValue;
                }
            </script>
            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Nomor Pembelian</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="no_pembelian">
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
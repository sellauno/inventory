<?php
$total1 = 0;
$total2 = 0;
$total3 = 0;
?>
<table>
    <thead>
        <tr>
            <th colspan="2">Item Description</th>
            <th colspan="3">Item Quantity</th>
            @foreach($aksesoris as $acc)
            <th colspan="3">{{$acc->nama_aksesoris}}</th>
            @endforeach
        </tr>
        <tr>
            <th>Item's Type</th>
            <th>Item's Color</th>
            <th>First Qty</th>
            <th>10% Reduced</th>
            <th>Rejected Items</th>
            @foreach($aksesoris as $acc)
            <th>Purchased</th>
            <th>Used</th>
            <th>Estimated Left</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($produksi as $pro)
        <tr>
            <th>{{$pro->nama_barang}}</th>
            <th>{{$pro->warna}}</th>
            <td>{{$pro->first_qty}}</td>
            <td><?php $reduced = $pro->first_qty - (10 / 100 * $pro->first_qty);
                echo $reduced; ?></td>
            <td>{{$pro->reject_qty}}</td>
            <?php
            $total1 += $pro->first_qty;
            $total2 += $reduced;
            $total3 += $pro->reject_qty;
            ?>
            @foreach($pembelian as $beli)
            <td>
                <?php
                if ($beli->id_barang == $pro->id_barang) {
                    echo $beli->total_harga;
                    $unused = $beli->total_harga;
                }else{
                    $unused = null;
                }
                ?>
            </td>
            <td>
                @foreach($used as $u)
                <?php
                if ($pro->id_barang == $u->id_barang && $beli->id_aksesoris == $u->id_aksesoris) {
                    $usedvar = ($pro->qty  * $u->jumlah)+($pro->reject_qty  * $u->jumlah);
                    if($pro->qty != null){
                        echo $usedvar;
                    }                    
                }
                ?>
                @endforeach
            </td>
            <td>
                <?php
                    $left = $unused - $usedvar;
                    if($unused != null){
                        echo $left;
                    }                    
                ?>
            </td>
            @endforeach
        </tr>
        @endforeach
        <tr>
            <th rowspan="2" colspan="2">Total</th>
            <td rowspan="2">{{$total1}}</td>
            <td rowspan="2">{{$total2}}</td>
            <td rowspan="2">{{$total3}}</td>
            @foreach($total as $row)
            <td  rowspan="2">{{$row->jml}}</td>
            @endforeach
        </tr>
    </tbody>
</table>
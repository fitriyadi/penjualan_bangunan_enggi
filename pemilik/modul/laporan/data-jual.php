<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/adminhome">Home</a></li>
        <li class="breadcrumb-item" aria-current="page">Laporan penjualan</li>
    </ol>
</nav>

<?php
    $par1=$_POST['par1'];
    $par2=$_POST['par2'];
?>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h3 class="text-center">Laporan Penjualan</h3>
                <p class="text-center"> Periode <?=tgl_indo($par1);?> sd <?=tgl_indo($par2);?> </p>
                <div class="table-responsive">
                    <table id="" class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama pelanggan</th>
                                <th>No Telepon</th>
                                <th>Jenis Bayar</th>
                                <th>Tanggal</th>
                                <th>Nama Barang</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            $totalall=0;
                            $sql = "SELECT * ,harga*jumlah as subtotal FROM tb_penjualan join tb_pelanggan using(idpelanggan) join tb_item_jual using(idpenjualan) join tb_barang using(idbarang) where tanggal between '$par1' and '$par2'";
                            foreach (_dataGetAll($mysqli, $sql) as $key => $value) :
                                extract($value);
                                $totalall+=$subtotal;
                            ?>
                            <tr>
                                <td><?=$no+=1;?></td>
                                <td><?=$namapelanggan?></td>
                                <td><?=$notelepon?></td>
                                <td><?=$jenisbayar?></td>
                                <td><?=tgl_indo($tanggal)?></td>
                                <td><?=$namabarang?></td>
                                <td><?=number_format($harga,0)?></td>
                                <td><?=$jumlah?></td>
                                <td><?=number_format($subtotal,0)?></td>
                            </tr>
                             <?php endforeach; ?>
                            <tr>
                                <th colspan="8">Total</th>
                                <th><?=number_format($totalall,0)?></th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
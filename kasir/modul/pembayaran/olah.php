<?php
if(isset($_GET['id']))
	extract(_dataGetId($mysqli,"tb_penjualan join tb_pelanggan using(idpelanggan)","idpenjualan='".$_GET['id']."'"));
?>
<?php 
$sudahdibayar=_dataCustom($mysqli,"select sum(dibayar) as dibayar from tb_pembayaran where idpenjualan='$idpenjualan'");
$kekurangan=$total-$sudahdibayar;
?>

<style type="text/css">
    .form-group {
        margin-top: -20px !important;
    }
</style>

<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/home">Home</a></li>
        <li class="breadcrumb-item"><a href="{{batal}}">Data Penjualan</a></li>
        <li class="breadcrumb-item" aria-current="page">Detail</li>
    </ol>
</nav>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Informasi Detail Penjualan</h6>

                <form action="?hal=pembayaran/proses" method="POST" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label for="input" class="col-sm-3 col-form-label">Tanggal</label>
                        <div class="col-sm-3">
                            <input type="date" class="form-control" name="tanggal" value="<?=$tanggal?>"
                                placeholder="Inputkan tanggal" readonly>
                        </div>

                        <label for="input" class="col-sm-3 col-form-label">Nama Pelanggan</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="tanggal" value="<?=$namapelanggan?>"
                                placeholder="Inputkan Nama Supplier" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="input" class="col-sm-3 col-form-label">Jenis Pembayaran</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="tanggal" value="<?=$jenisbayar?>"
                                placeholder="Inputkan tanggal" readonly>
                        </div>

                        <label for="input" class="col-sm-3 col-form-label">Status Bayar</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="tanggal" value="<?=$statusbayar?>"
                                placeholder="Inputkan Nama Supplier" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="input" class="col-sm-3 col-form-label">Total</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="tanggal" value="<?=$total?>"
                                placeholder="Inputkan tanggal" readonly>
                        </div>

                        <label for="input" class="col-sm-3 col-form-label">Dibayar</label>
                        <div class="col-sm-3">
                            <input type="number" class="form-control" name="dibayar" max="<?=$kekurangan?>"
                                placeholder="Inputkan Jumlah Bayar">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="input" class="col-sm-3 col-form-label">Kekurangan</label>
                        <div class="col-sm-3">
                            <input type="number" class="form-control" name="kekurangan" value="<?=$kekurangan?>"
                                placeholder="Inputkan Nama Supplier" readonly>
                        </div>

                        <label for="input" class="col-sm-3 col-form-label">Tanggal</label>
                        <div class="col-sm-3">
                            <input type="date" class="form-control" name="tanggal" value=""
                                placeholder="Inputkan Nama Supplier">
                        </div>
                    </div>

                    <input type="hidden" name="idpenjualan" value="<?=$idpenjualan?>">

                    <div class="form-group row">
                        <div class="col-sm-3 offset-9">
                        <?php if($statusbayar!='Lunas'){ ?>    
                        <input type="submit" class="btn btn-primary mr-2" name="simpan" value="Simpan">
                        <?php } ?>

                            <a class="btn btn-light" href="?hal=pembayaran/data">Batal</a>
                        </div>
                    </div>


                    <hr>
                    <div class="table-responsive">
                        <table id="" class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal Bayar</th>
                                    <th>Dibayar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $totalbayar=0;
                                $no=0;
                            $sql = "SELECT * from tb_pembayaran where idpenjualan='$idpenjualan'";
                            foreach (_dataGetAll($mysqli, $sql) as $key => $value) :
                                extract($value);
                            ?>
                                <tr>
                                    <td><?= $no += 1 ?></td>
                                    <td><?= tgl_indo($tanggal) ?></td>
                                    <td><?= number_format($dibayar,0);$totalbayar+=$dibayar; ?></td>
                                </tr>
                            <?php endforeach; ?>
                            <tr>
                                <th colspan="2">Total</th>
                                <th><?= number_format($totalbayar,0) ?></th>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <hr>
                    <div class="table-responsive">
                    <table id="" class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Subtotal</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            $total=0;
                            $sql = "SELECT *,harga*jumlah as subtotal FROM tb_barang join tb_item_jual using(idbarang) where idpenjualan='$idpenjualan'";
                            foreach (_dataGetAll($mysqli, $sql) as $key => $value) :
                                extract($value);
                            ?>
                                <tr>
                                    <td><?= $no += 1 ?></td>
                                    <td><?= $namabarang ?></td>
                                    <td><?= number_format($harga,0) ?></td>
                                    <td><?= number_format($jumlah,0) ?></td>
                                    <td><?= number_format($subtotal,0);$total+=$subtotal; ?></td>
                                </tr>
                            <?php endforeach; ?>
                            <tr>
                                <th colspan="4">Total</th>
                                <th><?= number_format($total,0) ?></th>
                            </tr>

                        </tbody>
                    </table>
                </div>
                    <hr>
                    <div class="form-group row ">
                        <div class="col-sm-9 offset-9">
                        <a class="btn btn-light" href="?hal=pembayaran/data">Batal</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
if(isset($_GET['id']))
	extract(_dataGetId($mysqli,"tb_pembelian join tb_supplier using(idsupplier)","idpembelian='".$_GET['id']."'"));
?>

<style type="text/css">
    .form-group {
        margin-top: -20px !important;
    }
</style>

<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/home">Home</a></li>
        <li class="breadcrumb-item"><a href="{{batal}}">Data Pembelian</a></li>
        <li class="breadcrumb-item" aria-current="page">Detail</li>
    </ol>
</nav>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Informasi Detail Pembelian</h6>

                <div class="form-group row">
                    <label for="input" class="col-sm-3 col-form-label">Tanggal</label>
                    <div class="col-sm-3">
                        <input type="date" class="form-control" name="tanggal" value="<?=$tanggal?>"
                            placeholder="Inputkan tanggal" readonly>
                    </div>

                    <label for="input" class="col-sm-3 col-form-label">Nama Supplier</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="supplier" value="<?=$namasupplier?>"
                            placeholder="Inputkan Nama Supplier" readonly>
                    </div>

                    <label for="input" class="col-sm-3 col-form-label">No Telepon Supplier</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="supplier" value="<?=$notelepon?>" placeholder="Inputkan No Telepon Supplier" readonly>
                    </div>

                    <label for="input" class="col-sm-3 col-form-label">Alamat Supplier</label>
                    <div class="col-sm-3">
                            <textarea class="form-control" name="alamat" placeholder="Inputkan alamat" rows="3" readonly><?=@$alamat?></textarea>
                    </div>
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
                            $sql = "SELECT *,harga*jumlah as subtotal FROM tb_barang join tb_item_beli using(idbarang) where idpembelian='$idpembelian'";
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
                        <a class="btn btn-light" href="?hal=pembelian/data">Batal</a>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
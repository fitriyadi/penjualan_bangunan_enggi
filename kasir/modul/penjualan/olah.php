<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="?hal=dashboard">Home</a></li>
        <li class="breadcrumb-item"><a href="?hal=penjualan/data">Data penjualan</a></li>
        <li class="breadcrumb-item" aria-current="page">Tambah</li>
    </ol>
</nav>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Transaksi Penjualan</h6>

                <form action="?hal=penjualan/proses" method="POST" enctype="multipart/form-data">

                    <div class="form-group row">
                        <label for="input" class="col-sm-3 col-form-label">Tanggal</label>
                        <div class="col-sm-3">
                            <input type="date" class="form-control" name="tanggal" value="<?=isset($_SESSION['penjualan']['tanggal']) ? $_SESSION['penjualan']['tanggal']:''?>"
                                placeholder="Inputkan tanggal" required>
                        </div>

                        <label for="input" class="col-sm-2 col-form-label">Pilih Barang</label>
                        <div class="col-sm-4">
                            <select 
                                class="form-control js-example-basic-single" 
                                name="idbarang" 
                                required="">
                                <?php
                                $no=0;
                                $sql="SELECT * FROM tb_barang";
                                foreach (_dataGetAll($mysqli,$sql) as $key => $value):
                                    ?>
                                    <option 
                                    value="<?=$value['idbarang']?>" 
                                    <?=isselect(@$idbarang,$value['idbarang'])?>>
                                    <?=$value['namabarang']?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="input" class="col-sm-3 col-form-label">Pilih Pelanggan</label>
                        <div class="col-sm-3">
                            <select 
                                class="form-control js-example-basic-single" 
                                name="idpelanggan" 
                                required="">
                                <?php
                                $no=0;
                                $sql="SELECT * FROM tb_pelanggan";
                                foreach (_dataGetAll($mysqli,$sql) as $key => $value):
                                    ?>
                                    <option 
                                    value="<?=$value['idpelanggan']?>" 
                                    <?=isselect(isset($_SESSION['penjualan']['idpelanggan']) ? $_SESSION['penjualan']['idpelanggan']:'',$value['idpelanggan'])?>>
                                    <?=$value['namapelanggan']?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <label for="input" class="col-sm-2 col-form-label">Jumlah</label>
                        <div class="col-sm-4">
                            <input type="number" class="form-control" name="jumlah" value="1" min="1"
                                placeholder="Inputkan Jumlah Barang">
                        </div>
                    </div>

                    <div class="form-group row ">
                        <label for="input" class="col-sm-3 col-form-label">Pilih Jenis Bayar</label>
                        <div class="col-sm-3">
                            <select class="form-control" name="jenisbayar" required>
                                <option value="Langsung"  
                                <?=isselect(isset($_SESSION['penjualan']['jenisbayar']) ? $_SESSION['penjualan']['jenisbayar']:'',"Langsung")?>
                                >Langsung</option>
                                <option value="Kredit"
                                <?=isselect(isset($_SESSION['penjualan']['jenisbayar']) ? $_SESSION['penjualan']['jenisbayar']:'',"Kredit")?>
                                >Kredit</option>
                            </select>
                        </div>

                        <div class="col-sm-3 offset-3">
                            <input type="submit" class="btn btn-primary mr-2" name="tambahbarang" value="Tambah">
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
                                    $sql = "SELECT tmp_nama,tmp_id,tmp_harga,sum(tmp_jumlah) as tmp_jumlah,sum(tmp_subtotal) as tmp_subtotal FROM tmp_barang where tmp_jenis='Jual' group by tmp_nama,tmp_id,tmp_harga";
                                    foreach (_dataGetAll($mysqli, $sql) as $key => $value) :
                                        extract($value);
                                    $total+=$tmp_subtotal;
                                ?>
                                <tr>
                                    <td><?=$no+=1?></td>
                                    <td><?=$tmp_nama?></td>
                                    <td><?=number_format($tmp_harga,)?></td>
                                    <td><?=$tmp_jumlah?></td>
                                    <td><?=number_format($tmp_subtotal,0)?></td>
                                    <td>
                                        <a <?= _hapus("?hal=penjualan/proses&hapusbarang=$tmp_id") ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                <tr>
                                    <td colspan="4">Total</td>
                                    <th> <?=number_format($total,0)?></th>
                                </tr>
                                <input type="hidden" name="total"
                                    value="<?=$total?>">
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <div class="form-group row ">
                        <div class="col-sm-9 offset-9">    
                        <button type="submit" class="btn btn-primary mr-2" name="simpan" <?=($total==0) ? 'disabled':'';?>>Simpan</button>
                            <a class="btn btn-light" href="?hal=penjualan/data">Batal</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
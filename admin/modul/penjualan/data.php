<nav class="page-breadcrumb">
    <ol class="breadcrumb">
       <li class="breadcrumb-item"><a href="?hal=dashboard">Home</a></li>
       <li class="breadcrumb-item" aria-current="page">Data penjualan</li>
    </ol>
</nav>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">
                <form class="forms-sample" action="?hal=penjualan/data" method="POST">
                    <div class="row">
                     <div class="col-sm-1">Peridoe</div>
                     <div class="col-sm-3">
                       <input type="date" 
                            class="form-control" 
                            name="par1" 
                            value="<?=(isset($_POST['par1']) ? $_POST['par1']:'')?>" 
                            placeholder="Inputkan Parameter 1" 
                            required>
                    </div>
                    <label for="input" class="col-sm-1 col-form-label">s/d</label>
                    <div class="col-sm-3">
                       <input type="date" 
                            class="form-control" 
                            name="par2" 
                            value="<?=(isset($_POST['par2']) ? $_POST['par2']:'')?>"  
                            placeholder="Inputkan Parameter 2" 
                            required>
                     </div>

                    <div class="col-sm-2">
                        <button type="submit" class="btn btn-primary mr-2" name="cari?>">Cari</button>
                        <a class="btn btn-light" href="?hal=penjualan/data">Reset</a>
                    </div>

                  <div class="col-sm-2">    
                  <?= _daftar("?hal=penjualan/olah") ?>
                </div>

                </div>
                </form>
                </h6>

                <div class="table-responsive">
                    <table id="dataTableExample" class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pelanggan</th>
                                <th>No Telepon</th>
                                <th>Tanggal</th>
                                <th>Total</th>
                                <th>Jenis Bayar</th>
                                <th>Status</th>
                                <th>Pengiriman</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            $totalall=0;
                            if (isset($_POST['par1'])):
                                $par1=$_POST['par1'];
                                $par2=$_POST['par2'];
                                $sql = "SELECT * FROM tb_penjualan join tb_pelanggan using(idpelanggan) where tanggal between '$par1' and '$par2'";
                            else:
                                $sql = "SELECT * FROM tb_penjualan join tb_pelanggan using(idpelanggan)";
                            endif;
                            foreach (_dataGetAll($mysqli, $sql) as $key => $value) :
                                extract($value);
                            ?>
                                <tr>
                                    <td><?= $no += 1 ?></td>
                                    <td><?= $namapelanggan ?></td>
                                    <td><?= $notelepon ?></td>
                                    <td><?= tgl_indo($tanggal) ?></td>
                                    <td><?= number_format($total,0);$totalall+=$total; ?></td>
                                    <td><?= label_jenis_bayar($jenisbayar) ?></td>
                                    <td><?= label_status_bayar($statusbayar) ?></td>
                                    <td>
                                        <?php if($statuskirim!='Selesai'){ ?>
                                        <?= _pengiriman("?hal=penjualan/pengiriman&id=$idpenjualan") ?> <hr>
                                        <?php } ?>
                                         <?= $namasopir." - ".$statuskirim ?></td>
                                    <td>
                                        <?= _detail("?hal=penjualan/detail&id=$idpenjualan") ?>
                                        <?= _hapus("?hal=penjualan/proses&hapus=$idpenjualan") ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            <tr>
                                    <th colspan="4">Total</th>
                                    <th colspan="2"><?= number_format($totalall,0) ?></th>
                                   
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
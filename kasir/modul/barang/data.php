<nav class="page-breadcrumb">
    <ol class="breadcrumb">
       <li class="breadcrumb-item"><a href="?hal=dashboard">Home</a></li>
        <li class="breadcrumb-item" aria-current="page">Data Barang</li>
    </ol>
</nav>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

               <h6 class="card-title">Data Barang
                </h6>

                <div class="table-responsive">
                    <table id="dataTableExample" class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Kategori</th>
                                <th>Harga Beli</th>
								<th>Harga Jual</th>
                                <th>Stok</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            $sql = "SELECT * FROM tb_barang join tb_kategori using(idkategori)";
                            foreach (_dataGetAll($mysqli, $sql) as $key => $value) :
                                extract($value);
                            ?>
                                <tr>
                                    <td><?= $no += 1 ?></td>
                                    <td><?= $namabarang ?></td>
                                    <td><?= $namakategori ?></td>
                                    <td><?= number_format($hargabeli,0) ?></td>
                                    <td><?= number_format($hargajual,0) ?></td>
                                    <td><?= label_stok($stok,30); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
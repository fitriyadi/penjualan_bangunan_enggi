<nav class="page-breadcrumb">
    <ol class="breadcrumb">
       <li class="breadcrumb-item"><a href="?hal=dashboard">Home</a></li>
        <li class="breadcrumb-item" aria-current="page">Data Pelanggan</li>
    </ol>
</nav>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

               <h6 class="card-title">Data Pelanggan
                    <?= _daftar("?hal=pelanggan/olah") ?>

                </h6>

                <div class="table-responsive">
                    <table id="dataTableExample" class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pelanggan</th>
                                <th>No Telepon</th>
                                <th>Alamat</th>
                                <th>Email</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            $sql = "SELECT * FROM tb_pelanggan";
                            foreach (_dataGetAll($mysqli, $sql) as $key => $value) :
                                extract($value);
                            ?>
                                <tr>
                                    <td><?= $no += 1 ?></td>
                                    <td><?= $namapelanggan ?></td>
                                    <td><?= $notelepon ?></td>
                                    <td><?= $alamat ?></td>
                                    <td><?= $email ?></td>
                                    <td>
                                        <?= _edit("?hal=pelanggan/olah&id=$idpelanggan") ?>
                                        <?= _hapus("?hal=pelanggan/proses&hapus=$idpelanggan") ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
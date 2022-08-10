<nav class="page-breadcrumb">
    <ol class="breadcrumb">
       <li class="breadcrumb-item"><a href="?hal=dashboard">Home</a></li>
        <li class="breadcrumb-item" aria-current="page">Data Supplier</li>
    </ol>
</nav>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

               <h6 class="card-title">Data Supplier
                    <?= _daftar("?hal=supplier/olah") ?>

                </h6>

                <div class="table-responsive">
                    <table id="dataTableExample" class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Supplier</th>
                                <th>No Telepon</th>
                                <th>Alamat</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            $sql = "SELECT * FROM tb_supplier";
                            foreach (_dataGetAll($mysqli, $sql) as $key => $value) :
                                extract($value);
                            ?>
                                <tr>
                                    <td><?= $no += 1 ?></td>
                                    <td><?= $namasupplier ?></td>
                                    <td><?= $notelepon ?></td>
                                    <td><?= $alamat ?></td>
                                    <td>
                                        <?= _edit("?hal=supplier/olah&id=$idsupplier") ?>
                                        <?= _hapus("?hal=supplier/proses&hapus=$idsupplier") ?>
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
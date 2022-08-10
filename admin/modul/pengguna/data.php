<nav class="page-breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="?hal=dashboard">Home</a></li>
		<li class="breadcrumb-item" aria-current="page">Data Pengguna</li>
	</ol>
</nav>

<div class="row">
	<div class="col-md-12 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
				<h6 class="card-title">Data Pengguna
					<?= _daftar("?hal=pengguna/olah") ?>

				</h6>
				<div class="table-responsive">
					<table id="dataTableExample" class="table">
						<thead>
							<tr>
                                <th>No</th>
                                <th>Nama Pengguna</th>
                                <th>Username</th>
                                <th>Password</th>
								<th>Level</th>
                                <th>#</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 0;
							$sql = "SELECT * FROM tb_pengguna";
							foreach (_dataGetAll($mysqli, $sql) as $key => $value) :
								extract($value);
							?>
								<tr>
									<td><?= $no += 1 ?></td>
									<td><?= $namapengguna ?></td>
                                    <td><?= $username ?></td>
                                    <td><?= $password ?></td>
                                    <td><?= $level ?></td>
									<td>
										<?= _edit("?hal=pengguna/olah&id=$idpengguna") ?>
										<?= _hapus("?hal=pengguna/proses&hapus=$idpengguna") ?>
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
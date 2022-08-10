<nav class="page-breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="?hal=dashboard">Home</a></li>
		<li class="breadcrumb-item" aria-current="page">Data Kategori</li>
	</ol>
</nav>

<div class="row">
	<div class="col-md-12 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
				<h6 class="card-title">Data Kategori Barang
					<?= _daftar("?hal=kategori/olah") ?>

				</h6>
				<div class="table-responsive">
					<table id="dataTableExample" class="table">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama Kategori</th>
								<th>#</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 0;
							$sql = "SELECT * FROM tb_kategori";
							foreach (_dataGetAll($mysqli, $sql) as $key => $value) :
								extract($value);
							?>
								<tr>
									<td><?= $no += 1 ?></td>
									<td><?= $namakategori ?></td>
									<td>
										<?= _edit("?hal=kategori/olah&id=$idkategori") ?>
										<?= _hapus("?hal=kategori/proses&hapus=$idkategori") ?>
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
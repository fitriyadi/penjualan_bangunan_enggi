<?php
$username="";
if(isset($_GET['id']))
	extract(_dataGetId($mysqli,"tb_kategori","idkategori='".$_GET['id']."'"));
?>
<nav class="page-breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="?hal=dashboard">Home</a></li>
		<li class="breadcrumb-item"><a href="?hal=kriteria/data">Data Kategori</a></li>
		<li class="breadcrumb-item" aria-current="page"><?=(isset($_GET['id']) ? 'Ubah':'Tambah')?></li>
	</ol>
</nav>

<div class="row">
	<div class="col-md-12 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
				<h6 class="card-title"><?=(isset($_GET['id']) ? 'Ubah':'Tambah')?> Data Kategori</h6>

				<form class="forms-sample" action="?hal=kategori/proses" method="POST">
					
					<input type="hidden" class="form-control" name="idkategori" value="<?=@$idkategori?>">

					<div class="form-group row">
						<label for="input" class="col-sm-3 col-form-label">Nama Kategori</label>
						<div class="col-sm-9">
							<input type="text" 
							class="form-control" 
							name="namakategori" 
							value="<?=@$namakategori?>" 
							placeholder="Inputkan Nama kategori" 
							required>
						</div>
					</div>

					<div class="form-group row ">
						<div class="col-sm-9 offset-3">
							<button type="submit" class="btn btn-primary mr-2" name="<?=(isset($_GET['id']) ? 'ubah':'tambah')?>">Simpan</button>
							<a class="btn btn-light" href="?hal=kategori/data">Batal</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
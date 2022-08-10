<?php
$notelepon="";
if(isset($_GET['id']))
	extract(_dataGetId($mysqli,"tb_pelanggan","idpelanggan='".$_GET['id']."'"));
?>
<nav class="page-breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="?hal=dashboard">Home</a></li>
		<li class="breadcrumb-item"><a href="?hal=pelanggan/data">Data pelanggan</a></li>
		<li class="breadcrumb-item" aria-current="page"><?=(isset($_GET['id']) ? 'Ubah':'Tambah')?></li>
	</ol>
</nav>

<div class="row">
	<div class="col-md-12 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
				<h6 class="card-title"><?=(isset($_GET['id']) ? 'Ubah':'Tambah')?> Data Pelanggan</h6>

				<form class="forms-sample" action="?hal=pelanggan/proses" method="POST">
					
					<input type="hidden" class="form-control" name="idpelanggan" value="<?=@$idpelanggan?>">

					  <div class="form-group row">
						<label for="input" class="col-sm-3 col-form-label">Nama Pelanggan</label>
						<div class="col-sm-9">
							<input type="text" 
							class="form-control" 
							name="namapelanggan" 
							value="<?=@$namapelanggan?>" 
							placeholder="Inputkan Nama pelanggan" 
							required>
						</div>
					</div>

					<div class="form-group row">
						<label for="input" class="col-sm-3 col-form-label">No telepon</label>
						<div class="col-sm-9">
							<input type="number" class="form-control" name="notelepon" value="<?=@$notelepon?>"   placeholder="Inputkan No Telepon" required>
						</div>
					</div>

                    <div class="form-group row">
						<label for="input" class="col-sm-3 col-form-label">Email</label>
						<div class="col-sm-9">
							<input type="email" class="form-control" name="email" value="<?=@$email?>"   placeholder="Inputkan Email" required>
						</div>
					</div>

                    <div class="form-group row">
						<label for="input" class="col-sm-3 col-form-label">Alamat</label>
						<div class="col-sm-9">
                            <textarea class="form-control" name="alamat" placeholder="Inputkan alamat" rows="3" required><?=@$alamat?></textarea>
						</div>
					</div>


					<div class="form-group row ">
						<div class="col-sm-9 offset-3">
							<button type="submit" class="btn btn-primary mr-2" name="<?=(isset($_GET['id']) ? 'ubah':'tambah')?>">Simpan</button>
							<a class="btn btn-light" href="?hal=pelanggan/data">Batal</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
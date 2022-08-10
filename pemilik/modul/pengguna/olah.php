<?php
$username="";
if(isset($_GET['id']))
	extract(_dataGetId($mysqli,"tb_pengguna","idpengguna='".$_GET['id']."'"));
?>
<nav class="page-breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="?hal=dashboard">Home</a></li>
		<li class="breadcrumb-item"><a href="?hal=kriteria/data">Data Pengguna</a></li>
		<li class="breadcrumb-item" aria-current="page"><?=(isset($_GET['id']) ? 'Ubah':'Tambah')?></li>
	</ol>
</nav>

<div class="row">
	<div class="col-md-12 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
				<h6 class="card-title"><?=(isset($_GET['id']) ? 'Ubah':'Tambah')?> Data Pengguna</h6>

				<form class="forms-sample" action="?hal=pengguna/proses" method="POST">
					
					<input type="hidden" class="form-control" name="idpengguna" value="<?=@$idpengguna?>">

					  <div class="form-group row">
						<label for="input" class="col-sm-3 col-form-label">Nama pengguna</label>
						<div class="col-sm-9">
							<input type="text" 
							class="form-control" 
							name="namapengguna" 
							value="<?=@$namapengguna?>" 
							placeholder="Inputkan Nama pengguna" 
							required>
						</div>
					</div>

					  <div class="form-group row">
						<label for="input" class="col-sm-3 col-form-label">Username</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="username" value="<?=@$username?>"   placeholder="Inputkan Username" required>
						</div>
					</div>

                    <div class="form-group row">
						<label for="input" class="col-sm-3 col-form-label">Password</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="password" value="<?=@$password?>"  placeholder="Inputkan Password" required>
						</div>
					</div>

                    <div class="form-group row">
						<label for="input" class="col-sm-3 col-form-label">Level</label>
						<div class="col-sm-9">
							<select 
								class="form-control select2" 
								name="level" 
								required="">
								<?php
								foreach ($_array_level as $key => $value):
									?>
									<option 
									value="<?=$key?>" 
									<?=isselect(@$level,$value)?>>
									<?=$value?>
									</option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>


					<div class="form-group row ">
						<div class="col-sm-9 offset-3">
							<button type="submit" class="btn btn-primary mr-2" name="<?=(isset($_GET['id']) ? 'ubah':'tambah')?>">Simpan</button>
							<a class="btn btn-light" href="?hal=pengguna/data">Batal</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
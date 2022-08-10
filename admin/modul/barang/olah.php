<?php
$notelepon="";
if(isset($_GET['id']))
	extract(_dataGetId($mysqli,"tb_barang","idbarang='".$_GET['id']."'"));
?>
<nav class="page-breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="?hal=dashboard">Home</a></li>
		<li class="breadcrumb-item"><a href="?hal=barang/data">Data barang</a></li>
		<li class="breadcrumb-item" aria-current="page"><?=(isset($_GET['id']) ? 'Ubah':'Tambah')?></li>
	</ol>
</nav>

<div class="row">
	<div class="col-md-12 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
				<h6 class="card-title"><?=(isset($_GET['id']) ? 'Ubah':'Tambah')?> Data barang</h6>

				<form class="forms-sample" action="?hal=barang/proses" method="POST">
					
					<input type="hidden" class="form-control" name="idbarang" value="<?=@$idbarang?>">

					  <div class="form-group row">
						<label for="input" class="col-sm-3 col-form-label">Nama Barang</label>
						<div class="col-sm-9">
							<input type="text" 
							class="form-control" 
							name="namabarang" 
							value="<?=@$namabarang?>" 
							placeholder="Inputkan Nama barang" 
							required>
						</div>
					</div>

                    <div class="form-group row">
                        <label for="input" class="col-sm-3 col-form-label">Kategori</label>
                        <div class="col-sm-9">
                            <select 
                                class="form-control js-example-basic-single" 
                                name="idkategori" 
                                required="">
                                <?php
                                $no=0;
                                $sql="SELECT * FROM tb_kategori";
                                foreach (_dataGetAll($mysqli,$sql) as $key => $value):
                                    ?>
                                    <option 
                                    value="<?=$value['idkategori']?>" 
                                    <?=isselect(@$idkategori,$value['idkategori'])?>>
                                    <?=$value['namakategori']?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

					<div class="form-group row">
						<label for="input" class="col-sm-3 col-form-label">Stok</label>
						<div class="col-sm-9">
							<input type="number" class="form-control" name="stok" value="<?=@$stok?>"   placeholder="Inputkan Stok" required>
						</div>
					</div>

                    <div class="form-group row">
						<label for="input" class="col-sm-3 col-form-label">Harga Beli</label>
						<div class="col-sm-9">
							<input type="number" class="form-control" name="hargabeli" value="<?=@$hargabeli?>"   placeholder="Inputkan Harag Beli" required>
						</div>
					</div>

                    <div class="form-group row">
						<label for="input" class="col-sm-3 col-form-label">Harga Jual</label>
						<div class="col-sm-9">
							<input type="number" class="form-control" name="hargajual" value="<?=@$hargajual?>"   placeholder="Inputkan Harga Jual" required>
						</div>
					</div>


					<div class="form-group row ">
						<div class="col-sm-9 offset-3">
							<button type="submit" class="btn btn-primary mr-2" name="<?=(isset($_GET['id']) ? 'ubah':'tambah')?>">Simpan</button>
							<a class="btn btn-light" href="?hal=barang/data">Batal</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php
if(isset($_POST['tambah'])){	
//Proses penambahan index
	$stmt = $mysqli->prepare("INSERT INTO tb_kategori 
		(namakategori) 
		VALUES (?)");

	$stmt->bind_param("s", 
		$_POST['namakategori']);	
	
	if ($stmt->execute()) { 
		echo "<script>alert('Data kategori berhasil disimpan')</script>";
		echo "<script>window.location='index.php?hal=kategori/data';</script>";	
	} else {
		print_r($stmt->errorInfo());
		echo "<script>alert('Data kategori Gagal Disimpan')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}else if(isset($_POST['ubah'])){
//Proses ubah data
	$stmt = $mysqli->prepare("UPDATE tb_kategori  SET 
		namakategori=?
		where idkategori=?");
	$stmt->bind_param("ss",
		$_POST['namakategori'],
		$_POST['idkategori']);	

	if ($stmt->execute()) { 
		echo "<script>alert('Data kategori berhasil diubah')</script>";
		echo "<script>window.location='index.php?hal=kategori/data';</script>";	
	} else {
		print_r($stmt->errorInfo());
		echo "<script>alert('Data kategori Gagal Disimpan')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}else if(isset($_GET['hapus'])){

	//Proses hapus
	$stmt = $mysqli->prepare("DELETE FROM tb_kategori where idkategori=?");
	$stmt->bind_param("s",$_GET['hapus']); 

	if ($stmt->execute()) { 
		echo "<script>alert('Data kategori Berhasil Dihapus')</script>";
		echo "<script>window.location='index.php?hal=kategori/data';</script>";	
	} else {
		echo "<script>alert('Data kategori Gagal Dihapus')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}
?>
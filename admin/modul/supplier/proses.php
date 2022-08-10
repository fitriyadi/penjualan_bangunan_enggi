<?php
if(isset($_POST['tambah'])){	
//Proses penambahan index
	$stmt = $mysqli->prepare("INSERT INTO tb_supplier 
		(namasupplier,notelepon,alamat) 
		VALUES (?,?,?)");

	$stmt->bind_param("sss", 
		$_POST['namasupplier'],
		$_POST['notelepon'],
		$_POST['alamat']);	
	
	if ($stmt->execute()) { 
		echo "<script>alert('Data supplier berhasil disimpan')</script>";
		echo "<script>window.location='index.php?hal=supplier/data';</script>";	
	} else {
		echo "<script>alert('Data supplier Gagal Disimpan')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}else if(isset($_POST['ubah'])){

//Proses ubah data
	$stmt = $mysqli->prepare("UPDATE tb_supplier  SET 
		namasupplier=?,
		notelepon=?,
		alamat=?
		where idsupplier=?");
	$stmt->bind_param("ssss",
		$_POST['namasupplier'],
		$_POST['notelepon'],
		$_POST['alamat'],
		$_POST['idsupplier']);	

	if ($stmt->execute()) { 
		echo "<script>alert('Data supplier berhasil diubah')</script>";
		echo "<script>window.location='index.php?hal=supplier/data';</script>";	
	} else {
		echo "<script>alert('Data supplier Gagal Disimpan')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}else if(isset($_GET['hapus'])){

	//Proses hapus
	$stmt = $mysqli->prepare("DELETE FROM tb_supplier where idsupplier=?");
	$stmt->bind_param("s",$_GET['hapus']); 

	if ($stmt->execute()) { 
		echo "<script>alert('Data supplier Berhasil Dihapus')</script>";
		echo "<script>window.location='index.php?hal=supplier/data';</script>";	
	} else {
		echo "<script>alert('Data supplier Gagal Dihapus')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}
?>
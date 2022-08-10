<?php
if(isset($_POST['tambah'])){	
//Proses penambahan index
	$stmt = $mysqli->prepare("INSERT INTO tb_pelanggan 
		(namapelanggan,notelepon,alamat,email) 
		VALUES (?,?,?,?)");

	$stmt->bind_param("ssss", 
		$_POST['namapelanggan'],
		$_POST['notelepon'],
		$_POST['alamat'],
        $_POST['email']);	
	
	if ($stmt->execute()) { 
		echo "<script>alert('Data pelanggan berhasil disimpan')</script>";
		echo "<script>window.location='index.php?hal=pelanggan/data';</script>";	
	} else {
		echo "<script>alert('Data pelanggan Gagal Disimpan')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}else if(isset($_POST['ubah'])){

//Proses ubah data
	$stmt = $mysqli->prepare("UPDATE tb_pelanggan  SET 
		namapelanggan=?,
		notelepon=?,
		alamat=?,
        email=?
		where idpelanggan=?");
	$stmt->bind_param("sssss",
		$_POST['namapelanggan'],
		$_POST['notelepon'],
		$_POST['alamat'],
        $_POST['email'],
		$_POST['idpelanggan']);	

	if ($stmt->execute()) { 
		echo "<script>alert('Data pelanggan berhasil diubah')</script>";
		echo "<script>window.location='index.php?hal=pelanggan/data';</script>";	
	} else {
		echo "<script>alert('Data pelanggan Gagal Disimpan')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}else if(isset($_GET['hapus'])){

	//Proses hapus
	$stmt = $mysqli->prepare("DELETE FROM tb_pelanggan where idpelanggan=?");
	$stmt->bind_param("s",$_GET['hapus']); 

	if ($stmt->execute()) { 
		echo "<script>alert('Data pelanggan Berhasil Dihapus')</script>";
		echo "<script>window.location='index.php?hal=pelanggan/data';</script>";	
	} else {
		echo "<script>alert('Data pelanggan Gagal Dihapus')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}
?>
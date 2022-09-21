<?php
if(isset($_POST['tambah'])){	
//Proses penambahan index
	$stok=0;
	$hargajual=$_POST['hargajual'];
	$hargabeli=$_POST['hargabeli'];
	if($hargajual<$hargabeli){
		
		echo "<script>alert('Harga jual tidak boleh kurang dari harga beli')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";

	}else{
		$stmt = $mysqli->prepare("INSERT INTO tb_barang 
			(namabarang,idkategori,stok,hargajual,hargabeli) 
			VALUES (?,?,?,?,?)");

		$stmt->bind_param("sssss", 
			$_POST['namabarang'],
			$_POST['idkategori'],
			$stok,
			$_POST['hargajual'],
			$_POST['hargabeli']);	
		
		if ($stmt->execute()) { 
			echo "<script>alert('Data barang berhasil disimpan')</script>";
			echo "<script>window.location='index.php?hal=barang/data';</script>";	
		} else {
			echo "<script>alert('Data barang Gagal Disimpan')</script>";
			echo "<script>window.location='javascript:history.go(-1)';</script>";
		}
	}
}else if(isset($_POST['ubah'])){

//Proses ubah data
	$hargajual=$_POST['hargajual'];
	$hargabeli=$_POST['hargabeli'];
	if($hargajual<$hargabeli){
		
		echo "<script>alert('Harga jual tidak boleh kurang dari harga beli')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";

	}else{
		$stmt = $mysqli->prepare("UPDATE tb_barang  SET 
			namabarang=?,
			idkategori=?,
			hargajual=?,
			hargabeli=?
			where idbarang=?");
		$stmt->bind_param("sssss",
			$_POST['namabarang'],
			$_POST['idkategori'],
			$_POST['hargajual'],
			$_POST['hargabeli'],
			$_POST['idbarang']);	

		if ($stmt->execute()) { 
			echo "<script>alert('Data barang berhasil diubah')</script>";
			echo "<script>window.location='index.php?hal=barang/data';</script>";	
		} else {
			echo "<script>alert('Data barang Gagal Disimpan')</script>";
			echo "<script>window.location='javascript:history.go(-1)';</script>";
		}
	}
}else if(isset($_GET['hapus'])){

	//Proses hapus
	$stmt = $mysqli->prepare("DELETE FROM tb_barang where idbarang=?");
	$stmt->bind_param("s",$_GET['hapus']); 

	if ($stmt->execute()) { 
		echo "<script>alert('Data barang Berhasil Dihapus')</script>";
		echo "<script>window.location='index.php?hal=barang/data';</script>";	
	} else {
		echo "<script>alert('Data barang Gagal Dihapus')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}
?>
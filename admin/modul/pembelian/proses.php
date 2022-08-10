<?php
 $iduser="1";

if(isset($_POST['tambahbarang'])){	
//Proses penambahan index
    $_SESSION['pembelian']['tanggal']=$_POST['tanggal'];
    $_SESSION['pembelian']['idsupplier']=$_POST['idsupplier'];
   

    //Simpan Ke Temp
    $idbarang=$_POST['idbarang'];
    $jumlah=$_POST['jumlah'];
    $namabarang=_dataCustom($mysqli,"select namabarang from tb_barang where idbarang='$idbarang'");
    $hargabeli=_dataCustom($mysqli,"select hargabeli from tb_barang where idbarang='$idbarang'");
    $subtotal=$hargabeli*$jumlah;
    $jenis='Beli';

	$stmt = $mysqli->prepare("INSERT INTO tmp_barang 
		(tmp_id,tmp_nama,tmp_harga,tmp_jumlah,tmp_subtotal,tmp_jenis,tmp_user) 
		VALUES (?,?,?,?,?,?,?)");

	$stmt->bind_param("sssssss", 
		$idbarang,
		$namabarang,
		$hargabeli,
        $jumlah,
        $subtotal,
        $jenis,
        $iduser);	
	
	if ($stmt->execute()) { 
		echo "<script>alert('Data barang berhasil ditambahkan')</script>";
		echo "<script>window.location='index.php?hal=pembelian/olah';</script>";	
	} else {
		echo "<script>alert('Data barang Gagal Ditambahkan')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}else if(isset($_GET['hapusbarang'])){

	//Proses hapus
	$stmt = $mysqli->prepare("DELETE FROM tmp_barang where tmp_id=?");
	$stmt->bind_param("s",$_GET['hapusbarang']); 

	if ($stmt->execute()) { 
		echo "<script>alert('Data barang Berhasil Dihapus')</script>";
		echo "<script>window.location='index.php?hal=pembelian/olah';</script>";	
	} else {
		echo "<script>alert('Data barang Gagal Dihapus')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}else if(isset($_POST['simpan'])){

    $tanggal=$_POST['tanggal'];
    $idsupplier=$_POST['idsupplier'];
    $total=$_POST['total'];

    //Simpan Ke Total
    $stmt = $mysqli->prepare("INSERT INTO tb_pembelian 
    (tanggal,idsupplier,total) 
    VALUES (?,?,?)");

    $stmt->bind_param("sss", 
        $tanggal,
        $idsupplier,
        $total);	
    $stmt->execute();
    $idpembelian=_dataCustom($mysqli,"select max(idpembelian) from tb_pembelian");

    //Simpan Ke Detail + Update Stok
    $sql = "SELECT tmp_nama,tmp_id,tmp_harga,sum(tmp_jumlah) as tmp_jumlah,sum(tmp_subtotal) as tmp_subtotal FROM tmp_barang where tmp_jenis='Beli' group by tmp_nama,tmp_id,tmp_harga";
    foreach (_dataGetAll($mysqli, $sql) as $key => $value) :
        extract($value);
    
    //Simpan Detail
    //Simpan Ke Total
    $stmt = $mysqli->prepare("INSERT INTO tb_item_beli 
        (idpembelian,idbarang,harga,jumlah) 
        VALUES (?,?,?,?)");

        $stmt->bind_param("ssss", 
            $idpembelian,
            $tmp_id,
            $tmp_harga,
            $tmp_jumlah);	
        $stmt->execute();

        //Ubah Stok
        $stmt = $mysqli->prepare("UPDATE tb_barang  SET 
            stok=stok+?
            where idbarang=?");
        $stmt->bind_param("ss",
            $tmp_jumlah,
            $tmp_id);	
        $stmt->execute();

    endforeach;

    //Hapus Sesi
    unset($_SESSION['pembelian']['tanggal']);
    unset($_SESSION['pembelian']['idsupplier']);
    
    //Hapus Keranjang
    $stmt = $mysqli->prepare("DELETE FROM tmp_barang where tmp_jenis='Beli' and tmp_user='$iduser'");
    $stmt->execute();

	echo "<script>alert('Data Pembelian berhasil disimpan')</script>";
	echo "<script>window.location='index.php?hal=pembelian/data';</script>";	

}else if(isset($_GET['hapus'])){

	//Proses hapus
	$stmt = $mysqli->prepare("DELETE FROM tb_item_beli where idpembelian=?");
	$stmt->bind_param("s",$_GET['hapus']); 
    $stmt->execute();

    $stmt = $mysqli->prepare("DELETE FROM tb_pembelian where idpembelian=?");
	$stmt->bind_param("s",$_GET['hapus']); 

	if ($stmt->execute()) { 
		echo "<script>alert('Data Pembelian Berhasil Dihapus')</script>";
		echo "<script>window.location='index.php?hal=pembelian/data';</script>";	
	} else {
		echo "<script>alert('Data Pembelian Gagal Dihapus')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}
?>
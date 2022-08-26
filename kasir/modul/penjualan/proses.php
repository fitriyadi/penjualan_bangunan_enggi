<?php
 $iduser="1";

if(isset($_POST['tambahbarang'])){	
//Proses penambahan index
    $_SESSION['penjualan']['tanggal']=$_POST['tanggal'];
    $_SESSION['penjualan']['idpelanggan']=$_POST['idpelanggan'];
    $_SESSION['penjualan']['idpelanggan']=$_POST['jenisbayar'];
   

    //Simpan Ke Temp
    $idbarang=$_POST['idbarang'];
    $jumlah=$_POST['jumlah'];
    $namabarang=_dataCustom($mysqli,"select namabarang from tb_barang where idbarang='$idbarang'");
    $hargajual=_dataCustom($mysqli,"select hargajual from tb_barang where idbarang='$idbarang'");
    $subtotal=$hargajual*$jumlah;
    $jenis='jual';

	$$jumlahkeranjang=_dataCustom($mysqli,"select sum(tmp_jumlah) from tmp_barang where tmp_id='$idbarang'");
    $jumlahstok=_dataCustom($mysqli,"select stok from tb_barang where idbarang='$idbarang'");

    if(($jumlahkeranjang+$jumlah) > $jumlahstok){

        echo "<script>alert('Stok tidak mencukupi,sisa barang tinggal $jumlahstok')</script>";
        echo "<script>window.location='javascript:history.go(-1)';</script>";

    }else{

        $stmt = $mysqli->prepare("INSERT INTO tmp_barang 
            (tmp_id,tmp_nama,tmp_harga,tmp_jumlah,tmp_subtotal,tmp_jenis,tmp_user) 
            VALUES (?,?,?,?,?,?,?)");

        $stmt->bind_param("sssssss", 
            $idbarang,
            $namabarang,
            $hargajual,
            $jumlah,
            $subtotal,
            $jenis,
            $iduser);   
        
        if ($stmt->execute()) { 
            echo "<script>alert('Data barang berhasil ditambahkan')</script>";
            echo "<script>window.location='index.php?hal=penjualan/olah';</script>";    
        } else {
            echo "<script>alert('Data barang Gagal Ditambahkan')</script>";
            echo "<script>window.location='javascript:history.go(-1)';</script>";
        }

    }

}else if(isset($_GET['hapusbarang'])){

	//Proses hapus
	$stmt = $mysqli->prepare("DELETE FROM tmp_barang where tmp_id=?");
	$stmt->bind_param("s",$_GET['hapusbarang']); 

	if ($stmt->execute()) { 
		echo "<script>alert('Data barang Berhasil Dihapus')</script>";
		echo "<script>window.location='index.php?hal=penjualan/olah';</script>";	
	} else {
		echo "<script>alert('Data barang Gagal Dihapus')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}else if(isset($_POST['simpan'])){

    $tanggal=$_POST['tanggal'];
    $idpelanggan=$_POST['idpelanggan'];
    $total=$_POST['total'];
    $jenisbayar=$_POST['jenisbayar'];
    if($jenisbayar=='Langsung'){
        $statusbayar='Lunas';
    }else{
        $statusbayar='Belum Lunas';
    }

    //Simpan Ke Total
    $stmt = $mysqli->prepare("INSERT INTO tb_penjualan 
    (tanggal,idpelanggan,total,jenisbayar,statusbayar) 
    VALUES (?,?,?,?,?)");

    $stmt->bind_param("sssss", 
        $tanggal,
        $idpelanggan,
        $total,
        $jenisbayar,
        $statusbayar,);	
    $stmt->execute();
    $idpenjualan=_dataCustom($mysqli,"select max(idpenjualan) from tb_penjualan");

    //Simpan Ke Detail + Update Stok
    $sql = "SELECT tmp_nama,tmp_id,tmp_harga,sum(tmp_jumlah) as tmp_jumlah,sum(tmp_subtotal) as tmp_subtotal FROM tmp_barang where tmp_jenis='Jual' group by tmp_nama,tmp_id,tmp_harga";
    foreach (_dataGetAll($mysqli, $sql) as $key => $value) :
        extract($value);
    
    //Simpan Detail
    //Simpan Ke Total
    $stmt = $mysqli->prepare("INSERT INTO tb_item_jual 
        (idpenjualan,idbarang,harga,jumlah) 
        VALUES (?,?,?,?)");

        $stmt->bind_param("ssss", 
            $idpenjualan,
            $tmp_id,
            $tmp_harga,
            $tmp_jumlah);	
        $stmt->execute();

        //Ubah Stok
        $stmt = $mysqli->prepare("UPDATE tb_barang  SET 
            stok=stok-?
            where idbarang=?");
        $stmt->bind_param("ss",
            $tmp_jumlah,
            $tmp_id);	
        $stmt->execute();

    endforeach;

    //Hapus Sesi
    unset($_SESSION['penjualan']['tanggal']);
    unset($_SESSION['penjualan']['idpelanggan']);
    unset($_SESSION['jenisbayar']['jenisbayar']);
    
    //Hapus Keranjang
    $stmt = $mysqli->prepare("DELETE FROM tmp_barang where tmp_jenis='jual' and tmp_user='$iduser'");
    $stmt->execute();

	echo "<script>alert('Data penjualan berhasil disimpan')</script>";
	echo "<script>window.location='index.php?hal=penjualan/data';</script>";	

}else if(isset($_GET['hapus'])){

	//Proses hapus
	$stmt = $mysqli->prepare("DELETE FROM tb_item_jual where idpenjualan=?");
	$stmt->bind_param("s",$_GET['hapus']); 
    $stmt->execute();

    $stmt = $mysqli->prepare("DELETE FROM tb_penjualan where idpenjualan=?");
	$stmt->bind_param("s",$_GET['hapus']); 

	if ($stmt->execute()) { 
		echo "<script>alert('Data penjualan Berhasil Dihapus')</script>";
		echo "<script>window.location='index.php?hal=penjualan/data';</script>";	
	} else {
		echo "<script>alert('Data penjualan Gagal Dihapus')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}else if(isset($_POST['kirim'])){

    //Proses ubah data
        $stmt = $mysqli->prepare("UPDATE tb_penjualan  SET 
            namasopir=?,
            statuskirim=?
            where idpenjualan=?");
        $stmt->bind_param("sss",
            $_POST['namasopir'],
            $_POST['statuskirim'],
            $_POST['idpenjualan']);	
    
        if ($stmt->execute()) { 
            echo "<script>alert('Data pengiriman berhasil diproses')</script>";
            echo "<script>window.location='index.php?hal=penjualan/data';</script>";	
        } else {
            echo "<script>alert('Data pengiriman Gagal Disimpan')</script>";
            echo "<script>window.location='javascript:history.go(-1)';</script>";
        }
    
    }
?>
<?php
if(isset($_POST['simpan'])){	
//Proses penambahan index
    $id=$_POST['idpenjualan'];
	$stmt = $mysqli->prepare("INSERT INTO tb_pembayaran 
		(idpenjualan,tanggal,dibayar) 
		VALUES (?,?,?)");

	$stmt->bind_param("sss", 
		$_POST['idpenjualan'],
		$_POST['tanggal'],
		$_POST['dibayar']);	
    $stmt->execute();

    //Cek Status Lunas
    
    if($_POST['dibayar']==$_POST['kekurangan']){
        $statusbayar='Lunas';
        $stmt = $mysqli->prepare("UPDATE tb_penjualan  SET 
            statusbayar=?
            where idpenjualan=?");
        $stmt->bind_param("ss",
            $statusbayar,
            $_POST['idpenjualan']);	

        $stmt->execute();
    }
	
		echo "<script>alert('Data pembayaran berhasil disimpan')</script>";
		echo "<script>window.location='index.php?hal=pembayaran/olah&id=$id';</script>";	


}
?>
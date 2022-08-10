<?php
date_default_timezone_set('Asia/Jakarta');

function isselect($x,$y){
	if($x==$y){
		echo "selected";
	}else{
		echo "";
	}
}

function umur($tanggal){
	$tanggal = new DateTime($tanggal);
	$today = new DateTime('today');
	$y = $today->diff($tanggal)->y;

	return $y;

}

function tgl_indo($tgl){
	$tgl		= date_create($tgl);
	$tanggal	= date_format($tgl,"d-m-Y");
	return $tanggal;
}

function tgl_jam_indo($tgl){
	$tgl		= date_create($tgl);
	$tanggal	= date_format($tgl,"d-m-Y h:i:s");
	return $tanggal;
}

function getAddress() {
    $protocol = $_SERVER['HTTPS'] == 'on' ? 'https' : 'http';
    return $protocol.'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
}


?>

<script src="../assets/vendors/chartjs/Chart.min.js"></script>

<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
	<div>
		<h4 class="mb-3 mb-md-0">Selamat Datang Kasir</h4>
	</div>
</div>

<div class="row">
	<div class="col-12 col-xl-12 stretch-card">
		<div class="row flex-grow">
			<div class="col-md-4 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
						<div class="d-flex justify-content-between align-items-baseline">
							<h6 class="card-title mb-0">Data Barang</h6>
							<div class="dropdown mb-2">
								<button class="btn p-0" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
								</button>
								<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
									<a class="dropdown-item d-flex align-items-center" href="?hal=barang/data"><i data-feather="eye" class="icon-sm mr-2"></i> <span class="">View</span></a>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-6 col-md-12 col-xl-5">
								<h3 class="mb-2"><?=_dataCount($mysqli,"select * from tb_barang")?></h3>
							</div>
							<div class="col-6 col-md-12 col-xl-7">
								<div id="apexChart1" class="mt-md-3 mt-xl-0"></div>
							</div>
						</div>
					</div>
				</div>
			</div>

						<div class="col-md-4 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
						<div class="d-flex justify-content-between align-items-baseline">
							<h6 class="card-title mb-0">Data Pelanggan</h6>
							<div class="dropdown mb-2">
								<button class="btn p-0" type="button" id="dropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
								</button>
								<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton1">
									<a class="dropdown-item d-flex align-items-center" href="?hal=pelanggan/data"><i data-feather="eye" class="icon-sm mr-2"></i> <span class="">View</span></a>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-6 col-md-12 col-xl-5">
								<h3 class="mb-2"><?=_dataCount($mysqli,"select * from tb_pelanggan")?></h3>
							</div>
							<div class="col-6 col-md-12 col-xl-7">
								<div id="apexChart2" class="mt-md-3 mt-xl-0"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div> <!-- row -->

<div class="row">
	<div class="col-12 col-xl-12 stretch-card">
		<div class="row flex-grow">
			<div class="col-md-4 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
						<div class="d-flex justify-content-between align-items-baseline">
							<h6 class="card-title mb-0">Data Penjualan</h6>
							<div class="dropdown mb-2">
								<button class="btn p-0" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
								</button>
								<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
									<a class="dropdown-item d-flex align-items-center" href="?hal=penjualan/data"><i data-feather="eye" class="icon-sm mr-2"></i> <span class="">View</span></a>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-6 col-md-12 col-xl-5">
								<h3 class="mb-2"><?=_dataCount($mysqli,"select * from tb_penjualan")?></h3>
							</div>
							<div class="col-6 col-md-12 col-xl-7">
								<div id="apexChart1" class="mt-md-3 mt-xl-0"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
						<div class="col-md-4 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
						<div class="d-flex justify-content-between align-items-baseline">
							<h6 class="card-title mb-0">Data Penjualan Belum Lunas</h6>
							<div class="dropdown mb-2">
								<button class="btn p-0" type="button" id="dropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
								</button>
								<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton1">
									<a class="dropdown-item d-flex align-items-center" href="?hal=pembayaran/data"><i data-feather="eye" class="icon-sm mr-2"></i> <span class="">View</span></a>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-6 col-md-12 col-xl-5">
								<h3 class="mb-2"><?=_dataCount($mysqli,"select * from tb_penjualan where statusbayar='Belum Lunas'")?></h3>
							</div>
							<div class="col-6 col-md-12 col-xl-7">
								<div id="apexChart2" class="mt-md-3 mt-xl-0"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div> <!-- row -->

<?php
//Generate Barang 5 Terlaris
    $no = 0;
	$namabarang_array=array();
	$idbarang_array=array();
	$jumlahbarang_array=array();
    $sql = "SELECT SUM(jumlah)AS jumlah,tb_barang.idbarang,namabarang FROM tb_item_jual JOIN 		tb_barang USING (idbarang)
	GROUP BY namabarang,tb_barang.idbarang
	ORDER BY SUM(jumlah) DESC
	LIMIT 5";
    	foreach (_dataGetAll($mysqli, $sql) as $key => $value) :
            extract($value);
			$namabarang_array[$no+=1]=$namabarang;
			$idbarang_array[$no]=$idbarang;
			$jumlahbarang_array[$no]=$jumlah;
		endforeach;


$datanama="";
$jumlah="";
$namabarang=$namabarang_array[1];
$datanama .= "'$namabarang'". ", ";
$namabarang=$namabarang_array[2];
$datanama .= "'$namabarang'". ", ";
$namabarang=$namabarang_array[3];
$datanama .= "'$namabarang'". ", ";
$namabarang=$namabarang_array[4];
$datanama .= "'$namabarang'". ", ";
$namabarang=$namabarang_array[5];
$datanama .= "'$namabarang'". ", ";

$jum[1]=$jumlahbarang_array[1];
$jumlah .= "$jum[1]". ", ";

$jum[2]=$jumlahbarang_array[2];
$jumlah .= "$jum[2]". ", ";

$jum[3]=$jumlahbarang_array[3];
$jumlah .= "$jum[3]". ", ";

$jum[4]=$jumlahbarang_array[4];
$jumlah .= "$jum[4]". ", ";

$jum[5]=$jumlahbarang_array[5];
$jumlah .= "$jum[5]". ", ";

$all=$jum[1]+$jum[2]+$jum[3]+$jum[4]+$jum[5];
?>

<div class="row">
	<div class="col-md-4 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
				<h6 class="card-title">Penjualan Terlaris</h6>
				<ul class="list-group">
					<li class="list-group-item">
						<?=$namabarang_array[1]; ?>
						<span class="badge badge-primary float-right">
						<?=$jum[1]?></span>
					</li>

					<li class="list-group-item">
						<?=$namabarang_array[2]; ?>
						<span class="badge badge-warning float-right">
						<?=$jum[2]?></span>
					</li>

					<li class="list-group-item">
						<?=$namabarang_array[3]; ?>  
						<span class="badge badge-secondary float-right">
						<?=$jum[3]?></span>
					</li>

					<li class="list-group-item">
						<?=$namabarang_array[4]; ?> 
						<span class="badge badge-info float-right">
						<?=$jum[4]?></span>
					</li>
					<li class="list-group-item">
						<?=$namabarang_array[5]; ?>  
						<span class="badge badge-danger float-right">
						<?=$jum[5]?></span>
					</li>
				</ul>
			</div>
		</div>
	</div>

	<div class="col-md-8 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
				<h6 class="card-title">Grafik Penjualan Produk</h6>
				<canvas id="myChart"></canvas>
			</div>
		</div>
	</div>
</div>

<script>
	var ctx = document.getElementById('myChart').getContext('2d');
	var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'pie',
        // The data for our dataset
        data: {
        	labels: [<?php echo $datanama; ?>],
        	datasets: [{
        		label:'Distribusi Data',
        		backgroundColor: ['rgba(56, 86, 255, 0.87)','rgb(218, 215, 49)', 'rgb(0, 185, 203)','rgb(175, 238, 239)','rgb(220, 40, 50)'],
        		borderColor: ['rgb(255, 99, 132)'],
        		data: [<?php echo $jumlah; ?>]
        	}]
        },

        // Configuration options go here
        options: {
        	scales: {
        		yAxes: [{
        			ticks: {
        				beginAtZero:true
        			}
        		}]
        	}
        }
    });
</script>
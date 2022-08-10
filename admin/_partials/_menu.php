<ul class="nav">
  <li class="nav-item nav-category">Main</li>
  
  <li class="nav-item">
    <a href="?hal=dashboard" class="nav-link">
      <i class="link-icon" data-feather="box"></i>
      <span class="link-title">Home</span>
    </a>
  </li>

  <li class="nav-item nav-category">Master Data</li>

  <li class="nav-item">
    <a href="?hal=pengguna/data" class="nav-link">
      <i class="link-icon" data-feather="user"></i>
      <span class="link-title">Data Pengguna</span>
    </a>
  </li>

  <li class="nav-item">
    <a href="?hal=supplier/data" class="nav-link">
      <i class="link-icon" data-feather="phone-call"></i>
      <span class="link-title">Data Supplier</span>
    </a>
  </li>

  <li class="nav-item">
    <a href="?hal=pelanggan/data" class="nav-link">
      <i class="link-icon" data-feather="user-plus"></i>
      <span class="link-title">Data Pelanggan</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link" data-toggle="collapse" href="#barang" role="button" aria-expanded="false" aria-controls="barang">
      <i class="link-icon" data-feather="box"></i>
      <span class="link-title">Data Barang</span>
      <i class="link-arrow" data-feather="chevron-down"></i>
    </a>
    <div class="collapse" id="barang">
      <ul class="nav sub-menu">
        <li class="nav-item">
          <a href="?hal=kategori/data" class="nav-link">Data Kategori</a>
        </li>
        <li class="nav-item">
          <a href="?hal=barang/data" class="nav-link">Data Barang</a>
        </li>
      </ul>
    </div>
  </li>

  <li class="nav-item">
    <a class="nav-link" data-toggle="collapse" href="#pembelian" role="button" aria-expanded="false" aria-controls="pembelian">
      <i class="link-icon" data-feather="layers"></i>
      <span class="link-title">Data Pembelian</span>
      <i class="link-arrow" data-feather="chevron-down"></i>
    </a>
    <div class="collapse" id="pembelian">
      <ul class="nav sub-menu">
        <li class="nav-item">
          <a href="?hal=pembelian/data" class="nav-link">Data Pembelian</a>
        </li>
        <li class="nav-item">
          <a href="?hal=pembelian/olah" class="nav-link">Tambah Pembelian</a>
        </li>
      </ul>
    </div>
  </li>

  <li class="nav-item">
    <a class="nav-link" data-toggle="collapse" href="#penjualan" role="button" aria-expanded="false" aria-controls="penjualan">
      <i class="link-icon" data-feather="activity"></i>
      <span class="link-title">Data Penjualan</span>
      <i class="link-arrow" data-feather="chevron-down"></i>
    </a>
    <div class="collapse" id="penjualan">
      <ul class="nav sub-menu">
        <li class="nav-item">
          <a href="?hal=penjualan/olah" class="nav-link">Tambah Penjualan</a>
        </li>
        <li class="nav-item">
          <a href="?hal=penjualan/data" class="nav-link">Data Penjualan</a>
        </li>
        <li class="nav-item">
          <a href="?hal=pembayaran/data" class="nav-link">Pembayaran</a>
        </li>
      </ul>
    </div>
  </li>

  <li class="nav-item nav-category">Laporan</li>

  <li class="nav-item">
    <a class="nav-link" data-toggle="collapse" href="#laporanpembelian" role="button" aria-expanded="false" aria-controls="laporanpembelian">
      <i class="link-icon" data-feather="hash"></i>
      <span class="link-title">Laporan Pembelian</span>
      <i class="link-arrow" data-feather="chevron-down"></i>
    </a>
    <div class="collapse" id="laporanpembelian">
      <ul class="nav sub-menu">
        <li class="nav-item">
          <a href="?hal=laporan/filter-beli" class="nav-link">Per - Periode</a>
        </li>
      </ul>
    </div>
  </li>

    <li class="nav-item">
    <a class="nav-link" data-toggle="collapse" href="#laporanpenjualan" role="button" aria-expanded="false" aria-controls="laporanpenjualan">
      <i class="link-icon" data-feather="hash"></i>
      <span class="link-title">Laporan Penjualan</span>
      <i class="link-arrow" data-feather="chevron-down"></i>
    </a>
    <div class="collapse" id="laporanpenjualan">
      <ul class="nav sub-menu">
        <li class="nav-item">
          <a href="?hal=laporan/filter-jual" class="nav-link">Per - Periode</a>
        </li>
      </ul>
    </div>
  </li>

</ul>
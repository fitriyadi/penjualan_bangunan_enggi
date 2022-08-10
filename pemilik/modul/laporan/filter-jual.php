<style type="text/css">
    .form-group {
        margin-top: -20px !important;
    }
</style>

<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="?hal=dashboard">Home</a></li>
        <li class="breadcrumb-item" aria-current="page">Filter Laporan Penjualan</li>
    </ol>
</nav>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Pilih Periode</h6>

                <form action="?hal=laporan/data-jual" method="POST" enctype="multipart/form-data">

                    <div class="form-group row">
                        <label for="input" class="col-sm-3 col-form-label">Pilih Periode Laporan</label>
                        <div class="col-sm-3">
                            <input type="date" class="form-control" name="par1"
                                placeholder="Inputkan Tanggal" required>
                        </div>
                        <div class="col-sm-3">
                            <input type="date" class="form-control" name="par2"
                                placeholder="Inputkan Tanggal" required>
                        </div>
                    </div>

                    <div class="form-group row ">
                        <div class="col-sm-9 offset-3">
                            <input type="submit" class="btn btn-primary" value="Lihat" name="lihat">
                            <a class="btn btn-light" href="?hal=dashboard">Batal</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
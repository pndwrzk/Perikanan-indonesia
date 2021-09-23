<?= $this->extend('Template'); ?>

<?= $this->section('Content'); ?>

<div class="row">
    <div class="div container-menuutama">
        <a class="btn btn-primary btn-utama text-white" href="/Transaksi"><i
                class="fas fa-handshake fa-3x mt-2"></i><br>Transaksi </A>

        <a class="btn btn-primary btn-utama text-white" href="/Pelanggan"><i
                class="fas fa-users  fa-3x mt-2"></i><br>Data
            Pelanggan </A>
    </div>
</div>
<div class="row">
    <div class="div container-menuutama mb-5">
        <a class="btn btn-primary btn-utama text-white" href="/Varian"><i
                class="fas fa-box-open fa-3x mt-2"></i><br>Data
            Varian</A>
        <a class="btn btn-primary btn-utama text-white" href="/Laporan"><i class="fas fa-book fa-3x mt-2"></i><br>Data
            Laporan</A>
    </div>
</div>

<?= $this->endSection(); ?>
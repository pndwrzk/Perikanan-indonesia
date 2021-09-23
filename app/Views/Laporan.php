<?= $this->extend('Template'); ?>

<?= $this->section('Content'); ?>
<div class="div mx-4 pt-4">
    <div class="row  ">



        <div class="div container-laporan">
            <a  href="/Laporan/Pendapatan" class="btn btn-primary btn-laporan text-white">Laporan Pendapatan </A>
            <a href="/Laporan/Varian" class="btn btn-primary btn-laporan text-white text-align-center  ">Laporan
                Varian</A>
            <a href="/Laporan/Pemesanan" class="btn btn-primary btn-laporan text-white">Laporan Pemesanan </A>

        </div>





    </div>
    <div class="div">

        <a href="/" class=" btn-kembali mt-5 mb-3" style="text-decoration:none">
            <i class="fas fa-chevron-left"></i> Kembali</a>

    </div>
</div>

<?= $this->endSection(); ?>
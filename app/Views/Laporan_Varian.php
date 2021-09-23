<?= $this->extend('Template'); ?>

<?= $this->section('Content'); ?>
<div class="div mx-4 pt-4">
<?php if (session()->getFlashdata('gagal')) :  ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('gagal'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php endif; ?>
    <div class="card p-3 mb-4">
        <form action="/Laporan/CetakVarian" method="POST">
            <div class="row">

                <div class="col-3">
                    <label for="tanggalmulai" class="form-label"><strong>Tanggal mulai</strong></label>
                    <input type="Date" class="form-control" name="tanggalmulai" id="tanggalmulai">
                </div>
                <div class="col-3">
                    <label for="tanggalakhir" class="form-label"><Strong>Tanggal akhir</Strong></label>
                    <input type="Date" class="form-control" name="tanggalakhir" id="tanggalakhir">
                </div>
                <div class="col-4">
                    <button class="btn btn-primary " style="margin-top : 30px"><i class="fas fa-print"></i>
                        Cetak</button>
                </div>

            </div>
        </form>
    </div>
    <div class="div">
        <p><strong>Periode Bulan : </strong> <?= bulan(date('m')) ?></p>
        <table class="table" id="data-table">

            <thead>
                <tr>

                    <th scope="col">No</th>
                    <th scope="col">Varian</th>
                    <th scope="col">Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <?php $no =1 ?>
                <?php foreach($varian as $v): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $v['nm_varian']; ?></td>
                    <td><?= $v['jumlah']; ?></td>


                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="/Laporan" class=" btn-kembali mt-5 mb-3" style="text-decoration:none">
            <i class="fas fa-chevron-left"></i> Kembali</a>
    </div>
</div>










<?= $this->endSection(); ?>
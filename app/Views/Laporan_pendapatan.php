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
        <form action="/Laporan/CetakPendapatan" method="POST">
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



    <table class="table" id="data-table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Tanggal</th>
                <th scope="col">pendapatan</th>
               
            </tr>
        </thead>
        <tbody>
<?php $no=1;
$total=0; ?>
            <?php foreach($pendapatan as $p): ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $p['tgl_nota']; ?></td>
                <td>Rp.<?= format_rupiah($p['jumlah']); ?></td>
                
            </tr>

            <?php $total =  $total + $p['jumlah']?>
            <?php endforeach; ?>

            <tr>
            <td colspan="3"><span  class="float-right"><strong>Total : </strong> Rp.<?= format_rupiah($total); ?> </span></td>
            </tr>
        </tbody>
    </table>
    <a href="/Laporan" class=" btn-kembali mt-5 mb-3" style="text-decoration:none">
        <i class="fas fa-chevron-left"></i> Kembali</a>
</div>


<?= $this->endSection(); ?>
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
        <form action="/Laporan/CetakPemesanan" method="POST">
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
                <th scope="col">Kode Nota</th>
                <th scope="col">Pelanggan</th>
                <th scope="col">Jenis</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Opsi</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach($penjualan as $p): ?>
            <tr>
                <td>NP-<?= $p['kd_nota']; ?></td>
                <td><?= $p['nm_pelanggan']; ?></td>
                <td><?= $p['nm_jenis']; ?></td>
                <td><?= $p['tgl_nota']; ?></td>
                <td><button type="button" class="btn btn-primary detail_pemesanan" data-toggle="modal"
                        data-target="#detail-nota" data-kd_nota="<?= $p['kd_nota'] ?>"
                        data-ppn="<?= $p['ppn'] ?>">Detail</button></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="/Laporan" class=" btn-kembali mt-5 mb-3" style="text-decoration:none">
        <i class="fas fa-chevron-left"></i> Kembali</a>
</div>

<div class="modal fade" id="detail-nota" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header ">
                <h5 class="modal-title " id="judul-pemesanan"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Varian</th>
                            <th scope="col">Harga Satuan</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Total Harga</th>
                        </tr>
                    </thead>
                    <tbody class="detail-pemesanan">

                    </tbody>

                </table>
                <div class="float-right">
                    <table>
                        <tr>
                            <td><strong>PPN</strong> </td>
                            <td>:</td>
                            <td> <span class="ppn-detail"></span></td>
                        </tr>
                        <br>

                        <tr>
                            <td><strong>Grantotal</strong> </td>
                            <td>:</td>
                            <td> <span class="grandtotal-detail"></span></td>
                        </tr>
                    </table>

                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>





<?= $this->endSection(); ?>
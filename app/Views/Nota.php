<?= $this->extend('Template'); ?>

<?= $this->section('Content'); ?>
<div class="div mx-4 pt-5 mb-5">
    <?php $pelanggan = session()->get('pelanggan'); ?>

    <div class="div">
        <div class="col-6">
            <div class="card p-2 ">


                <table style="width:100%;">
                    <tr>
                        <td class="font-weight-bold">Nama Pelanggan</td>
                        <td> :</td>
                        <td>
                            <?= $pelanggan['nm_pelanggan']; ?> (<?= $pelanggan['nm_jenis']; ?>) </td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">Tanggal</td>
                        <td> :</td>
                        <td><?= session()->get('tanggal'); ?> </td>
                    </tr>
                </table>
            </div>

        </div>
        <table class="table mt-4">
            <tr>
                <th>No</th>
                <th>Varian</th>
                <th>Harga</th>
                <th>QTY</th>
                <th>Total Harga</th>
            </tr>


            <?php $no =1; ?>
            <?php $menu= session()->get('menu'); ?>
            <?php   for( $i=0; $i <count($menu) ; $i++ ){ ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $menu[$i]['nm_varian'] ?></td>
                <td>Rp.<?= format_rupiah($menu[$i]['harga']); ?></td>
                <td><?= $qty[$i]; ?></td>
                <td>
                    Rp.<?= format_rupiah($menu[$i]['harga'] * $qty[$i]); ?>
                </td>
            </tr>

            <?php } ?>
        </table>


        <div class="row">
            <div class="col-8">
                <div class="mt-3">
                    <a href="/Transaksi" class=" btn btn-secondary ">Batal</a>

                    <button class="btn btn-primary ml-3 px-5" data-toggle="modal"
                        data-target="#selesai-transaksi">Selesai</button>

                </div>


            </div>

            <div class="col-4 border-top">



                <table style="width:100%;" class="mt-2">
                    <tr>
                        <td class="font-weight-bold">PPN</td>
                        <td> :</td>
                        <td><?= $pelanggan['ppn']; ?>%</td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">Grandtotal</td>
                        <td> :</td>
                        <td>
                            Rp.<?=format_rupiah($Grandtotal); ?>

                        </td>
                    </tr>

                </table>


            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="selesai-transaksi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header ">
                <h5 class="modal-title " id="exampleModalLabel">Selesaikan Transaksi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                <form action="/Transaksi/SelesaiTransaksi" method="POST">
                    <div class="form-group">
                        <label class="font-weight-bold">Cetak Nota</label>
                        <select class="custom-select" name="kwitansi">
                            <option value="1">Ya</option>
                            <option value="0">Tidak</option>
                        </select>
                    </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="Sumbit" class="btn btn-primary">Selesai</button>
            </div>
            </form>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>
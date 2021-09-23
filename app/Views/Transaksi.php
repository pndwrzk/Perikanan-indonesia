<?= $this->extend('Template'); ?>

<?= $this->section('Content'); ?>
<div class="div mx-4 pt-4">

    <?php if (session()->getFlashdata('berhasil')) :  ?>
    <div class="alert alert-success " role="alert">
        <?= session()->getFlashdata('berhasil'); ?>
    </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('berhasil-transaksi')) :  ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('berhasil-transaksi'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php endif; ?>

    <?php if($validation->hasError('menu')): ?>
    <div class="alert alert-danger " role="alert">
        <?= $validation->getError('menu'); ?>
    </div>
    <?php endif; ?>

    <form action="Transaksi/Checkout" method="POST" class="pt-2">
        <div class="row  col-8">
            <table style="width:100%; ">
                <tbody>
                    <tr>
                        <div class=" form-group form-transaksi">
                            <td class="font-weight-bold"><label>Pelanggan</label></td>
                            <td>
                                <div class="input-group">
                                    <select
                                        class="custom-select pelanggan-checkout <?= ($validation->hasError('pelanggan')) ? 'is-invalid' : ''; ?>"
                                        name="pelanggan">
                                        <option value=" ">Pilih</option>
                                        <?php foreach ($pelanggan as $p):  ?>
                                        <option value="<?= $p['kd_pelanggan'] ?>">
                                            <?= $p['nm_pelanggan'] ?> (<?= $p['nm_jenis'] ?>) - <?= $p['telepon'] ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>

                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-primary tambah-pelanggan"
                                            data-toggle="modal" data-target="#tambah-pelanggan"><i
                                                class="fas fa-user-plus"></i></button>
                                    </div>
                                    <div class="invalid-feedback margin-0">
                                        <?= $validation->getError('pelanggan'); ?>
                                    </div>
                                </div>
                            </td>
                        </div>
                    </tr>
                    <tr>
                        <div class="form-group form-transaksi">
                            <td class=" font-weight-bold"><label>Tanggal</label></td>
                            <td>
                                <input type="date"
                                    class="form-control tanggal-checkout <?= ($validation->hasError('tanggal')) ? 'is-invalid' : ''; ?>"
                                    id="tanggal" name="tanggal">
                                <div class="invalid-feedback ">
                                    <?= $validation->getError('tanggal'); ?>
                                </div>
                            </td>
                        </div>
                    </tr>
                    <tr>
                        <div class="form-group form-transaksi">
                            <td class=" font-weight-bold"><label>Pilih Varian</label></td>
                            <td>
                                <?php foreach($varian as $v): ?>
                                <input type="checkbox" class="menu-checkout " name="menu[]"
                                    value="<?= $v['id_varian'] ?>">
                                <label for="menu" style="margin-right: 1cm;"><?= $v['nm_varian'] ?></label>
                                <?php  endforeach; ?>
                            </td>


                        </div>
                    </tr>
                    <!-- <tr>
                        <div class="form-group ">
                            <td class=" font-weight-bold"><label>PPN</label></td>

                            <td>
                                <input type="number" class="form-control " id="ppn" name="ppn" readonly>
                                <div id="ppn" class="invalid-feedback ">
                                </div>
                            </td>
                        </div>
                    </tr> -->
                    <!-- <tr>
                        <div class="form-group">
                            <td class=" font-weight-bold"><label>Jumlah Tagihan</label></td>
                            <td>
                                <div class="row">
                                    <div class="col-9 mt-2">
                                        <input type="number" class="form-control " id="jumlah tagihan"
                                            name="jumlah tagihan" autofocus>
                                        <div id="ppn" class="invalid-feedback ">

                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <button class="btn btn-primary px-4">Hitung</button>
                                    </div>
                                </div>
                            </td>
                        </div>
                    </tr> -->

                </tbody>
            </table>



        </div>
        <button type="submit" class="btn btn-primary px-4 mt-3 mr-4 btn-checkout float-right">Checkout</button>
    </form>

    <a href="/" class=" btn-kembali mt-5 mb-3" style="text-decoration:none">
        <i class="fas fa-chevron-left"></i> Kembali</a>
</div>


<div class="modal fade" id="tambah-pelanggan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header ">
                <h5 class="modal-title " id="exampleModalLabel">Tambah Pelanggan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="Pelanggan/TambahPelanggan">

                    <input type="hidden" name="menu" value="2">
                    <div class="form-group">
                        <label>Nama Pelanggan</label>
                        <input type="text"
                            class="form-control <?= ($validation->hasError('nm_pelanggan')) ? 'is-invalid' : ''; ?>"
                            name="nm_pelanggan" autofocus value="<?= old('nm_pelanggan'); ?>">
                        <div id="nm_pelanggan" class="invalid-feedback ">
                            <?= $validation->getError('nm_pelanggan'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>jenis</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis" value="2">
                            <label class="form-check-label" for="perusahaan">
                                Perusahaan
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis" value="1">
                            <label class="form-check-label" for="rumahan">
                                Rumahan
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Telepon</label>
                        <input type="number"
                            class="form-control  <?= ($validation->hasError('telepon')) ? 'is-invalid' : ''; ?>"
                            name="telepon" value="<?= old('telepon'); ?>">
                        <div id="telepon" class="invalid-feedback ">
                            <?= $validation->getError('telepon'); ?>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah</button>

            </div>
            </form>
        </div>
    </div>
</div>






<?= $this->endSection(); ?>
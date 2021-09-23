<?= $this->extend('Template'); ?>

<?= $this->section('Content'); ?>
<div class="div mx-4 pt-4">


    <?php if (session()->getFlashdata('error_tambah_pelanggan')) :  ?>
    <script>
    $(document).ready(function() {
        $('.tambah-pelanggan').trigger('click');
    });
    </script>
    <?php endif; ?>


    <?php if (session()->getFlashdata('berhasil')) :  ?>
    <div class="alert alert-success " role="alert">
        <?= session()->getFlashdata('berhasil'); ?>
    </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error_ubah_pelanggan')) :  ?>
    <div class="alert alert-danger " role="alert">
        <?= session()->getFlashdata('error_ubah_pelanggan'); ?>
    </div>
    <?php endif; ?>

    <button type="button" class="btn btn-primary mb-4 tambah-pelanggan" data-toggle="modal"
        data-target="#tambah-pelanggan"> <i class="fas fa-user-plus"> </i> Tambah Pelanggan</button>

    <table class="table " id="data-table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">jenis</th>
                <th scope="col">Telepon</th>
                <th scope="col">Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no =1; ?>

            <?php foreach ($pelanggan as $p) : ?>
            <tr>
                <th scope="row"> <?= $no++; ?></th>
                <td><?= $p['nm_pelanggan']; ?></td>
                <td><?= $p['nm_jenis']; ?></td>
                <td><?= $p['telepon']; ?></td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-outline-primary ubah-pelanggan"
                            data-target="#ubah-pelanggan" data-toggle="modal"
                            data-nm_pelanggan="<?= $p['nm_pelanggan']; ?>" data-jenis="<?=$p['id_jenis']; ?>"
                            data-telepon="<?=$p['telepon']; ?>" data-kd_pelanggan="<?=$p['kd_pelanggan'];?>"><i
                                class="fas fa-edit"> </i></button>
                        <button type="button" class="btn btn-outline-primary hapus-pelanggan" data-toggle="modal"
                            data-target="#hapus-pelanggan" data-kd_pelanggan="<?= $p['kd_pelanggan']; ?>"><i
                                class="fas fa-trash-alt"> </i></button>

                    </div>
                </td>
            </tr>

            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="/" class=" btn-kembali mt-5 mb-3" style="text-decoration:none">
        <i class="fas fa-chevron-left"></i> Kembali</a>
</div>


<div class="modal fade" id="tambah-pelanggan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header ">
                <h5 class="modal-title " id="exampleModalLabel"> Tambah Pelanggan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="Pelanggan/TambahPelanggan">
                    <input type="hidden" name="menu" value="1">
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
                            <label class="form-check-label" for="Peror">
                                Perorang
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

<div class="modal fade" id="ubah-pelanggan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header ">
                <h5 class="modal-title " id="exampleModalLabel">Ubah Pelanggan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="Pelanggan/UbahPelanggan">
                    <input type="hidden" name="kd_pelanggan_edit" class="kode_pelanggan">
                    <div class="form-group">
                        <label>Nama Pelanggan</label>
                        <input type="text" class="form-control nama_pelanggan" id="nm_pelanggan"
                            name="nm_pelanggan_edit" autofocus value="<?= old('nm_pelanggan'); ?>">
                    </div>
                    <div class="form-group">
                        <label>jenis</label>
                        <div class="form-check">
                            <input class="form-check-input jenis_perusahaan" type="radio" name="jenis_edit"
                                id="perusahaan" value="1">
                            <label class="form-check-label" for="perusahaan">
                                Perusahaan
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input jenis_rumahan" type="radio" name="jenis_edit" id="rumahan"
                                value="2">
                            <label class="form-check-label" for="rumahan">
                                Perorang
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Telepon</label>
                        <input type="number" class="form-control telepon_pelanggan" id="telepon_edit"
                            name="telepon_edit">

                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Ubah</button>

            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="hapus-pelanggan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header ">
                <h5 class="modal-title " id="exampleModalLabel">Hapus pelanggan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="font-weight-bold"> Yakin untuk mengapus Data Pelanggan ? </p>

                <form action="Pelanggan/HapusPelanggan" method="POST">
                    <input type="hidden" name="kd_pelanggan" class="kd_pelanggan">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="Sumbit" class="btn btn-primary">Hapus</button>
            </div>
            </form>
        </div>
    </div>
</div>



<?= $this->endSection(); ?>
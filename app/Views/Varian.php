<?= $this->extend('Template'); ?>

<?= $this->section('Content'); ?>
<div class="div mx-4 pt-4">


    <?php if (session()->getFlashdata('error_tambah_varian')) :  ?>
    <script>
    $(document).ready(function() {
        $('.tambah-varian').trigger('click');
    });
    </script>
    <?php endif; ?>


    <?php if (session()->getFlashdata('berhasil')) :  ?>
    <div class="alert alert-success " role="alert">
        <?= session()->getFlashdata('berhasil'); ?>
    </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error_ubah_varian')) :  ?>
    <div class="alert alert-danger " role="alert">
        <?= session()->getFlashdata('error_ubah_varian'); ?>
    </div>
    <?php endif; ?>

    <button type="button" class="btn btn-primary mb-4 tambah-varian" data-toggle="modal"
        data-target="#tambah-varian"><i class="fas fa-plus"> </i> Tambah
        Varian</button>

    <table class="table " id="data-table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Harga</th>
                <th scope="col">Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no =1; ?>

            <?php foreach ($varian as $v) : ?>
            <tr>
                <th scope="row"> <?= $no++; ?></th>
                <td><?= $v['nm_varian']; ?></td>
                <td>Rp.<?= format_rupiah($v['harga']); ?></td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-outline-primary ubah-varian" data-target="#ubah-varian"
                            data-toggle="modal" data-harga="<?= $v['harga']; ?>"
                            data-nama_varian="<?=$v['nm_varian']; ?>"
                            data-id_varian="<?=$v['id_varian'];?>"><i class="fas fa-edit"> </i></button>
                        <button type="button" class="btn btn-outline-primary hapus-varian" data-toggle="modal"
                            data-target="#hapus-varian" data-id_varian="<?= $v['id_varian']; ?>"><i class="fas fa-trash-alt"> </i></button>

                    </div>
                </td>
            </tr>

            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="/" class=" btn-kembali mt-5 mb-3" style="text-decoration:none">
        <i class="fas fa-chevron-left"></i> Kembali</a>
</div>

<!-- Modal -->
<div class="modal fade" id="hapus-varian" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header ">
                <h5 class="modal-title " id="exampleModalLabel">Hapus Varian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="font-weight-bold"> Yakin untuk mengapus varian ? </p>

                <form action="Varian/HapusVarian" method="POST">
                    <input type="hidden" name="id_varian" class="id_varian">


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="Sumbit" class="btn btn-primary">Hapus</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="tambah-varian" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header ">
                <h5 class="modal-title " id="exampleModalLabel">Tambah Varian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="Varian/TambahVarian">
                    <div class="form-group">
                        <label>Nama Varian</label>
                        <input type="text"
                            class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama"
                            name="nama" autofocus value="<?= old('nama'); ?>">
                        <div id="nama" class="invalid-feedback ">
                            <?= $validation->getError('nama'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <input type="number"
                            class="form-control  <?= ($validation->hasError('harga')) ? 'is-invalid' : ''; ?>"
                            id="harga" name="harga" value="<?= old('harga'); ?>">
                        <div id="harga" class="invalid-feedback ">
                            <?= $validation->getError('harga'); ?>
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

<div class="modal fade" id="ubah-varian" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header ">
                <h5 class="modal-title " id="exampleModalLabel">Ubah Varian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="Varian/UbahVarian">
                    <input type="hidden" name="id_varian_edit" class="id_varian_edit" value="">
                    <div class="form-group">
                        <label>Nama Varian</label>
                        <input type="text"
                            class="form-control nama_varian_edit <?= ($validation->hasError('nama_varian_edit')) ? 'is-invalid' : ''; ?>"
                            id="nama_varian_edit" name="nama_varian_edit" autofocus>

                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <input type="number"
                            class="form-control harga_varian_edit <?= ($validation->hasError('harga_Varian_edit')) ? 'is-invalid' : ''; ?>"
                            id="harga_varian_edit" name="harga_varian_edit">
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


<?= $this->endSection(); ?>
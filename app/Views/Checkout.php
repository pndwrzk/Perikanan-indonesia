<?= $this->extend('Template'); ?>

<?= $this->section('Content'); ?>
<div class="div mx-4 pt-5">


    <div class="div">

        <form action="/Transaksi/Nota" method="POST">
            <table class="table mt-4">
                <tr>
                    <th>No</th>
                    <th>Varian</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total Harga</th>
                </tr>
                <script>
                let gt = 0;
                </script>
                <?php $no =1; ?>
                <?php $menu = session()->get('menu') ?>
                <?php foreach($menu as $m): ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $m['nm_varian'] ?></td>
                    <td>Rp.<?= format_rupiah($m['harga']); ?></td>
                    <td><input type="number" min="1" max="10" class="qty border-0" style="width: 40px"
                            id="qty-<?= $m['id_varian'] ?>" value="1" name="qty[]">
                        <input type="hidden" name="menu[]" value="<?=  $m['id_varian']?>">

                    </td>
                    <td>
                        <p class="total-<?= $m['id_varian'] ?>">Rp.<?= format_rupiah($m['harga']) ?></p>
                    </td>

                    <script>
                    $('#qty-<?= $m['id_varian'] ?>').on('change', function() {

                        let qty = $(this).val();
                        let harga = '<?= $m['harga'] ?>';
                        let b = parseInt(harga);
                        let total = qty * b;
                        $('.total-<?= $m['id_varian'] ?>').text('Rp' + rupiah(total));

                    });
                    </script>








                </tr>

                <?php endforeach; ?>
            </table>
    </div>
    <button type="submit" class="btn btn-primary float-right mr-3">Lanjut</button>
    </form>







    <a href="/Transaksi" class=" btn-kembali mt-5 mb-3" style="text-decoration:none">
        <i class="fas fa-chevron-left"></i> Kembali</a>

</div>


<script>


</script>

<?= $this->endSection(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Nota</title>
    <link href="<?= base_url('assets') ?>/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
    <link href="<?= base_url('assets') ?>/css/nota.css" rel="stylesheet" crossorigin="anonymous" />
</head>

<body>

    <table class="body-wrap">
        <tbody>
            <tr>
                <td></td>
                <td class="container" width="600">
                    <div class="content">
                        <table class="main" width="100%" cellpadding="0" cellspacing="0">
                            <tbody>
                                <tr>
                                    <td class="content-wrap aligncenter">
                                        <table width="100%" cellpadding="0" cellspacing="0">
                                            <tbody>
                                                <tr>
                                                    <td class="content-block">
                                                        <h5>Terima Kasih Sudah Berbelanja Di Toko Kami</h5>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="content-block">
                                                        <table class="invoice">
                                                            <tbody>
                                                                <tr>
                                                                    <td><?= $pelanggan['nm_pelanggan'] ?><br>Invoice :
                                                                        NP-<?=$kd_nota ?><br><?=$tanggal ?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <table class="invoice-items" cellpadding="0"
                                                                            cellspacing="0">
                                                                            <thead>
                                                                                <th>Varian</th>
                                                                                <th>Harga Satuan</th>
                                                                                <th>Jumlah</th>
                                                                                <th>Total Harga</th>
                                                                            </thead>
                                                                            <tbody>

                                                                                <?php   for( $i=0; $i<count($menu) ; $i++ ){ ?>
                                                                                <tr>
                                                                                    <td><?= $menu[$i]['nm_varian'] ?>
                                                                                    </td>
                                                                                    <td>Rp.<?= format_rupiah($menu[$i]['harga']); ?>
                                                                                    </td>
                                                                                    <td><?= $qty[$i]; ?></td>
                                                                                    <td>
                                                                                        Rp.<?= format_rupiah($menu[$i]['harga'] * $qty[$i]); ?>
                                                                                    </td>
                                                                                </tr>



                                                                                <?php } ?>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                    <td><strong>ppn</strong></td>
                                                                                    <td><?= $pelanggan['ppn'] ?>%</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                    <td><strong>Grandtotal</strong></td>
                                                                                    <td>Rp.<?= format_rupiah($grandtotal); ?>
                                                                                    </td>
                                                                                </tr>

                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="content-block">
                                                        Perum Perikanan Indonesia, Jakarta
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </td>
                <td></td>
            </tr>
        </tbody>
    </table>
</body>

<script>
window.print();
</script>

</html>
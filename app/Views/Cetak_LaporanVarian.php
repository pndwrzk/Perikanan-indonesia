<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?= base_url('assets') ?>/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />

</head>

<body>
    <div class="div m-5">
        <h2 style="text-align: center;margin-top: 20px;">Perikanan Indonesia</h2>
        <!-- <p style="text-align: center;"> Jl. Tanjung No.47, RT.002/RW.013, Kunciran Indah, Kec. Pinang, Kota Tangerang,
            Banten 15144. Telp: 081296456033</p> -->

        <hr size="10px" style="border: 1px solid;">

        <div class=" div my-3">
            <h3 class="float-right"><?= $judul   ?></h3>

            <p><strong>Periode : </strong> <?=$awal ?> s/d <?= $akhir ?></p>


        </div>
        <hr size="10px" style="border: 1px solid;">


        <table class="table table-bordered ">
            <thead>
                <tr>

                    <th scope="col">No</th>
                    <th scope="col">Varian</th>
                    <th scope="col">Jumlah</th>

                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach($varian as $v): ?>

                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $v['nm_varian'] ?></td>
                    <td><?= $v['jumlah'] ?></td>
                </tr>

                <?php endforeach; ?>


            </tbody>
        </table>

    </div>


    <script>
    window.print();
    </script>
</body>


</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <title>Perikanan Indonesia</title>
    <link href="<?= base_url('assets') ?>/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
    <link href="<?= base_url('assets') ?>/css/styles.css" rel="stylesheet" crossorigin="anonymous" />
    <link href="<?= base_url('assets') ?>/css/DataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="<?= base_url('assets') ?>/js/all.min.js" crossorigin="anonymous">
    </script>
    <script src="<?= base_url('assets') ?>/js/chart.min.js" crossorigin="anonymous">
    </script>
    <script src="<?= base_url('assets') ?>/js/jquery-3.5.1.min.js" crossorigin="anonymous">
    </script>

    <style>
    .content {
        display: none;
    }
    </style>

</head>

<body class="sb-nav-fixed bg-light">


    <div class="preloader">
        <div id="loading">
        </div>
    </div>
    <div class="content">
        <div class="card container-menu my-5">
            <div class="card-header bg-primary text-white">
                <?php if($judul==1): ?>
                <img src="<?= base_url('assets') ?>/gambar/logo.png" style="width: 150px" alt="Italian Trulli">

                <?php else: ?>
                <h3><?= $judul ?> </h3>
                <?php endif; ?>
            </div>
            <div class="div ">
                <?= $this->renderSection('Content'); ?>

            </div>
            <div class="card-footer bg-primary">
                <p class="float-right text-white mt-1 small">
                    Copyright &copy; Perum Perikanan Indonesia 2021
                </p>
            </div>






        </div>

    </div>
    <script src="<?= base_url('assets') ?>/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="<?= base_url('assets') ?>/js/jquery.dataTables.min.js" crossorigin="anonymous">
    </script>
    <script src="<?= base_url('assets') ?>/js/dataTables.bootstrap4.min.js" crossorigin="anonymous">
    </script>

    <script src="<?= base_url('assets') ?>/js/scripts.js"></script>

    <script type="text/javascript">
    $(document).ready(function() {
        $('#data-table').DataTable();
    });
    </script>


    <script>
    $(document).ready(function() {
        $(".preloader").fadeOut(1800, function() {
            $('.content').fadeIn();
        });
    })
    </script>
    </script>














</body>

</html>
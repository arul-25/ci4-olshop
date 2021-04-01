<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('public/assets/bootstrap'); ?>/css/bootstrap.min.css">
    <title><?= $title; ?></title>
</head>

<body>
    <?= $this->include('navbar'); ?>

    <?= $this->renderSection('content'); ?>

    <script src="<?= base_url('public/assets/bootstrap/'); ?>/js/jquery-3.5.1.min.js"></script>
    <script src="<?= base_url('public/assets/bootstrap/'); ?>/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('public/assets/js/main.js'); ?>"></script>
</body>

</html>
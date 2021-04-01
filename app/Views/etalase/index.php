<?= $this->extend('layout'); ?>
<?= $this->section('content'); ?>
<div class="container mt-5">
    <div class="row">
        <?php foreach ($barang as $row) : ?>
            <div class="col-4">
                <div class="card text-center">
                    <div class="header">
                        <span class="text-success"><strong><?= $row->nama; ?></strong></span>
                    </div>
                    <div class="card-body">
                        <img src="<?= base_url('uploads/' . $row->gambar); ?>" class="img-thumbnail" style="width: 150px; height:150px" alt="">
                        <h5 class="mt-3 text-success">Rp. <?= number_format($row->harga, '0', '', '.'); ?></h5>
                    </div>
                    <p class="text-info">Stok : <?= $row->stock; ?></p>
                    <div class="card-footer">
                        <a href="<?= site_url('etalase/beli/' . $row->id); ?>" style="width: 100%;" class="btn btn-success">Beli</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?= $this->endSection(); ?>
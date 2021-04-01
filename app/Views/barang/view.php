<?= $this->extend('layout'); ?>
<?= $this->section('content'); ?>
<h1>View Barang</h1>
<div class="container">
    <div class="row">
        <div class="col-md">
            <div class="card">
                <div class="card-body">
                    <img src="<?= base_url('uploads/' . $barang->gambar); ?>" class="img-fluid" alt="">
                </div>
            </div>
        </div>
        <div class="col-md">
            <a href="" class="text-success"><?= $barang->nama; ?></a>
            <h4>Harga : Rp. <?= number_format($barang->harga, '0', '', '.'); ?> </h4>
            <h4>Stock : <?= $barang->stock; ?> </h4>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
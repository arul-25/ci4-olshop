<?= $this->extend('layout'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <h1>Form Tambah Barang</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <div class="form-group">
            <label for="nama">Nama Barang</label>
            <input type="text" name="nama" id="nama" class="form-control <?= $validation->getError('nama') != '' ? 'is-invalid' : ''; ?>" value="<?= set_value('nama') != '' ? set_value('nama') : $barang->nama; ?>">
            <div class="invalid-feedback">
                <?= $validation->getError('nama'); ?>
            </div>
        </div>
        <div class="form-group">
            <label for="harga">Harga Barang</label>
            <input type="number" min="0" name="harga" id="harga" class="form-control <?= $validation->getError('harga') != '' ? 'is-invalid' : ''; ?>" value="<?= set_value('harga') != '' ? set_value('harga') : $barang->harga; ?>">
            <div class="invalid-feedback">
                <?= $validation->getError('harga'); ?>
            </div>
        </div>
        <div class="form-group">
            <label for="stock">Stock Barang</label>
            <input type="number" min="0" name="stock" id="stock" class="form-control <?= $validation->getError('stock') != '' ? 'is-invalid' : ''; ?>" value="<?= set_value('stock') != '' ? set_value('stock') : $barang->stock; ?>">
            <div class="invalid-feedback">
                <?= $validation->getError('stock'); ?>
            </div>
        </div>
        <img src="<?= base_url('uploads/' . $barang->gambar); ?>" class="img-fluid" style="width: 150px; height: 150px" alt="">
        <div class="form-group">
            <label for="gambar">Gambar Barang</label>
            <input type="file" name="gambar" id="gambar" class="form-control <?= $validation->getError('gambar') != '' ? 'is-invalid' : ''; ?>">
            <div class="invalid-feedback">
                <?= $validation->getError('gambar'); ?>
            </div>
        </div>

        <input type="hidden" name="gambarLama" value="<?= $barang->gambar; ?>">

        <div class="text-right">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>
<?= $this->endSection(); ?>
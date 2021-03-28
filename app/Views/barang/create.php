<?= $this->extend('layout'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <h1>Form Tambah Barang</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <div class="form-group">
            <label for="nama">Nama Barang</label>
            <input type="text" name="nama" id="nama" class="form-control <?= $validation->getError('nama') != '' ? 'is-invalid' : ''; ?>" value="<?= set_value('nama'); ?>">
            <div class="invalid-feedback">
                <?= $validation->getError('nama'); ?>
            </div>
        </div>
        <div class="form-group">
            <label for="harga">Harga Barang</label>
            <input type="number" min="0" name="harga" id="harga" class="form-control <?= $validation->getError('harga') != '' ? 'is-invalid' : ''; ?>">
            <div class="invalid-feedback">
                <?= $validation->getError('harga'); ?>
            </div>
        </div>
        <div class="form-group">
            <label for="stock">Stock Barang</label>
            <input type="number" min="0" name="stock" id="stock" class="form-control <?= $validation->getError('stock') != '' ? 'is-invalid' : ''; ?>">
            <div class="invalid-feedback">
                <?= $validation->getError('stock'); ?>
            </div>
        </div>
        <div class="form-group">
            <label for="gambar">Gambar Barang</label>
            <input type="file" name="gambar" id="gambar" class="form-control <?= $validation->getError('gambar') != '' ? 'is-invalid' : ''; ?>" required>
            <div class="invalid-feedback">
                <?= $validation->getError('gambar'); ?>
            </div>
        </div>

        <div class="text-right">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>
<?= $this->endSection(); ?>
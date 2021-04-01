<?= $this->extend('layout'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <h1>Form Beli Barang</h1>
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <img src="<?= base_url('uploads/' . $barang->gambar); ?>" class="img-fluid img-thumbnail" style="width: 300px; height:300px" alt="">
                    <h1 class="text-success"><?= $barang->nama; ?></h1>
                    <h4>Harga : Rp .<?= number_format($barang->harga, '0', '', ''); ?></h4>
                    <h4>Stock : <?= $barang->stock; ?></h4>
                </div>
            </div>
        </div>
        <div class="col-6">
            <h4>Pengiriman</h4>
            <div class="form-group">
                <label for="provinsi">Pilih Provinsi</label>
                <select name="provinsi" id="provinsi" class="form-control" onchange="Kabupaten()">
                    <option value="">-- Pilih Provinsi --</option>
                    <?php foreach ($provinsi as $row) : ?>
                        <option value="<?= $row->province_id; ?>"><?= $row->province; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="kabupaten">Pilih Kabupaten</label>
                <select name="kabupaten" id="kabupaten" class="form-control" onchange="service()">
                    <option value="">-- Pilih Kabupaten --</option>
                </select>
            </div>
            <div class="form-group">
                <label for="service">Pilih Service</label>
                <select name="service" id="service" class="form-control" onchange="estimasi()">
                    <option value="">-- Pilih Kabupaten --</option>
                </select>
            </div>
            <strong>Estimasi : <span id="estimasi"></span></strong>
            <form action="" method="POST">
                <?= csrf_field(); ?>
                <input type="hidden" id="harga" value="<?= $barang->harga; ?>">
                <input type="hidden" name="id_barang" value="<?= $barang->id; ?>">
                <input type="hidden" name="id_pembeli" value="<?= session()->get('id'); ?>">
                <div class="form-group">
                    <label for="jumlah">Jumlah Barang</label>
                    <input type="number" name="jumlah" id="jumlah" max="<?= $barang->stock; ?>" class="form-control <?= $validation->getError('jumlah') != '' ? 'is-invalid' : ''; ?>" value="<?= set_value('jumlah'); ?>" onchange="jumlahHarga()">
                    <div class="invalid-feedback">
                        <?= $validation->getError('jumlah'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" min="0" name="alamat" id="alamat" class="form-control <?= $validation->getError('alamat') != '' ? 'is-invalid' : ''; ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('alamat'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="total_harga">total harga</label>
                    <input type="text" name="total_harga" id="total_harga" class="form-control <?= $validation->getError('total_harga') != '' ? 'is-invalid' : ''; ?>" readonly>
                    <div class="invalid-feedback">
                        <?= $validation->getError('total_harga'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="ongkir">Ongkir</label>
                    <input type="text" name="ongkir" id="ongkir" class="form-control <?= $validation->getError('ongkir') != '' ? 'is-invalid' : ''; ?>" readonly>
                    <div class="invalid-feedback">
                        <?= $validation->getError('ongkir'); ?>
                    </div>
                </div>

                <div class="text-right">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>

</div>
<?= $this->endSection(); ?>
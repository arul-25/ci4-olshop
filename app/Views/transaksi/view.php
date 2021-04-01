<?= $this->extend('layout'); ?>
<?= $this->section('content'); ?>

<table class="table">
    <tr>
        <td>Barang</td>
        <td><?= $transaksi->nama; ?></td>
    </tr>
    <tr>
        <td>Pembeli</td>
        <td><?= $transaksi->username; ?></td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td><?= $transaksi->alamat; ?></td>
    </tr>
    <tr>
        <td>Jumlah</td>
        <td><?= $transaksi->jumlah; ?></td>
    </tr>
    <tr>
        <td>Total Harga</td>
        <td>Rp. <?= number_format($transaksi->total_harga, '0', '', '.'); ?></td>
    </tr>
</table>

<?= $this->endSection(); ?>
<?= $this->extend('layout'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Barang</th>
                <th>Pembeli</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $nomor = 1; ?>
            <?php foreach ($transaksi as $row) : ?>
                <tr>
                    <td><?= $nomor++; ?></td>
                    <td><?= $row->id; ?></td>
                    <td><?= $row->id_barang; ?></td>
                    <td><?= $row->id_pembeli; ?></td>
                    <td><?= $row->alamat; ?></td>
                    <td><?= $row->jumlah; ?></td>
                    <td><?= $row->total_harga; ?></td>
                    <td>
                        <a href="<?= site_url('transaksi/view' . $row->id); ?>" class="btn btn-primary">View</a>
                        <a href="<?= site_url('transaksi/invoice/' . $row->id); ?>" class="btn btn-info">Invoice</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection(); ?>
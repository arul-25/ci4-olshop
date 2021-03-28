<?= $this->extend('layout'); ?>
<?= $this->section('content'); ?>

<h1>Barang</h1>
<table class="table">
    <thead>
        <th>No</th>
        <th>Barang</th>
        <th>Gambar</th>
        <th>Harga</th>
        <th>Stock</th>
        <th>Aksi</th>
    </thead>
    <tbody>
        <?php foreach ($barang as $index => $row) : ?>
            <tr>
                <td><?= $index++; ?></td>
                <td><?= $row->nama; ?></td>
                <td>
                    <img src="<?= base_url('uploads/' . $row->gambar) ?>" class="img-fluid" width="100px" height="100px" alt="">
                </td>
                <td><?= $row->harga; ?></td>
                <td><?= $row->stock; ?></td>
                <td>
                    <a href="<?= site_url('barang/view/' . $row->id) ?>" class="btn btn-primary">View</a>
                    <a href="<?= site_url('barang/update/' . $row->id); ?>" class="btn btn-success">Update</a>
                    <form action="<?= site_url('barang/delete'); ?>" class="d-inline" method="POST">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="id" value="<?= $row->id; ?>">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->endSection(); ?>
<?= $this->extend('layout'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="mt-2">
        <?= session()->getFlashdata('pesan'); ?>
    </div>
    <h1>Form Login</h1>
    <form action="" method="POST">
        <?= csrf_field(); ?>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" class="form-control <?= $validation->getError('username') != '' ? 'is-invalid' : ''; ?>" value="<?= set_value('username'); ?>">
            <div class="invalid-feedback">
                <?= $validation->getError('username'); ?>
            </div>

        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control <?= $validation->getError('password') != '' ? 'is-invalid' : '' ?>">
            <div class="invalid-feedback">
                <?= $validation->getError('password'); ?>
            </div>
        </div>
        <div class="text-right">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>
<?= $this->endSection(); ?>
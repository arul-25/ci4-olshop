<?= $this->extend('layout'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <h1>Register Form</h1>
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
            <input type="password" name="password" id="password" class="form-control <?= $validation->getError('password') != '' ? 'is-invalid' : ''; ?>">
            <div class="invalid-feedback">
                <?= $validation->getError('password'); ?>
            </div>
        </div>
        <div class="form-group">
            <label for="repeat_password">Repeat Password</label>
            <input type="password" name="repeat_password" id="repeat_password" class="form-control <?= $validation->getError('repeat_password') != '' ? 'is-invalid' : ''; ?>">
            <div class="invalid-feedback">
                <?= $validation->getError('repeat_password'); ?>
            </div>
        </div>
        <div class="text-right">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>
<?= $this->endSection(); ?>
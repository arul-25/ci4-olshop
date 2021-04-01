<nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <?php if (session()->get('isLoggedIn') and session()->get('isLoggedIn') == true) : ?>
                <?php if (session()->get('role') == 0) : ?>
                    <li class="nav-item dropdown">
                        <a href="" id="dropdown1" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Barang</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown01">
                            <a href="<?= site_url('barang/index'); ?>" class="dropdown-item">List Barang</a>
                            <a href="<?= site_url('barang/create'); ?>" class="dropdown-item">Tambah Barang</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('transaksi/index'); ?>">Transaksi</a>
                    </li>
                <?php else : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('etalase/index'); ?>">Etalase</a>
                    </li>
                <?php endif; ?>
            <?php endif; ?>
        </ul>
        <div class="form-inline my-2 my-lg-0">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <?php if (session()->get('isLoggedIn')) : ?>
                        <a href="<?= site_url('auth/logout'); ?>" class="btn btn-success">Logout</a>
                    <?php else : ?>
                        <a href="<?= site_url('auth/login'); ?>" class="btn btn-success">Login</a>
                        <a href="<?= site_url('auth/register'); ?>" class="btn btn-success">Register</a>
                    <?php endif; ?>
                </li>
            </ul>
        </div>
    </div>
</nav>
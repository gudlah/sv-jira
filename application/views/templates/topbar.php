<div id="topbar">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Sharing Vision</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto">
                <a class="nav-link <?= ($id == 1)? 'active' : '' ?>" href="<?= base_url(); ?>">Data</a>
                <a class="nav-link <?= ($id == 2)? 'active' : '' ?>" href="<?= base_url('chart'); ?>">Chart</a>
            </div>
        </div>
    </nav>
</div>
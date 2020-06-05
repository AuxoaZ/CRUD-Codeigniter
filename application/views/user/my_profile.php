<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
    <div class="flash-data-fail" data-flashdata-fail="<?= $this->session->flashdata('fail'); ?>"></div>

    <!-- Page Heading -->
    <div class="card border-light mb-3 shadow-sm mb-5 bg-white rounded px-3 py-3" style="max-width: 700px;">
        <div class="card-body">
            <div class="row mb-5">
                <div class="col-md-4">
                    <h1 class="h3 mb-0 text-gray-800">My Profile</h1>
                </div>
            </div>
            <div class="row no-gutters pl-4">
                <div class="col-md-4">
                    <img src="<?= base_url('assets/img/') . $user['image']; ?>" class="card-img " style="width: 100%; height:auto;">
                </div>
                <div class="col-md-8 pl-3">
                    <h5 class="card-title"><?= $user['name']; ?></h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <h5 class="card-title"><?= $user['email']; ?></h5>
                    <p class="card-text"><small class="text-muted">Member since : <?= date('d F Y', $user['date_created']); ?></small></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
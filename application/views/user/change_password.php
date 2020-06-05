<!-- Begin Page Content -->
<div class="container-fluid">


    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
    <div class="flash-data-fail" data-flashdata-fail="<?= $this->session->flashdata('fail'); ?>"></div>

    <!-- Page Heading -->
    <div class="card border-light mb-3 shadow-sm mb-5 bg-white rounded px-3 py-3" style="max-width: 700px;">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-lg-10">
                    <h1 class="h3 card-title text-gray-800 mb-5"><?= $title; ?></h1>
                </div>
            </div>
            <div class="row pl-3">
                <div class="col-lg-12">
                    <form action="<?= base_url('user/changePassword'); ?>" method="post">
                        <?php if (!form_error('current_password')) : ?>
                            <div class="form-group row">
                                <label for="current_password" class="col-sm-3 col-form-label">Current Password</label>
                                <div class="col-sm-7">
                                    <input type="password" class="form-control" id="current_password" name="current_password">
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if (form_error('current_password')) : ?>
                            <div class="form-group row my-0">
                                <label for="current_password" class="col-sm-3 col-form-label my-0">Current Password</label>
                                <div class="col-sm-7 my-0">
                                    <input type="password" class="form-control my-0" id="current_password" name="current_password">
                                    <small id="emailHelp" class="form-text text-danger my-0">
                                        <p class="my-0"><?= form_error('current_password'); ?></p>
                                    </small>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if (!form_error('new_password1')) : ?>
                            <div class="form-group row">
                                <label for="new_password1" class="col-sm-3 col-form-label">New Password</label>
                                <div class="col-sm-7">
                                    <input type="password" class="form-control" id="new_password1" name="new_password1">
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if (form_error('new_password1')) : ?>
                            <div class="form-group row my-0">
                                <label for="new_password1" class="col-sm-3 col-form-label my-0">New Password</label>
                                <div class="col-sm-7 my-0">
                                    <input type="password" class="form-control my-0" id="new_password1" name="new_password1">
                                    <small id="emailHelp" class="form-text text-danger my-0">
                                        <p class="my-0"><?= form_error('new_password1'); ?></p>
                                    </small>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="form-group row">
                            <label for="new_password2" class="col-sm-3 col-form-label">Repeat Password</label>
                            <div class="col-sm-7">
                                <input type="password" class="form-control" id="new_password2" name="new_password2">
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-info mt-4">Change</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- /.container-fluid -->
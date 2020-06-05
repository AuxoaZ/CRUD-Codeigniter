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
            <div class="row pl-4">
                <div class="col-lg-10">
                    <?php echo form_open_multipart('user/editProfile'); ?>
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name" value="<?= $user['name']; ?>">
                            <?php if (form_error('name')) : ?>
                                <small id="emailHelp" class="form-text text-danger"><?= form_error('name'); ?></small>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-2"> Pictures</div>
                        <div class="col-lg-10">
                            <div class="row">
                                <div class="col-3">
                                    <img src="<?= base_url('assets/img/') . $user['image']; ?>" class="card-img">
                                </div>
                                <div class="col-9">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" name="image">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-lg-10">
                            <button type="submit" class="btn btn-info mt-4">Edit</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
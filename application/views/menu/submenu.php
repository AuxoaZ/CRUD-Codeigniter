<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
    <div class="flash-data-fail" data-flashdata-fail="<?= $this->session->flashdata('fail'); ?>"></div>

    <!-- Page Heading -->
    <div class="card border-light mb-3 shadow-sm mb-3 bg-white pl-3 py-3 rounded" style="max-width: 900px;">
        <div class="card-body">
            <div class="row mb-5">
                <div class="col-6">
                    <h1 class="h3 card-title text-gray-800"><?= $title; ?></h1>
                </div>
            </div>
            <div class="row px-4">
                <div class="col">
                    <a href="" class="btn btn-info mb-3 addSubMenuBtn" data-toggle="modal" data-target="#submenu" data-id=""> Add sub new menu </a>

                    <table class=" table table-hover  mt-1">

                        <thead>
                            <tr class="table">
                                <th scope="col" class="text-center">No</th>
                                <th scope="col">Title</th>
                                <th scope="col" class="text-center">Menu</th>
                                <th scope="col">URL</th>
                                <th scope="col">Icon</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($submenu as $sm) : ?>
                                <tr>
                                    <td class="text-center">
                                        <?= $i++; ?>
                                    </td>
                                    <td>
                                        <?= $sm['title']; ?>
                                    </td>
                                    <td class="text-center">
                                        <?= $sm['menu']; ?>
                                    </td>
                                    <td>
                                        <?= $sm['url']; ?>
                                    </td>
                                    <td>
                                        <i class="<?= $sm['icon']; ?>"></i>
                                    </td>
                                    <td class="text-center">
                                        <!-- data-id digunakan untuk mengirimkan id ke jquery -->
                                        <a href=" <?= base_url('submenu/edit/'); ?><?= $sm['id']; ?>" class="text-secondary mr-2 editSubMenuBtn" data-toggle="modal" data-target="#submenu" data-id="<?= $sm['id'] ?>">Edit</a>
                                        <a href="<?= base_url('submenu/delete/'); ?><?= $sm['id']; ?>" class="text-danger tombol-hapus">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal add menu-->
<div class="modal fade" id="submenu" tabindex="-1" role="dialog" aria-labelledby="menu" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="SubMenuLabel">Add new submenu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <input type="hidden" name="id" id="idInput">
                    <div class="form-group">
                        <input type="text" class="form-control" id="title" name="title" placeholder="title">
                    </div>
                    <div class="form-group">
                        <select class="custom-select" id="selectmenu" name="selectmenu">
                            <option selected>Choose...</option>
                            <?php foreach ($menu as $m) : ?>
                                <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="url" name="url" placeholder="URL for controller">
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="icon" name="icon">
                            <option selected>----</option>
                            <?php foreach ($icon as $icn) : ?>
                                <span style="font-size: 3em; color: red;">
                                    <option value="<?= $icn; ?>"><i class="<?= $icn; ?>"></i><?= $icn; ?></option>
                                </span>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="active" name="active" checked>
                            <label class="form-check-label" for="active">
                                Is active?
                            </label>
                        </div>
                    </div>
            </div>
            <div class=" modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-info">Add</button>
            </div>
            </form>
        </div>
    </div>
</div>
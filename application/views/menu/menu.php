<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
    <div class="flash-data-fail" data-flashdata-fail="<?= $this->session->flashdata('fail'); ?>"></div>

    <!-- Page Heading -->
    <div class="card border-light mb-3 shadow-sm p  mb-3 bg-white px-3 py-3 rounded" style="max-width: 700px">
        <div class=" card-body">
            <div class="row mb-5">
                <div class="col-lg-6">
                    <h1 class="h3 card-title text-gray-800"><?= $title; ?></h1>
                </div>
            </div>
            <div class="row mb-3 pl-4">
                <div class="col-lg-7">
                    <a href="" class="btn btn-info addMenuBtn" data-toggle="modal" data-target="#menu" data-id=""> Add new menu </a>

                </div>
            </div>
            <div class="row pl-4">
                <div class=" col-lg-8">
                    <table class=" table table-hover ">

                        <thead>
                            <tr class="table">
                                <th scope="col" class="text-center">No</th>
                                <th scope="col">Menu</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($menu as $m) : ?>
                                <tr>
                                    <td class="text-center">
                                        <?= $i++; ?>
                                    </td>
                                    <td>
                                        <?= $m['menu']; ?>
                                    </td>
                                    <td class="text-center">
                                        <a href=" <?= base_url('menu/edit/'); ?><?= $m['id']; ?>" class="text-secondary mr-2 editMenuBtn" data-toggle="modal" data-target="#menu" data-id="<?= $m['id'] ?>">Edit</a>
                                        <!-- data-id digunakan untuk mengirimkan id ke jquery -->
                                        <a href="<?= base_url('menu/delete/'); ?><?= $m['id']; ?>" class="text-danger tombol-hapus">Delete</a>
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
<div class="modal fade" id="menu" tabindex="-1" role="dialog" aria-labelledby="menu" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="MenuLabel">Add new menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <input type="hidden" name="id" id="idInput">
                    <div class="form-group">
                        <input type="text" class="form-control" id="menuInput" name="menu" placeholder="input menu name">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-info">Add</button>
            </div>
            </form>
        </div>
    </div>
</div>
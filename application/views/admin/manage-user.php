<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
    <div class="flash-data-fail" data-flashdata-fail="<?= $this->session->flashdata('fail'); ?>"></div>

    <!-- Page Heading -->
    <div class="card border-light mb-3 shadow-sm p  mb-3 bg-white px-3 py-3 rounded" style="max-width: 900px">
        <div class=" card-body">
            <div class="row mb-5">
                <div class="col-lg-6">
                    <h1 class="h3 card-title text-gray-800"><?= $title; ?></h1>
                </div>
            </div>
            <div class="row mb-3 pl-4">
            </div>
            <div class="row px-4 ">
                <div class=" col-lg-12">
                    <table class=" table table-hover  ">

                        <thead>
                            <tr class="table">
                                <th scope="col" class="text-center">No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col" class="text-center">Access</th>
                                <th scope="col" class="text-center">Active</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($data as $usr) : ?>
                                <tr>
                                    <td class="text-center">
                                        <?= $i++; ?>
                                    </td>
                                    <td>
                                        <?= $usr['name']; ?>
                                    </td>
                                    <td>
                                        <?= $usr['email']; ?>
                                    </td>
                                    <td class="text-center">
                                        <?= $usr['role']; ?>
                                    </td>
                                    <?php if ($usr['is_active'] == "Yes") : ?>
                                        <td class="text-center">
                                            <span class="badge badge-success">Yes</span>
                                        </td>
                                    <?php else : ?>
                                        <td class="text-center">
                                            <span class="badge badge-danger">No</span>
                                        </td>
                                    <?php endif; ?>
                                    <td class="text-center">
                                        <!-- data-id digunakan untuk mengirimkan id ke jquery -->
                                        <a href=" <?= base_url('Admin/edit/'); ?><?= $usr['id']; ?>" class="text-secondary mr-2 tombol-edit" data-toggle="modal" data-target="#addUser" data-id="<?= $usr['id']; ?>">Edit</a>

                                        <a href="<?= base_url('Admin/delete/'); ?><?= $usr['id']; ?>" class="text-danger tombol-hapus">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="addUserLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addUserLabel">Add new menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <input type="hidden" name="id" id="idInput">
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="access">Acess</label>
                                <select class="custom-select" id="access" name="access">
                                    <?php foreach ($role as $r) : ?>
                                        <option value="<?= $r['id']; ?>"><?= $r['role']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group col-6">
                                <label for="active">Active</label>
                                <select class="form-control" id="active" name="active">
                                    <?php foreach ($active as $a) : ?>
                                        <option value="<?= $a; ?>"><?= $a; ?></option>
                                    <?php endforeach; ?>
                                </select>
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
</div>
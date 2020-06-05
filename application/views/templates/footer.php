</div>
<!-- End of Main Content -->
<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; nalviansend@gmail.com 2020</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('auth/logout') ?>">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?= base_url('assets/'); ?>vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url('assets/'); ?>js/demo/chart-area-demo.js"></script>
<script src="<?= base_url('assets/'); ?>js/demo/chart-pie-demo.js"></script>

<!-- Flash data notiflix -->
<script src="<?= base_url(); ?>assets/js/notiflix-aio-2.1.3.min.js"></script>
<script src="<?= base_url(); ?>assets/js/myscript.js"></script>

<!-- modal -->
<script>
    $('.custom-file-input').on('change', function() {

        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });


    $(function() {

        //edit di manage user
        $('.tombol-edit').on('click', function() {

            $('#addUserLabel').html('Edit user');
            $('.modal-footer button[type=submit').html('Edit');
            $('.modal-body form').attr('action', 'http://localhost/project_web1/admin/edit');

            const id = $(this).data('id');


            $.ajax({

                //minta data ke method
                url: 'http://localhost/project_web1/admin/getUser',
                // sekalian mengirimkan id
                data: {
                    id: id
                },
                method: 'post',
                //lalu dikembalikan berbentuk json
                dataType: 'json',
                success: function(data) {



                    //ubah value nama input berdasar id 
                    $('#access').val(data.role_id);
                    $('#active').val(data.is_active);
                    $('#idInput').val(data.id);
                }


            });

        });
        // modal add di menu
        $('.addMenuBtn').on('click', function() {

            $('#MenuLabel').html('Add new menu');
            $('.modal-footer button[type=submit').html('Add');
            $('.modal-body form').attr('action', 'http://localhost/project_web1/menu/addMenu');

            $('#menuInput').val('');
        });

        //modal edit di menu
        $('.editMenuBtn').on('click', function() {

            $('#MenuLabel').html('Edit menu');
            $('.modal-footer button[type=submit').html('Edit');
            $('.modal-body form').attr('action', 'http://localhost/project_web1/menu/edit');

            const id = $(this).data('id');


            $.ajax({

                //minta data ke method
                url: 'http://localhost/project_web1/menu/getMenu',
                // sekalian mengirimkan id
                data: {
                    id: id
                },
                method: 'post',
                //lalu dikembalikan berbentuk json
                dataType: 'json',
                success: function(data) {

                    //ubah value nama input berdasar id 
                    $('#menuInput').val(data.menu);
                    $('#idInput').val(data.id);
                }


            });

        });

        // modal add di submenu
        $('.addSubMenuBtn').on('click', function() {

            $('#SubMenuLabel').html('Add new submenu');
            $('.modal-footer button[type=submit').html('Add');
            $('.modal-body form').attr('action', 'http://localhost/project_web1/submenu/add');

            $('#SubMenuInput').val('');
            $('#title').val('');
            $('#selectmenu').val('');
            $('#url').val('');
            $('#icon').val('');
        });

        //modal edit di submenu
        $('.editSubMenuBtn').on('click', function() {

            $('#SubMenuLabel').html('Edit submenu');
            $('.modal-footer button[type=submit').html('Edit');
            $('.modal-body form').attr('action', 'http://localhost/project_web1/submenu/edit');

            const id = $(this).data('id');


            $.ajax({

                //minta data ke method
                url: 'http://localhost/project_web1/submenu/getSubMenu',
                // sekalian mengirimkan id
                data: {
                    id: id
                },
                method: 'post',
                //lalu dikembalikan berbentuk json
                dataType: 'json',
                success: function(data) {

                    // ubah value nama input berdasar id
                    $('#title').val(data.title);
                    $('#selectmenu').val(data.menu_id);
                    $('#url').val(data.url);
                    $('#icon').val(data.icon);
                    $('#idInput').val(data.id);
                }


            });

        });

    });
</script>

</body>

</html>
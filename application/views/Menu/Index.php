<!-- =============================================== -->

<!-- Left side column. contains the sidebar -->


<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $title; ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">Blank page</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">



        <div class="box">
            <div class="box-header">
                <h3 class="box-title"> Daftar Menu <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-default"><i class="fa fa-plus"></i> Add </button></h3>
                <div>
                    <?= $this->session->flashdata('message'); ?>
                    <?= form_error('menu_input', '<div class="alert alert-danger" role="alert">', '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>', '</div>'); ?>
                </div>
            </div>


            <!-- /.box-header -->
            <div class="box-body">

                <table id="example2" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Menu</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $y = 1; ?>
                        <?php foreach ($menu as $m) : ?>
                            <tr>

                                <td><?= $y; ?></td>
                                <td><?= $m['menu']; ?></td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modalaa-default">
                                        edit
                                    </button>
                                    <a href="" class="btn btn-warning btn-xs">Delete</a>
                                </td>
                            </tr>
                            <?php $y++; ?>
                        <?php endforeach; ?>
                    </tbody>
                    </tfoot>
                </table>




                <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<div class="modal fade" id="modalnew-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Default Modal</h4>
            </div>
            <form action="<?= base_url('Menu'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Menu</label>
                        <input type="text" class="form-control" id="menu_input" name="menu_input" placeholder="Nama Menu">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup ae</button>
                    <button type="submit" class="btn btn-primary">Tambah wes</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Default Modal</h4>
            </div>
            <form action="<?= base_url('Menu'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Menu</label>
                        <input type="text" class="form-control" id="menu_input" name="menu_input" placeholder="Nama Menu">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
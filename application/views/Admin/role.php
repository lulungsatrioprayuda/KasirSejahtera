<div class="content-wrapper">
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
                <h3 class="box-title"> Daftar Menu <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalRole-default"><i class="fa fa-plus"></i> Add New Role</button></h3>
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
                        <?php foreach ($role as $r) : ?>
                            <tr>

                                <td><?= $y; ?></td>
                                <td><?= $r['role']; ?></td>
                                <td>
                                    <a href="<?= base_url('Admin/Roleaccess/') . $r['id']; ?>" class="btn btn-success btn-xs">Access</a>
                                    <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modalaa-default">
                                        edit
                                    </button>
                                    <a href="" class="btn btn-danger btn-xs">Delete</a>
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

<div class="modal fade" id="modalRole-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Role Name</h4>
            </div>
            <form action="<?= base_url('Admin/Role'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Nama Role</label>
                        <input type="text" class="form-control" id="role_input" name="role_input" placeholder="Nama Menu">
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
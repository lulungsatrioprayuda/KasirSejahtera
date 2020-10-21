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
                <h3 class="box-title"> Daftar Menu <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#SubMenumodal"><i class="fa fa-plus"></i> Add Submenu </button></h3>
                <div>
                    <?= $this->session->flashdata('message'); ?>
                    <?php if (validation_errors()) : ?>
                        <div class="alert alert-danger" role="alert"> <?= validation_errors(); ?></div>
                    <?php endif; ?>
                </div>
            </div>


            <!-- /.box-header -->
            <div class="box-body">

                <table id="example2" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Title</th>
                            <th>Menu</th>
                            <th>Url</th>
                            <th>icon</th>
                            <th>active?</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $y = 1; ?>
                        <?php foreach ($submenu as $ssm) : ?>
                            <tr>

                                <td><?= $y; ?></td>
                                <td><?= $ssm['title_db']; ?></td>
                                <td><?= $ssm['menu']; ?></td>
                                <td><?= $ssm['url']; ?></td>
                                <td><?= $ssm['icon']; ?></td>
                                <td><?= $ssm['is_active_menu']; ?></td>
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


<div class="modal fade" id="SubMenumodal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Default Modal</h4>
            </div>
            <form action="<?= base_url('Menu/Submenu'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Title SubMenu</label>
                        <input type="text" class="form-control" id="sub_menu_input" name="sub_menu_input" placeholder="judul Sub Menu">
                    </div>

                    <div class="form-group">
                        <label for="formGroupExampleInput">Menu</label>
                        <select name="menu_id_input" id="menu_id_input" class="form-control">
                            <option value="">Pilih Menu</option>
                            <?php foreach ($menu as $mn) : ?>
                                <option value="<?= $mn['id']; ?>"><?= $mn['menu']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="formGroupExampleInput">Url</label>
                        <input type="text" class="form-control" id="url_submenu" name="url_submenu" placeholder="link nya">
                    </div>

                    <div class="form-group">
                        <label for="formGroupExampleInput">Icon</label>
                        <input type="text" class="form-control" id="icon_submenu" name="icon_submenu" placeholder="masukan icon menu">
                    </div>


                    <div class="form-group">
                        <div class="checkbox">
                            <label for="is_active_input">
                                <input type="checkbox" name="is_active_input" value="1" id="is_active_input" checked>
                                active?
                            </label>
                        </div>


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
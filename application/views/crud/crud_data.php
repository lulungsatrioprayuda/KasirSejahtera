<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <!-- <?= $page; ?> -->
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
                <h3 class="box-title"> Daftar Menu <a href="Crud/add/" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Crud</a></h3>
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
                        <?php $no = 1; ?>
                        <?php foreach ($rows->result() as $row => $data) : ?>
                            <tr>

                                <td><?= $no++; ?></td>
                                <td><?= $data->nama_crud; ?></td>
                                <td><?= $data->nohp_crud; ?></td>
                                <td>
                                    <a href="<?= base_url('Crud/edit/' . $data->id)  ?>" class="btn btn-success btn-xs">Edit</a>
                                    <a href="<?= base_url('Crud/delete/' . $data->id)  ?>" class="btn btn-danger btn-xs">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    </tfoot>
                </table>




                <!-- /.box -->

    </section>
    <!-- /.content -->
</div>

<!-- /.content-wrapper -->
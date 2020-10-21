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
                <div>
                    <?= $this->session->flashdata('message'); ?>
                    <h4>Role : <?= $role['role']; ?></h4>
                </div>
            </div>


            <!-- /.box-header -->
            <div class="box-body">

                <table id="example2" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Menu</th>
                            <th>Access</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $y = 1; ?>
                        <?php foreach ($menu as $m) : ?>
                            <tr>

                                <td><?= $y; ?></td>
                                <td><?= $m['menu']; ?></td>
                                <td>
                                    <div class="form-check" type="checkbox">
                                        <input class="form-check-input" type="checkbox" <?= check_access($role['id'], $m['id']); ?> data-role="<?= $role['id']; ?>" data-menu="<?= $m['id']; ?>">
                                    </div>
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
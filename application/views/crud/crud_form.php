<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <?= $page; ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">Blank page</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-lg-7">

                <form action="<?= base_url('Crud/Process'); ?>" method="post">
                    <div class="box box-warning">
                        <div class="box-header with-border">
                            <!-- <?= $this->session->flashdata('message'); ?> -->
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <input type="hidden" name="id" value="<?= $rows->id ?>">
                                <label for="current_password">Nama nya</label>
                                <input type="text" class="form-control" value="<?= $rows->nama_crud; ?>" id="nama" name="nama">
                                <!-- <?= form_error('current_password', '<small class="text-danger pl-3 pr-3">', '</small>'); ?> -->
                            </div>
                            <div class="form-group">
                                <label for="new_password">Nomor Hp</label>
                                <input type="text" class="form-control" value="<?= $rows->nohp_crud; ?>" id="nohp" name="nohp">
                            </div>

                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" name="<?= $page; ?>" class="btn btn-primary">Submit</button>
                        </div>

                </form>
            </div>
            </form>
        </div>
</div>
</section>
</div>
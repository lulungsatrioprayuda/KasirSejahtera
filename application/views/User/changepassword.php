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

    <section class="content">
        <div class="row">
            <div class="col-lg-7">

                <form action="<?= base_url('User/Changepassword'); ?>" method="post">
                    <div class="box box-warning">
                        <div class="box-header with-border">
                            <?= $this->session->flashdata('message'); ?>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="current_password">Password Sekarang</label>
                                <input type="password" class="form-control" id="current_password" name="current_password">
                                <?= form_error('current_password', '<small class="text-danger pl-3 pr-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="new_password">Password Sekarang</label>
                                <input type="password" class="form-control" id="new_password" name="new_password">
                                <?= form_error('new_password', '<small class="text-danger pl-3 pr-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="new_password1">Password Sekarang</label>
                                <input type="password" class="form-control" id="new_password1" name="new_password1">
                                <?= form_error('new_password', '<small class="text-danger pl-3 pr-3">', '</small>'); ?>
                            </div>

                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>

                </form>
            </div>
            </form>
        </div>
</div>
</section>
</div>
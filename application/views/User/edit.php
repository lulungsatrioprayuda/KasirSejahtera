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



        <div class="row">
            <div class="col-lg-9">
                <?= form_open_multipart('User/edit'); ?>
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Silahkan Ubah Data anda yang di inginkan</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="email_edit">Email address</label>
                            <input type="email" value="<?= $user['email']; ?>" class="form-control" id="email_edit" name="email_edit" readonly>
                        </div>
                        <div class="form-group">
                            <label for="name_edit">Full Name</label>
                            <input type="text" value="<?= $user['name']; ?>" class="form-control" id="name_edit" name="name_edit">
                            <?= form_error('name_edit', '<small class="text-danger pl-3 pr-3">', '</small>'); ?>
                        </div>


                        <div class="form-group">

                            <div class="col-2">Picture</div>
                            <div class="col-sm 10">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-thumbnail">
                                    </div>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="img_edit" id="img_edit">
                                    <label class="custom-file-label" for="img_edit">Choose file</label>
                                </div>
                            </div>

                            <!-- <p class="help-block">Example block-level help text here.</p> -->
                        </div>
                        <!-- <div class="checkbox">
                                <label>
                                    <input type="checkbox"> Check me out
                                </label>
                            </div> -->
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

        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
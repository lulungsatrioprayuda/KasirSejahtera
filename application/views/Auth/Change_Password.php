<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="<?= base_url('assets'); ?>/index2.html"><b>Anjimg</b>BANGET</a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Ubah Password e?</p>
            <p class="login-box-msg"><?= $this->session->userdata('reset_email'); ?></p>
            <?= $this->session->flashdata('message'); ?>
            <form action="<?= base_url('Auth/changePassword'); ?>" method="post">
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" name="password1" id="password1" placeholder="Masuk o password">
                    <?= form_error('password1', '<small class="text-danger pl-3 pr-3">', '</small>'); ?>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" name="password2" id="password2" placeholder="Ulangi password e">
                    <?= form_error('password2', '<small class="text-danger pl-3 pr-3">', '</small>'); ?>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>

                <div class="row">
                    <div class="col-xs-8">

                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Ubah</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>


            <!-- /.social-auth-links -->

        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->
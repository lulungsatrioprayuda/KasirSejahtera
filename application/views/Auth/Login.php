<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="<?= base_url('assets'); ?>/index2.html"><b>Anjimg</b>BANGET</a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Ikan hiu makan tomat</p>
            <?= $this->session->flashdata('message'); ?>
            <form action="<?= base_url('Auth'); ?>" method="post">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" value="<?= set_value('email_login'); ?>" name="email_login" id="email_login" placeholder="Email">
                    <?= form_error('email_login', '<small class="text-danger pl-3 pr-3">', '</small>'); ?>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" id="password_login" name="password_login" placeholder="Password">
                    <?= form_error('password_login', '<small class="text-danger pl-3 pr-3">', '</small>'); ?>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8">

                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>


            <!-- /.social-auth-links -->

            <a href="<?= base_url('Auth/forgotPassword'); ?>">Lali password e le?</a><br>
            <a href="<?= base_url('Auth/Registration'); ?>" class="text-center">Awakmu wong anyar?</a>

        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->
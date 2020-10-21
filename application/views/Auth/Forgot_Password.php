<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="<?= base_url('assets'); ?>/index2.html"><b>Anjimg</b>BANGET</a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Lali Password e?</p>
            <?= $this->session->flashdata('message'); ?>
            <form action="<?= base_url('Auth/forgotPassword'); ?>" method="post">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" name="email_regis" id="email_regis" placeholder="Email">
                    <?= form_error('email_regis', '<small class="text-danger pl-3 pr-3">', '</small>'); ?>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>

                <div class="row">
                    <div class="col-xs-8">

                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Reset</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>


            <!-- /.social-auth-links -->
            <a href="<?= base_url('Auth'); ?>" class="text-center">Balik neh kalo awakmu eleng password e</a>

        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->
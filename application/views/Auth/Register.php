<div class="register-box" style="background-color:bisque;">
    <div class="register-logo">
        <a href="../../index2.html"><b>Admin</b>LTE</a>
    </div>

    <div class="register-box-body" style="background-color: antiquewhite;">
        <p class="login-box-msg">Register a new membership</p>

        <form action="<?= base_url('Auth/Registration'); ?>" method="post">
            <div class="form-group has-feedback">
                <input type="text" class="form-control" id="name_regis" name="name_regis" value="<?= set_value('name_regis') ?>" placeholder="Full name">
                <?= form_error('name_regis', '<small class="text-danger pl-3 pr-3">', '</small>'); ?>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="text" id="email_regis" name="email_regis" <?= set_value('email_regis') ?> class="form-control" placeholder="Email">
                <?= form_error('email_regis', '<small class="text-danger pl-3 pr-3">', '</small>'); ?>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" id="password1_regis" name="password1_regis" class="form-control" placeholder="Password">
                <?= form_error('password1_regis', '<small class="text-danger pl-3 pr-3">', '</small>'); ?>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" id="password2_regis" name="password2_regis" class="form-control" placeholder="Retype password">
                <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">

                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                </div>
                <!-- /.col -->
            </div>
        </form>
        <a href="<?= base_url('Auth/forgotPassword'); ?>">Lali password e le?</a><br>
        <a href="<?= base_url('Auth'); ?>" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
</div>
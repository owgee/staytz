<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | Welcome to Josh Frontend</title>
    <!--global css starts-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>">
    <link rel="shortcut icon" href="<?php echo e(asset('assets/images/favicon.png')); ?>" type="image/x-icon">
    <link rel="icon" href="<?php echo e(asset('assets/images/favicon.png')); ?>" type="image/x-icon">
    <!--end of global css-->
    <!--page level css starts-->
    <link type="text/css" rel="stylesheet" href="<?php echo e(asset('assets/vendors/iCheck/css/all.css')); ?>" />
    <!--end of page level css-->
</head>
<body>
<div class="container">
    <!--Content Section Start -->
    <div class="row">
        <div class="box animation flipInX">
            <div class="box1">
            <img src="<?php echo e(asset('assets/images/josh-new.png')); ?>" alt="logo" class="img-responsive mar">
            <h3 class="text-primary">StayTz</h3>
                <!-- Notifications -->
                <?php echo $__env->make('notifications', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <form action="<?php echo e(route('login')); ?>" class="omb_loginForm"  autocomplete="off" method="POST">
                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                    <div class="form-group <?php echo e($errors->first('email', 'has-error')); ?>">
                        <label class="sr-only">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Email"
                               value="<?php echo old('email'); ?>">
                    </div>
                    <span class="help-block"><?php echo e($errors->first('email', ':message')); ?></span>
                    <div class="form-group <?php echo e($errors->first('password', 'has-error')); ?>">
                        <label class="sr-only">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                    <span class="help-block"><?php echo e($errors->first('password', ':message')); ?></span>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox">  Remember Password
                        </label>

                    </div>
                    <input type="submit" class="btn btn-block btn-primary" value="Login">
                    Don't have an account? <a href="<?php echo e(route('register')); ?>"><strong> Sign up</strong></a>
                </form>
            </div>
        <div class="bg-light animation flipInX">
            <a href="<?php echo e(route('forgot-password')); ?>">Forgot Password?</a>
        </div>
        </div>
    </div>
    <!-- //Content Section End -->
</div>
<!--global js starts-->
<script type="text/javascript" src="<?php echo e(asset('assets/js/frontend/jquery.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('assets/js/frontend/bootstrap.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('assets/vendors/iCheck/js/icheck.js')); ?>"></script>
<!--global js end-->
<script>
    $(document).ready(function(){
        $("input[type='checkbox']").iCheck({
            checkboxClass: 'icheckbox_minimal-blue'
        });
    });
</script>
</body>
</html>



<?php /* Page title */ ?>
<?php $__env->startSection('title'); ?>
View User Details
@parent
<?php $__env->stopSection(); ?>

<?php /* page level styles */ ?>
<?php $__env->startSection('header_styles'); ?>
<link href="<?php echo e(asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css')); ?>" rel="stylesheet"/>
<link href="<?php echo e(asset('assets/vendors/x-editable/bootstrap-editable.css')); ?>" rel="stylesheet"/>
<link href="<?php echo e(asset('assets/css/pages/user_profile.css')); ?>" rel="stylesheet"/>
<?php $__env->stopSection(); ?>


<?php /* Page content */ ?>
<?php $__env->startSection('content'); ?>
    <section class="content-header">
        <!--section starts-->
        <h1>User Profile</h1>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo e(route('dashboard')); ?>">
                    <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="#">Users</a>
            </li>
            <li class="active">User Profile</li>
        </ol>
    </section>
    <!--section ends-->
    <section class="content">
        <div class="row">
            <div class="col-lg-12">
                <ul class="nav  nav-tabs ">
                    <li class="active">
                        <a href="#tab1" data-toggle="tab">
                            <i class="livicon" data-name="user" data-size="16" data-c="#000" data-hc="#000" data-loop="true"></i>
                            User Profile</a>
                    </li>
                    <li>
                        <a href="#tab2" data-toggle="tab">
                            <i class="livicon" data-name="key" data-size="16" data-loop="true" data-c="#000" data-hc="#000"></i>
                            Change Password</a>
                    </li>

                </ul>
                <div  class="tab-content mar-top">
                    <div id="tab1" class="tab-pane fade active in">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">

                                            User Profile
                                        </h3>

                                    </div>
                                    <div class="panel-body">
                                        <div class="col-md-4">
                                            <div class="img-file">
                                                <img src="<?php echo asset('assets/img/authors/avatar3.jpg'); ?>" alt="profile pic" width="90">
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="panel-body">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-striped" id="users">

                                                        <tr>
                                                            <td><?php echo app('translator')->get('users/title.first_name'); ?></td>
                                                            <td>
                                                                <?php echo e($user->first_name); ?>

                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td><?php echo app('translator')->get('users/title.last_name'); ?></td>
                                                            <td>
                                                                <?php echo e($user->last_name); ?>

                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td><?php echo app('translator')->get('users/title.email'); ?></td>
                                                            <td>
                                                                <?php echo e($user->email); ?>

                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <?php echo app('translator')->get('users/title.gender'); ?>
                                                            </td>
                                                            <td>
                                                                <?php echo e($user->gender); ?>

                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><?php echo app('translator')->get('users/title.dob'); ?></td>
                                                            <td>
                                                                <?php echo e($user->dob); ?>

                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><?php echo app('translator')->get('users/title.address'); ?></td>
                                                            <td>
                                                                <?php echo e($user->address); ?>

                                                            </td>
                                                        </tr>
                            
                                                        <tr>
                                                            <td><?php echo app('translator')->get('users/title.status'); ?></td>
                                                            <td>

                                                                <?php if($user->deleted_at): ?>
                                                                    Deleted
                                                                <?php elseif($activation = Activation::completed($user)): ?>
                                                                    Activated
                                                                <?php else: ?>
                                                                    Pending
                                                                <?php endif; ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><?php echo app('translator')->get('users/title.created_at'); ?></td>
                                                            <td>
                                                                <?php echo $user->created_at->diffForHumans(); ?>

                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="tab2" class="tab-pane fade">
                        <div class="row">
                            <div class="col-md-12 pd-top">
                                <form class="form-horizontal">
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label for="inputpassword" class="col-md-3 control-label">
                                                Password
                                                <span class='require'>*</span>
                                            </label>
                                            <div class="col-md-9">
                                                <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <i class="livicon" data-name="key" data-size="16" data-loop="true" data-c="#000" data-hc="#000"></i>
                                                            </span>
                                                    <input type="password" id="password" placeholder="Password"
                                                           class="form-control"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputnumber" class="col-md-3 control-label">
                                                Confirm Password
                                                <span class='require'>*</span>
                                            </label>
                                            <div class="col-md-9">
                                                <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <i class="livicon" data-name="key" data-size="16" data-loop="true" data-c="#000" data-hc="#000"></i>
                                                            </span>
                                                    <input type="password" id="password-confirm" placeholder="Password"
                                                           class="form-control"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button type="submit" class="btn btn-primary" id="change-password">Submit
                                            </button>
                                            &nbsp;
                                            <button type="button" class="btn btn-danger">Cancel</button>
                                            &nbsp;
                                            <input type="reset" class="btn btn-default hidden-xs" value="Reset"></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php /* page level scripts */ ?>
<?php $__env->startSection('footer_scripts'); ?>
<!-- Bootstrap WYSIHTML5 -->
<script  src="<?php echo e(asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js')); ?>" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#change-password').click(function (e) {
                e.preventDefault();
                var check = false;
                var sendData = '_token=<?php echo e(Session::getToken()); ?>' + '&password=' + $('#password').val() + '&password-confirm=' + $('#password-confirm').val();
                if ($('#password').val() === $('#password-confirm').val()) {
                    check = true;
                }
                if (check) {
                    $.ajax({
                        url: 'passwordreset',
                        type: "post",
                        data: sendData,
                        success: function (data) {
                            alert('password reset successful');
                        },
                        error: function (xhr, ajaxOptions, thrownError) {
                            alert('error in password reset');
                        }
                    });
                } else {
                    alert('password and password confirm does not match');
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin/layouts/default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
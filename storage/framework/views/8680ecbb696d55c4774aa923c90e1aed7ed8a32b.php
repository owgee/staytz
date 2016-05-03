

<?php /* Page title */ ?>
<?php $__env->startSection('title'); ?>
    Add User
    @parent
    <?php $__env->stopSection(); ?>

    <?php /* page level styles */ ?>
    <?php $__env->startSection('header_styles'); ?>
            <!--page level css -->
    <link href="<?php echo e(asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/vendors/select2/css/select2.min.css')); ?>" type="text/css" rel="stylesheet">
    <link href="<?php echo e(asset('assets/vendors/select2/css/select2-bootstrap.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/css/pages/wizard.css')); ?>" rel="stylesheet">
    <!--end of page level css-->
<?php $__env->stopSection(); ?>


<?php /* Page content */ ?>
<?php $__env->startSection('content'); ?>
    <section class="content-header">
        <h1>Add New User</h1>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo e(route('dashboard')); ?>">
                    <i class="livicon" data-name="home" data-size="14" data-color="#000"></i>
                    Dashboard
                </a>
            </li>
            <li>Users</li>
            <li class="active">Add New User</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="livicon" data-name="user-add" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true"></i>
                            Add New User
                        </h3>
                                <span class="pull-right clickable">
                                    <i class="glyphicon glyphicon-chevron-up"></i>
                                </span>
                    </div>
                    <div class="panel-body">
                        <!-- errors -->
                        <div class="has-error">
                            <?php echo $errors->first('first_name', '<span class="help-block">:message</span>'); ?>

                            <?php echo $errors->first('last_name', '<span class="help-block">:message</span>'); ?>

                            <?php echo $errors->first('email', '<span class="help-block">:message</span>'); ?>

                            <?php echo $errors->first('password', '<span class="help-block">:message</span>'); ?>

                            <?php echo $errors->first('password_confirm', '<span class="help-block">:message</span>'); ?>

                            <?php echo $errors->first('group', '<span class="help-block">:message</span>'); ?>

                            <?php echo $errors->first('country', '<span class="help-block">:message</span>'); ?>

                        </div>
                        <!--main content-->
                        <form id="commentForm" action="<?php echo e(route('admin.users.store')); ?>"
                              method="POST" enctype="multipart/form-data" class="form-horizontal">
                            <!-- CSRF Token -->
                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />

                            <div id="rootwizard">
                                <ul>
                                    <li><a href="#tab1" data-toggle="tab">User Profile</a></li>
                                    <li><a href="#tab2" data-toggle="tab">Bio</a></li>
                                    <li><a href="#tab3" data-toggle="tab">User Group</a></li>                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane" id="tab1">
                                        <h2 class="hidden">&nbsp;</h2>
                                        <div class="form-group">
                                            <label for="first_name" class="col-sm-2 control-label">First Name *</label>
                                            <div class="col-sm-10">
                                                <input id="first_name" name="first_name" type="text"
                                                       placeholder="First Name" class="form-control required"
                                                       value="<?php echo old('first_name'); ?>"/>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="last_name" class="col-sm-2 control-label">Last Name *</label>
                                            <div class="col-sm-10">
                                                <input id="last_name" name="last_name" type="text" placeholder="Last Name"
                                                       class="form-control required" value="<?php echo old('last_name'); ?>"/>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="email" class="col-sm-2 control-label">Email *</label>
                                            <div class="col-sm-10">
                                                <input id="email" name="email" placeholder="E-Mail" type="text"
                                                       class="form-control required email" value="<?php echo old('email'); ?>"/>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="password" class="col-sm-2 control-label">Password *</label>
                                            <div class="col-sm-10">
                                                <input id="password" name="password" type="password" placeholder="Password"
                                                       class="form-control required" value="<?php echo old('password'); ?>"/>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="password_confirm" class="col-sm-2 control-label">Confirm Password *</label>
                                            <div class="col-sm-10">
                                                <input id="password_confirm" name="password_confirm" type="password"
                                                       placeholder="Confirm Password " class="form-control required"
                                                       value="<?php echo old('password_confirm'); ?>"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab2" disabled="disabled">
                                        <h2 class="hidden">&nbsp;</h2> 
                                        <div class="form-group required">
                                            <label for="dob" class="col-sm-2 control-label">Date of Birth</label>
                                            <div class="col-sm-10">
                                                <input id="dob" name="dob" type="text" class="form-control"
                                                       data-mask="9999-99-99" value="<?php echo old('dob'); ?>"
                                                       placeholder="yyyy-mm-dd"/>
                                            </div>
                                            <span class="help-block"><?php echo e($errors->first('dob', ':message')); ?></span>
                                        </div>

                                        <div class="form-group <?php echo e($errors->first('gender', 'has-error')); ?>">
                                            <label for="email" class="col-sm-2 control-label">Gender</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" title="Select Gender..." name="gender">
                                                    <option value="">Select</option>
                                                    <option value="male"
                                                            <?php if(old('gender') === 'male'): ?> selected="selected" <?php endif; ?> >MALE
                                                    </option>
                                                    <option value="female"
                                                            <?php if(old('gender') === 'female'): ?> selected="selected" <?php endif; ?> >
                                                        FEMALE
                                                    </option>
                                                </select>
                                            </div>
                                            <span class="help-block"><?php echo e($errors->first('gender', ':message')); ?></span>
                                        </div>

                                        <div class="form-group required">
                                            <label for="address" class="col-sm-2 control-label">Address</label>
                                            <div class="col-sm-10">
                                                <input id="address" name="address" type="text" class="form-control" value="<?php echo old('address'); ?>"/>
                                            </div>
                                            <span class="help-block"><?php echo e($errors->first('address', ':message')); ?></span>
                                        </div>

                                    </div>


                                    <div class="tab-pane" id="tab3" disabled="disabled">
                                        <p class="text-danger"><strong>Be careful with group selection, if you give admin access.. they can access admin section</strong></p>

                                        <div class="form-group required">
                                            <label for="group" class="col-sm-2 control-label">Group *</label>
                                            <div class="col-sm-10">
                                                <select class="form-control required" title="Select group..." name="group"
                                                        id="group">
                                                    <option value="">Select</option>
                                                    <?php foreach($groups as $group): ?>
                                                        <option value="<?php echo e($group->id); ?>"
                                                                <?php if($group->id == old('group')): ?> selected="selected" <?php endif; ?> ><?php echo e($group->name); ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <span class="help-block"><?php echo e($errors->first('group', ':message')); ?></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="activate" class="col-sm-2 control-label"> Activate User</label>
                                            <div class="col-sm-10">
                                                <input id="activate" name="activate" type="checkbox"
                                                       class="pos-rel p-l-30"
                                                       value="1" <?php if(old('activate')): ?> checked="checked" <?php endif; ?> >
                                            <span>If user is not activated, mail will be sent to user with activation link</span></div>
                                        </div>
                                    </div>
                                    <ul class="pager wizard">
                                        <li class="previous"><a href="#">Previous</a></li>
                                        <li class="next"><a href="#">Next</a></li>
                                        <li class="next finish" style="display:none;"><a href="javascript:;">Finish</a></li>
                                    </ul>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--row end-->
    </section>
<?php $__env->stopSection(); ?>

<?php /* page level scripts */ ?>
<?php $__env->startSection('footer_scripts'); ?>
    <script src="<?php echo e(asset('assets/vendors/moment/js/moment.min.js')); ?>" ></script>
    <script src="<?php echo e(asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js')); ?>"  type="text/javascript"></script>
    <script src="<?php echo e(asset('assets/vendors/select2/js/select2.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('assets/vendors/bootstrapwizard/jquery.bootstrap.wizard.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('assets/js/pages/adduser.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin/layouts/default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
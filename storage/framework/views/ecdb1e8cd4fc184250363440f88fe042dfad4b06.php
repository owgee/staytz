

<?php /* Page title */ ?>
<?php $__env->startSection('title'); ?>
Compose New Mail
@parent
<?php $__env->stopSection(); ?>

<?php /* page level styles */ ?>
<?php $__env->startSection('header_styles'); ?>    
    
	<link href="<?php echo e(asset('assets/vendors/summernote/summernote.css')); ?>" rel="stylesheet" media="screen" />
    <link href="<?php echo e(asset('assets/css/pages/mail_box.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>

<?php /* Page content */ ?>
<?php $__env->startSection('content'); ?>

<section class="content-header">
                <h1>New push notifications</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="<?php echo e(route('dashboard')); ?>">
                            <i class="livicon" data-name="home" data-size="14" data-color="#000"></i>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(URL::to('admin/notifications')); ?>">Notifications</a>
                    </li>
                    <li class="active">new</li>
                </ol>
            </section>
            <!-- Main content -->
<section class="content">
    <div class="row web-mail">
        <div class="col-lg-2 col-md-3 col-sm-4">
            <div class="whitebg">
                
            </div>
        </div>
        <div class="col-lg-9 col-md-8 col-sm-7">
            <div class="whitebg">
            <?php echo Form::open(array('url' => URL::to('admin/notifications/create'), 'method' => 'post', 'class' => 'bf')); ?>

                <table class="table table-striped table-advance">
                    <thead>
                    <tr>
                        <td colspan="4">
                            <div class="col-md-8">
                                <h4>
                                    <strong>New push notifications</strong>
                                </h4>
                            </div>
                        </td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td colspan="4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="compose row">
                                        <label class="col-xs-2 hidden-xs" for="to1">Title:</label>
                                        <input type="text" class="col-xs-9" name="title" id="to1" placeholder="" tabindex="1" required>
                                        <div class="clear"></div>
                                        <label class="col-xs-2 hidden-xs" for="to">Message:</label>
                                        <textarea class="col-xs-9" name="message" rows="4" id="to" tabindex="1" placeholder=""></textarea>
                                        <div class="clear"></div>
                                        <div class='box-body pad col-sm-12'>
                                            <form>
                                                <div id="summernote"></div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td width="100%">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="col-md-4">
                                        
                                    </div>
                                    <div class="col-md-4">
                                       <button type="submit" class="btn btn-success">Push</button>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="<?php echo e(URL::to('admin/notifications')); ?>" class="btn btn-sm btn-warning">
                                            <span class="livicon" data-n="trash" data-s="12" data-c="white" data-hc="white"></span>
                                            Discard
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td width="3%"></td>
                        <td width="13%" class="view-message text-right">&nbsp;</td>
                    </tr>
                    </tbody>
                </table>
            <?php echo Form::close(); ?>

            </div>
        </div>
    </div>
</section>
            <!-- content -->
        
    <?php $__env->stopSection(); ?>

<?php /* page level scripts */ ?>
<?php $__env->startSection('footer_scripts'); ?>

    <script  src="<?php echo e(asset('assets/vendors/summernote/summernote.min.js')); ?>"  type="text/javascript"></script>
    <script  src="<?php echo e(asset('assets/js/pages/add_newblog.js')); ?>"  type="text/javascript"></script>
    <script type="text/javascript">
    $('#slimscrollside').slimscroll({
        height: '700px',
        size: '3px',
        color: 'black',
        opacity: .3

    });
    </script>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin/layouts/default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
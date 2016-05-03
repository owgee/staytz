

<?php /* Page title */ ?>
<?php $__env->startSection('title'); ?>
Notifications
@parent
<?php $__env->stopSection(); ?>

<?php /* page level styles */ ?>
<?php $__env->startSection('header_styles'); ?>    
    
	<link href="<?php echo e(asset('assets/css/pages/alertmessage.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('assets/css/pages/mail_box.css')); ?>" rel="stylesheet" type="text/css" />
    <!-- page level css ends-->
<?php $__env->stopSection(); ?>

<?php /* Page content */ ?>
<?php $__env->startSection('content'); ?>

<section class="content-header">
                <h1>Notifications</h1>
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
                </ol>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="row web-mail">
                    <div class="col-lg-1 col-md-2 col-sm-2">
                        
                    </div>
                    <div class="col-lg-10 col-md-9 col-sm-8">
                        <div class="whitebg">
                            <table class="table table-striped table-advance table-hover" id="inbox-check">
                                <thead>
                                    <tr>
                                        <td colspan="6">
                                            <div class="col-md-8">
                                                <h4>
                                                    <strong>Pushed notifications</strong>
                                                </h4>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th colspan="6">
                                            
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr data-messageid="1" class="unread">
                                        <td style="width:2%; " class="view-message hidden-xs">#</td>
                                        <td style="width:22%; text-align: center;" class="view-message hidden-xs">TITLE</td>
                                        <td style="width:56%; text-align: center;" class="view-message ">
                                           MESSAGE
                                        </td>
                                        <td style="width:13%;text-align: center;" class="view-message text-right">
                                            TIME
                                        </td>
                                    </tr>
                                    <?php foreach($notifications as $n): ?>
                                        <tr data-messageid="4">
                                            <td><?php echo e($n->id); ?> </td>
                                            <td class="view-message hidden-xs"><?php echo e($n->title); ?></td>
                                            <td class="view-message"><?php echo e($n->message); ?></td>
                                            <td class="view-message text-right"><?php echo e(date("d M Y",strtotime($n->date_added))); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
            <!-- content -->
        
    <?php $__env->stopSection(); ?>

<?php /* page level scripts */ ?>
<?php $__env->startSection('footer_scripts'); ?>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin/layouts/default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
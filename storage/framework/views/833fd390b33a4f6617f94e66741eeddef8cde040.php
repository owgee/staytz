<?php /* Page title */ ?>
<?php $__env->startSection('title'); ?>
Regions 
@parent
<?php $__env->stopSection(); ?>

<?php /* page level styles */ ?>
<?php $__env->startSection('header_styles'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/vendors/datatables/css/dataTables.bootstrap.css')); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/vendors/datatables/css/buttons.bootstrap.css')); ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/vendors/datatables/css/colReorder.bootstrap.css')); ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/vendors/datatables/css/dataTables.bootstrap.css')); ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/vendors/datatables/css/rowReorder.bootstrap.css')); ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/vendors/datatables/css/buttons.bootstrap.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/vendors/datatables/css/scroller.bootstrap.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/pages/tables.css')); ?>" />
<?php $__env->stopSection(); ?>

<?php /* Page content */ ?>
<?php $__env->startSection('content'); ?>

<section class="content-header">
                <!--section starts-->
                <h1>Regions</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="<?php echo e(route('dashboard')); ?>">
                            <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#">Places</a>
                    </li>
                    <li class="active">Regions</li>
                </ol>
            </section>
            <!--section ends-->
            <section class="content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-primary filterable">
                            <div class="panel-heading clearfix  ">
                                <div class="panel-title pull-left">
                                <div class="caption">
                                    <i class="livicon" data-name="camera-alt" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                    All Regions
                                </div>
                                </div>
                            </div>
                            <div class="panel-body table-responsive">
                                <table class="table table-striped table-bordered" id="table1">
                                    <thead>
                                        <tr>
                                            <th>SN #</th>
                                            <th>name</th>
                                            <th>Options</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    <?php foreach($regions as $region): ?>
                                        <tr>
                                            <td><?php echo e($region->id); ?></td>
                                            <td><?php echo e($region->name); ?> </td>
                                            <td>
                                                <a href="<?php echo URL::to('admin/places/'.encrypt($region->id).'/edit'); ?>">[ edit ]</a>
                                                <a href="<?php echo URL::to('admin/places/'.$region->id.'/delete'); ?>">[ delete ]</a> 
                                                <a href="<?php echo URL::to('admin/places/'.$region->id.'/districts'); ?>">[ View Towns/districts ] </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="panel panel-primary filterable">
                            <div class="panel-heading clearfix  ">
                                <div class="panel-title pull-left">
                                <div class="caption">
                                    <i class="livicon" data-name="camera-alt" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                    New region
                                </div>
                                </div>
                            </div>
                            <?php echo Form::open(array('url' => URL::to('admin/places/regions/create'), 'method' => 'post', 'class' => 'bf', 'files'=> true)); ?>

                            <div class="panel-body">
                                <div class="form-group">
                                    <?php echo Form::label('region_name', 'Name'); ?>

                                    <?php echo Form::text('region_name', null, array('class' => 'form-control input-lg',  'placeholder'=>'Region name')); ?>

                                </div>
                                <div class="form-group">
                                    <?php echo Form::label('image', 'Image'); ?>

                                    <?php echo Form::file('image'); ?>

                                    <p class="help-block">Image identifying the region</p>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success"><?php echo app('translator')->get('blog/form.publish'); ?></button>
                                    <a href="<?php echo URL::to('admin/places/region'); ?>"
                                       class="btn btn-danger"><?php echo app('translator')->get('blog/form.discard'); ?></a>
                                </div>

                            </div>
                            <?php echo Form::close(); ?>

                        </div>

                    </div>
                </div>
                <!-- row-->
            </section>
            <!-- content -->

    <?php $__env->stopSection(); ?>

<?php /* page level scripts */ ?>
<?php $__env->startSection('footer_scripts'); ?>

    <script type="text/javascript" src="<?php echo e(asset('assets/vendors/datatables/js/jquery.dataTables.js')); ?>" ></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/vendors/datatables/js/dataTables.bootstrap.js')); ?>" ></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/vendors/datatables/js/dataTables.buttons.js')); ?>" ></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/vendors/datatables/js/dataTables.colReorder.js')); ?>" ></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/vendors/datatables/js/dataTables.responsive.js')); ?>" ></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/vendors/datatables/js/dataTables.rowReorder.js')); ?>" ></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/vendors/datatables/js/buttons.colVis.js')); ?>" ></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/vendors/datatables/js/buttons.html5.js')); ?>" ></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/vendors/datatables/js/buttons.print.js')); ?>" ></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/vendors/datatables/js/buttons.bootstrap.js')); ?>" ></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/vendors/datatables/js/buttons.print.js')); ?>" ></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/vendors/datatables/js/pdfmake.js')); ?>" ></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/vendors/datatables/js/vfs_fonts.js')); ?>" ></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/vendors/datatables/js/dataTables.scroller.js')); ?>" ></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/js/pages/table-advanced.js')); ?>" ></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin/layouts/default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
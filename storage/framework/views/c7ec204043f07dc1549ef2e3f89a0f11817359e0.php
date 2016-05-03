<?php /* Page title */ ?>
<?php $__env->startSection('title'); ?>
<?php echo e($region->name); ?>

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
                <h1><?php echo e($region->name); ?></h1>
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
                    <li class="active"><?php echo e($region->name); ?></li>
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
                                    <?php echo e($region->name); ?> Towns/Districts
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
                                    <?php foreach($region->districts as $district): ?>
                                        <tr>
                                            <td><?php echo e($district->id); ?></td>
                                            <td><?php echo e($district->name); ?> </td>
                                            <td> 
                                                <a href="<?php echo URL::to('admin/places/'.$district->region_id.'/district/'.$district->id.'/delete'); ?>">[ delete ]</a> 
                                                <a href="<?php echo URL::to('admin/listings/all/district/'.$district->id); ?>">[ Listings ] </a>
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
                                    New district/town
                                </div>
                                </div>
                            </div>
                            <?php echo Form::open(array('url' => URL::to('admin/places/districts/create'), 'method' => 'post', 'class' => 'bf')); ?>

                            <div class="panel-body">
                                <div class="form-group">
                                    <?php echo Form::label('district_name', 'Name'); ?>

                                    <?php echo Form::text('district_name', null, array('class' => 'form-control input-lg',  'placeholder'=>'District/Town name')); ?>


                                    <?php echo Form::hidden('region_id', $region->id,[]); ?>

                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Add</button>
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
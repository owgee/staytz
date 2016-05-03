

<?php /* Page title */ ?>
<?php $__env->startSection('title'); ?>
    Staytz
    @parent
<?php $__env->stopSection(); ?>

<?php /* page level styles */ ?>
<?php $__env->startSection('header_styles'); ?>

    <link href="<?php echo e(asset('assets/vendors/fullcalendar/css/fullcalendar.css')); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(asset('assets/css/pages/calendar_custom.css')); ?>" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" media="all" href="<?php echo e(asset('assets/vendors/bower-jvectormap/css/jquery-jvectormap-1.2.2.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/animate/animate.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/pages/only_dashboard.css')); ?>"/>
    <meta name="_token" content="<?php echo e(csrf_token()); ?>">
    <link rel="stylesheet" type="text/css"
          href="<?php echo e(asset('assets/vendors/bootstrap-datepicker/css/bootstrap-datepicker.css')); ?>">

<?php $__env->stopSection(); ?>

<?php /* Page content */ ?>
<?php $__env->startSection('content'); ?>

    <section class="content-header">
        <h1>Welcome to Staytz Dashboard</h1>
        <ol class="breadcrumb">
            <li class="active">
                <a href="#">
                    <i class="livicon" data-name="home" data-size="16" data-color="#333" data-hovercolor="#333"></i>
                    Dashboard
                </a>
            </li>
        </ol>
    </section>
    <section class="content">

        <div class="row ">

            <div class="col-md-4 col-sm-6">
                <div class="panel purple_gradiant_bg">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="livicon" data-name="linechart" data-size="16" data-loop="true" data-c="#333"
                               data-hc="white"></i>
                            <strong>All Entries</strong>
                        </h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="sparkline-chart">
                                    <div class="title" style="font-size: 50px; padding: 10px;color: #333;"><?php echo e($all); ?></div>
                                </div>
                                <div class="pull-right">
                                    <a href="<?php echo e(URL::to('/admin/listings/all')); ?>" style="color:#333">View</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- BEGIN Percentage monitor -->
                <div class="panel green_gradiante_bg ">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                        <i class="livicon" data-name="linechart" data-size="16" data-loop="true" data-c="#fff"
                               data-hc="white"></i>
                            <strong>Hotels and Lodges</strong>
                        </h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <div class="sparkline-chart">
                                    <div class="title" style="font-size: 50px; padding: 10px; color: #fff;"><?php echo e($hotels); ?></div>
                                </div>
                                <div class="pull-right">
                                    <a href="<?php echo e(URL::to('/admin/listings/hotels')); ?>" style="color:#fff">View</a>
                                </div>
                            </div>
                        </div>

                        <!-- /.row -->
                    </div>
                    <!-- /.panel-body -->
                </div>

            </div>
            <!-- -->

            <div class="col-md-4 col-sm-6">
                <!-- BEGIN CAT -->
                <div class="panel green_gradiante_bg" style="background-color: #a45;">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                        <i class="livicon" data-name="linechart" data-size="16" data-loop="true" data-c="#fff"
                               data-hc="white"></i>
                            <strong>Guest Houses</strong>
                        </h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <div class="sparkline-chart">
                                    <div class="title" style="font-size: 50px; padding: 10px; color: #fff;"> <?php echo e($guest_houses); ?></div>
                                </div>
                            </div>
                            <div class="pull-right">
                                    <a href="<?php echo e(URL::to('/admin/listings/guesthouses')); ?>" style="color:#fff">View</a>
                                </div>
                        </div>

                        <!-- /.row -->
                    </div>
                    <!-- /.panel-body -->
                </div>

                <!-- BEGIN Percentage monitor -->
                <div class="panel blue_gradiant_bg">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                        <i class="livicon" data-name="linechart" data-size="16" data-loop="true" data-c="#fff"
                               data-hc="white"></i>
                            <strong>Conference Halls</strong>
                        </h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <div class="sparkline-chart">
                                    <div class="title" style="font-size: 50px; padding: 10px; color: #fff;"> <?php echo e($conference_halls); ?></div>
                                </div>
                            </div>
                            <div class="pull-right">
                                    <a href="<?php echo e(URL::to('/admin/listings/conferencehalls')); ?>" style="color:#fff">View</a>
                                </div>
                        </div>

                        <!-- /.row -->
                    </div>
                    <!-- /.panel-body -->
                </div>

            </div>

            <div class="col-md-4 col-sm-6">
                <div class="panel blue_gradiant_bg" style="background-color: #393939;">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="livicon" data-name="linechart" data-size="16" data-loop="true" data-c="#fff"
                               data-hc="white"></i>
                            <strong>Apartments</strong>
                        </h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="sparkline-chart">
                                    <div class="title" style="font-size: 50px; padding: 10px; color: #fff;"><?php echo e($apartments); ?></div>
                                </div>
                            </div>
                            <div class="pull-right">
                                <a href="<?php echo e(URL::to('/admin/listings/apartments')); ?>" style="color:#fff">View</a>
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
    <script type="text/javascript" src="<?php echo e(asset('assets/vendors/moment/js/moment.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/vendors/bootstrap-datepicker/js/bootstrap-datepicker.js')); ?>"></script>

    <!-- EASY PIE CHART JS -->
    <script src="<?php echo e(asset('assets/vendors/bower-jquery-easyPieChart/js/easypiechart.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendors/bower-jquery-easyPieChart/js/jquery.easypiechart.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendors/bower-jquery-easyPieChart/js/jquery.easingpie.js')); ?>"></script>
    <!--for calendar-->
    <script src="<?php echo e(asset('assets/vendors/moment/js/moment.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('assets/vendors/fullcalendar/js/fullcalendar.min.js')); ?>" type="text/javascript"></script>
    <!--   Realtime Server Load  -->
    <script src="<?php echo e(asset('assets/vendors/flotchart/js/jquery.flot.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('assets/vendors/flotchart/js/jquery.flot.resize.js')); ?>" type="text/
    <!-- Back to Top-->
    <!--   maps -->
    <script src="<?php echo e(asset('assets/vendors/bower-jvectormap/js/jquery-jvectormap-1.2.2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendors/bower-jvectormap/js/jquery-jvectormap-world-mill-en.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendors/Chart.js/js/Chart.js')); ?>"></script>
    <!--  todolist-->
    <script src="<?php echo e(asset('assets/js/pages/dashboard.js')); ?>" type="text/javascript"></script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin/layouts/default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
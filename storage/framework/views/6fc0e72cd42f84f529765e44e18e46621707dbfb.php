

<?php /* Page title */ ?>
<?php $__env->startSection('title'); ?>
Home
@parent
<?php $__env->stopSection(); ?>

<?php /* page level styles */ ?>
<?php $__env->startSection('header_styles'); ?>
    <!--page level css starts-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/frontend/tabbular.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/frontend/jquery.circliful.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/vendors/owl.carousel/css/owl.carousel.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/vendors/owl.carousel/css/owl.theme.css')); ?>">
    <!--end of page level css-->
<?php $__env->stopSection(); ?>

<?php /* slider */ ?>
<?php $__env->startSection('top'); ?>
    <!--Carousel Start -->
    <div id="owl-demo" class="owl-carousel owl-theme" style="background-color: #303F9F;">
        <div class="item" align="center">
            <img src="<?php echo e(asset('assets/images/slide1.png')); ?>" style="height:auto;width:270px; margin-top: 10px;" alt="slider-image">
            <div class="carousel-caption">
                <h2 style="color: #333;"></h2>
            </div>
        </div>
        <div class="item" align="center"><img src="<?php echo e(asset('assets/images/slide2.png')); ?>" style="height:auto;width:270px; margin-top: 10px;" alt="slider-image">
        </div>
        <div class="item" align="center"><img src="<?php echo e(asset('assets/images/slide3.png')); ?>" style="height:auto;width:270px; margin-top: 10px;" alt="slider-image">
        </div>
    </div>
    <!-- //Carousel End -->
<?php $__env->stopSection(); ?>

<?php /* content */ ?>
<?php $__env->startSection('content'); ?>
       
    <!-- //Container End -->
<?php $__env->stopSection(); ?>

<?php /* footer scripts */ ?>
<?php $__env->startSection('footer_scripts'); ?>
    <!-- page level js starts-->
    <script type="text/javascript" src="<?php echo e(asset('assets/js/frontend/jquery.circliful.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/vendors/owl.carousel/js/owl.carousel.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/js/frontend/carousel.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/js/frontend/index.js')); ?>"></script>
    <!--page level js ends-->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
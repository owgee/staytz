<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <title>
    	<?php $__env->startSection('title'); ?>
        | Staytz
        <?php echo $__env->yieldSection(); ?>
    </title>
    <!--global css starts-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/fonts.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/font-awesome.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/frontend/custom.css')); ?>">
    <link rel="icon" href="<?php echo e(asset('favicon.ico')); ?>" type="image/x-icon">
    <!--end of global css-->
    <!--page level css-->
    <?php echo $__env->yieldContent('header_styles'); ?>
    <!--end of page level css-->
</head>

<body>
    <!-- Header Start -->
    <header>
        <!-- Icon Section Start -->
        <div class="icon-section">
            <div class="container">
                <ul class="list-inline">
                    <?php /*<li>*/ ?>
                        <?php /*<a href="#"> <i class="livicon" data-name="facebook" data-size="28" data-loop="true" data-c="#303F9F" data-hc="#757b87"></i>*/ ?>
                        <?php /*</a>*/ ?>
                    <?php /*</li>*/ ?>
                    <?php /*<li>*/ ?>
                        <?php /*<a href="#"> <i class="livicon" data-name="twitter" data-size="28" data-loop="true" data-c="#303F9F" data-hc="#757b87"></i>*/ ?>
                        <?php /*</a>*/ ?>
                    <?php /*</li>*/ ?>
                   <li><a href=""  class=" logo list-inline icon-position">
                           STAYTZ
                       </a></li>
                    <li class="pull-right">
                        <ul class="list-inline icon-position">
                            <li>
                                <a href="mailto:"><i class="livicon" data-name="mail" data-size="20" data-loop="true" data-c="#303F9F" data-hc="#fff"></i></a>
                                <label class="hidden-xs"><a href="mailto:chasmacha@gmail.com" style="color: #303F9F;">chasmacha@gmail.com</a></label>
                            </li>
                            <li>
                                <a href="tel:"><i class="livicon" data-name="phone" data-size="20" data-loop="true" data-c="#303F9F" data-hc="#fff"></i></a>
                                <label class="hidden-xs"><a href="tel:" style="color: #303F9F;">+255 713 401 868</a></label>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!-- //Icon Section End -->
    </header>
    <!-- //Header End -->
    
    <!-- slider / breadcrumbs section -->
    <?php echo $__env->yieldContent('top'); ?>

    <!-- Content -->
    <?php echo $__env->yieldContent('content'); ?>

    <!-- Footer Section Start -->
    <footer>
        <div class="container footer-text">
            <!-- Contact Section Start -->
            <div class="col-sm-4"></div>
            <div class="col-sm-4" align="center">
                <h4>Our contacts: </h4>
                <ul class="list-unstyled">
                    <li>Mikocheni B, Dar es Salaam, Tz.</li>
                    <li><i class="livicon icon4 icon3" data-name="cellphone" data-size="18" data-loop="true" data-c="#ccc" data-hc="#ccc"></i>Phone: +255 713 401 868</li>
                    <li><i class="livicon icon3" data-name="mail-alt" data-size="20" data-loop="true" data-c="#ccc" data-hc="#ccc"></i> Email:<span class="text-success">
                        chasmacha@gmail.com</span>
                    </li>
                </ul>
            </div>
            <div class="col-sm-4"></div>
            <!-- //Contact Section End -->
        </div>
    </footer>
    <!-- //Footer Section End -->
    <div class="copyright">
        <div class="container" align="center">
        <p align="center">Staytz &copy; <?php echo e(date("Y",time())); ?> &nbsp;| <a href="http://www.inetstz.com" class="text-white"> &nbsp;INETS Co Ltd</a></p>
        </div>
    </div>
    <a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="Return to top" data-toggle="tooltip" data-placement="left">
        <i class="livicon" data-name="plane-up" data-size="18" data-loop="true" data-c="#fff" data-hc="white"></i>
    </a>
    <!--global js starts-->
    <script src="<?php echo e(asset('assets/js/jquery-1.11.1.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('assets/js/bootstrap.min.js')); ?>" type="text/javascript"></script>
    <!--livicons-->
    <script src="<?php echo e(asset('assets/js/raphael-min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/livicons-1.4.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/js/frontend/josh_frontend.js')); ?>"></script>
    <!--global js end-->
    <!-- begin page level js -->
    <?php echo $__env->yieldContent('footer_scripts'); ?>
    <!-- end page level js -->
</body>

</html>

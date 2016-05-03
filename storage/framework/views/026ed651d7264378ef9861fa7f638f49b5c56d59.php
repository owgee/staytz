<?php /* Page title */ ?>
<?php $__env->startSection('title'); ?>
    News
    @parent
<?php $__env->stopSection(); ?>

<?php /* page level styles */ ?>
<?php $__env->startSection('header_styles'); ?>

    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/bootstrap-tagsinput/css/bootstrap-tagsinput.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/pages/news.css')); ?>"/>
    <!-- end of page level css -->
<?php $__env->stopSection(); ?>

<?php /* Page content */ ?>
<?php $__env->startSection('content'); ?>

    <section class="content-header">
        <!--section starts-->
        <h1><?php echo e($facility->name); ?></h1>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo e(route('dashboard')); ?>">
                    <i class="livicon" data-name="home" data-size="14" data-c="#000" data-loop="true"></i>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="#">Listings</a>
            </li>
            <li>
                <a href="#"><?php echo e($facility->facilityType->name); ?></a>
            </li>
            <li class="active"><?php echo e($facility->name); ?></li>
        </ol>
    </section>
    <!--section ends-->
    <section class="content">
        <!--main content-->
        <div class="row">
            <div class="col-md-12 news-page">
                <div class="row">
                    <div class="col-md-9">
                        
                        <div class="news-blocks">
                            
                            <div id="myCarousel" class="carousel image-carousel slide">
                                <div class="carousel-inner">
                                <?php if(count($facility->images)>0): ?>
                                    <div class="hidden"><?php echo e($i=0); ?> </div>
                                    <?php foreach($facility->images as $image): ?>
                                        <div class="<?php echo e($i++==0?'active':''); ?> item" style="height:350px;">
                                            <img src="<?php echo e(asset('uploads/files/'.$image->path)); ?>" class="img-responsive" alt="">
                                        </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <div class="active item">
                                        <img data-src="holder.js/1900x278/#00bc8c:#fff" class="img-responsive" alt="">
                                    </div>
                                <?php endif; ?>
                                    
                                </div>
                                <!-- Carousel nav -->
                                <a class="carousel-control left" href="#myCarousel" data-slide="prev">
                                    <i class="m-icon-big-swapleft m-icon-white"></i>
                                </a>
                                <a class="carousel-control right" href="#myCarousel" data-slide="next">
                                    <i class="m-icon-big-swapright m-icon-white"></i>
                                </a>
                                <ol class="carousel-indicators">
                                    <?php if(count($facility->images)>0): ?>
                                        <?php for($i=0;$i< count($facility->images);++$i): ?>
                                            <li data-target="#myCarousel" data-slide-to="<?php echo e($i); ?>" <?php echo e($i==0?'class="active"':''); ?>></li>
                                        <?php endfor; ?>
                                     <?php endif; ?>
                                </ol>
                            </div>


                            <h2>
                                <strong><?php echo e($facility->name); ?></strong>
                            </h2>

                            <p>
                              Category: <?php echo e($facility->facilityType->name); ?>  
                            </p>
                        </div>

                        <div class="news-blocks">
                            <h2>DESCRIPTION</h2>

                            <p>
                                <?php echo $facility->description; ?>

                            </p>
                            
                        </div>

                        <div class="news-blocks">
                            <h2>AMENITIES</h2>
                            <?php if($facility->amenities): ?>
                            <p style="font-size: 18px; line-height: 22px;">
                                <?php echo $facility->amenities; ?>

                            </p>
                            <?php endif; ?>
                        </div>

                        <div class="news-blocks">
                            <h2>LOCATION</h2>
                            <?php echo e($facility->physical_addressl); ?>

                            <div id="map" align="center">
                            <?php if($facility->map_image_path!=null): ?>
                                <img class="img-responsive" src="<?php echo e(asset('uploads/files/'.$facility->map_image_path)); ?>">
                            <?php else: ?>
                                <img data-src="holder.js/1900x278/#00bc8c:#fff" class="img-responsive" alt="">
                            <?php endif; ?>
                            </div>
                        </div>

                    </div>
                    <!--end col-md-8 -->
                    
                    <!--end col-md-4-->
                    <div class="col-md-3">
                       <div class="news-blocks">
                            <h2>OPTIONS</h2>
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <i class="livicon" data-name="media" data-size="14" data-c="#000" data-loop="true"></i>
                                    <a href="<?php echo e(URL::to('/admin/listings/'.$facility->id.'/images')); ?>">MANAGE IMAGES</a>
                                </li>
                                <li class="list-group-item">
                                    <i class="livicon" data-name="delete" data-size="14" data-c="#000" data-loop="true"></i>
                                    <a href="<?php echo e(URL::to('/admin/listings/'.$facility->id.'/edit')); ?>">EDIT ITEM</a>
                                </li>
                                <li class="list-group-item" style="background-color : #e44;">
                                    <i class="livicon" data-name="delete" data-size="14" data-c="#fff" data-loop="true"></i>
                                    <a href="<?php echo e(URL::to('/admin/listings/'.$facility->id.'/delete')); ?>" style="color: #fff;">DELETE</a>
                                </li>
                                
                            </ul>
                        </div>

                        <div class="news-blocks">
                            <h2>CONTACTS</h2>
                            <br>
                            <?php foreach($facility->contacts()->where('type',1)->get() as $c): ?>
                                <div> - <?php echo e($c->contact); ?></div>
                            <?php endforeach; ?>
                            <br>
                            <?php foreach($facility->contacts()->where('type',2)->get() as $c): ?>
                                <div> - <?php echo e($c->contact); ?></div>
                            <?php endforeach; ?>
                            <br>
                            <?php foreach($facility->contacts()->where('type',3)->get() as $c): ?>
                                <div> - <?php echo e($c->contact); ?></div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <!--end col-md-3-->
                </div>
                
            </div>
        </div>
        <!--main content ends-->
    </section>
    <!-- content -->

    <?php $__env->stopSection(); ?>

    <?php /* page level scripts */ ?>
    <?php $__env->startSection('footer_scripts'); ?>

            <!--tags-->
    <script src="<?php echo e(asset('assets/vendors/bootstrap-tagsinput/js/bootstrap-tagsinput.js')); ?>"></script>
    <script type="text/javascript" async defer src='http://maps.google.com/maps/api/js?sensor=false&libraries=places&callback=initMap'></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin/layouts/default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
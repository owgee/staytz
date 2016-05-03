<?php /* Page title */ ?>
<?php $__env->startSection('title'); ?>
    Listings
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
        <h1>Listings - <?php echo e(isset($type)?$type:"All"); ?></h1>
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
            <li class="active"><?php echo e(isset($type)?$type:"All"); ?></li>
        </ol>
    </section>
    <!--section ends-->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <a href="<?php echo e(URL::to('admin/listings/create')); ?>" class="pull-right"><button class="btn btn-success" style="margin-bottom: 10px;"><strong>ADD NEW</strong></button></a>
            </div>
        </div>
        <!--main content-->
        <div class="row">
            <div class="news-page">
                <div class="row">

                    <?php if(count($facilities)>0): ?>
                        <?php foreach($facilities as $facility): ?>
                        <div class="col-md-4">
                            <div class="news-blocks" style="height: 360px;">
                                <?php if(count($facility->images)>0): ?>
                                    <img src="<?php echo e(asset('uploads/files/'.$facility->images[0]->path)); ?>" class="img-responsive" style="height: 182px; min-width: 100%" alt="">
                                <?php else: ?>
                                    <img data-src="holder.js/300x184/#cccc:#fff" class="img-responsive" alt="">
                                <?php endif; ?>
                                <h2>
                                    <strong><a href="<?php echo e(URL::to('admin/listings/'.$facility->id.'/view')); ?>"><?php echo e($facility->name); ?></a></strong>
                                </h2>

                                <div class="news-block-tags">
                                    <strong><?php echo e($facility->physical_addressl); ?></strong>
                                </div>
                                <p>
                                  Category: <?php echo e($facility->facilityType->name); ?>  
                                </p>
                                <a href="<?php echo e(URL::to('admin/listings/'.$facility->id.'/edit')); ?>" class="news-block-btn">
                                   [ EDIT ]
                                </a>
                                <a href="<?php echo e(URL::to('admin/listings/'.$facility->id.'/images')); ?>" class="news-block-btn">
                                   [ IMAGES ]
                                </a>
                            </div>
                        </div>
                        <?php endforeach; ?>
                        <div class="col-md-10" align="center">
                            <?php if($pages_count>1): ?>
                            <nav>
                              <ul class="pagination">
                                <li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
                                <?php for($i=0;$i<$pages_count;++$i): ?>
                                    <li class="<?php echo e(($i+1)==$cur_page?'active':''); ?>"><a href="<?php echo e(URL::to('admin/listings/'.$type_url.'/'.($i+1))); ?>"><?php echo e($i+1); ?> <span class="sr-only">(current)</span></a></li>
                                <?php endfor; ?>
                                <li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">&raquo;</span></a></li>
                              </ul>
                            </nav>
                            <?php endif; ?>
                        </div>
                    <?php else: ?>
                        <div class="block" align="center">
                            <h2>NO ENTRIES</h2>
                        </div>
                    <?php endif; ?>

                    
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin/layouts/default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php /* Page title */ ?>
<?php $__env->startSection('title'); ?>
    Edit an item :: @parent
<?php $__env->stopSection(); ?>

<?php /* page level styles */ ?>
<?php $__env->startSection('header_styles'); ?>

    <link href="<?php echo e(asset('assets/vendors/summernote/summernote.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('assets/vendors/select2/css/select2.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('assets/vendors/bootstrap-tagsinput/css/bootstrap-tagsinput.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('assets/css/pages/blog.css')); ?>" rel="stylesheet" type="text/css">
    <!--end of page level css-->
<?php $__env->stopSection(); ?>

<?php /* Page content */ ?>
<?php $__env->startSection('content'); ?>
<section class="content-header">
    <!--section starts-->
    <h1>Edit listing item</h1>
    <ol class="breadcrumb">
        <li>
            <a href="<?php echo e(route('dashboard')); ?>"> <i class="livicon" data-name="home" data-size="14" data-c="#000" data-loop="true"></i>
                <?php echo app('translator')->get('general.home'); ?>
            </a>
        </li>
        <li>
            <a href="#">Listings</a>
        </li>
        <li class="active">Edit listing item</li>
    </ol>
</section>
<!--section ends-->
<section class="content paddingleft_right15">
    <!--main content-->
    <div class="row">
        <div class="the-box no-border">
            <!-- errors -->
            <div class="has-error">
                <?php echo $errors->first('title', '<span class="help-block">:message</span>'); ?>

                <?php echo $errors->first('content', '<span class="help-block">:message</span>'); ?>

                <?php echo $errors->first('blog_category_id', '<span class="help-block">:message</span>'); ?>

            </div>
            <?php echo Form::open(array('url' => URL::to('admin/listings/edit'), 'method' => 'post', 'class' => 'bf', 'files'=> true)); ?>

                 <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group">
                            <?php echo Form::label('name', 'Name'); ?>

                            <?php echo Form::text('name', $facility->name, array('class' => 'form-control', 'required' => 'required', 'placeholder'=> "Facility name")); ?>

                        </div>
                        <div class='box-body pad'>
                            <?php echo Form::label('description', 'Description'); ?>

                            <?php echo Form::textarea('description', $facility->description, array('class' => 'textarea form-control', 'rows'=>'4','required' => 'required', 'placeholder'=>trans('blog/form.ph-content'), 'style'=>'style="width: 100%; height: 150px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"')); ?>

                        </div>

                        <div class="form-group">
                            <?php echo Form::label('location', 'Location (Do not edit)'); ?>

                            <?php echo Form::text('location', null, array('class' => 'form-control','autocomplete'=>"off")); ?>

                        </div>
                        <div id="us2" style="height: 400px"></div>
                        <div class="form-group">
                            <?php echo Form::label('lat', 'Lat:'); ?>

                            <?php echo Form::text('lat', null, array('class' => 'form-control select2', 'required' => 'required')); ?>

                        </div>
                        <div class="form-group">
                            <?php echo Form::label('long', 'long'); ?>

                            <?php echo Form::text('long', null, array('class' => 'form-control select2', 'required' => 'required')); ?>

                        </div>
                    </div>
                    <!-- /.col-sm-8 -->
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?php echo Form::label('facility_type', 'Facility type'); ?>

                            <?php echo Form::select('facility_type',$facilityTypes, $facility->type, array('class' => 'form-control select2')); ?>

                        </div>
                        <div class="form-group">
                            <?php echo Form::label('region', 'Region'); ?>

                            <?php echo Form::select('region',$regions, null, array('class' => 'form-control select2', 'placeholder'=>trans('blog/form.select-category'))); ?>

                        </div>
                        <div class="form-group">
                            <?php echo Form::label('district', 'District'); ?>

                            <?php echo Form::select('district',[], null, array('class' => 'form-control select2', 'placeholder'=>trans('blog/form.select-category'))); ?>

                        </div>
                        <div class="form-group">
                            <?php echo Form::label('starting_price', 'Starting price'); ?>

                            <?php echo Form::text('starting_price', $facility->starting_price, array('class' => 'form-control',  'placeholder'=>'Starting price')); ?>

                        </div>
                        <div class="form-group">
                            <?php echo Form::label('physical_address', 'Physical address'); ?>

                            <?php echo Form::text('physical_address', $facility->physical_addressl, array('class' => 'form-control',  'placeholder'=>'Physical address')); ?>

                        </div>
                        <div class="form-group">
                            <?php echo Form::label('phone_nos', 'Phone numbers (Comma separated)'); ?>

                            <?php echo Form::text('phone_nos', $contacts['phone_nos'], array('class' => 'form-control' , 'placeholder'=>'e.g +255719906669,+255753387833')); ?>

                        </div>

                        <div class="form-group">
                            <?php echo Form::label('email', 'Email (optional)'); ?>

                            <?php echo Form::text('email', $contacts['email'], array('class' => 'form-control',  'placeholder'=>'Email')); ?>

                        </div>

                        <div class="form-group">
                            <?php echo Form::label('website', 'website (optional)'); ?>

                            <?php echo Form::text('website', $contacts['website'], array('class' => 'form-control',  'placeholder'=>'Website')); ?>

                        </div>

                        <div class='box-body pad'>
                            <?php echo Form::label('amenities', 'Amenities and facilities (Optional)'); ?>

                            <?php echo Form::textarea('amenities', $facility->amenities, array('class' => 'textarea form-control', 'rows'=>'4', 'style'=>'style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"')); ?>

                        </div>

                        <div class="form-group">
                            <?php echo Form::hidden('facility_id', $facility->id, array()); ?>

                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success"><?php echo app('translator')->get('blog/form.publish'); ?></button>
                            <a href="<?php echo URL::to('admin/listings/all'); ?>"
                               class="btn btn-danger"><?php echo app('translator')->get('blog/form.discard'); ?></a>
                        </div>
                    </div>
                    <!-- /.col-sm-4 --> </div>
                <?php echo Form::close(); ?>

        </div>
    </div>
    <!--main content ends-->
</section>
<?php $__env->stopSection(); ?>

<?php /* page level scripts */ ?>
<?php $__env->startSection('footer_scripts'); ?>
<!-- begining of page level js -->
<!--edit blog-->
<script src="<?php echo e(asset('assets/vendors/summernote/summernote.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/vendors/select2/js/select2.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/vendors/bootstrap-tagsinput/js/bootstrap-tagsinput.js')); ?>" type="text/javascript" ></script>
<script src="<?php echo e(asset('assets/js/pages/add_newblog.js')); ?>" type="text/javascript"></script>
<script type="text/javascript" src='http://maps.google.com/maps/api/js?sensor=false&libraries=places'></script>
<script src="<?php echo e(asset('assets/js/locationpicker.jquery.js')); ?>" type="text/javascript"></script>
<script type="text/javascript">
    districts=<?php echo $districts; ?>;

    var x;
    $("#region").change(function(a){
        rDistricts=districts[$(a.target).val()];
        aDistricts=$.map(rDistricts, function(value, index) {
                return {id:index, name:value};
            });

        $("#district").html(function(){
            html="";
            for (var i = 0; i < aDistricts.length; i++) {
                html+="<option value="+aDistricts[i].id+">"+aDistricts[i].name+"</option>";
            }
            return html;
        })
    });
    

    $('#us2').locationpicker({
        location: {latitude: <?php echo e($facility->latitude); ?>, longitude:<?php echo e($facility->longtude); ?> },   
        radius: 300,
        inputBinding: {
            latitudeInput: $('#lat'),
            longitudeInput: $('#long'),
            locationNameInput: $('#location')
        }
    });

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin/layouts/default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
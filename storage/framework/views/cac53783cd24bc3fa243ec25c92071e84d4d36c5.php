<?php /* Page title */ ?>
<?php $__env->startSection('title'); ?>
Multiple File Upload
@parent
<?php $__env->stopSection(); ?>

<?php /* page level styles */ ?>
<?php $__env->startSection('header_styles'); ?>    
    
	<link rel="stylesheet" href="<?php echo e(asset('assets/vendors/blueimp-gallery-with-desc/css/blueimp-gallery.min.css')); ?>" />
    <!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/blueimp-file-upload/css/jquery.fileupload.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/blueimp-file-upload/css/jquery.fileupload-ui.css')); ?>" />
    <!-- CSS adjustments for browsers with JavaScript disabled -->
    <noscript>
        <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/blueimp-file-upload/css/jquery.fileupload-noscript.css')); ?>" />
        <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/blueimp-file-upload/css/jquery.fileupload-ui-noscript.css')); ?>" />
    </noscript>
    
<?php $__env->stopSection(); ?>

<?php /* Page content */ ?>
<?php $__env->startSection('content'); ?>

<section class="content-header">
                <h1>Images for <?php echo e($facility->name); ?></h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="<?php echo e(route('dashboard')); ?>">
                            <i class="livicon" data-name="home" data-size="14" data-color="#000"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="active">Gallery</li>
                    <li>Images for <?php echo e($facility->name); ?></li>
                </ol>
            </section>
            <section class="content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <i class="livicon" data-name="clock" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                    Images
                                </h4>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <?php foreach($facility->images  as $image): ?>
                                    <div class="col-md-6">
                                        <div style="height: 280px; overflow: hidden;">
                                           <img src="<?php echo e(asset('uploads/files/'.$image->path)); ?>" style="width:100%; min-height:280px"> 
                                        </div>
                                        <h4><?php echo e($image->description); ?></h4>
                                        <a href="<?php echo e(URL::to('admin/listings/'.$facility->id.'/image/'.$image->id.'/delete')); ?>"><button class="btn btn-danger">DELETE</button></a>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                                <br>
                                <hr>
                                <div class="row">
                                    <?php echo Form::open(array('url' => URL::to('admin/listings/'.$facility->id.'/images/create'), 'method' => 'post', 'id'=>'fileupload', 'files'=> true)); ?>

                                         <!-- Redirect browsers with JavaScript disabled to the origin page -->
                                        <noscript>
                                            <input type="hidden" name="redirect" value="">
                                        </noscript>
                                        <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                                        <div class="row fileupload-buttonbar">
                                            <div class="col-lg-12">
                                                <!-- The fileinput-button span is used to style the file input field as button -->
                                                <span class="btn btn-success fileinput-button">
                                                    <i class="glyphicon glyphicon-plus"></i>
                                                    <span>Add Images...</span>
                                                    <input type="file" name="file" multiple>
                                                </span>
                                                <button type="submit" class="btn btn-primary start">
                                                    <i class="glyphicon glyphicon-upload"></i>
                                                    <span>Start upload</span>
                                                </button>

                                                <a href="<?php echo e(URL::to('admin/listings/all')); ?>" class="btn btn-primary pull-right">
                                                    <i class="glyphicon glyphicon-list"></i>
                                                    <span>Back to listings</span>
                                                </a>

                                                <!-- The table listing the files available for upload/download -->
                                                <table role="presentation" class="table table-striped">
                                                    <tbody class="files"></tbody>
                                                </table>
                                                
                                            </div>
                                        </div>
                                       
                                       
                                    <?php echo Form::close(); ?>

                                     
                                       
                                </div>
                            </div>
                        </div>
                        

                    </div>
                </div>
            </section>
            <!-- content -->
        
    <?php $__env->stopSection(); ?>

<?php /* page level scripts */ ?>
<?php $__env->startSection('footer_scripts'); ?>

    <script src="<?php echo e(asset('assets/vendors/blueimp-file-upload/js/jquery.ui.widget.js')); ?>" ></script>
    <!-- The Templates plugin is included to render the upload/download listings -->
    <script src="<?php echo e(asset('assets/vendors/blueimp-tmpl/js/tmpl.min.js')); ?>" ></script>
    <!-- The Load Image plugin is included for the preview images and image resizing functionality -->
    <script src="<?php echo e(asset('assets/vendors/blueimp-load-image/js/load-image.all.min.js')); ?>"></script>
    <!-- The Canvas to Blob plugin is included for image resizing functionality -->
    <script src="<?php echo e(asset('assets/vendors/blueimp-canvas-to-blob/js/canvas-to-blob.min.js')); ?>" ></script>
    <!-- Bootstrap JS is not required, but included for the responsive demo navigation -->
    <script src="<?php echo e(asset('assets/vendors/blueimp-gallery-with-desc/js/jquery.blueimp-gallery.min.js')); ?>" ></script>
    <!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
    <script src="<?php echo e(asset('assets/vendors/blueimp-file-upload/js/jquery.iframe-transport.js')); ?>" ></script>
    <!-- The basic File Upload plugin -->
    <script src="<?php echo e(asset('assets/vendors/blueimp-file-upload/js/jquery.fileupload.js')); ?>" ></script>
    <!-- The File Upload processing plugin -->
    <script src="<?php echo e(asset('assets/vendors/blueimp-file-upload/js/jquery.fileupload-process.js')); ?>" ></script>
    <!-- The File Upload image preview & resize plugin -->
    <script src="<?php echo e(asset('assets/vendors/blueimp-file-upload/js/jquery.fileupload-image.js')); ?>" ></script>
    <!-- The File Upload audio preview plugin -->
    <script src="<?php echo e(asset('assets/vendors/blueimp-file-upload/js/jquery.fileupload-audio.js')); ?>" ></script>
    <!-- The File Upload video preview plugin -->
    <script src="<?php echo e(asset('assets/vendors/blueimp-file-upload/js/jquery.fileupload-video.js')); ?>" ></script>
    <!-- The File Upload validation plugin -->
    <script src="<?php echo e(asset('assets/vendors/blueimp-file-upload/js/jquery.fileupload-validate.js')); ?>" ></script>
    <!-- The File Upload user interface plugin -->
    <script src="<?php echo e(asset('assets/vendors/blueimp-file-upload/js/jquery.fileupload-ui.js')); ?>" ></script>
    <!--script src="<?php echo e(asset('assets/js/pages/main.js')); ?>" ></script-->
    <script>
        $( document ).ready(function() {
            $('#fileupload').fileupload({
                url: '<?php echo e(URL::to('admin/listings/'.$facility->id.'/images/create')); ?>',
                dataType: 'json',
                maxNumberOfFiles: 8
            });
        });
        </script>
     <!-- The template to display files available for upload -->
<script id="template-upload" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-upload fade">
        <td>
            <span class="preview"></span>
        </td>
        <td>
            <p class="name hidden">{%=file.name%}</p>
            <textarea placeholder="Description" name="description" required="required" ></textarea> 
            <strong class="error text-danger"></strong>
        </td>
        <td>
            <p class="size">Processing...</p>
            <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
        </td>
        <td>
            {% if (!i && !o.options.autoUpload) { %}
                <button class="btn btn-primary start" disabled>
                    <i class="glyphicon glyphicon-upload"></i>
                    <span>Start</span>
                </button>
            {% } %}
            {% if (!i) { %}
                <button class="btn btn-warning cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Cancel</span>
                </button>
            {% } %}
        </td>
    </tr>
{% } %}
</script>
    <!-- The template to display files available for download -->
<script id="template-download" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-download fade">
        <td>
            <span class="preview">
                {% if (file.thumbnailUrl) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
                {% } %}
            </span>
        </td>
        <td>
            <p class="name">
                {% if (file.url) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
                {% } else { %}
                    <span>{%=file.name%}</span>
                {% } %}
            </p>
            {% if (file.error) { %}
                <div><span class="label label-danger">Error</span> {%=file.error%}</div>
            {% } %}
        </td>
        <td>
            {%=file.name%} 2
        </td>
        <td>
            {% if (file.deleteUrl) { %}
                <button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                    <i class="glyphicon glyphicon-trash"></i>
                    <span>Delete</span>
                </button>
                <input type="checkbox" name="delete" value="1" class="toggle">
            {% } else { %}
                <button class="btn btn-warning cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Cancel</span>
                </button>
            {% } %}
        </td>
    </tr>
{% } %}
</script> 
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin/layouts/default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
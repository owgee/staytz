@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    Edit an item :: @parent
@stop

{{-- page level styles --}}
@section('header_styles')

    <link href="{{ asset('assets/vendors/summernote/summernote.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendors/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/vendors/bootstrap-tagsinput/css/bootstrap-tagsinput.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/pages/blog.css') }}" rel="stylesheet" type="text/css">
    <!--end of page level css-->
@stop

{{-- Page content --}}
@section('content')
<section class="content-header">
    <!--section starts-->
    <h1>Edit Region</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('dashboard') }}"> <i class="livicon" data-name="home" data-size="14" data-c="#000" data-loop="true"></i>
                @lang('general.home')
            </a>
        </li>
        <li>
            <a href="#">Listings</a>
        </li>
        <li class="active">Edit Region</li>
    </ol>
</section>
<!--section ends-->
<section class="content paddingleft_right15">
    <!--main content-->
    <div class="row">
        <div class="the-box no-border">
            <!-- errors -->
            <div class="has-error">
                {!! $errors->first('title', '<span class="help-block">:message</span>') !!}
                {!! $errors->first('content', '<span class="help-block">:message</span>') !!}
                {!! $errors->first('blog_category_id', '<span class="help-block">:message</span>') !!}
            </div>
            {!! Form::open(array('url' => URL::to('admin/places/'.encrypt($region->id).'/edit'), 'method' => 'post', 'class' => 'bf', 'files'=> true)) !!}
                 <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            {!! Form::label('name', 'Name') !!}
                            {!! Form::text('region_name', $region->name, array('class' => 'form-control', 'required' => 'required', 'placeholder'=> "Region name")) !!}
                        </div>
                        <div class="form-group">
                            <div>
                                @if($region->image_path)
                                    <img src="{{ asset('uploads/files/'.$region->image_path) }}" class="img-responsive" style="height: 190px; min-width: 100%" alt="">
                                @endif
                            </div>
                            {!! Form::label('image', 'Region image (Choose new to change)') !!}
                            {!! Form::file('image') !!}
                            <p class="help-block">Image of the Region</p>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success">@lang('blog/form.publish')</button>
                            <a href="{!! URL::to('admin/places') !!}"
                               class="btn btn-danger">@lang('blog/form.discard')</a>
                        </div>

                    </div>
                    <!-- /.col-sm-8 -->
                    <div class="col-sm-4">



                    </div>
                    <!-- /.col-sm-4 --> </div>
                {!! Form::close() !!}
        </div>
    </div>
    <!--main content ends-->
</section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
<!-- begining of page level js -->
<!--edit blog-->
<script src="{{ asset('assets/vendors/summernote/summernote.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/select2/js/select2.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/bootstrap-tagsinput/js/bootstrap-tagsinput.js') }}" type="text/javascript" ></script>
<script src="{{ asset('assets/js/pages/add_newblog.js') }}" type="text/javascript"></script>
<script type="text/javascript" src='http://maps.google.com/maps/api/js?sensor=false&libraries=places'></script>
<script src="{{ asset('assets/js/locationpicker.jquery.js') }}" type="text/javascript"></script>
<script type="text/javascript">
    {{--districts={!! $districts !!};--}}

    {{--var x;--}}
    {{--$("#region").change(function(a){--}}
        {{--rDistricts=districts[$(a.target).val()];--}}
        {{--aDistricts=$.map(rDistricts, function(value, index) {--}}
                {{--return {id:index, name:value};--}}
            {{--});--}}

        {{--$("#district").html(function(){--}}
            {{--html="";--}}
            {{--for (var i = 0; i < aDistricts.length; i++) {--}}
                {{--html+="<option value="+aDistricts[i].id+">"+aDistricts[i].name+"</option>";--}}
            {{--}--}}
            {{--return html;--}}
        {{--})--}}
    {{--});--}}
    {{----}}

    {{--$('#us2').locationpicker({--}}
        {{--location: {latitude: {{ $facility->latitude }}, longitude:{{ $facility->longtude }} },   --}}
        {{--radius: 300,--}}
        {{--inputBinding: {--}}
            {{--latitudeInput: $('#lat'),--}}
            {{--longitudeInput: $('#long'),--}}
            {{--locationNameInput: $('#location')--}}
        {{--}--}}
    {{--});--}}

</script>
@stop
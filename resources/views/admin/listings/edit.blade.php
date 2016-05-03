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
    <h1>Edit listing item</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('dashboard') }}"> <i class="livicon" data-name="home" data-size="14" data-c="#000" data-loop="true"></i>
                @lang('general.home')
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
                {!! $errors->first('title', '<span class="help-block">:message</span>') !!}
                {!! $errors->first('content', '<span class="help-block">:message</span>') !!}
                {!! $errors->first('blog_category_id', '<span class="help-block">:message</span>') !!}
            </div>
            {!! Form::open(array('url' => URL::to('admin/listings/edit'), 'method' => 'post', 'class' => 'bf', 'files'=> true)) !!}
                 <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group">
                            {!! Form::label('name', 'Name') !!}
                            {!! Form::text('name', $facility->name, array('class' => 'form-control', 'required' => 'required', 'placeholder'=> "Facility name")) !!}
                        </div>
                        <div class='box-body pad'>
                            {!! Form::label('description', 'Description') !!}
                            {!! Form::textarea('description', $facility->description, array('class' => 'textarea form-control', 'rows'=>'4','required' => 'required', 'placeholder'=>trans('blog/form.ph-content'), 'style'=>'style="width: 100%; height: 150px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"')) !!}
                        </div>

                        <div class='box-body pad'>
                            {!! Form::label('amenities', 'Amenities and facilities (Optional)') !!}
                            {!! Form::textarea('amenities', $facility->amenities, array('class' => 'textarea form-control', 'rows'=>'4', 'style'=>'style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"')) !!}
                        </div>
                    </div>
                    <!-- /.col-sm-8 -->
                    <div class="col-sm-4">
                        <div class="form-group">
                            {!! Form::label('facility_type', 'Facility type') !!}
                            {!! Form::select('facility_type',$facilityTypes, $facility->type, array('class' => 'form-control select2')) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('region', 'Region') !!}
                            {!! Form::select('region',$regions, null, array('class' => 'form-control select2', 'placeholder'=>trans('blog/form.select-category'))) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('district', 'District') !!}
                            {!! Form::select('district',[], null, array('class' => 'form-control select2', 'placeholder'=>trans('blog/form.select-category'))) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('price_range', 'Price range') !!}
                            {!! Form::text('price_range', $facility->price_range, array('class' => 'form-control',  'placeholder'=>'E.g 25,000 - 300,000 Tsh')) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('physical_address', 'Physical address') !!}
                            {!! Form::text('physical_address', $facility->physical_addressl, array('class' => 'form-control',  'placeholder'=>'Physical address')) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('phone_nos', 'Phone numbers (Comma separated)') !!}
                            {!! Form::text('phone_nos', $contacts['phone_nos'], array('class' => 'form-control' , 'placeholder'=>'e.g +255719906669,+255753387833')) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('email', 'Email (optional)') !!}
                            {!! Form::text('email', $contacts['email'], array('class' => 'form-control',  'placeholder'=>'Email')) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('website', 'website (optional)') !!}
                            {!! Form::text('website', $contacts['website'], array('class' => 'form-control',  'placeholder'=>'Website')) !!}
                        </div>

                        <div class="form-group">
                            <div>
                                @if($facility->map_image_path)
                                    <img src="{{ asset('uploads/files/'.$facility->map_image_path) }}" class="img-responsive" style="height: 182px; min-width: 100%" alt="">
                                @endif
                            </div>
                            {!! Form::label('image', 'Map image (Choose new to change)') !!}
                            {!! Form::file('image') !!}
                            <p class="help-block">Screenshot of the map</p>
                        </div>

                        <div class="form-group">
                            {!! Form::hidden('facility_id', $facility->id, array()) !!}
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success">@lang('blog/form.publish')</button>
                            <a href="{!! URL::to('admin/listings/all') !!}"
                               class="btn btn-danger">@lang('blog/form.discard')</a>
                        </div>
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
    districts={!! $districts !!};

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
        location: {latitude: {{ $facility->latitude }}, longitude:{{ $facility->longtude }} },   
        radius: 300,
        inputBinding: {
            latitudeInput: $('#lat'),
            longitudeInput: $('#long'),
            locationNameInput: $('#location')
        }
    });

</script>
@stop
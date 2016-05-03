@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    News
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')

    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-tagsinput/css/bootstrap-tagsinput.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/pages/news.css') }}"/>
    <!-- end of page level css -->
@stop

{{-- Page content --}}
@section('content')

    <section class="content-header">
        <!--section starts-->
        <h1>{{{ $facility->name }}}</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('dashboard') }}">
                    <i class="livicon" data-name="home" data-size="14" data-c="#000" data-loop="true"></i>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="#">Listings</a>
            </li>
            <li>
                <a href="#">{{{ $facility->facilityType->name }}}</a>
            </li>
            <li class="active">{{{ $facility->name }}}</li>
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
                                @if(count($facility->images)>0)
                                    <div class="hidden">{{ $i=0 }} </div>
                                    @foreach($facility->images as $image)
                                        <div class="{{ $i++==0?'active':'' }} item" style="height:350px;">
                                            <img src="{{ asset('uploads/files/'.$image->path) }}" class="img-responsive" alt="">
                                        </div>
                                    @endforeach
                                @else
                                    <div class="active item">
                                        <img data-src="holder.js/1900x278/#00bc8c:#fff" class="img-responsive" alt="">
                                    </div>
                                @endif
                                    
                                </div>
                                <!-- Carousel nav -->
                                <a class="carousel-control left" href="#myCarousel" data-slide="prev">
                                    <i class="m-icon-big-swapleft m-icon-white"></i>
                                </a>
                                <a class="carousel-control right" href="#myCarousel" data-slide="next">
                                    <i class="m-icon-big-swapright m-icon-white"></i>
                                </a>
                                <ol class="carousel-indicators">
                                    @if(count($facility->images)>0)
                                        @for($i=0;$i< count($facility->images);++$i)
                                            <li data-target="#myCarousel" data-slide-to="{{$i}}" {{ $i==0?'class="active"':'' }}></li>
                                        @endfor
                                     @endif
                                </ol>
                            </div>


                            <h2>
                                <strong>{{{ $facility->name }}}</strong>
                            </h2>

                            <p>
                              Category: {{{ $facility->facilityType->name }}}  
                            </p>
                        </div>

                        <div class="news-blocks">
                            <h2>DESCRIPTION</h2>

                            <p>
                                {!! $facility->description !!}
                            </p>
                            
                        </div>

                        <div class="news-blocks">
                            <h2>AMENITIES</h2>
                            @if($facility->amenities)
                            <p style="font-size: 18px; line-height: 22px;">
                                {!! $facility->amenities !!}
                            </p>
                            @endif
                        </div>

                        <div class="news-blocks">
                            <h2>LOCATION</h2>
                            {{ $facility->physical_addressl}}
                            <div id="map" align="center">
                            @if($facility->map_image_path!=null)
                                <img class="img-responsive" src="{{ asset('uploads/files/'.$facility->map_image_path) }}">
                            @else
                                <img data-src="holder.js/1900x278/#00bc8c:#fff" class="img-responsive" alt="">
                            @endif
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
                                    <a href="{{ URL::to('/admin/listings/'.$facility->id.'/images') }}">MANAGE IMAGES</a>
                                </li>
                                <li class="list-group-item">
                                    <i class="livicon" data-name="delete" data-size="14" data-c="#000" data-loop="true"></i>
                                    <a href="{{ URL::to('/admin/listings/'.$facility->id.'/edit') }}">EDIT ITEM</a>
                                </li>
                                <li class="list-group-item" style="background-color : #e44;">
                                    <i class="livicon" data-name="delete" data-size="14" data-c="#fff" data-loop="true"></i>
                                    <a href="{{ URL::to('/admin/listings/'.$facility->id.'/delete') }}" style="color: #fff;">DELETE</a>
                                </li>
                                
                            </ul>
                        </div>

                        <div class="news-blocks">
                            <h2>CONTACTS</h2>
                            <br>
                            @foreach($facility->contacts()->where('type',1)->get() as $c)
                                <div> - {{ $c->contact }}</div>
                            @endforeach
                            <br>
                            @foreach($facility->contacts()->where('type',2)->get() as $c)
                                <div> - {{ $c->contact }}</div>
                            @endforeach
                            <br>
                            @foreach($facility->contacts()->where('type',3)->get() as $c)
                                <div> - {{ $c->contact }}</div>
                            @endforeach
                        </div>
                    </div>
                    <!--end col-md-3-->
                </div>
                
            </div>
        </div>
        <!--main content ends-->
    </section>
    <!-- content -->

    @stop

    {{-- page level scripts --}}
    @section('footer_scripts')

            <!--tags-->
    <script src="{{ asset('assets/vendors/bootstrap-tagsinput/js/bootstrap-tagsinput.js') }}"></script>
    <script type="text/javascript" async defer src='http://maps.google.com/maps/api/js?sensor=false&libraries=places&callback=initMap'></script>

@stop
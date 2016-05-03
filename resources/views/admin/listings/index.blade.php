@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    Listings
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
        <h1>Listings - {{ isset($type)?$type:"All" }}</h1>
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
            <li class="active">{{ isset($type)?$type:"All" }}</li>
        </ol>
    </section>
    <!--section ends-->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ URL::to('admin/listings/create') }}" class="pull-right"><button class="btn btn-success" style="margin-bottom: 10px;"><strong>ADD NEW</strong></button></a>
            </div>
        </div>
        <!--main content-->
        <div class="row">
            <div class="news-page">
                <div class="row">

                    @if(count($facilities)>0)
                        @foreach($facilities as $facility)
                        <div class="col-md-4">
                            <div class="news-blocks" style="height: 360px;">
                                @if(count($facility->images)>0)
                                    <img src="{{ asset('uploads/files/'.$facility->images[0]->path) }}" class="img-responsive" style="height: 182px; min-width: 100%" alt="">
                                @else
                                    <img data-src="holder.js/300x184/#cccc:#fff" class="img-responsive" alt="">
                                @endif
                                <h2>
                                    <strong><a href="{{ URL::to('admin/listings/'.$facility->id.'/view') }}">{{{ $facility->name }}}</a></strong>
                                </h2>

                                <div class="news-block-tags">
                                    <strong>{{{ $facility->physical_addressl }}}</strong>
                                </div>
                                <p>
                                  Category: {{{ $facility->facilityType->name }}}  
                                </p>
                                <a href="{{ URL::to('admin/listings/'.$facility->id.'/edit') }}" class="news-block-btn">
                                   [ EDIT ]
                                </a>
                                <a href="{{ URL::to('admin/listings/'.$facility->id.'/images') }}" class="news-block-btn">
                                   [ IMAGES ]
                                </a>
                            </div>
                        </div>
                        @endforeach
                        <div class="col-md-10" align="center">
                            @if($pages_count>1)
                            <nav>
                              <ul class="pagination">
                                <li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
                                @for($i=0;$i<$pages_count;++$i)
                                    <li class="{{ ($i+1)==$cur_page?'active':''}}"><a href="{{ URL::to('admin/listings/'.$type_url.'/'.($i+1)) }}">{{ $i+1 }} <span class="sr-only">(current)</span></a></li>
                                @endfor
                                <li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">&raquo;</span></a></li>
                              </ul>
                            </nav>
                            @endif
                        </div>
                    @else
                        <div class="block" align="center">
                            <h2>NO ENTRIES</h2>
                        </div>
                    @endif

                    
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

@stop

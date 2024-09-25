@extends('layout.header_footer')
@section('content')
<style>
    
    .results{
        gap: 15px 0;
    }
    .results .col-lg-6.col-md-6.col-sm-12.col-12{
        display:flex;
    }
    
</style> 

    @foreach($media_banner as $mb)
    <div class="inner-banner" style="background-image:url('/uploads/{{$mb->image}}');">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-banner-title">
                        <h2>{{$mb->page_title}}</h2>
                    </div>
                    <div class="breadcrumb">
                        <a href="#" class="me-2 home">Home</a>
                        <i class="fa-solid fa-angles-right"></i>
                        <a class="ms-2">{{$mb->page_title}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <section class="media-main">
        <div class="container">
            @foreach($media_description as $md)
            <div class="section-heading">
                <h5>
                    {{$md->title1}}
                </h5>
                <h2>   {{$md->title2}}</h2>
            </div>
            @endforeach
            <div class="media-inner">
                <div class="media-tabing">
                    <ul class="nav nav-pills" role="tablist">
                        @foreach($financial_year as $key=>$fy)
                        @if($key==0)
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="pill" href="#fy{{$fy->year}}">fy {{$fy->year}}</a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="pill" href="#fy{{$fy->year}}">fy {{$fy->year}}</a>
                        </li>
                        @endif
                        @endforeach
                        
                    </ul>
                </div>
                <div class="tab-content media-content">
                     @foreach($financial_year as $key=>$fy)
                    @if($key==0)
                    <div id="fy{{$fy->year}}" class="container tab-pane active">
                       <div class="media-table table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="media-head">
                                                <span>title</span>
                                            </div>
                                        </th>
                                        <th>
                                            <div class="media-head">
                                                <span>Preview</span>
                                            </div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                     @foreach($media as $key=>$m)
                                     @if($m->year==$fy->year)
                                    <tr>
                                        <td>
                                            <div class="media-title">
                                                <span>{{$m->title}}</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="media-btn">
                                                <a href="{{ route('file.preview', $m->id) }}" target="_blank">
                                                    <i class="fa-solid fa-eye"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                       </div>
                    </div>
                     @else
                    <div id="fy{{$fy->year}}" class="container tab-pane fade">
                        <div class="media-table table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="media-head">
                                                <span>title</span>
                                            </div>
                                        </th>
                                        <th>
                                            <div class="media-head">
                                                <span>Preview</span>
                                            </div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                     @foreach($media as $key=>$m)
                                     @if($m->year==$fy->year)
                                    <tr>
                                        <td>
                                            <div class="media-title">
                                                <span>{{$m->title}}</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="media-btn">
                                                <a href="{{ route('file.preview', $m->id) }}" target="_blank">
                                                    <i class="fa-solid fa-eye"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                       </div>
                    </div>
                    @endif
                    @endforeach

                </div>
            </div>
        </div>
    </section>
    
@endsection
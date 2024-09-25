@extends('layout.header_footer')

@section('content')
 
 
    @foreach($empowering_communities_banner as $mb)
  <div class="inner-banner" style="background-image: url('/uploads/{{$mb->image}}');">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-banner-title">
                        <h2>{{$mb->page_title}}</h2>
                    </div>
                    <div class="breadcrumb">
                        <a href="{{url('/')}}" class="me-2 home">Home</a>
                        <i class="fa-solid fa-angles-right"></i>
                        <a class="ms-2">{{$mb->page_title}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <section>
        <div class="senitation-wrapper">

            <div class="container">
                 @foreach($health_sanitation_description as $hsd)
                <div class="section-heading">
                    <h2>{{$hsd->title}}
                    </h2>
                </div>
                @endforeach
                <div class="senitation-slider">
                     @foreach($health_sanitation as $hs)
                    <div>
                        <div class="row">
        
                            <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                <div class="senitation-content">
                                    <div class="senitation-heading" >
                                        <h5>{{$hs->title}}
                                        </h5>
                                    </div>
                                     @php $descriptiondata=json_decode($hs->description);@endphp

                                    @foreach ($descriptiondata as $ld)
                                    <p>{{$ld->des}}
                                    </p>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                <div class="senitation-images">
                                    <div class="first-img">
                                        <img src="/uploads/{{$hs->image1}}" alt="">
                                    </div>
                                    <div class="secong-img"> 
                                        <img src="/uploads/{{$hs->image2}}" alt="">
                                    </div>
                                   
        
                                </div>
                            </div>
                        </div>
                    </div>
                   @endforeach
                </div>
    
            </div>
    
        </div>
    </section>

    <section>
        <div class="hygiene-main">
            <div class="container">
                @foreach($menstrual_hygiene_description as $mhd)
                <div class="section-heading">
                    <h2>{{$mhd->title}}</h2>
                </div>
                @endforeach
                 @foreach($menstrual_hygiene as $mh)
                <div class="row">
                    <div class="col-lg-5 col-md-12 col-sm-12 col-12">
                        <div class="hygiene-image">
                            <img src="/uploads/{{$mh->image}}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-12 col-sm-12 col-12">
                        <div class="hygiene-content">
                            <h5>{{$mh->title1}}</h5>
                            <p>
                               {{$mh->description}}
                            </p>
                        </div>
                        <ul class="school-list">
                            <h6>{{$mh->title2}}</h6>
                              @php $listdata=json_decode($mh->list);@endphp
                                @foreach ($listdata as $ld)
                            <li>
                                <i class="fa-solid fa-check"></i>
                                <span>{{$ld->list}}</span>
                            </li>
                             @endforeach
                        </ul>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <section>
        <div class="facilities-main">
            <div class="container">
                 @foreach($latest_work_description as $lwd)
                <div class="section-heading">
                    <h2>{{$lwd->title}}</h2>
                </div>
                @endforeach
                <div class="facilities-slider">
                     @foreach($latest_work as $key=>$lw)
                    <div class="facilities-box">
                        <div class="facilities-img">
                            @foreach($latest_work_image as $lwi)
                             @if($lwi->latest_work_id==$lw->id)
                            <img  src="/uploads/{{$lwi->image}}" alt="">
                            @break
                             @endif
                            @endforeach
                        </div>
                        <div class="facilities-details-wrap">
                            <div class="facilities-details">
                                <h6 class="facilities-subtitle">{{$lw->title}}</h6>
                            </div>
                            <a href="#f{{$key+1}}" class="gallery-btn"><i class="fa-solid fa-file-image"></i></a>
                            <div id="f{{$key+1}}" class="hidden">
                                 @foreach($latest_work_image as $lwi)
                                 @if($lwi->latest_work_id==$lw->id)
                                <a href="/uploads/{{$lwi->image}}"></a>
                                @endif
                                 @endforeach
                             </div>
                        </div>
                    </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </section>

   @foreach($cta_description as $cd)
    <section class="cta_details" style="background-image: url('/uploads/{{$cd->image}}');">
        <div class="cta_inner_details position-relative">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="cta_contents">
                            <div class="section-heading mb-0">
                                <h2 class="mb-4">{{$cd->title1}}</h2>
                                <p class="mb-4">{{$cd->title2}}</p>
                                <div class="cta-button">
                                    <button class="button">
                                        <a href="{{url('/contact')}}">Contact Us</a>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endforeach
    
    
  
    
@endsection 


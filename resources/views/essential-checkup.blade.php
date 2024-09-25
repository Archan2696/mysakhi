@extends('layout.header_footer')

@section('content')


@foreach($essential_checkup_banner as $ecb)
 <div class="inner-banner" style="background-image: url('/uploads/{{$ecb->image}}');">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-banner-title">
                        <h2>{{$ecb->page_title}}</h2>
                    </div>
                    <div class="breadcrumb">
                        <a href="{{url('/')}}" class="me-2 home">Home</a>
                        <i class="fa-solid fa-angles-right"></i>
                        <a class="ms-2">{{$ecb->page_title}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <div class="bg-checkups">
        <div class="container">
            @foreach($essential_about as $ea)
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-6">
                    <div class="section-heading">
                        <h5>{{$ea->sub_title}}</h5>
                        <h2>{{$ea->title}}</h2>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="section-heading complications-menopause-description">
                        <p>{{$ea->description}}</p>
                    </div>
                </div>
            </div>
            @endforeach
            @foreach($essential_test_description as $etd)
            <div class="row">
                <div class="col-lg-6">
                    <div class="checkup-image">
                        <img src="/uploads/{{$etd->image}}" alt="image">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="checkups-section">  
                            <h2>
                               {{$etd->title}}
                            </h2>

                        <div class="inner-checkups">
                            <div class="checkups-tabing">
                                <ul class="nav nav-pills" role="tablist">
                                    <li class="nav-item">
                                      <a class="nav-link active" data-bs-toggle="pill" href="#home">Blood Tests</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" data-bs-toggle="pill" href="#menu1">other Tests</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content checkups-content">
                                <div id="home" class="container tab-pane active"><br>
                                   
                                    <ul>
                                        @foreach($essential_test as $et)
                                        @if($et->test_type=="Blood Tests")
                                        <li>
                                            <strong>{{$et->title}}</strong>:<span>{{$et->description}}</span> 
                                        </li>
                                        @endif
                                        @endforeach
                                    </ul>
                                </div>
                                <div id="menu1" class="container tab-pane fade"><br>
                                    
                                    <ul>
                                         @foreach($essential_test as $et)
                                        @if($et->test_type=="Other Tests")
                                        <li>
                                            <strong>{{$et->title}}</strong>:<span>{{$et->description}}</span> 
                                        </li>
                                          @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="essential-content">
        <div class="container">
        @foreach($essential_info as $ei)
            <div class="essential-box">
                <strong>{{$ei->title1}}</strong>  
                <p><span>{!!$ei->description1!!}</p>
                <h2>{{$ei->title2}}</h2> 
                <div class="essential-info">
                    {!!$ei->description2!!}
                </div>
            </div>
        @endforeach   
        </div>
    </div>

@foreach($essential_cta_description as $ecd)
    <section class="cta_details essential-cta"style="background-image: url('/uploads/{{$ecd->image}}');">
        <div class="cta_inner_details position-relative">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="cta_contents">
                            <div class="section-heading mb-0">
                                <h2 class="mb-4">{{$ecd->title}}</h2>
                                <p class="mb-4">{{$ecd->description}}</p>
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




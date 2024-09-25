@extends('layout.header_footer')

@section('content')
    @foreach($menopause_myths_banner as $mb)
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

    <div class="myths-section">
        
        @php $max=9; @endphp
        
         @foreach($myths_description as $md)
        <div class="container-fluid">
            <div class="section-heading">
                <h5>
                    {{$md->title}}
                </h5>
                <h2> {{$md->sub_title}}</h2>
            </div>
            <div class="myths-slider-box">
                <div class="row">
                    <div class="col-lg-5 col-md-5 col-sm-5 col-12">
                        <div class="myth-bg-img">
                            <img src="/uploads/{{$md->image}}" alt="">
                            <div class="myth__text">
                                <span></span><strong> {{count($myths)}}</strong>{{$md->title}}
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-7 col-12">
                        
                            <div class="myths-slider">
                                @foreach($myths as $key=>$m)
                                <div class="myths-main-box">
                                    <div class="myths-number">
                                        @if($max > $key)
                                        0{{$key+1}}
                                        @else
                                        {{$key+1}}
                                        @endif
                                    </div>
                                    <div class="myths-title">
                                        
                                        <div class="myth-subtitle">
                                            <h3>  {{$m->title1}} <span> {{$m->title2}} </span> </h3>
                                        </div>
                                    </div>
                                    <div class="myths-title">
                                        
                                        <div class="myth-subtitle">
                                            <h2>{{$m->title3}}</h2>
                                            <p>
                                               {{$m->description}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        
                    </div>
                    
                </div>
              
            </div>
            
            
        </div>
        @endforeach
    </div>

     <div class="myths-listing-main">
        <div class="container">
            <div class="row">
                
                 @foreach($myths as $key=>$m)
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="myths-main-box">
                        <div class="myths-number">
                            @if($max > $key)
                            0{{$key+1}}
                            @else
                            {{$key+1}}
                            @endif
                        </div>
                        <div class="myths-title">
                            
                            <div class="myth-subtitle">
                                <h3> {{$m->title1}} <span> {{$m->title2}}</span> </h3>
                            </div>
                        </div>
                        <div class="myths-title">
                            
                            <div class="myth-subtitle">
                                <h2>{{$m->title3}}</h2>
                                <p>
                                    {{$m->description}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
               @endforeach
              
            </div>
            
            <!-- <div class="expert-pagination">-->
            <!--    <div class="row">-->
            <!--        <div class="col-lg-12">-->
            <!--            <ul class="pagination">-->
            <!--                <li class="page-item">-->
            <!--                    <a class="page-link" href="#"><i class="fa-solid fa-chevron-left"></i></a>-->
            <!--                </li>-->
            <!--                <li class="page-item">-->
            <!--                    <a class="page-link active" href="#">1</a>-->
            <!--                </li>-->
            <!--                <li class="page-item">-->
            <!--                    <a class="page-link" href="#">2</a>-->
            <!--                </li>-->
            <!--                <li class="page-item">-->
            <!--                    <a class="page-link" href="#">3</a>-->
            <!--                </li>-->
            <!--                <li class="page-item">...</li>-->
            <!--                <li class="page-item">-->
            <!--                    <a class="page-link" href="#">10</a>-->
            <!--                </li>-->
            <!--                <li class="page-item">-->
            <!--                    <a class="page-link" href="#"><i class="fa-solid fa-chevron-right"></i></a>-->
            <!--                </li>-->
            <!--            </ul>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->
            
        </div>
    </div>
    
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
    


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
	
	<script src="js/script.js"></script>
   

<script>
    $(document).ready(function(){
        $('.myths-slider').slick({
      dots:false,
      infinite:true,
      slidesToShow: 2,
    //   initialSlide: 0.5,
    //   slidesToScroll: 0.5,
      autoplay:false,
      autoplaySpeed: 0,
      speed: 1000,
      pauseOnHover: true,
      arrows:true,
      prevArrow: '<div class="myths-arrow myths-prev-arrow"><i class="fa-solid fa-chevron-left"></i></div>',
      nextArrow: '<div class="myths-arrow myths-next-arrow"><i class="fa-solid fa-chevron-right"></i></div>',
      responsive: [
        {
          breakpoint: 1360,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            
          }
        },
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows:false,
          }
        }
      ]
    });
    });
</script>


@endsection
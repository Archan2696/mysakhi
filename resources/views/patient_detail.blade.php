@extends('layout.header_footer')

@section('content')
    
     <style>
    .VIpgJd-ZVi9od-xl07Ob-lTBxed span:first-child{
        display:none;
    }
    .goog-te-gadget-simple span:first-chiild{
      display:none!important;
    }
    .goog-te-gadget-simple:before{
        content: "";
        background-color: #fe434c !important;
        border-left: 1px solid #D5D5D5;
        font-size: 3px;
        display: inline-block;
        padding-top: 1px;
        padding-bottom: 0px;
        cursor: pointer;
        line-height: 40px;
        text-align: center;
        color: #fff;
        border-radius: 5px;
        border: none !important;
        display: inline-block;
        background: url(../image/gt-img.png);
        height: 100%;
        width: 100%;
        background-size: 70% 70%;
        background-position: center;
        background-repeat: no-repeat;
    }
    
    
    .goog-te-gadget-simple  {
      background-color: rgba(255,255,255,0.20)!important;
      /*border: 1px solid rgba(255,255,255,0.50) !important;*/
      border-radius: 4px!important;
      font-size: 1rem!important;
      line-height:2rem!important;
      display: inline-block;
      cursor: pointer;
      zoom: 1;
    }
    
    .goog-te-menu-value span:nth-child(5) {
      display:none;
    }
    
    .goog-te-gadget-icon {
        display: none;
    }


    </style>
    
</head>

    @foreach($patient_detail_banner as $pdb)
    <div class="inner-banner" style="background-image: url('/uploads/{{$pdb->image}}');">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-banner-title">
                        @foreach($testimonial as $t)
                        <h2>{{$t->name1}}</h2>
                        @endforeach
                    </div>
                    <div class="breadcrumb">
                        <a href="#" class="me-2 home">Home</a>
                        <i class="fa-solid fa-angles-right"></i>
                        @foreach($testimonial as $t)
                        <a class="ms-2">{{$t->name1}}</a>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach

    <section class="patient_detail">
        <div class="container">
            <div class="patient_detail_story">
                @foreach($testimonial as $t)
                <div class="row">
                    <div class="col-lg-2 col-md-3 col-sm-3">
                        <div class="patient_detail_img">
                            <img src="/uploads/{{$t->image}}">
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-7 col-sm-9">
                        <div class="patient_detail_container">
                            <h3>{{$t->name1}} with {{$t->name2}}</h3>
                            <div class="patient_detail_description">
                            </div>
                            <ul class="testimonial-rating">
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star-half-stroke"></i></li>
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-lg-12">                        
                @foreach($testimonial as $t)
                    <div class="patient_detail_story patient_detail_story_detail">
                        <div class="patient_detail_title">
                            <h3>{{$t->name1}}'s Menopause Journey</h3>
                            @foreach($testimonial_description as $td)
                            @if($td->testimonial_id==$t->id)
                            <p>{{$td->description}}</p>
                            @endif
                            @endforeach
                        </div>
                        <span><b>{{$t->name1}}:</b></span>
                        <p>{{$t->opinion1}}</p>

                        <span><b>{{$t->name2}}:</b></span>
                        <p>{{$t->opinion2}}</p>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
    
    <script src="/js/script.js"></script>
    <script>
            var acc = document.getElementsByClassName("accordion");
            var i;

            for (i = 0; i < acc.length; i++) {
              acc[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var panel = this.nextElementSibling;
                if (panel.style.height === "auto" || panel.style.height === "") {
                  panel.style.height = panel.scrollHeight + "px";
                } else {
                  panel.style.height = null;
                }
              });
            }


            function openCity(evt, cityName) {
              var i, tabcontent, tablinks;
              tabcontent = document.getElementsByClassName("tabcontent");
              for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
              }
              tablinks = document.getElementsByClassName("tablinks");
              for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
              }
              document.getElementById(cityName).style.display = "block";
              evt.currentTarget.className += " active";
            }

    // mobile sub menu 
           $('.mobile_submenu ul').hide();
           $(".mobile_submenu a").click(function () {
              $(this).parent(".mobile_submenu").children("ul").slideToggle("100");
              $(this).find(".right").toggleClass("fa-angle-up fa-angle-down");
           });

        </script>
    <script type="text/javascript">
    
        // mobile sub menu 
           $('.mobile_submenu ul').hide();
           $(".mobile_submenu a").click(function () {
              $(this).parent(".mobile_submenu").children("ul").slideToggle("100");
              $(this).find(".right").toggleClass("fa-angle-up fa-angle-down");
           });

           // $('.mobile_submenu_inner ul').hide();
           // $(".mobile_submenu_inner a").click(function () {
           //    $(this).parent(".mobile_submenu_inner").children("ul").slideToggle();
           //    $(this).find(".right-arrow").toggleClass("fa-angle-up fa-angle-down");
           // });
    </script>
    <script>
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
})
</script>



@endsection

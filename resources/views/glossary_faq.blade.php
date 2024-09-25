@extends('layout.header_footer')

@section('content')

    @foreach($glossary_faq_banner as $gfb)
    <div class="inner-banner" style="background-image: url('/uploads/{{$gfb->image}}');">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-banner-title">
                        <h2>{{$gfb->page_title}}</h2>
                    </div>
                    <div class="breadcrumb">
                        <a href="{{url('/')}}" class="me-2 home">Home</a>
                        <i class="fa-solid fa-angles-right"></i>
                        <a class="ms-2">{{$gfb->page_title}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach

      <section class="glossery_faq">
        <div class="container position-relative">
            <!--<div class="row">-->
            <!--    <div class="col-lg-12">-->
            <!--        <div class="section-heading">-->
            <!--            <h2>Glossary</h2>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->
            
            <div class="row justify---center align-items-center">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2>{{$glossary_faq_description->title}}</h2>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="section-heading complications-menopause-description">
                        <p>
                            {{$glossary_faq_description->description}}
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
            <!-- Tab links -->
            <div class="tab">
                @foreach($glossary_title as $key=>$gt)
                
                @if($key+1 == 1)
                <button class="tablinks active" onclick="openCity(event, {{$gt->id}})">{{$gt->title}}</button>
                @else
                <button class="tablinks" onclick="openCity(event, {{$gt->id}})">{{$gt->title}}</button>
                @endif
                
                @endforeach
                
                
                @foreach($glossary_title as $key=>$gltitle)
                
                @if($key+1 == 1)
                <button class="tablinks active" onclick="openCity(event, {{$gltitle->id}})">{{$gltitle->title}}</button>
                @else
                <button class="tablinks" onclick="openCity(event, {{$gltitle->id}})">{{$gltitle->title}}</button>
                @endif
                
                @endforeach
            </div>

            <!-- Tab content -->
            
            @foreach($glossary_title as $key=>$gt)
            @if($key+1 == 1)
            
            <div id="gen{{$gt->id}}" class="faq_tab tabcontent active">
                <div class="glossary_container">
                    <h2>{{$gt->title}}</h2>
                    <ul class="glossary-list">
                        @foreach($glossary_faq as $gf)
                        @if($gf->title_id == $gt->id)
                        <li class="glossary-item">
                          <span class="glossary-left">{{$gf->question}}:</span>
                          <span class="glossary-content">{{$gf->answer}}</span>                  
                        </li>
                        @endif
                        @endforeach
                    </ul>
                </div>
            </div>
            
            @else
            
            <div id="gen{{$gt->id}}" class="faq_tab tabcontent">
                <div class="glossary_container">
                    <h2>{{$gt->title}}</h2>
                    <ul class="glossary-list">
                        @foreach($glossary_faq as $gf)
                        @if($gf->title_id == $gt->id)
                        <li class="glossary-item">
                          <span class="glossary-left">{{$gf->question}}:</span>
                          <span class="glossary-content">{{$gf->answer}}</span>                  
                        </li>
                        @endif
                        @endforeach
                      <!--<li class="glossary-item">-->
                      <!--    <span class="glossary-left">Infertility:</span>-->
                      <!--    <span class="glossary-content">The inability to conceive after one year of regular unprotected intercourse (or 6 months if the woman is 35 or older).</span>                  -->
                      <!--</li>-->
                      <!--<li class="glossary-item">-->
                      <!--  <span class="glossary-left">Menstruation:</span>-->
                      <!--  <span class="glossary-content">The monthly shedding of the uterine lining (period).</span>                  -->
                      <!--</li>-->
                      <!--<li class="glossary-item">-->
                      <!--    <span class="glossary-left">Reproductive System:</span>-->
                      <!--    <span class="glossary-content">The organs involved in sexual function and reproduction (ovaries, fallopian tubes, uterus, cervix, vagina).</span>                  -->
                      <!--</li>-->
                      <!--<li class="glossary-item">-->
                      <!--  <span class="glossary-left">Fertility Specialist:</span>-->
                      <!--  <span class="glossary-content">A doctor who specializes in the diagnosis and treatment of infertility problems.</span>                  -->
                      <!--</li>-->
                    </ul>
                </div>
            </div>
            
            @endif
                
            @endforeach
            <!--<div id="Menopause1" class="tabcontent">-->
            <!--    <div class="glossary_container">-->
            <!--        <h2>Menopause</h2>-->
            <!--        <ul class="glossary-list">-->
            <!--          <li class="glossary-item">-->
            <!--              <span class="glossary-left">Fertility:</span>-->
            <!--              <span class="glossary-content">The biological ability to conceive and carry a pregnancy to term.</span>                  -->
            <!--          </li>-->
            <!--          <li class="glossary-item">-->
            <!--              <span class="glossary-left">Infertility:</span>-->
            <!--              <span class="glossary-content">The inability to conceive after one year of regular unprotected intercourse (or 6 months if the woman is 35 or older).</span>                  -->
            <!--          </li>-->
            <!--          <li class="glossary-item">-->
            <!--            <span class="glossary-left">Menstruation:</span>-->
            <!--            <span class="glossary-content">The monthly shedding of the uterine lining (period).</span>                  -->
            <!--          </li>-->
            <!--          <li class="glossary-item">-->
            <!--              <span class="glossary-left">Reproductive System:</span>-->
            <!--              <span class="glossary-content">The organs involved in sexual function and reproduction (ovaries, fallopian tubes, uterus, cervix, vagina).</span>                  -->
            <!--          </li>-->
            <!--          <li class="glossary-item">-->
            <!--            <span class="glossary-left">Fertility Specialist:</span>-->
            <!--            <span class="glossary-content">A doctor who specializes in the diagnosis and treatment of infertility problems.</span>                  -->
            <!--          </li>-->
            <!--        </ul>-->
            <!--    </div>-->
            <!--</div>-->

            <!--<div id="Menopause2" class="tabcontent">-->
            <!--    <div class="glossary_container">-->
            <!--        <h2>Menopause2</h2>-->
            <!--        <ul class="glossary-list">-->
            <!--          <li class="glossary-item">-->
            <!--              <span class="glossary-left">Fertility:</span>-->
            <!--              <span class="glossary-content">The biological ability to conceive and carry a pregnancy to term.</span>                  -->
            <!--          </li>-->
            <!--          <li class="glossary-item">-->
            <!--              <span class="glossary-left">Infertility:</span>-->
            <!--              <span class="glossary-content">The inability to conceive after one year of regular unprotected intercourse (or 6 months if the woman is 35 or older).</span>                  -->
            <!--          </li>-->
            <!--          <li class="glossary-item">-->
            <!--            <span class="glossary-left">Menstruation:</span>-->
            <!--            <span class="glossary-content">The monthly shedding of the uterine lining (period).</span>                  -->
            <!--          </li>-->
            <!--          <li class="glossary-item">-->
            <!--              <span class="glossary-left">Reproductive System:</span>-->
            <!--              <span class="glossary-content">The organs involved in sexual function and reproduction (ovaries, fallopian tubes, uterus, cervix, vagina).</span>                  -->
            <!--          </li>-->
            <!--          <li class="glossary-item">-->
            <!--            <span class="glossary-left">Fertility Specialist:</span>-->
            <!--            <span class="glossary-content">A doctor who specializes in the diagnosis and treatment of infertility problems.</span>                  -->
            <!--          </li>-->
            <!--        </ul>-->
            <!--    </div>-->
            <!--</div>-->
            <!--<div id="Menopause3" class="tabcontent">-->
            <!--    <div class="glossary_container">-->
            <!--        <h2>Menopause</h2>-->
            <!--        <ul class="glossary-list">-->
            <!--          <li class="glossary-item">-->
            <!--              <span class="glossary-left">Fertility:</span>-->
            <!--              <span class="glossary-content">The biological ability to conceive and carry a pregnancy to term.</span>                  -->
            <!--          </li>-->
            <!--          <li class="glossary-item">-->
            <!--              <span class="glossary-left">Infertility:</span>-->
            <!--              <span class="glossary-content">The inability to conceive after one year of regular unprotected intercourse (or 6 months if the woman is 35 or older).</span>                  -->
            <!--          </li>-->
            <!--          <li class="glossary-item">-->
            <!--            <span class="glossary-left">Menstruation:</span>-->
            <!--            <span class="glossary-content">The monthly shedding of the uterine lining (period).</span>                  -->
            <!--          </li>-->
            <!--          <li class="glossary-item">-->
            <!--              <span class="glossary-left">Reproductive System:</span>-->
            <!--              <span class="glossary-content">The organs involved in sexual function and reproduction (ovaries, fallopian tubes, uterus, cervix, vagina).</span>                  -->
            <!--          </li>-->
            <!--          <li class="glossary-item">-->
            <!--            <span class="glossary-left">Fertility Specialist:</span>-->
            <!--            <span class="glossary-content">A doctor who specializes in the diagnosis and treatment of infertility problems.</span>                  -->
            <!--          </li>-->
            <!--        </ul>-->
            <!--    </div>-->
            <!--</div>-->

            <!--<div id="Menopause4" class="tabcontent">-->
            <!--    <div class="glossary_container">-->
            <!--        <h2>Menopause1</h2>-->
            <!--        <ul class="glossary-list">-->
            <!--          <li class="glossary-item">-->
            <!--              <span class="glossary-left">Fertility:</span>-->
            <!--              <span class="glossary-content">The biological ability to conceive and carry a pregnancy to term.</span>                  -->
            <!--          </li>-->
            <!--          <li class="glossary-item">-->
            <!--              <span class="glossary-left">Infertility:</span>-->
            <!--              <span class="glossary-content">The inability to conceive after one year of regular unprotected intercourse (or 6 months if the woman is 35 or older).</span>                  -->
            <!--          </li>-->
            <!--          <li class="glossary-item">-->
            <!--            <span class="glossary-left">Menstruation:</span>-->
            <!--            <span class="glossary-content">The monthly shedding of the uterine lining (period).</span>                  -->
            <!--          </li>-->
            <!--          <li class="glossary-item">-->
            <!--              <span class="glossary-left">Reproductive System:</span>-->
            <!--              <span class="glossary-content">The organs involved in sexual function and reproduction (ovaries, fallopian tubes, uterus, cervix, vagina).</span>                  -->
            <!--          </li>-->
            <!--          <li class="glossary-item">-->
            <!--            <span class="glossary-left">Fertility Specialist:</span>-->
            <!--            <span class="glossary-content">A doctor who specializes in the diagnosis and treatment of infertility problems.</span>                  -->
            <!--          </li>-->
            <!--        </ul>-->
            <!--    </div>-->
            <!--</div>-->

            <!--<div id="Menopause5" class="tabcontent">-->
            <!--    <div class="glossary_container">-->
            <!--        <h2>Menopause2</h2>-->
            <!--        <ul class="glossary-list">-->
            <!--          <li class="glossary-item">-->
            <!--              <span class="glossary-left">Fertility:</span>-->
            <!--              <span class="glossary-content">The biological ability to conceive and carry a pregnancy to term.</span>                  -->
            <!--          </li>-->
            <!--          <li class="glossary-item">-->
            <!--              <span class="glossary-left">Infertility:</span>-->
            <!--              <span class="glossary-content">The inability to conceive after one year of regular unprotected intercourse (or 6 months if the woman is 35 or older).</span>                  -->
            <!--          </li>-->
            <!--          <li class="glossary-item">-->
            <!--            <span class="glossary-left">Menstruation:</span>-->
            <!--            <span class="glossary-content">The monthly shedding of the uterine lining (period).</span>                  -->
            <!--          </li>-->
            <!--          <li class="glossary-item">-->
            <!--              <span class="glossary-left">Reproductive System:</span>-->
            <!--              <span class="glossary-content">The organs involved in sexual function and reproduction (ovaries, fallopian tubes, uterus, cervix, vagina).</span>                  -->
            <!--          </li>-->
            <!--          <li class="glossary-item">-->
            <!--            <span class="glossary-left">Fertility Specialist:</span>-->
            <!--            <span class="glossary-content">A doctor who specializes in the diagnosis and treatment of infertility problems.</span>                  -->
            <!--          </li>-->
            <!--        </ul>-->
            <!--    </div>-->
            <!--</div>-->
            <!--<div id="Menopause6" class="tabcontent">-->
            <!--    <div class="glossary_container">-->
            <!--        <h2>Menopause</h2>-->
            <!--        <ul class="glossary-list">-->
            <!--          <li class="glossary-item">-->
            <!--              <span class="glossary-left">Fertility:</span>-->
            <!--              <span class="glossary-content">The biological ability to conceive and carry a pregnancy to term.</span>                  -->
            <!--          </li>-->
            <!--          <li class="glossary-item">-->
            <!--              <span class="glossary-left">Infertility:</span>-->
            <!--              <span class="glossary-content">The inability to conceive after one year of regular unprotected intercourse (or 6 months if the woman is 35 or older).</span>                  -->
            <!--          </li>-->
            <!--          <li class="glossary-item">-->
            <!--            <span class="glossary-left">Menstruation:</span>-->
            <!--            <span class="glossary-content">The monthly shedding of the uterine lining (period).</span>                  -->
            <!--          </li>-->
            <!--          <li class="glossary-item">-->
            <!--              <span class="glossary-left">Reproductive System:</span>-->
            <!--              <span class="glossary-content">The organs involved in sexual function and reproduction (ovaries, fallopian tubes, uterus, cervix, vagina).</span>                  -->
            <!--          </li>-->
            <!--          <li class="glossary-item">-->
            <!--            <span class="glossary-left">Fertility Specialist:</span>-->
            <!--            <span class="glossary-content">A doctor who specializes in the diagnosis and treatment of infertility problems.</span>                  -->
            <!--          </li>-->
            <!--        </ul>-->
            <!--    </div>-->
            <!--</div>-->
        </div>
    </section>

    <div class="faq-main-section ">
        <div class="container">
            <div class="section-heading">
                <h2>{{$glossary_faq_description->faq_title}}</h2>
            </div>
            
            <div class="tabcontent">
              <div class="faq_container">
                  <div id="accordion">
                      @foreach($glossary as $key=>$g)
                      <div class="card">
                        <div class="card-header">
                          <a class="btn" data-bs-toggle="collapse" href="#collapseOne{{$g->id}}">
                            {{$g->question}}
                          </a>
                        </div>
                        @if($key+1 == 1)
                        <div id="collapseOne{{$g->id}}" class="collapse show" data-bs-parent="#accordion">
                        @else
                        <div id="collapseOne{{$g->id}}" class="collapse" data-bs-parent="#accordion">
                        @endif
                          <div class="card-body">
                            {{$g->answer}}
                          </div>
                        </div>
                      </div>
                      @endforeach
                      <!--<div class="card">-->
                      <!--  <div class="card-header">-->
                      <!--    <a class="collapsed btn" data-bs-toggle="collapse" href="#collapseTwo">-->
                      <!--    Collapsible Group Item #2-->
                      <!--  </a>-->
                      <!--  </div>-->
                      <!--  <div id="collapseTwo" class="collapse" data-bs-parent="#accordion">-->
                      <!--    <div class="card-body">-->
                      <!--      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.-->
                      <!--    </div>-->
                      <!--  </div>-->
                      <!--</div>-->
                      <!--<div class="card">-->
                      <!--  <div class="card-header">-->
                      <!--    <a class="collapsed btn" data-bs-toggle="collapse" href="#collapseThree">-->
                      <!--      Collapsible Group Item #3-->
                      <!--    </a>-->
                      <!--  </div>-->
                      <!--  <div id="collapseThree" class="collapse" data-bs-parent="#accordion">-->
                      <!--    <div class="card-body">-->
                      <!--      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.-->
                      <!--    </div>-->
                      <!--  </div>-->
                      <!--</div>-->
                  </div>
              </div>
          </div>
        </div>
    </div>

    @foreach($cta_description as $cd)
    <section class="cta_details" style="background-image:url(/uploads/{{$cd->image}});">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
    <script src="js/script.js"></script>
    <script type="text/javascript">
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
          tabcontent = document.getElementsByClassName("faq_tab tabcontent");
          for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
          }
          tablinks = document.getElementsByClassName("tablinks");
          for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
          }
          document.getElementById("gen"+cityName).style.display = "block";
          evt.currentTarget.className += " active";
        }
        

        $('.glossery_faq .tab').slick({
            infinite: true,
            slidesToShow: 5,
            slidesToScroll: 1,
            arrows: true,
            dots: false,
              responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 3,
                    }
                },
                {
                    breakpoint: 576,
                    settings: {
                        slidesToShow: 2,
                        arrows:false,
                    }
                },
            ]
        });
        
        // mobile sub menu 
           $('.mobile_submenu ul').hide();
           $(".mobile_submenu a").click(function () {
              $(this).parent(".mobile_submenu").children("ul").slideToggle("100");
              $(this).find(".right").toggleClass("fa-angle-up fa-angle-down");
           });
        
    </script>


@endsection
@extends('layout.header_footer')

@section('content')
    <link rel="stylesheet" type="text/css" href="/css/menopause.css">
    
       <style>
        /*----- Symptoms Details Responsive CSS -----*/
        @media only screen and (min-width:1300px) and (max-width:1440px){
                .physical_symptoms-details {
                    display: grid;
                    grid-template-columns: repeat(3, 1fr);
                    gap: 15px;
                }
                .physical_symptoms-detail img {
                    width: 50px;
                    height: 50px;
                }

                .section-heading h2 {
                    font-size: 36px;
                }

                .bones-grid {
                    gap: 15px;
                }

                .complications-menopause {
                    padding: 60px 0 20px;
                }
                #symptoms_tab ul {
                    gap: 15px;
                    margin-bottom: 15px !important;
                }
                #symptoms_tab ul .nav-link {
                    padding: 20px 20px;
                    font-size: 18px;
                }
                .physical_symptoms-details {
                    gap: 20px;
                }
            }
            @media only screen and (min-width:1200px) and (max-width:1300px){
                .physical_symptoms-details {
                    grid-template-columns: repeat(3, 1fr);
                    gap: 15px;
                }
                .physical_symptoms-detail {
                    padding: 20px 20px;
                }
                .physical_symptoms-detail img {
                    width: 50px;
                    height: 50px;
                }
                .physical_symptoms-img {
                    margin-right: 15px;
                }
                .bones-grid {
                    gap: 15px;
                }
                .complications-menopause {
                    padding: 60px 0 10px;
                }
                #symptoms_tab ul {
                    gap: 15px;
                    margin-bottom: 15px !important;
                }
                #symptoms_tab ul .nav-link {
                    padding: 20px 20px;
                    font-size: 18px;
                }
                .symptoms-menopause {
                    padding: 60px 0 40px;
                }
            }
            @media only screen and (min-width:992px) and (max-width:1199px){
                .physical_symptoms-details {
                    grid-template-columns: repeat(3, 1fr);
                    gap: 15px;
                }
                .physical_symptoms-detail {
                    padding: 20px 20px;
                }
                .physical_symptoms-detail img {
                    width: 50px;
                    height: 50px;
                }
                .physical_symptoms-img {
                    margin-right: 15px;
                }
                .bones-grid {
                    gap: 15px;
                }
                .complications-menopause {
                    padding: 60px 0 10px;
                }
                #symptoms_tab ul {
                    gap: 10px;
                    margin-bottom: 15px !important;
                    flex-wrap: nowrap;
                }
                #symptoms_tab ul .nav-link {
                    padding: 15px 15px;
                    font-size: 14px;
                }
                .menopause-heart .chooseus-details {
                    padding: 24px 20px 24px;
                    margin-bottom: 0px;
                }
                .row.menopause-heart-box>div {
                    padding: 0 5px;
                }
            }
            @media only screen and (min-width:768px) and (max-width:991px){
                .psychosocial_symptoms_details{
                    grid-template-columns: repeat(2, 1fr);
                    gap: 20px;
                }
                .physical_symptoms-details {
                    grid-template-columns: repeat(2, 1fr);
                    gap: 20px;
                }
                .bones-grid {
                    grid-template-columns: repeat(3, 1fr);
                    gap: 10px;
                }
                .menopause-heart-img {
                    width: 80%;
                    margin: 40px auto 10px;
                }
                .complications-menopause {
                    padding: 60px 0 0px;
                }
                #symptoms_tab ul {
                    gap: 10px;
                    margin-bottom: 15px !important;
                    flex-wrap: nowrap;
                }
                #symptoms_tab ul .nav-link {
                    padding: 15px 15px;
                    font-size: 14px;
                }
                .physical_symptoms-detail {
                    padding: 20px 15px;
                }
                .physical_symptoms-img {
                    padding: 8px;
                    margin-right: 15px;
                }
                .physical_symptoms-detail img {
                    width: 45px;
                    height: 45px;
                    padding: 3px;
                }
                .symptoms-menopause {
                    padding: 60px 0 30px;
                }
                .menopause-heart .chooseus-details {
                    padding: 24px 20px 24px;
                    margin-bottom: 0px;
                }
                .row.menopause-heart-box>div {
                    padding: 0 5px;
                }
            }
            @media only screen and (max-width:767px){
                .psychosocial_symptoms_details {
                    grid-template-columns: repeat(1, 1fr);
                    gap: 25px;
                    box-shadow: none;
                }
                .physical_symptoms-details {
                    grid-template-columns: repeat(1, 1fr);
                }
                .bones-grid {
                    grid-template-columns: repeat(2, 1fr);
                    gap: 15px;
                }
                .symptoms-menopause {
                    padding: 50px 0;
                }
                .menopause-heart-img {
                    height: 450px;
                    width: 90%;
                    margin: 20px auto 0;
                }
                .menopause-heart-img:before {
                    top: -15px;
                    right: -15px;
                }
                .menopause-heart-img:after {
                    bottom: -15px;
                    left: -15px;
                }
                #symptoms_tab ul {
                    gap: 15px;
                    flex-wrap: nowrap;
                    justify-content: start;
                    overflow-X: auto;
                    margin: 0 !important;
                }
                #symptoms_tab ul .nav-link {
                    padding: 15px 15px;
                    font-size: 14px;
                }
                .complications-menopause {
                    padding: 60px 0 0px;
                    background: #ffeeef;
                }
                
            }
            @media only screen and (max-width:575px){
                .urinary_content-img{
                    height: 400px;
                    width: 100%;
                }
                .physical_symptoms-details {
                    grid-template-columns: repeat(1, 1fr);
                }
                .bones-grid {
                    grid-template-columns: repeat(1, 1fr);
                    gap: 10px;
                }
                .menopause-heart-img {
                    height: 370px;
                    width: 90%;
                    margin: 40px auto 0;
                }
                .menopause-heart-img:before {
                    top: -15px;
                    right: -15px;
                }
                .menopause-heart-img:after {
                    bottom: -15px;
                    left: -15px;
                }
                .complications-menopause {
                    padding: 50px 0 10px;
                    background: #ffeeef;
                }
                .menopause-heart .chooseus-details {
                    margin-bottom: 5px !important;
                    margin-top: 5px;
                }
                .physical_symptoms-detail {
                    padding: 15px 15px;

                }
                .physical_symptoms-detail img {
                    width: 50px;
                    height: 50px;
                }
                .physical_symptoms-img {
                    margin-right: 15px;
                }
                .physical_symptoms-details {
                    gap: 20px;
                }
                #symptoms_tab ul {
                    gap: 15px;
                    flex-wrap: nowrap;
                    justify-content: start;
                    overflow-X: auto;
                    margin: 0 !important;
                    column-count: 1;
                }
                #symptoms_tab ul .nav-link {
                    padding: 15px 15px;
                    font-size: 14px;
                }
                .complications-menopause .section-heading {
                    margin-bottom: 10px;
                }
                .complications-menopause .row:first-child {
                    padding-bottom: 10px;

                }
            }
    </style>
    
</head>

    @foreach($symptoms_details_banner as $sdb)
   <div class="inner-banner" style="background-image: url('/uploads/{{$sdb->image}}');">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-banner-title">
                        <h2>{{$sdb->page_title}}</h2>
                    </div>
                    <div class="breadcrumb">
                        <a href="#" class="me-2 home">Home</a>
                        <i class="fa-solid fa-angles-right"></i>
                        <a class="ms-2">{{$sdb->page_title}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach






    <section class="symptoms-menopause">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    @foreach($symptoms_heading as $sh)
                    <div class="section-heading">
                        <h5>{{$sh->title1}}</h5>
                        <h2>{{$sh->title2}}</h2>
                        <p>{{$sh->description1}}</p>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div id="symptoms_tab">
                        <ul class="nav nav-pills" role="tablist">
                            <li class="nav-item">
                              <a class="nav-link active" data-bs-toggle="pill" href="#physical_symptoms">
                                <!-- <img src="image/vision.png"> -->
                                @foreach($symptoms_type as $st)
                                @if($st->name=='Physical Symptoms')
                                <span>{{$st->main_name}}</span>
                                @endif
                                @endforeach
                              </a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" data-bs-toggle="pill" href="#urinary_symptoms">
                                <!-- <img src="image/targeting.png"> -->
                                <!-- <img src="image/vision.png"> -->
                                @foreach($symptoms_type as $st)
                                @if($st->name=='Vaginal/Sexual/Urinary Symptoms')
                                <span>{{$st->main_name}}</span>
                                @endif
                                @endforeach
                              </a>
                            </li>
                            
                             <li class="nav-item">
                              <a class="nav-link" data-bs-toggle="pill" href="#psychosocial_symptoms">
                                <!-- <img src="image/targeting.png"> -->
                                 <!-- <img src="image/vision.png"> -->
                                @foreach($symptoms_type as $st)
                                @if($st->name=='Psychosocial symptoms')
                                <span>{{$st->main_name}}</span>
                                @endif
                                @endforeach
                              </a>
                            </li>
                          </ul>

                          <!-- Tab panes -->
                          <div class="tab-content">
                            <div id="physical_symptoms" class="container tab-pane active"><br>
                                <!-- <h3>Physical Symptoms</h3> -->
                                <div class="physical_symptoms-details">
                                    @foreach($physical_symptoms as $ps)
                                    <div class="physical_symptoms-detail">
                                        <div class="physical_symptoms-title">
                                            <div class="physical_symptoms-img">
                                                <img src="/uploads/{{$ps->image}}" alt="">
                                            </div>
                                            <h4>{{$ps->title}}</h4>
                                        </div>
                                        <div class="physical_symptoms-description">
                                            <p>{{$ps->description}}</p>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div id="urinary_symptoms" class="container tab-pane fade"><br>
                                <!-- <h3>Vaginal/Sexual/Urinary Symptoms</h3> -->
                                <div class="urinary_symptoms_stages">
                                    @foreach($vaginal_about as $va)
                                    <div class="row justify-content-center align-items-center">
                                        <div class="col-lg-6">
                                            {!!$va->description!!}
                                        </div>
                                        <div class="col-lg-5">
                                            <div class="urinary_content-img">
                                                <img src="/uploads/{{$va->image}}">
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    <div class="row main-list">
                                        @foreach($vaginal_stages as $vs)
                                        <div class="col-lg-3">
                                            <div class="urinary_symptoms_stages-list">
                                                <h5>{{$vs->title}}</h5>
                                                <p>{{$vs->description}}</p>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="urinary_symptoms_details">
                                    <div class="urinary_symptoms_detail">
                                        <div class="physical_symptoms-details">
                                            @foreach($vaginal_symptoms as $vs)
                                            <div class="physical_symptoms-detail">
                                                <div class="physical_symptoms-title">
                                                    <div class="physical_symptoms-img">
                                                        <img src="/uploads/{{$vs->image}}" alt="">
                                                    </div>
                                                    <h4>{{$vs->title}}</h4>
                                                </div>
                                                <div class="physical_symptoms-description">
                                                    <p>{{$vs->description}}</p>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="psychosocial_symptoms" class="container tab-pane fade"><br>
                                <!-- <h3>Psychosocial symptoms</h3> -->
                                <div class="row justify-content-center">
                                    <div class="col-lg-10">
                                        @foreach($psychosocial_about as $pa)
                                        <div class="section-heading">
                                            <h2>{{$pa->title}}</h2>
                                            <p>{{$pa->description}}</p>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="psychosocial_symptoms_details">
                                        @foreach($psychosocial_symptoms as $ps)
                                        <div class="physical_symptoms-detail">
                                            <div class="physical_symptoms-title">
                                                <div class="physical_symptoms-img">
                                                    <img src="/uploads/{{$ps->image}}" alt="">
                                                </div>
                                                <h4>{{$ps->title}}</h4>
                                            </div>
                                            <div class="physical_symptoms-description">
                                                <p>{{$ps->description}}</p>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="row mood_symptoms">
                                    @foreach($psychosocial_mood as $pm)
                                    <div class="section-heading">
                                        <h2>{{$pm->title}}</h2>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="col-lg-12">
                                            <div class="section-heading">
                                                <p>{{$pm->description}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    <div class="col-lg-6 mood_symptoms_list">
                                        <ul>
                                            @foreach($psychosocial_mood_list as $pml)
                                            <li><i class="fa-solid fa-angles-right"></i>{{$pml->list}}</li>
                                            @endforeach
                                            <!--<li><i class="fa-solid fa-angles-right"></i>Difficulty concentrating</li>-->
                                            <!--<li><i class="fa-solid fa-angles-right"></i>Feeling not yourself</li>-->
                                            <!--<li><i class="fa-solid fa-angles-right"></i>Impatience</li>-->
                                            <!--<li><i class="fa-solid fa-angles-right"></i>Irritability</li>-->
                                            <!--<li><i class="fa-solid fa-angles-right"></i>Low motivation or energy</li>-->
                                            <!--<li><i class="fa-solid fa-angles-right"></i>Mood swings</li>-->
                                            <!--<li><i class="fa-solid fa-angles-right"></i>Tearfulness</li>-->
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5 essential">
                 @foreach($symptoms_heading as $sh)
                <p>{{$sh->description2}}</p>
                @endforeach
            </div>
            <div class="expert-button">
                <button class="button">
                    <a href="{{url('/find-expert')}}">Find an Expert</a>
                </button>
            </div>
        </div>
    </section>






    <section class="complications-menopause">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-6">
                    <div class="section-heading">
                        <h5>Navigating Menopause's Lasting Effects</h5>
                        <h2>Long-Term Health Complications <br>due to Menopause</h2>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="section-heading complications-menopause-description">
                        <p>After menopause, decreased estrogen levels can affect the heart, bones, brain, and urinary/sexual/vaginal health (known as Genitourinary Syndrome of Menopause). While some symptoms may improve with time, it is important to be aware of and manage health risks postmenopause. Understanding the personal risks of the woman, making lifestyle changes to improve health, and seeking treatment for any symptoms or conditions are essential steps to take.</p>
                    </div>
                </div>
            </div>
            @foreach($heart_effect_description as $hed)
            <div class="row mt-5 menopause-heart">
                <div class="col-lg-6">
                    <div class="section-heading">
                        <h4>{{$hed->title}}</h4>
                        <p>{{$hed->description}}</p>
                    </div>                    
                    <div class="row menopause-heart-box">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                        @foreach($heart_effect as $key=>$he)    
                        @if($key%2==0)
                            <div class="chooseus-details">
                                <!--<div class="chooseus-icon">-->
                                <!--    <img src="image/wcu-icon-1-1 1.svg">-->
                                <!--</div>-->
                                <div class="chooseus-content">
                                    <!--<h5>Empowerment Through Connection</h5>-->
                                    <p> <strong>{{$he->title}} </strong> {{$he->description}}</p>
                                </div>
                            </div>
                        @endif
                        @endforeach
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                       @foreach($heart_effect as $key=>$he)    
                         @if($key%2!=0)
                            <div class="chooseus-details">
                                <!--<div class="chooseus-icon">-->
                                <!--    <img src="image/wcu-icon-1-1 1.svg">-->
                                <!--</div>-->
                                <div class="chooseus-content">
                                    <!--<h5>Empowerment Through Connection</h5>-->
                                    <p> <strong>{{$he->title}}</strong> {{$he->description}}</p>
                                </div>
                            </div>
                        @endif
                        @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="menopause-heart-img">
                        <img src="/uploads/{{$hed->image}}">
                    </div>
                </div>
            </div>
            @endforeach
            <div class="row mt-5 menopause-heart">
                <!-- <div class="col-lg-5">
                    <div class="menopause-Bones-img">
                        <img src="image/home-chooseus.jpg">
                    </div>
                </div> -->
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-10">
                            @foreach($bone_effect_description as $bed)                            
                            <div class="section-heading bones-heading">
                                <h4>{{$bed->title}}</h4>
                                <p>{{$bed->description}}</p>
                            </div>
                            @endforeach
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-12 bones-grid">
                                    @foreach($bone_effect as $be)
                                    <div class="chooseus-details mb-5">
                                        <!-- <div class="chooseus-icon">
                                            <img src="image/wcu-icon-1-1 1.svg">
                                        </div> -->
                                        <div class="chooseus-content">
                                            <!--<h5>Empowerment Through Connection</h5>-->
                                            <p> <strong>{{$be->title}}</strong>{{$be->description}}</p>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
        <script src="js/script.js"></script>

        
@endsection
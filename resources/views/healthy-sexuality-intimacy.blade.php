@extends('layout.header_footer')

@section('content')
    
    @foreach($banner as $b)
    <div class="inner-banner" style="background-image:url(/uploads/{{$b->image}})">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-banner-title">
                        <h2 >{{$b->page_title}}</h2>
                    </div>
                    <div class="breadcrumb">
                        <a href="#" class="me-2 home">Home</a>
                        <i class="fa-solid fa-angles-right"></i>
                        <a class="ms-2">{{$b->page_title}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    
    
    

    <section class="redefining_intimacy position-relative">
        <div class="mrleft_img">
            <img src="/image/mr/mrshape1.png">
        </div>
        <div class="mrleft_img2">
            <img src="/image/mr/mrshape1.png">
        </div>
        <div class="container">
            @foreach($healthy_intimacy_about as $hia)
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-5 animated">
                    <div class="mr_img">
                        <img src="/uploads/{{$hia->image}}">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="section-heading text-left">
                        <h2 id="heading"><span>{{$hia->highlight_title}}</span>{{$hia->title}}</h2>
                        <p><span>{{$hia->highlight_text}}</span>{{$hia->description}}</p>
                        <p>{{$hia->description1}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <section class="contributing_factors">
        <div class="cfbg_img">
            <img src="/image/mr/creative_bg_3.jpg">
        </div>
        <div class="container">
            <div class="row">
                <div class="section-heading" id="Contributingheading">
                    @foreach($healthy_intimacy_factors_description as $hifd)
                    <h2 >{{$hifd->title}}</h2>
                    @endforeach
                </div>
            </div>
            <div class="row">
                <div class="contributing_factors_grid">
                    @foreach($healthy_intimacy_factors as $hif)
                    <div class="contributing_factors_box">
                        <div class="icon">
                            <img src="/uploads/{{$hif->image}}">
                        </div>
                        <div class="description">
                            <p>{!!$hif->description!!}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="hormonal_changes">
     @foreach($healthy_intimacy_hormonal_description as $hihd)
        <div class="container">
          
                <div class="row">
                    <div class="section-heading">
                        <h2>{!!$hihd->title!!}</h2>
                        <p>{{$hihd->description}}</p>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="hormonal_changes_details">
                                @foreach($healthy_intimacy_hormonal as $hih)
                                <div class="hormonal_changes_detail">
                                    <h5>{{$hih->title}}</h5>
                                    <p>{{$hih->description}}</p>
                                </div>
                                @endforeach
                            </div>
                            <!-- <div class="col-lg-6">
                                <div class="hormonal_changes_details">
                                    <div class="hormonal_changes_detail">
                                        <h5>Psychological and Relational Predictors for Sexual Dysfunction in Menopause</h5>
                                        <p>Sexual Dysfunction impacts not only the symptom bearer, but also her partner, on a sexual, emotional, and interpersonal level. A couple-oriented approach is important that addresses the sexual health needs of the ageing couple as a whole, rather than treating the woman alone.</p>
                                    </div>
                                    <div class="hormonal_changes_detail">
                                        <h5>Associated Morbidities: Cardiovascular and Metabolic Diseases</h5>
                                        <p>Vascular insufficiency in female genital tissues can be one of the contributing factors in women caused by cardiometabolic insults. Hormone levels and vascular health work together to maintain the integrity of female genital tissues.</p>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                    <div class="col-lg-4 position-relative">
                        <div class="hormonal_changes_img">
                            <img src="/uploads/{{$hihd->image}}">
                        </div>
                        <!-- <div class="wpo-img-shape">
                            <img src="image/mr/mrshape.png">
                        </div> -->
                    </div>
                </div>
        </div>
    @endforeach
    </section>

    <section class="menohealth">
        <div class="container">
            @foreach($monohealth as $m)
            <div class="row align-items-center">
                <div class="col-lg-6 position-relative uper">
                    <div class="menohealth_img">
                        <img src="/uploads/{{$m->image1}}">
                    </div>
                    <div class="menohealth_shape1">
                        <img src="/uploads/{{$m->image2}}">
                    </div>
                    <!-- <div class="menohealth_shape2">
                        <img src="image/mr/mrshape8.svg">
                    </div> -->
                </div>
                <div class="col-lg-6">
                    <div class="menohealth_description">
                        <p>{{$m->description1}}</p>
                        <p>{{$m->description2}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <div class="treatments-section">
        <div class="container">
            @foreach($negative_changes_heading as $nch)
            <div class="section-heading">
                <h2>{{$nch->title1}}<br> {{$nch->title2}}</h2>
                <p>{{$nch->description}}</p>
            </div>
            @endforeach
            <div class="treatments-tabs menorelation">
                <div class="row">

                    <div class="col-lg-7 menorelation_tabs">
                        <ul class="nav nav-tabs" role="menorelation">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#menorelation1">
                                    @foreach($understand_changes_description as $ucd)
                                    <span>{{$ucd->title}}</span>
                                    @endforeach
                                    <i class="fa-solid fa-circle"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#menorelation2">
                                    @foreach($keeping_alive_description as $kad)
                                    <span>{{$kad->title}}</span>
                                    @endforeach
                                    <i class="fa-solid fa-circle"></i>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content treatments-tabcontent">
                            <div id="menorelation1" class="container tab-pane active">
                                <div class="treatments-inner menorelation_inner">
                                    @foreach($understand_changes as $uc)
                                    <div class="menorelation_box">
                                        <div class="menorelation_icon">
                                            <img src="/uploads/{{$uc->image}}">
                                        </div>
                                        <div class="menorelation_description">
                                            <h3>{{$uc->title}}</h3>
                                            <p>{{$uc->description}}</p>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div id="menorelation2" class="container tab-pane">
                                <div class="treatments-inner menorelation_list">
                                    <ul>
                                    @foreach($keeping_alive as $ka)
                                        <li>
                                            <i class="fa-solid fa-angles-right"></i>
                                            <span>{{$ka->title}}:</span> {{$ka->description}}
                                        </li>
                                    @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 position-relative">
                        <div class="menorelation_img">
                        @foreach($understand_changes_description as $ucd)
                            <img src="/uploads/{{$ucd->image}}">
                            @endforeach
                        </div>
                        <div class="menorelation_shape1">
                            @foreach($keeping_alive_description as $kad)
                            <img src="/image/mreshape2.png">
                            @endforeach
                        </div>
                        <!-- <div class="menorelation_shape2">
                            <img src="image/mr/mreshape1.png">
                        </div> -->
                    </div>
                </div>
                <div class="menorelation_list_title">
                    <div class="treatments-inner menorelation_list mt-4">
                        <ul>
                            @foreach($negative_changes_heading as $nch)
                            <li>
                                <span>Remember:</span>{{$nch->description}}
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section class="factsabout_menopause">
        <div class="container">
            <div class="section-heading">
                @foreach($interesting_facts_description as $ifd)
                <h2>{{$ifd->title}}</h2>
                @endforeach
            </div>
            <div class="row">
                @foreach($interesting_facts as $if)
                <div class="col-lg-3 mt-lg-0 mt-3">

                    <div class="factsabout_menopause_detail">
                        <h4>{{$if->title}}</h4>
                        <p>{{$if->description}}</p>
                    </div>
                </div>
                @endforeach
                <!-- <div class="col-lg-6">
                    <img src="image/mr/mr-4.png">
                </div> -->
                <!-- <div class="col-lg-4">
                    <div class="factsabout_menopause_detail"></div>
                </div> -->
            </div>
        </div>
    </section>






    <section class="mrhormonal_changes_details">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-9">
                    @foreach($menopause_relationship_description as $mrd)
                    <div class="section-heading">
                        <h2><span>{{$mrd->title1}}</span><br>{{$mrd->title2}}</h2>
                        <p>{{$mrd->description}}</p>
                        <!-- <ul>
                            <li>
                                <i class="fa-solid fa-angles-right"></i>
                                <span>Understanding the Impact of Menopause</span>
                            </li>
                            <li>
                                <i class="fa-solid fa-angles-right"></i>Communication is Key
                            </li>
                            <li>
                                <i class="fa-solid fa-angles-right"></i>Maintaining Intimacy
                            </li>
                            <li>
                                <i class="fa-solid fa-angles-right"></i>Supporting Your Partner
                            </li>
                            <li>
                                <i class="fa-solid fa-angles-right"></i>Seeking Professional Help
                            </li>
                            <li>
                                <i class="fa-solid fa-angles-right"></i>Remember
                            </li>
                        </ul> -->
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="row ">
                 @foreach($menopause_relationship as $key=>$mr)
                 @if($key%2==0)
                <div class="col-lg-4 mt-lg-0 mt-md-5 mt-4">
                    <div class="mrhormonal_detail">
                        <!-- <div class="time-place-item-shape">
                                <img src="image/mr/06.png" alt="">
                            </div> -->
                        <div class="mrhormonal_detail_title">
                            <h4>{{$mr->title}}</h4>
                        </div>
                        <div class="mrhormonal_detail_description">
                            <ul>
                                @foreach($menopause_relationship_list as $key=>$mrl)
                                @if($mrl->list_id==$mr->id)
                                <li><span>{{$mrl->list_title}} </span>{{$mrl->list}}</li>
                                @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>

            <div class="row mt-lg-5   ">
                 @foreach($menopause_relationship as $key=>$mr)
                 @if($key%2!=0)
                <div class="col-lg-4 mt-lg-0 mt-md-5 mt-4">
                   
                        <div class="mrhormonal_detail">
                            <!-- <div class="time-place-item-shape">
                                <img src="image/mr/06.png" alt="">
                            </div> -->
                            <div class="mrhormonal_detail_title">
                                <h4>{{$mr->title}}</h4>
                            </div>
                            <div class="mrhormonal_detail_description">
                                <ul>
                                    @foreach($menopause_relationship_list as $key=>$mrl)
                                    @if($mrl->list_id==$mr->id)
                                    <li><span>{{$mrl->list_title}} </span>{{$mrl->list}}</li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                  
                </div>
                @endif
                @endforeach
            </div>
             <div class="row">
                <div class="menorelation_list_title">
                    <div class="treatments-inner menorelation_list mt-4">
                        <ul>
                        @foreach($menopause_relationship_description as $mrd)
                            <li>
                                {{$mrd->highlight_description}}
                            </li>
                            @endforeach
                        </ul>
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

    
@endsection   
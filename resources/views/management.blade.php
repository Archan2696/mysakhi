@extends('layout.header_footer')

@section('content')

    @foreach($management_banner as $mb)
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

    <div class="management-title">
        <div class="container">
            @foreach($symptoms_management_heading as $smh)
            <div class="section-heading">
                <h5>{{$smh->title1}}</h5>
                <h2>{{$smh->title2}}</h2>
            </div>
            @endforeach
        </div>
    </div>
    @foreach($lifestyle_changes_description as $lcd)
    <div class="lifestyle-changes-main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-md-5">
                    <div class="lifechanges-img">
                        <img src="/uploads/{{$lcd->image}}" alt="">
                    </div>
                </div>
                <div class="col-lg-8 col-md-7">
               
                    <div class="lifechanges-box">
                        <!-- <div class="lifechange-shape">
                            <img src="image/shape-7.webp" alt="">
                        </div> -->
                        <div class="lifechange-title">
                            <h2>{{$lcd->title}}</h2>
                            <p>
                               {{$lcd->description}}
                            </p>
                        </div>
                        <div class="lifechange-tabs">
                            <ul class="nav nav-tabs" role="tablist">
                                @foreach($lifestyle_changes as $key=>$lc)
                                @if($key+1==1)
                                <li class="nav-item">
                                  <a class="nav-link active" data-bs-toggle="tab" href="#lifechange{{$key+1}}">{{$lc->title}}</a>
                                </li>
                                @else
                                <li class="nav-item">
                                  <a class="nav-link" data-bs-toggle="tab" href="#lifechange{{$key+1}}">{{$lc->title}}</a>
                                </li>
                                @endif
                                @endforeach
                            </ul>
                            <div class="tab-content lifechange-tabcontent">
                                 @foreach($lifestyle_changes as $key=>$lc)
                                @if($key+1==1)
                                <div id="lifechange{{$key+1}}" class="container tab-pane active">
                                    <div class="lifechange-inner">
                                        <h3>{{$lc->title}}</h3>
                                        <p>
                                            {!!$lc->description!!}
                                        </p>
                                    </div>
                                  
                                </div>
                                @else
                                <div id="lifechange{{$key+1}}" class="container tab-pane fade">
                                    <div class="lifechange-inner">
                                        <h3>{{$lc->title}}</h3>
                                        {!!$lc->description!!}
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach

    <div class="therapies-section">
        <div class="container">
            @foreach($therapies as $t)
            <div class="section-heading">
                <h2>{{$t->title}}</h2>
            </div>
            @endforeach
            <div class="row">
                <div class="col-lg-6">
                    <div class="therapies-main">
                        @foreach($alternative_therapies_description as $atd)
                        <div class="therapy-title">
                            <h2>{{$atd->title}}</h2>
                            <p>
                                 {{$atd->description}}
                            </p>
                        </div>
                        @endforeach
                        <div class="therapy-list">
                     @foreach($alternative_therapies as $key=>$at)
                            <div class="therapy-item">
                                <a href="#" data-bs-toggle="collapse" data-bs-target="#therapy{{$key+1}}">
                                  <span>
                                   {{$at->title}}
                                  </span>  
                                  <div class="therapy-arrow">
                                    <i class="fa-solid fa-angle-down"></i>
                                    </div>
                                </a>
                                <div id="therapy{{$key+1}}" class="collapse therapy-collapse">
                                    {!!$at->description!!}
                                </div>
                            </div>
                    @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="complementary-main">
                        @foreach($complementry_therapies as $ct)
                        <div class="complementary-box">
                            <h3> {{$ct->title}}</h3>
                            <p>
                                {{$ct->description}}
                            </p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="managing-section">
        <div class="container">
            @foreach($manage_symptoms_description as $msd)
            <div class="section-heading">
                <h2>{{$msd->title}}</h2>
            </div>
            @endforeach
            <div class="row">
             @foreach($manage_symptoms as $ms)
                <div class="col-lg-6">
                    <div class="managing-box">
                        <div class="managing-icon">
                            <img src="/uploads/{{$ms->image}}" alt="">
                        </div>
                        <div class="managing-content">
                            <h3>{{$ms->title}}</h3>
                                {!!$ms->description!!}
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
            <div class="preium-link">
               <a href="#">
                <i class="fa-solid fa-arrow-right-long"></i>
                <span> For more information, join our premium content services at no cost. (Premium Link) </span>                  
               </a>
            </div>
        </div>
    </div>

    <div class="treatments-section">
        <div class="container">
            @foreach($treatment_heading as $th)
            <div class="section-heading">
                <h2>{{$th->title}}</h2>
            </div>
            @endforeach
            <div class="treatments-tabs">
                <div class="row">
                    <div class="col-lg-4">
                        <ul class="nav nav-tabs" role="tablist">
                            
                            <li class="nav-item">
                              <a class="nav-link active" data-bs-toggle="tab" href="#treatments1">
                                @foreach($hormone_treatment_description as $htd)
                               <span>{{$htd->title}}</span>
                               @endforeach
                                <i class="fa-solid fa-circle"></i></a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" data-bs-toggle="tab" href="#treatments2">
                            @foreach($low_dose_treatment_description as $htd)
                               <span>{{$htd->title}}</span> 
                                @endforeach
                                <i class="fa-solid fa-circle"></i>
                            </a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" data-bs-toggle="tab" href="#treatments3">
                                  @foreach($vaginal_treatment_description as $htd)
                                <span>{{$htd->title}}</span>
                                 @endforeach
                                <i class="fa-solid fa-circle"></i>
                            </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#treatments4">
                                    @foreach($prescription_treatment_description as $htd)
                                    <span>{{$htd->title}}</span>
                                     @endforeach
                                    <i class="fa-solid fa-circle"></i>
                                </a>
                              </li>
                        </ul>
                    </div>
                    <div class="col-lg-8">
                        <div class="tab-content treatments-tabcontent">
                            <div id="treatments1" class="container tab-pane active">
                                @foreach($hormone_treatment_description as $htd)
                                <div class="treatments-inner">
                                    <p>
                                          {{$htd->description1}}
                                    </p>
                                    <div class="treatments-hrt">
                                        <div class="row">
                                            @foreach($hormone_treatment as $ht)
                                            <div class="col-xl-4 col-lg-6 col-md-6">
                                                <div class="treatments-box">
                                                    <div class="treatments-info">
                                                        <div class="treatments-icon">
                                                            <div class="treatments-img">
                                                                <img src="/uploads/{{$ht->image}}" alt="">
                                                            </div>
                                                            <h2><a href="">{{$ht->title}}</a></h2>
                                                        </div>
                                                        <div class="treatments-desc">
                                                           <ul>
                                                               @foreach($hormone_treatment_list as $htl)
                                                               @if($htl->list_id==$ht->id)
                                                                <li>
                                                                   {{$htl->list}}
                                                                </li>
                                                                @endif
                                                                @endforeach
                                                           </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                
                                        </div>
                                    </div>
                                   <div class="treatments-btn">
                                        <p>
                                            {{$htd->description2}}
                                        </p>
                                        <div class="expert-button">
                                            <button class="button">
                                                <a href="{{url('/find-expert')}}">Find an expert</a>
                                            </button>
                                        </div>
                                   </div>
                                </div>
                                @endforeach
                                
                            </div>
                            <div id="treatments2" class="container tab-pane">
                                 @foreach($low_dose_treatment_description as $ldt)
                                <div class="treatments-inner">
                                    <p>
                                          {{$ldt->description}}
                                    </p>
                                </div>
                                @endforeach
                            </div>
                            <div id="treatments3" class="container tab-pane">
                                 @foreach($vaginal_treatment_description as $vtd)
                                <div class="treatments-inner">
                                    <p>
                                        {{$vtd->description1}}
                                    </p>
                                    <p>
                                       {{$vtd->description2}}
                                    </p>
                                     @foreach($vaginal_treatment as $vt)
                                    <div class="treatm-inner-content">
                                        <h2> {{$vt->title}}</h2> 
                                        <p>
                                             {{$vt->description}}
                                        
                                        </p>
                                        
                                        <div class="treatm-benefits">
                                            <h3>Benefits:</h3>
                                            <p>
                                                 {{$vt->benefit_description}}
                                            </p>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                              @endforeach
                            </div>
                            <div id="treatments4" class="container tab-pane">
                                 @foreach($prescription_treatment_description as $ldt)
                                <div class="treatments-inner">
                                    <p>
                                       {{$ldt->description}}
                                   </p>
                                </div>
                              @endforeach
                            </div>

                            <div class="consult-text">
                            @foreach($treatment_heading as $th)
                                <p>
                                    <i class="fa-solid fa-arrow-right-long"></i>
                                    {{$th->description}}
                                </p>
                               @endforeach
                            </div>

                        </div>
                    </div>
                </div>
             
                
            </div>
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

        
@endsection


@extends('layout.header_footer')
@section('content')
<style type="text/css">
   .success-msg-forum {
   background: #c8e1c2;
   padding: 10px;
   display: none;
   }
   .error-text{
   color: red;
   }
   .success-msg-event{
   background: #c8e1c2;
   padding: 10px;
   display: none;
   }
   .success-msg-book{
   background: #c8e1c2;
   padding: 10px;
   display: none;
   }
   .otp_field{
   display: none;
   }
   .login-msg p{
   color: white;
   text-align: center;
   }
</style>
<div class="bg-concerned-section">
   <div class="container">
      <div class="row">
         <div class="col-lg-12">
            @foreach($home_concerned_description as $hcd)
            <div class="concered-title">
               <!--<h2>Are you a woman in one of these age groups concerned about your well-being? </h2>-->
               <span>{{$hcd->title1}} <strong>{{$hcd->title2}}</strong>{{$hcd->title3}}</span>
               <ul class="concered-list counters">
                  @foreach($home_concerned as $hc)
                  <li>
                     <!--<span>Q.</span>-->
                     <span class="counter"  data-target="{{$hc->count}}"  data-start="<?php $cleaned_count = preg_replace('/[^0-9]/', '', $hc->count); echo $cleaned_count - 1000; ?>">{{$hc->count}}</span>  <a href="{{url('/coming_soon')}}"> {{$hc->name}}</a>
                  </li>
                  @endforeach
               </ul>
               <h2>{{$hcd->sub_title1}}<br>{{$hcd->sub_title2}}</h2>
            </div>
            @endforeach
         </div>
      </div>
   </div>
</div>
<div class="bg-mission-section">
   @foreach($home_mission_description as $hmd)
   <div class="container">
      <div class="section-heading">
         <h5>
            {{$hmd->title1}}
         </h5>
         <h2>
            {!!$hmd->title2!!}
         </h2>
      </div>
      <div class="row">
         <div class="col-lg-4 col-md-12 col-sm-12 col-12">
            @foreach($home_mission as $key=>$hm1)
            @if($key % 2==0 )            	
            <div class="mission-info pb-4 mt-4">
               <div class="mission-inner-info">
                  <div class="mission-icon">
                     <img src="/uploads/{{$hm1->image}}" alt="women">
                  </div>
                  <div class="mission-content">
                     <h5>{{$hm1->title}}</h5>
                     <p>{{$hm1->description}}</p>
                  </div>
               </div>
            </div>
            @endif
            @endforeach
         </div>
         <div class="col-lg-4 col-md-12 col-sm-12 col-12 center">
            <div class="mission-image position-relative">
               <div class="mission-first">
                  <img src="/uploads/{{$hmd->image1}}" alt="mission image">
               </div>
            </div>
         </div>
         <div class="col-lg-4 col-md-12 col-sm-12 col-12">
            @foreach($home_mission as $key=>$hm2)
            @if($key % 2!=0 )            	                                    	
            <div class="mission-info pb-4 mt-4">
               <div class="mission-inner-info">
                  <div class="mission-icon">
                     <img src="/uploads/{{$hm2->image}}" alt="women">
                  </div>
                  <div class="mission-content">
                     <h5>{{$hm2->title}}</h5>
                     <p>{{$hm2->description}}</p>
                  </div>
               </div>
            </div>
            @endif
            @endforeach
         </div>
      </div>
   </div>
   @endforeach
</div>
<div class="bg-lifestages">
   <div class="container">
      @foreach($home_stages_description as $hsd)
      <div class="section-heading">
         <h5>{{$hsd->title1}}</h5>
         <h2>
            {!!$hsd->title2!!}
         </h2>
      </div>
      @endforeach
      <div class="row">
         @foreach($home_stages as $hs)
         <div class="col-lg-3 col-md-6 col-sm-6 col-12 last-marg">
            <div class="lifestyle-box">
               <div class="lifestyle-info">
                  <div class="lifestyle-icon">
                     <div class="lifestyle-img">
                        <img src="/uploads/{{$hs->image}}" alt="">
                     </div>
                     <h2><a href="">{{$hs->title}}</a></h2>
                  </div>
                  <div class="lifestyle-desc">
                     <p>{{$hs->description}}</p>
                     @if($hs->link != '') 
                     <a href="{{$hs->link}}">Learn more<i class="fa-solid fa-arrow-right"></i></a>
                     @else
                     <a href="{{url('/coming_soon')}}">Learn more<i class="fa-solid fa-arrow-right"></i></a>
                     @endif
                  </div>
               </div>
            </div>
         </div>
         @endforeach
      </div>
   </div>
</div>
<div class="bg-why-chooseus" id="whysection">
   <div class="container">
      <div class="row align-items-center">
         <div class="col-xl-6 col-lg-7 col-md-12 col-sm-12">
            @foreach($home_choose_us_description as $hcd)
            <div class="section-heading text-left">
               <h5>
                  {{$hcd->title1}}
               </h5>
               <h2>
                  {{$hcd->title2}}
               </h2>
            </div>
            @endforeach
            <div class="row chooseus-item">
               <div class="col-lg-6 col-md-6 col-sm-6">
                  @foreach($home_choose_us as $key=>$hc1)
                  @if($key % 2==0 )
                  <div class="chooseus-details mb-5">
                     <div class="chooseus-icon">
                        <img src="/uploads/{{$hc1->image}}">
                     </div>
                     <div class="chooseus-content">
                        <h5>{{$hc1->title}}</h5>
                        <p>{{$hc1->description}}</p>
                     </div>
                  </div>
                  @endif
                  @endforeach
               </div>
               <div class="col-lg-6 col-md-6 col-sm-6">
                  @foreach($home_choose_us as $key=>$hc2)
                  @if($key % 2 != 0 )                        
                  <div class="chooseus-details mb-5">
                     <div class="chooseus-icon">
                        <img src="/uploads/{{$hc2->image}}">
                     </div>
                     <div class="chooseus-content">
                        <h5>{{$hc2->title}}</h5>
                        <p>{{$hc2->description}}</p>
                     </div>
                  </div>
                  @endif
                  @endforeach                                
               </div>
            </div>
         </div>
         <div class="col-xl-6 col-lg-5 col-md-5 col-sm-12">
            <div class="chooseus_img">
               <img src="image/home-chooseus.jpg" alt="chooseus">
            </div>
         </div>
      </div>
   </div>
</div>
<div class="bg-resources-section">
   <div class="container">
      @foreach($home_resource_description as $hrd)
      <div class="section-heading">
         <h5>
            {{$hrd->title1}}
         </h5>
         <h2>
            {!!$hrd->title2!!}
         </h2>
      </div>
      @endforeach
      <div class="row">
         @foreach($home_resource as $key=>$hr)
         <div class="col-lg-4 col-md-6">
            <div class="resources-box">
               <div class="resources_number">0{{$key+1}}</div>
               <div class="resources-icon">
                  <img src="/uploads/{{$hr->image}}" alt="r1">
               </div>
               <h3 class="resources-title">
                  <a href="#">{{$hr->title}}</a>
               </h3>
               <p class="resources_text">
                  {{$hr->description}}
               </p>
               @if($hr->link !='')
               <a href="{{$hr->link}}" class="read-btn">Read More<i class="fa-solid fa-arrow-right"></i></a>
               @else
               <a href="{{url('/coming_soon')}}" class="read-btn">Read More<i class="fa-solid fa-arrow-right"></i></a>
               @endif
               <div class="bg-shape">
                  <img src="image/resources-box_bg.png" alt="resources-shape">
               </div>
            </div>
         </div>
         @endforeach   
      </div>
   </div>
</div>
<div class="bg-event-section">
   <div class="container">
      @foreach($interactive_sessions_description as $isd)
      <div class="section-heading">
         <h5>
            {{$isd->title1}}
         </h5>
         <h2>
            {!!$isd->title1!!}
         </h2>
      </div>
      @endforeach
      <div class="row">
         @foreach($interactive_sessions as $is)
         <div class="col-lg-4 col-md-6 mb-lg-0 mb-md-4 mb-sm-4">
            <div class="event-box">
               <div class="event-image">
                  <a href=""><img src="/uploads/{{$is->image}}" alt="event-2"></a>
                  <div class="seat">
                     <i class="fa-solid fa-couch"></i><span>500 seat</span>
                  </div>
               </div>
               <div class="event-info">
                  <div class="event-time">
                     <p><i class="fa-regular fa-calendar"></i>
                        {{ \Carbon\Carbon::parse($is->date)->format('d F, Y') }}
                     </p>
                     <span>
                     <i class="fa-regular fa-clock"></i>
                     {{$is->time}}</span>
                  </div>
                  <h3> <a href=""> {{$is->name}} </a></h3>
                    <h5 class="topic">
                        <span>topic</span>:<strong>{{$is->topic}}</strong>
                    </h5>

                  <p class="event-para">{!!$is->description!!}
                  </p>
                  <button class="button" onclick="get_event_fixdata({{$is->id}})">
                  <a href="#" target="_blank" data-bs-toggle="modal" data-bs-target="#event-popup">Register</a>
                  </button>
               </div>
            </div>
         </div>
         @endforeach
      </div>
      <div class="expert-button">
         <button class="button">
         <a href="{{url('/events')}}">view all</a>
         </button>
      </div>
   </div>
</div>
<div class="bg-expert">
   <div class="container">
      @foreach($expert_description as $ed)
      <div class="section-heading">
         <h5>
            {{$ed->title1}}
         </h5>
         <h2>
            {!!$ed->title2!!}
         </h2>
      </div>
      @endforeach
      <div class="row expert-slider">
         @foreach($expert as $e)            
         <div class="col-xl-6 col-lg-12">
            <div class="expert-main">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 361.1 62.7">
                  <path d="M59.2,19.4c91.2-28.9,166.6,27.1,224,33.9c37.7,4.5,67.8-9.4,77.9-53.3H0v62.4C11.5,45.7,30.5,29.4,59.2,19.4z"></path>
               </svg>
               <div class="inner-expert">
                  <div class="expert-photo-main">
                     <div class="expert-image">
                        <a href="#">
                        <img src="/uploads/{{$e->image}}" alt="expert">
                        </a>
                     </div>
                     <div class="expert-icon">
                        <ul>
                           <li>
                              <a href="{{$e->twitter_url}}"><i class="fa-brands fa-twitter"></i></a>
                           </li>
                           <li>
                              <a href="{{$e->facebook_url}}"><i class="fa-brands fa-facebook-f"></i></a>
                           </li>
                           <li>
                              <a href="{{$e->insta_url}}"><i class="fa-brands fa-instagram"></i></a>
                           </li>
                           <li>
                              <a href="{{$e->linkedin_url}}"><i class="fa-brands fa-linkedin"></i></a>
                           </li>
                        </ul>
                     </div>
                  </div>
                  <div class="expert-info">
                     <h4>
                        <a href="#">
                        {{$e->name}}
                        </a>
                     </h4>
                     <!--<span>Neurologist</span>-->
                     <div class="expert-loc">
                        <i class="fa-solid fa-location-dot"></i>
                        <span>{{$e->city}},{{$e->state}}</span>
                     </div>
                     <p>
                        {!!$e->description!!}
                     </p>
                     <div class="expert-book-btn">
                        <button class="button" onclick="get_expert_fixdata({{$e->id}})">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#expert-popup">Connect</a>
                        </button>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         @endforeach
      </div>
      <div class="expert-button">
         <button class="button">
         <a href="{{url('/find-expert')}}">view all</a>
         </button>
      </div>
   </div>
</div>
<div class="testimonials">
   <div class="container">
      <div class="testimonial-bg">
         <div class="row">
            <div class="col-lg-6 col-md-7">
               <div class="section-heading">
                  <!--<h5>-->
                  <!--     Inspiring Stories-->
                  <!--</h5>-->
                  <h2>
                     Inspiring Stories
                  </h2>
               </div>
               <div class="patient-testimonial">
                  <div class="patient-slider">
                     @foreach($testimonial as $t)
                     <div class="patient-slide">
                        <div class="patient-p">
                           <div class="patient-details">
                              <h4>{{$t->name1}}</h4>
                              <!-- <span>Manager</span> -->
                              <ul class="testimonial-rating">
                                 <li><i class="fa-solid fa-star"></i></li>
                                 <li><i class="fa-solid fa-star"></i></li>
                                 <li><i class="fa-solid fa-star"></i></li>
                                 <li><i class="fa-solid fa-star"></i></li>
                                 <li><i class="fa-solid fa-star-half-stroke"></i></li>
                              </ul>
                           </div>
                           <div class="patient-image">
                              <img src="/uploads/{{$t->image}}" alt="">
                           </div>
                        </div>
                        <div class="patient-review">
                           <img class="img1" src="image/quote1.png">
                           <!-- <i class="fa-solid fa-quote-left"></i> -->
                           <p>   {{$t->opinion1}}  </p>
                           <img class="img2" src="image/quote2.png">
                        </div>
                     </div>
                     @endforeach
                  </div>
               </div>
               <button class="button">
               <a href="{{url('/inspiring-stories')}}">view all</a>
               </button>
            </div>
            <div class="col-lg-6 col-md-5 mt-sm-4">
               <div class="img-patient">
                  <img src="image/media-5.jpg">
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="bg-faq-section">
   <div class="container">
      @foreach($home_faq_description as $hfd)
      <div class="section-heading">
         <h5>
            {{$hfd->title1}}
         </h5>
         <h2>
            {{$hfd->title2}}
         </h2>
      </div>
      <div class="row align-items-center">
         <div class="col-lg-6 col-md-12 mb-md-4">
            <div class="faq_img"><img src="/uploads/{{$hfd->image}}" alt="faq"></div>
         </div>
         @endforeach
         <div class="faq col-lg-6 col-md-12 mt-sm-4" id="faq_accordion">
            @foreach($home_faq as $key=>$hf)
            <div class="faq_item">
               <h2 class="faq_header collapsed" id="faq_{{$key+1}}" data-bs-toggle="collapse" data-bs-target="#faq_collapse{{$key+1}}" aria-expanded="false" aria-controls="faq_collapse{{$key+1}}">
                  <p class="faq_heading">
                     {{$hf->question}}
                  </p>
                  <i class="fa-solid fa-angle-down"></i>
               </h2>
               <div id="faq_collapse{{$key+1}}" class="accordion-collapse collapse" aria-labelledby="faq_{{$key+1}}" data-bs-parent="#faq_accordion">
                  <div class="faq_body">{{$hf->answer}}</div>
               </div>
            </div>
            @endforeach
         </div>
      </div>
   </div>
</div>
<div class="bg-expert-forum">
   <div class="container">
      <div class="expert-forum-section">
         @foreach($home_contact_us as $hc)
         <div class="row">
            <div class="col-lg-5 col-md-10 col-sm-12 col-12">
               <div class="forum-bg">
                  <img src="/uploads/{{$hc->image}}" alt="">
               </div>
            </div>
            <div class="col-lg-7 col-md-12 col-sm-12 col-12">
               <div class="forum-content">
                  <h2 class="forum-title">{{$hc->title}}</h2>
                  <p>
                     {{$hc->description}}
                  </p>
                  <div><span class="success-msg-forum">Your Response Submitted Successfully !!</span></div>
                  <div class="main-loading-state">
                    <div class="loading-state">
                        <div class="loading"></div>
                    </div>
                  </div>
                  <form  method="post" id="inquiry_form">
                     {{ csrf_field() }}
                     <div class="row">
                        <div class="col-lg-6 col-md-6">
                           <div class="mysakhi-input">
                              <input type="text" placeholder="Name" name="name" id="name">
                              <span class="error-text name_err"></span>
                           </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                           <div class="mysakhi-input">
                              <input type="text" placeholder="City" name="city" id="city">
                              <span class="error-text city_err"></span>
                           </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                           <div class="mysakhi-input">
                              <input type="text" placeholder="Email Address" name="email" id="email">
                              <span class="error-text email_err"></span>
                           </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                           <div class="mysakhi-input">
                              <input type="number" placeholder="Phone number" name="phone_no" id="phone_no">
                              <span class="error-text phone_no_err"></span>
                           </div>
                        </div>
                        <div class="col-lg-12">
                           <div class="mysakhi-input">
                              <textarea placeholder="Enter your question here...." name="message" id="message"></textarea>
                              <span class="error-text message_err"></span>
                           </div>
                        </div>
                        <div class="col-lg-12">
                           <div class="mysakhi-btn">
                              <button class="button" id="submit1">
                              <a href="#">send message</a>
                              </button>
                           </div>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
         @endforeach
      </div>
   </div>
</div>
<div class="modal concered-modal" id="concered-modal">
   <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header align-items-center">
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
         </div>
         <div class="modal-body">
            <div class="concered-qa">
               <h5><span>Que:</span> Adolescent/Young Adult Well-Being</h5>
               <p>
                  <span>Ans:</span>  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto necessitatibus fugit blanditiis consequuntur dolores, ratione adipisci officiis ea rem deserunt eaque voluptatem voluptas amet, beatae odit eligendi. Enim, ducimus beatae!
               </p>
            </div>
         </div>
      </div>
   </div>
</div>

<!--<input type="hidden" name="get_val" id="get_val" value="0">-->
<!--<input type="hidden" name="get_scroll_val" id="get_scroll_val" value="0">-->

<input type="hidden" name="get_val" id="get_val" value="0">
@if(Auth::guard('web')->user() !='')
<input type="hidden" name="get_scroll_val" id="get_scroll_val" value="0">
@else
<input type="hidden" name="get_scroll_val" id="get_scroll_val" value="2">
@endif


<!-- The Modal -->
<div class="modal login-model" id="login-popup" style="pointer-events:none;">
   <div class="modal-dialog">
      <div class="modal-content">
         <!--Modal Header -->
         <div class="modal-header">
            <h4 class="modal-title">Login</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
         </div>
         <!--Modal body -->
         <div class="modal-body">
            <div class="login-msg"></div>
            <form action="" class="row g-4" id="login-form">
                {{ csrf_field() }}
               <div class="col-12 phone_no_field">
                  <label>Mobile no.<span class="text-danger">*</span></label>
                  <div class="input-group">
                     <div class="input-group-text"><i class="fa-solid fa-phone"></i></div>
                     <input type="text" class="form-control" placeholder="Enter phone number" name="phone_no">
                  </div>
               </div>
               <span class="error-text phone_no_err"></span>
               <div class="col-12 otp_field">
                  <label>Enter OTP<span class="text-danger">*</span></label>
                  <div class="input-group">
                     <div class="input-group-text"><i class="fa-solid fa-lock"></i></div>
                     <input type="text" class="form-control" placeholder="Enter otp" name="otp">
                  </div>
               </div>
               <span class="error-text otp_err"></span>
               <div class="col-12 text-align-center display-flex">
                  <!--<button type="submit" class="btn btn-primary px-4 float-end mt-4">login</button> -->
                  <div class="expert-button" >
                     <button class="button" id="submit_login">
                     <a href="#">Login</a>
                     </button>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
<!--event popup -->
<div class="modal event-popup" id="event-popup">
   <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
         <button type="button" class="btn-close close-popup" data-bs-dismiss="modal">
         <i class="fa-solid fa-xmark"></i>
         </button>
         <div class="event-popup-box">
            <div class="event-popup-title">
               <span>Register to book your seat now and Win Prizes!</span>
            </div>
            <div style="margin-bottom: 10px;"><span class="success-msg-event">Your Response Submitted Successfully !!</span></div>
            <div class="main-loading-state">
                <div class="loading-state">
                  <div class="loading"></div>
                </div>
            </div>
            <form method="post" id="event-form">
                {{ csrf_field() }}
               <div class="row">
                  <div class="col-lg-12">
                     <div class="mysakhi-input">
                        <label for="">event name</label>
                        <input type="text" name="ename" value="" placeholder="ENAME*" id="ename" readonly>
                     </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6">
                     <div class="mysakhi-input">
                        <label for="">date</label>
                        <input type="date" name="date" value="" placeholder="DATE*" id="date" readonly>
                     </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6">
                     <div class="mysakhi-input">
                        <label for="">time</label>
                        <input type="text" name="time" value="" placeholder="TIME*" id="time" readonly>
                     </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6">
                     <div class="mysakhi-input">
                        <label for="">your name</label>
                        <input type="text" name="name" value="" placeholder="NAME*" id="name">
                        <span class="error-text name_err"></span>
                     </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6">
                     <div class="mysakhi-input">
                        <label for="">your city</label>
                        <input type="text" name="city" value="" placeholder="CITY*" id="city">
                        <span class="error-text city_err"></span>
                     </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6">
                     <div class="mysakhi-input">
                        <label for="">email id</label>
                        <input type="email" name="email" value="" placeholder="EMAIL*" id="email">
                        <span class="error-text email_err"></span>
                     </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6">
                     <div class="mysakhi-input">
                        <label for="">phone</label>
                        <input type="text" name="phone" value="" placeholder="PHONE*" id="phone">
                        <span class="error-text phone_err"></span>
                     </div>
                  </div>
                  <div class="col-lg-12">
                     <div class="form-check myshaki-check">
                        <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="check" placeholder="CHECK*" id="check">
                        Please register and send me the joining details.
                        </label>
                        <span class="error-text check_err"></span>
                     </div>
                  </div>
                  <div class="col-lg-12">
                     <div class="event-popup-btn">
                        <button class="button" id="submit2">
                        <a href="#">Register</a>
                        </button>
                     </div>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
<!--expert popup -->
<div class="modal expert-popup" id="expert-popup">
   <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
         <button type="button" class="btn-close close-popup" data-bs-dismiss="modal">
         <i class="fa-solid fa-xmark"></i>
         </button>
         <div class="event-popup-box">
            <div class="event-popup-title">
               <span>Book your appointment now!</span>
            </div>
            <div style="margin-bottom: 10px;"><span class="success-msg-book">Your Response Submitted Successfully !!</span></div>
            <div class="main-loading-state">
                <div class="loading-state">
                  <div class="loading"></div>
                </div>
            </div>
            <form method="post" id="book-form">
                {{ csrf_field() }}
               <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-6">
                     <div class="mysakhi-input">
                        <label for="">expert name</label>
                        <input type="text" name="ename" value="" placeholder="ENAME*" id="ename" readonly>
                     </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6">
                     <div class="mysakhi-input">
                        <label for="">expert city</label>
                        <input type="text" name="ecity" value="" placeholder="ECITY*" id="ecity" readonly>
                     </div>
                  </div>
                  <div class="pre-date-title">
                     <span>choose your preferred date</span>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6">
                     <div class="mysakhi-input">
                        <label for="">date</label>
                        <input type="date" name="date" value="" placeholder="EDATE*" id="date">
                        <span class="error-text date_err"></span>
                     </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6">
                     <div class="mysakhi-input">
                        <label for="">time</label>
                        <input type="time" name="time" value="" placeholder="ETIME*" id="time">
                        <span class="error-text time_err"></span> 
                     </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6">
                     <div class="mysakhi-input">
                        <label for="">name</label>
                        <input type="text" name="name" value="" placeholder="NAME*" id="name">
                        <span class="error-text name_err"></span>
                     </div>
                  </div>
                  <div class="col-lg-6 col-md-6">
                     <div class="mysakhi-input">
                        <label for="">city</label>
                        <input type="text" name="city" value="" placeholder="CITY*" id="city">
                        <span class="error-text city_err"></span>
                     </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6">
                     <div class="mysakhi-input">
                        <label for="">email id</label>
                        <input type="email" name="email" value="" placeholder="EMAIL*" id="email">
                        <span class="error-text email_err"></span>
                     </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6">
                     <div class="mysakhi-input">
                        <label for="">phone</label>
                        <input type="number" name="phone" value="" placeholder="PHONE*" id="phone">
                        <span class="error-text phone_err"></span>
                     </div>
                  </div>
                  <div class="col-lg-12">
                     <div class="form-check myshaki-check">
                        <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="check" placeholder="CHECK*" id="check">
                        <span class="error-text check_err"></span> Please plan my appointment and send me the details on my email.
                        </label>
                     </div>
                  </div>
                  <div class="col-lg-12">
                     <div class="event-popup-btn">
                        <button class="button" id="submit3">
                        <a href="#">Book now</a>
                        </button>
                     </div>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>

<style>
    .main-loading-state{
        display:none;
    }
    .loading-state {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.3);
      z-index: 9999;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .loading {
      width: 70px;
      height: 70px;
      border-radius: 50%;
      border: 10px solid #ddd;
      border-top-color: #fe434c;
      animation: loading 1s linear infinite;
    }
    @keyframes loading {
      to {
        transform: rotate(360deg);
      }
    }
</style>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
   $(document).ready(function() {
       $("#submit1").click(function(e){
           e.preventDefault();
   
           $(".error-text").empty();
           var _token = $("input[name='_token']").val();  
           var email = $('#email').val();
           var name = $('#name').val();
           var phone_no = $('#phone_no').val();
           var message = $('#message').val();
           var city = $('#city').val();
   
           // alert(email);
           // alert(name);
           // alert(message);
           // alert(phone_no);
           // alert(city);
             
   
           $.ajax({
               url: '/getForumData',
               type:'POST',
             data: {_token:_token,email:email,name:name,phone_no:phone_no,message:message,city:city},
             beforeSend: function(){
   
                           $('.main-loading-state').show();
   
                             $('#submit1').prop('disabled', true);
   
                          },
   
                       complete: function(){
                           
                             $('#submit1').removeAttr("disabled");
   
                          $('.main-loading-state').hide();
   
                        },
                        
               success: function(data) {
                 console.log(data.error)
                   if($.isEmptyObject(data.error)){
   
                   $('form').each(function() {
                        this.reset();
                      });
   
                    $(".success-msg-forum").show();
                   setTimeout(function() { $(".success-msg-forum").fadeOut(3000); }, 3000);
   
                    
   
   
                   }else{
                       printErrorMsg(data.error);
   
   
                 
                    
                   }
               }
           });
       }); 
   
       function printErrorMsg (msg) {
           $.each( msg, function( key, value ) {
           console.log(key);
             $('#inquiry_form .'+key+'_err').css("display","block");
             $('#inquiry_form .'+key+'_err').text(value);
   
             setTimeout(function() { $(".error-text").fadeOut(3000); }, 3000);
           });
       }
   });
   
   
   $(document).ready(function() {
       $("#submit2").click(function(e){
           e.preventDefault();
   
           $(".error-text").empty();
           var _token = $("input[name='_token']").val();  
           var ename = $("#event-form input[name='ename']").val();
           var date =  $("#event-form input[name='date']").val();
           var time =  $("#event-form input[name='time']").val();
           var name =  $("#event-form input[name='name']").val();
           var city =  $("#event-form input[name='city']").val();
           var email =  $("#event-form input[name='email']").val();
           var phone =  $("#event-form input[name='phone']").val();
           var check =  $("#event-form input[name='check']:checked").val();
           // alert(email);
           // alert(name);
           // alert(message);
           // alert(phone_no);
           // alert(city);
             
   
           $.ajax({
               url: '/getEventData',
               type:'POST',
             data: {_token:_token,ename:ename,date:date,time:time,name:name,city:city,email:email,phone:phone,check:check},
             beforeSend: function(){
   
                           $('.main-loading-state').show();
 
                             $('#submit2').prop('disabled', true);
   
                          },
   
                       complete: function(){
                           
                             $('#submit2').removeAttr("disabled");
   
                          $('.main-loading-state').hide();
   
                        },
                        
               success: function(data) {
                 console.log(data.error)
                   if($.isEmptyObject(data.error)){
   
                   $('form').each(function() {
                        this.reset();
                      });
   
                    $(".success-msg-event").show();
                   setTimeout(function() { $(".success-msg-event").fadeOut(3000); }, 3000);
   
                    
   
   
                   }else{
                       printErrorMsg1(data.error);
   
   
                 
                    
                   }
               }
           });
       }); 
   
       function printErrorMsg1 (msg) {
           $.each( msg, function( key, value ) {
           console.log(key);
             $('#event-form .'+key+'_err').css("display","block");
             $('#event-form .'+key+'_err').text(value);
   
             setTimeout(function() { $(".error-text").fadeOut(3000); }, 3000);
           });
       }
   });
   
   
   $(document).ready(function() {
       $("#submit3").click(function(e){
           e.preventDefault();
   
           $(".error-text").empty();
           var _token = $("input[name='_token']").val();  
           var ename = $("#book-form input[name='ename']").val();
           var ecity =  $("#book-form input[name='ecity']").val();
           var date =  $("#book-form input[name='date']").val();
           var time =  $("#book-form input[name='time']").val();
           var name =  $("#book-form input[name='name']").val();
           var city =  $("#book-form input[name='city']").val();
           var email =  $("#book-form input[name='email']").val();
           var phone =  $("#book-form input[name='phone']").val();
           var check =  $("#book-form input[name='check']:checked").val();
   
   
           $.ajax({
               url: '/getBookData',
               type:'POST',
             data: {_token:_token,ename:ename,ecity:ecity,date:date,time:time,name:name,city:city,email:email,phone:phone,check:check},
             beforeSend: function(){
   
                           $('.main-loading-state').show();
   
                             $('#submit3').prop('disabled', true);
   
                          },
   
                       complete: function(){
                           
                             $('#submit3').removeAttr("disabled");
   
                          $('.main-loading-state').hide();
   
                        },
                        
               success: function(data) {
                 console.log(data.error)
                   if($.isEmptyObject(data.error)){
   
                   $('form').each(function() {
                        this.reset();
                      });
   
                    $(".success-msg-book").show();
                   setTimeout(function() { $(".success-msg-book").fadeOut(3000); }, 3000);
   
                    
   
   
                   }else{
                       printErrorMsg1(data.error);
   
   
                 
                    
                   }
               }
           });
       }); 
   
       function printErrorMsg1 (msg) {
           $.each( msg, function( key, value ) {
           console.log(key);
             $('#book-form .'+key+'_err').css("display","block");
             $('#book-form .'+key+'_err').text(value);
   
             setTimeout(function() { $(".error-text").fadeOut(3000); }, 3000);
           });
       }
   });
   
   
   $(document).ready(function() {
       $("#submit_login").click(function(e){
           e.preventDefault();
   
           $(".error-text").empty();
           var _token = $("input[name='_token']").val();  
           var phone_no =  $("#login-form input[name='phone_no']").val();
           var otp =  $("#login-form input[name='otp']").val();
   
              $.ajax({
               url: '/verify_login',
               type:'POST',
                 data: {_token:_token,phone_no:phone_no,otp:otp},
                 beforeSend: function(){
   
                               $('.main-loading-state').show();
    
                                $('#overlay').fadeIn();
                                
                                 $('#submit_login').prop('disabled', true);
   
                              },
   
                           complete: function(){
                               
                                 $('#submit_login').removeAttr("disabled");
   
                              $('.main-loading-state').hide();
    
                            },
                            
                   success: function(data) {
                     console.log(data.error)
                       if($.isEmptyObject(data.error)){
   
                       // $('form').each(function() {
                       //      this.reset();
                       //    });
                       console.log(data.success);
                       if(data.success == 2){
                          $(".phone_no_field").hide(); 
                          $(".otp_field").show();
                          $('.login-msg').html('<p class="bg-success">OTP sent on Phone Number</p>'); 
                       }
   
                       if(data.success == 0){
                           $(".login-msg").show(); 
                           $('.login-msg').html('<p class="bg-danger"> Invalid OTP </p>');
                       }
                       if(data.success == 1){
                           $(".login-msg").show(); 
                           $('.login-msg').html('<p class="bg-success"> OTP matched Successfully !!</p>');
                           $('.btn-close').click();
                       }
   
                        // $(".login-msg").show();
                       setTimeout(function() { $(".login-msg").fadeOut(3000); }, 3000);
   
                       }else{
                           printErrorMsg4(data.error);
   
   
                     
                        
                       }
                   }
               }); 
       }); 
   
       function printErrorMsg4 (msg) {
           $.each( msg, function( key, value ) {
           console.log(key);
             $('#login-form .'+key+'_err').css("display","block");
             $('#login-form .'+key+'_err').text(value);
   
             setTimeout(function() { $(".error-text").fadeOut(3000); }, 3000);
           });
       }
   });
   
   
    function get_event_fixdata($id){
           
   
                          var BASE_URL = "{{ url('/') }}";
       
                           var id = $id;
       
                                 $.ajax({
       
                                   
                                       url:BASE_URL+'/getFixEventData/'+id,
                                       type:'GET',
                                       dataType: "json",
   
       
                                       success: function(response){
   
                                           console.log(response);
   
                                           var ename=response.name;
                                           var date=response.date;
                                           var time=response.time;
   
                                           $("#event-form input[name='ename']").val(ename);
                                           $("#event-form input[name='date']").val(date);
                                           $("#event-form input[name='time']").val(time);
                                       },
        
                                   error: function(response) {
       
                                            alert('error');
                 
                                       },        
                 
                                  });
   
      }
   
   
      function get_expert_fixdata($id){
           
   
                          var BASE_URL = "{{ url('/') }}";
       
                           var id = $id;
       
                                 $.ajax({
       
                                   
                                       url:BASE_URL+'/getFixExpertData/'+id,
                                       type:'GET',
                                       dataType: "json",
   
       
                                       success: function(response){
   
                                           console.log(response);
   
                                           var ename=response.name;
                                           var ecity=response.city;
   
                                           $("#book-form input[name='ename']").val(ename);
                                           $("#book-form input[name='ecity']").val(ecity);
                                       },
        
                                   error: function(response) {
       
                                            alert('error');
                 
                                       },        
                 
                                  });
   
      }
          
</script>
@endsection
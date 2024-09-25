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
   
   .topic{
       align-items:unset!important;
   }
</style>

<style type="text/css">

.event-image iframe{
    width:100%;
    height:290px;
}

</style>
    @foreach($events_banner as $eb)
    <div class="inner-banner" style="background-image: url('/uploads/{{$eb->image}}');">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-banner-title">
                        <h2>{{$eb->page_title}}</h2>
                    </div>
                    <div class="breadcrumb">
                        <a href="#" class="me-2 home">Home</a>
                        <i class="fa-solid fa-angles-right"></i>
                        <a class="ms-2">{{$eb->page_title}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach

    <section class="expert_list">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="row expert_list_filter">
                        <form id="filterForm">
                            {{csrf_field()}}
                        <div class="col-lg-12 search_expert_list">
                            <!-- <i class="fa-solid fa-magnifying-glass"></i> -->
                            <!-- <p class='search-placeholder'>Find Expert</p> -->
                            <div class="event_seach">
                                <div class="filter_title">
                                    <h4> Search</h4>
                                </div>
                                <div class="filter_form">
                                    
                                        <input autocomplete="off" type="text" name="search" id="search" class="text-field" placeholder="Find Event">
                                        <button class="search-btn" id="send-search"><i class="fa-solid fa-magnifying-glass"></i></button>
                                    
                                </div>
                            </div>
                            <div class="event_seach event_venue">
                                <div class="filter_title">
                                    <h4>Events</h4>
                                </div>
                                <div class="filter_form_group">
                                    <div class="event-filter">
                                        <div class="mysakhi-input">
                                            <span>from</span>
                                            <input type="date" name="startDate" id="startDate">
                                        </div>
                                        <div class="mysakhi-input">
                                            <span>to</span>
                                            <input type="date" name="endDate" id="endDate">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-9 results" >
                    <div class="event_detail_box">
                        @foreach($interactive_sessions as $is)
                        <div class="event-box">
                            <div class="event-image">
                                
                                @if($is->full_video =='')
                                <a href=""><img src="uploads/{{$is->image}}" alt="event-2"></a>
                                @else
                                <a href="">{!!$is->full_video!!}
                                </a>
                                @endif
                                
                                @if($is->full_video =='')
                                <div class="seat">
                                    <i class="fa-solid fa-couch"></i><span>{{$is->seat}} seat</span>
                                </div>
                                @endif
                            </div>
                            <div class="event-info">
                                <div class="event-time">
                                    <p><i class="fa-regular fa-calendar"></i>
                                        {{ \Carbon\Carbon::parse($is->date)->format('d F, Y') }}</p>
                                    <!--<p><i class="fa-regular fa-calendar"></i>-->
                                    <!--    {{$is->date}}</p>-->
                                    <span>
                                        <i class="fa-regular fa-clock"></i>
                                        {{$is->time}}</span>
                                </div>
                                <h3> <a href=""> {{$is->name}} </a></h3>
                                
                                <h5 class="topic">
                                    <span>topic</span>:<strong>{{$is->topic}}</strong>
                                </h5>

                                
                                <p class="event-para">
                                    Description: {!!$is->description!!}
                                </p>
                                
                                    @php $currentDate=\Carbon\Carbon::now()->toDateString(); @endphp
                                    @if($currentDate > $is->date)
                                    <button class="button event_button" >
                                        <a href="{{$is->watch_now}}" target="_blank">Watch Now</a>
                                    </button>
                                    @else
                                    <button class="button" onclick="get_event_fixdata({{$is->id}})">
                                        <a href="#" target="_blank" data-bs-toggle="modal" data-bs-target="#event-popup">Register</a>
                                    </button>
                                    @endif
                                
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="expert-pagination">
                                            {{$interactive_sessions->links('pagination.pagination')}}
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


    $("#search").keyup(function(){
        getProperties();
    });
    $('#startDate').change(function(){
        getProperties();
    });
    $('#endDate').change(function(){
        getProperties();
    });
    $('#send-search').click(function(){
        getProperties();
    });
    
    function getProperties(page=1){
        var BASE_URL = "{{ url('/') }}";
       
        $.ajax({
        
            url:BASE_URL+'/load-event',
            type:'POST',
            data:$("#filterForm").serialize()+'&page='+page,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response){
              $(".results").html(response);
            },
            error: function(response) {
            
            },        
        });
    }
    
    $(document).on('click', '.pagination .page-item .clickable', function(event){
            event.preventDefault(); 
            var page = $(this).attr('href').split('page=')[1];
            getProperties(page)
;
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
   
   
      
          
</script>

    @endsection
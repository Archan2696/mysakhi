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
 </style>
   @foreach($contact_banner as $cb)
    <div class="inner-banner" style="background-image: url('/uploads/{{$cb->image}}');">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-banner-title">
                        <h2>{{$cb->page_title}}</h2>
                    </div>
                    <div class="breadcrumb">
                        <a href="{{url('/')}}" class="me-2 home">Home</a>
                        <i class="fa-solid fa-angles-right"></i>
                        <a class="ms-2">{{$cb->page_title}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <section class="contact_form">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @foreach($contact_us_description as $cud)
                    <div class="section-heading">
                        <h5>{{$cud->title1}}</h5>
                        <h2>{!!$cud->title2!!}</h2>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="row contact_form_info">
                <div class="col-lg-5">
                    <div class="row contact_description">
                        @foreach($contact_us_info as $cui)
                        @if($cui->title=="Address")
                        <div class="col-lg-12">
                            <div class="contact_details">
                                <div class="contact_icon">
                                    <!-- <img src="image/location.png"> -->
                                    <i class="fa-solid fa-location-dot"></i>
                                </div>
                                <div class="contact_info">
                                    <h4>{{$cui->title}}</h4>
                                    <a href="#">{{$cui->description}}</a>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                        <!-- <div class="col-lg-4">
                            <div class="contact_details">
                                <div class="contact_icon">
                                    <i class="fa-solid fa-phone-volume"></i>
                                </div>
                                <div class="contact_info">
                                    <h4>Get In Touch</h4>
                                    <a href="tel:9876543210">+91 9876543210</a>
                                </div>
                            </div>
                        </div> -->
                        @foreach($contact_us_info as $cui)
                        @if($cui->title=="Email Address")
                         <div class="col-lg-12">
                            <div class="contact_details">
                                <div class="contact_icon">
                                    <!-- <img src="image/location.png"> -->
                                    <i class="fa-solid fa-envelope"></i>
                                </div>
                                <div class="contact_info">
                                    <h4>{{$cui->title}}</h4>
                                    <a href="mailto:info@jagsonpal.com">{{$cui->description}}</a>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="contact_form_description">
                    <div style="margin-bottom: 30px;"><span class="success-msg-forum">Your Response Submitted Successfully !!</span></div>
                    <div class="main-loading-state">
                        <div class="loading-state">
                          <div class="loading"></div>
                        </div>
                    </div>
                        <form  method="post" id="contact_form">
                                  {{ csrf_field() }}
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="mysakhi-input">
                                        <input type="text" placeholder="Name" name="name" id="name">
                                        <span class="error-text name_err"></span>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="mysakhi-input">
                                        <input type="text" placeholder="City" name="city" id="city">
                                          <span class="error-text city_err"></span>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="mysakhi-input">
                                        <input type="text" placeholder="Email Address"name="email" id="email">
                                        <span class="error-text email_err"></span>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="mysakhi-input">
                                        <input type="number" placeholder="Phone number"name="phone_no" id="phone_no">
                                            <span class="error-text phone_no_err"></span>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mysakhi-input">
                                        <textarea name="" placeholder="Enter your question here...."name="message" id="message"></textarea>
                                        <span class="error-text message_err"></span>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mysakhi-btn">
                                        <button class="button" id="submit">
                                            <a href="#">send message</a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3506.325215289476!2d77.07344027616094!3d28.49986159009183!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d1944c2abfb97%3A0xe9195c5e0294bf45!2sNimai%20Tower!5e0!3m2!1sen!2sin!4v1713261144427!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div> 
    </section>


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
       
       $("#submit").click(function(e){
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
             $('#contact_form .'+key+'_err').css("display","block");
             $('#contact_form .'+key+'_err').text(value);
   
             setTimeout(function() { $(".error-text").fadeOut(3000); }, 3000);
           });
       }
   });
   </script>

@endsection

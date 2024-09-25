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
    @foreach($find_expert_banner as $feb)
   <div class="inner-banner" style="background-image: url('/uploads/{{$feb->image}}');">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-banner-title">
                        <h2>{{$feb->page_title}}</h2>
                    </div>
                    <div class="breadcrumb">
                        <a href="{{url('/')}}" class="me-2 home">Home</a>
                        <i class="fa-solid fa-angles-right"></i>
                        <a class="ms-2">{{$feb->page_title}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <section class="expert_list">
    	<div class="container">
    	    
    	<div class="disclaimer-box">
            <div class="container">
                <span> <i class="fa-solid fa-triangle-exclamation"></i> Disclaimer</span>:
                If you need an urgent appointment, please contact your local gynaecologist
            </div>
           
        </div>
    	    
    		<div class="row expert-filter">
    			<!--<div class="col-lg-6 col-md-8 search_expert">-->
    				
		     <!--   	<form id='filterForm'>-->
		     <!--   	       {{csrf_field()}}-->
		     <!--   		<input autocomplete="off" type='text' name='input' id='input' class='text-field' placeholder="Find Expert">-->
		     <!--   		<button  id='submit' class="search-btn">Search</button>-->
		     <!--   	</form>-->
		        	
    			<!--</div>-->
    			<!--<div class="col-lg-6 col-md-4">-->
    			<!--    <div class="showing">-->
       <!--                 <p>12 Experts found</p>-->
       <!--                  <div class="inner-sort">-->
       <!--                     <label>show :</label>-->
       <!--                     <select>-->
       <!--                         <option selected="">25</option>-->
       <!--                         <option value="1">50</option>-->
       <!--                         <option value="2">75</option>-->
       <!--                         <option value="3">100</option>-->
       <!--                     </select>-->
       <!--                 </div>-->
       <!--             </div>-->
    			<!--</div>-->
    		</div>
    		<form id="filterForm">
    	    {{csrf_field()}}
    		<div class="row expert-filter">
    			<div class="col-lg-3 col-md-6 search_expert">
		        		<input autocomplete="off" type="text" name="input" id="input" class="text-field" placeholder="Find Expert">
		        		<button id="submit" class="search-btn">Search</button>
    			</div>
    			
    			<div class="col-lg-3 col-md-6">
    			    <div class="expert-filters">
    			         <select id="expertise" name="expertise">
    			            <option value="">select the expertise</option>
    			            @foreach($expertise as $e)
                                <option value="{{$e->id}}">{{$e->expertise}}</option>
                            @endforeach
                        </select>
    			    </div>
    			</div>
    			
    			<div class="col-lg-3 col-md-6">
    			    <div class="expert-filters">
    			         <select id="state" name="state">
    			            <option value="">select the state</option>
    			            @foreach($state as $s)
                            <option value="{{$s->state_name}}">{{$s->state_name}}</option>
                            @endforeach
                        </select>
    			    </div>
    			</div>
    			
    			<div class="col-lg-3 col-md-6">
    			    <div class="expert-filters cities_result">
    			         <select id="city" name="city">
    			            <option value="">select the city</option>
                        </select>
    			    </div>
    			</div>
    		</div>
    		</form>
    		
    		<div class="results">
            <div class="row mt-5">
    			<div class="expert_list_info">
    			    @foreach($expert as $e)
    				<div class="expert_list_details">
    					<div class="expert_list_img">
    						<a href="#">
                                <img src="uploads/{{$e->image}}" alt="expert">
                            </a>
    					</div>
    					<div class="expert_list_content">
    						
    						<h4>
                                <a href="#">{{$e->name}}</a>
                            </h4>
                             <div class="expert-desc">
                                <p>
                                    {!!$e->description!!}
                                </p>
                            </div>
                            @php $expertise=experties_data($e->id); @endphp
                             <p class="expert-Expertise" ><span>Expertise:</span> @foreach($expertise as $ex) {{$ex}}, @endforeach</p>
                            
                            <div class="expert-loc">
                                <i class="fa-solid fa-location-dot"></i>
                                <span>{{$e->city}},{{$e->state}}</span>
                            </div>
                           
                            <div class="expert-contact" >
                                <i class="fa-solid fa-phone"></i>
                                <span>{{$e->contact}}</span>
                            </div>
                            
                            <div class="expert-book-btn">
                                <button class="button" onclick="get_expert_fixdata({{$e->id}})">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#expert-popup">Connect</a>
                                </button>
                            </div>
                        </div>
    				</div>
    				@endforeach
    				
    				
    			</div>
    		</div>
    		<div class="expert-pagination">
                {{ $expert->links('pagination.pagination') }}
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


    <section class="expert_qa">
    	<div class="container">
            @foreach($expert_faq_description as $fqd)
    		<div class="section-heading">
	            <h5>
	                {{$fqd->title1}}
	            </h5>
	            <h2>
	                 {{$fqd->title2}}
	            </h2>
	        </div>
            @endforeach
    		<div class="row">
    			<div class="col-lg-6 col-md-6">
	    			<div class="accordion" id="accordionExample">
	    			@php $firstItemInLeft = true; @endphp
                    @foreach($expert_faq as $key=>$fq)
                    @if($key%2 == 0)
					  <div class="accordion-item">
					    <h2 class="accordion-header" id="heading{{$fq->id}}">
					      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$fq->id}}" aria-expanded="false" aria-controls="collapse{{$fq->id}}">
					        {{$fq->question}}
					      </button>
					    </h2>
					    <div id="collapse{{$fq->id}}" class="accordion-collapse collapse @if($firstItemInLeft) show @endif" aria-labelledby="heading{{$fq->id}}" data-bs-parent="#accordionExample">
					      <div class="accordion-body">
					        <p>{{$fq->answer}}</p>
					      </div>
					    </div>
					  </div>
					    @php $firstItemInLeft = false; @endphp
                      @endif
                    @endforeach
					</div>
    			</div>
    			<div class="col-lg-6 col-md-6">
    				<div class="accordion" id="accordionExample1">
    			    @php $firstItemInRight = true; @endphp
                    @foreach($expert_faq as $key=>$fq)
                    @if($key%2 != 0)
					   <div class="accordion-item">
                        <h2 class="accordion-header" id="heading{{$fq->id}}1">
                          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$fq->id}}1" aria-expanded="false" aria-controls="collapse{{$fq->id}}">
                            {{$fq->question}}
                          </button>
                        </h2>
                        <div id="collapse{{$fq->id}}1" class="accordion-collapse collapse @if($firstItemInRight) show @endif" aria-labelledby="heading{{$fq->id}}" data-bs-parent="#accordionExample1">
                          <div class="accordion-body">
                            <p>{{$fq->answer}}</p>
                          </div>
                        </div>
                      </div>
                        @php $firstItemInRight = false; @endphp
                      @endif
                      @endforeach
					</div>
    			</div>
    		</div>
    	</div>
    </section>

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
                        <input type="text" name="phone" value="" placeholder="PHONE*" id="phone">
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



    $("#input").keyup(function(){
        getProperties();
    });
    
    $("#submit").click(function(){
        getProperties();
    });
    
    $('#expertise').on('change', function() {
        getProperties();
    });
    
    $('#state').on('change', function() {
        getProperties();
        getCities();
    });
    
    $('#city').on('change', function() {
        getProperties();
    });
    
    function getCities(){
        var BASE_URL = "{{ url('/') }}";
       
        $.ajax({
        
            url:BASE_URL+'/load-city',
            type:'POST',
            data:$("#filterForm").serialize(),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response){
              $(".cities_result").html(response);
            },
            error: function(response) {
            
            },        
        });
    }
    
    function getProperties(page=1){
        var BASE_URL = "{{ url('/') }}";
       
        $.ajax({
        
            url:BASE_URL+'/load-expert',
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
            getProperties(page);
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
   
                            $('#overlay').fadeIn();
                            
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
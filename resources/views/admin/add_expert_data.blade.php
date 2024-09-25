@extends('admin.layout.header')

@section('content')


<style type="text/css">
   
   .service-img1 {
      width: 15%;
      padding: 0px;
      border: 1px solid #294992;
      background: #294992;
   }
   
   

    .expertise-chip {
        display: inline-block;
        padding: 0.4em 0.6em;
        margin: 0.2em;
        background-color: #f1f1f1;
        border-radius: 25px;
        font-size: 0.9em;
    }


</style>

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.css">
 <div class="head-banner">
         <ul class="breadcrumb">
            <li>
               <a href="{{url('admin/home')}}">Home</a>
            </li>
            <li>
               @if($id==0)
               <a href=""><span>Add Expert</span></a>
               @else
               <a href=""><span>Update Expert</span></a>
               @endif
            </li>
         </ul>
      </div>
      <div class="page mt-4 hosting-page title1 page-with" style="display: block;">
         <div class="list1">
           @if($id==0)
            <h4 class="mb-4">Add Expert</h4>
          @else
            <h4 class="mb-4">Update Expert</h4>
            @endif
         </div>
         <form action="{{url('admin/store_add_expert_data')}}/{{$id}}" method="post" enctype="multipart/form-data" id="filterForm">
         	@csrf
         <div class="detail table-responsive">
            <div class="details_main">

                <div class="details_inner">
                  <div class="part-1">
                     <div class="col-lg-4 label">
                           <label>Image</label>
                        </div>
                     <div class="details_image">
                        <img src="/uploads/{{$image}}" id="blah">
                     </div>
                     <div class="details_sub">
                        <input type="file" name="image" onchange="readURL(this);" >
                           <input type="hidden" name="oldimage" value="{{$image}} "/>
                          @if($errors->has('image')) <p class="error_mes">{{ $errors->first('image') }}</p> @endif
                      <!-- <img id="blah" src="#" alt=""> -->
                     </div>  
                  </div>            
               </div>
              
               <div class="details_inner">
                  <div class="part">
                     <div class="row">
                        <div class="col-lg-4 label">
                           <label>Name</label>
                        </div>
                        <div class="col-lg-10 data">
                           <input type="text" placeholder="Enter name" name="name" value="{{$name}}" >
                             @if($errors->has('name')) <p class="error_mes">{{ $errors->first('name') }}</p> @endif
                        </div>
                     </div>   
                  </div>
               </div>   


                <div class="details_inner">
                  <div class="part">
                     <div class="row">
                        <div class="col-lg-12 label">
                           <label>Expertise</label>
                        </div>
                        @if($expertise !='')
                        <div>
                            @php $expertise=experties_data($id); @endphp
                            
                            @foreach($expertise as $e)
                                <!--<input type="text" placeholder="Enter expertise" name="expertise" value="{{$e}}">-->
                               <span class="expertise-chip">{{ $e }}</span>
                            @endforeach
                        </div>
                        @endif
                        <div class="col-lg-10 data">
                            <select name="expertise[]" id="expertise" multiple>
                                @foreach($expertise_data as $e)
                                    <option value="{{ $e->id }}" selected>{{ $e->expertise }}</option>
                                @endforeach
                            </select>
                             @if($errors->has('expertise')) <p class="error_mes">{{ $errors->first('expertise') }}</p> @endif
                        </div>
                     </div>   
                  </div>
               </div>   


               <div class="details_inner">
                  <div class="part">
                     <div class="row">
                        <div class="col-lg-4 label">
                           <label>State</label>
                        </div>
                         <div class="col-lg-10 data">
                            <select id="state" name="state">
    			            <option value="">select the state</option>
    			            @foreach($state_data as $s)
    			            @if($s->state_name == $state )
    			            <option value="{{$s->state_name}}" selected>{{$s->state_name}}</option>
    			            @else
    			            <option value="{{$s->state_name}}">{{$s->state_name}}</option>
    			            @endif
                            
                            @endforeach
                            </select>
                             @if($errors->has('state')) <p class="error_mes">{{ $errors->first('state') }}</p> @endif
                        </div>
                     </div>   
                  </div>
               </div>  
               
               
                <div class="details_inner">
                  <div class="part">
                     <div class="row">
                        <div class="col-lg-4 label">
                           <label>City</label>
                        </div>
                         <div class="col-lg-10 data cities_result">
                              <input type="hidden" name="city1" value="{{$city}}">
                            <select name="city" id="city" >
                            @foreach($city_data as $c)
                            @if($c->city_name == $city)
    			            <option value="{{$c->city_name}}" selected>{{$c->city_name}}</option>
    			            @endif
    			            @endforeach
    			            
    			            @if($city =='')
    			            <option value="">select the city</option>
    			            @endif
                            </select>                            
                            @if($errors->has('city')) <p class="error_mes">{{ $errors->first('city') }}</p> @endif
                        </div>
                     </div>   
                  </div>
               </div> 
               
                  <div class="details_inner">
                  <div class="part">
                     <div class="row">
                        <div class="col-lg-4 label">
                           <label>Address</label>
                        </div>
                        <div class="col-lg-10 data">
                             <textarea type="text" name="address">{{$address}}</textarea>   
                              @if($errors->has('address')) <p class="error_mes">{{ $errors->first('address') }}</p> @endif
                        </div>
                     </div>   
                  </div>
               </div>  
               
               
                <div class="details_inner">
                  <div class="part">
                     <div class="row">
                        <div class="col-lg-4 label">
                           <label>Contact</label>
                        </div>
                        <div class="col-lg-10 data">
                           <input type="text" placeholder="Enter contact" name="contact" value="{{$contact}}" >
                             @if($errors->has('contact')) <p class="error_mes">{{ $errors->first('contact') }}</p> @endif
                        </div>
                     </div>   
                  </div>
               </div>   
               


                <div class="details_inner">
                  <div class="part">
                     <div class="row">
                        <div class="col-lg-4 label">
                           <label>Description</label>
                        </div>
                        <div class="col-lg-10 data">
                             <textarea type="text" name="description">{{$description}}</textarea>   
                              @if($errors->has('description')) <p class="error_mes">{{ $errors->first('description') }}</p> @endif
                        </div>
                     </div>   
                  </div>
               </div>    
               

               <div class="uplode-btn" style="text-align: center;">
                  <button>submit</button>
                  <a href="{{url('admin/expert')}}">Back to Home?</a>
               </div>
            </div>
         </div>

         </form>
      </div>
     

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
        <script type="text/javascript">
        
        
    $('#state').on('change', function() {
        getCities();
    });
    
 
    function getCities(){
        var BASE_URL = "{{ url('/') }}";
       
        $.ajax({
        
            url:BASE_URL+'/admin/admin_loadCity',
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

           function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(130)
                        .height(130);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        function readURL1(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah1')
                        .attr('src', e.target.result)
                        .width(130)
                        .height(130);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        $('#summernote').summernote({
        placeholder: 'About Us',
        tabsize: 2,
        height: 120,
        callbacks: {
                onImageUpload: function(image) {
                    uploadImage(image[0]);
                }
        },
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
      /*    ['view', ['fullscreen', 'codeview', 'help']]*/
        ]
      });


</script>



@endsection
@extends('admin.layout.header')

@section('content')


<style type="text/css">
   
   .service-img1 {
      width: 15%;
      padding: 0px;
      border: 1px solid #294992;
      background: #294992;
   }

</style>


<style>
    .select-wrapper {
        position: relative;
        display: inline-block;
    }

    /* Style the select element */
    .select-wrapper select {
        padding: 8px;
        width: 200px;
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        border: 1px solid #ccc;
        border-radius: 4px;
        cursor: pointer;
    }

    /* Style the select element when focused */
    .select-wrapper select:focus {
        outline: none;
        border-color: #007bff;
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
               <a href=""><span>Add Events</span></a>
               @else
               <a href=""><span>Update Events</span></a>
               @endif
            </li>
         </ul>
      </div>
      <div class="page mt-4 hosting-page title1 page-with" style="display: block;">
         <div class="list1">
           @if($id==0)
            <h4 class="mb-4">Add Events</h4>
          @else
            <h4 class="mb-4">Update Events</h4>
            @endif
         </div>
         <form action="{{url('admin/store_add_interactive_sessions_data')}}/{{$id}}" method="post" enctype="multipart/form-data">
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
                           <label>Event Name</label>
                        </div>
                        <div class="col-lg-10 data">
                           <input type="text" placeholder="Enter Event Name" name="name" value="{{$name}}" >
                             @if($errors->has('name')) <p class="error_mes">{{ $errors->first('name') }}</p> @endif
                        </div>
                     </div>   
                  </div>
               </div> 
               
               
                <div class="details_inner">
                  <div class="part">
                     <div class="row">
                        <div class="col-lg-4 label">
                           <label>Event Topic</label>
                        </div>
                        <div class="col-lg-10 data">
                           <input type="text" placeholder="Enter Event Topic" name="topic" value="{{$topic}}" >
                             @if($errors->has('topic')) <p class="error_mes">{{ $errors->first('topic') }}</p> @endif
                        </div>
                     </div>   
                  </div>
               </div> 

               <div class="details_inner">
                  <div class="part">
                     <div class="row">
                        <div class="col-lg-4 label">
                           <label>Seat</label>
                        </div>
                        <div class="col-lg-10 data">
                           <input type="text" placeholder="Enter Seat" name="seat" value="{{$seat}}" >
                             @if($errors->has('seat')) <p class="error_mes">{{ $errors->first('seat') }}</p> @endif
                        </div>
                     </div>   
                  </div>
               </div>


               <div class="details_inner">
                  <div class="part">
                     <div class="row">
                        <div class="col-lg-4 label">
                           <label>Event Date</label>
                        </div>
                        <div class="col-lg-10 data">
                           <input type="date" name="date" value="{{$date}}" >
                             @if($errors->has('date')) <p class="error_mes">{{ $errors->first('date') }}</p> @endif
                        </div>
                     </div>   
                  </div>
               </div>  


               <div class="details_inner">
                  <div class="part">
                     <div class="row">
                        <div class="col-lg-4 label">
                           <label>Time</label>
                        </div>
                        <div class="col-lg-10 data">
                           <input type="text" placeholder="Enter Time" name="time" value="{{$time}}" >
                             @if($errors->has('time')) <p class="error_mes">{{ $errors->first('time') }}</p> @endif
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
                        <div class="col-lg-10 data">
                           <input type="text" placeholder="Enter City" name="city" value="{{$city}}" >
                             @if($errors->has('city')) <p class="error_mes">{{ $errors->first('city') }}</p> @endif
                        </div>
                     </div>   
                  </div>
               </div>
               
               <div class="details_inner">
                  <div class="part">
                     <div class="row">
                        <div class="col-lg-4 label">
                           <label>Watch Now Link</label>
                        </div>
                        <div class="col-lg-10 data">
                           <input type="url" placeholder="Enter Link" name="watch_now" value="{{$watch_now}}" >
                             @if($errors->has('watch_now')) <p class="error_mes">{{ $errors->first('watch_now') }}</p> @endif
                        </div>
                     </div>   
                  </div>
               </div>
               
               
               <div class="details_inner">
                  <div class="part">
                     <div class="row">
                        <div class="col-lg-4 label">
                           <label>Full Video</label>
                        </div>
                        <div class="col-lg-10 data">
                             <textarea type="text" name="full_video">{{$full_video}}</textarea>   
                              @if($errors->has('full_video')) <p class="error_mes">{{ $errors->first('full_video') }}</p> @endif
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
                  <a href="{{url('admin/interactive_sessions')}}">Back to Home?</a>
               </div>
            </div>
         </div>

         </form>
      </div>
     

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
        <script type="text/javascript">

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
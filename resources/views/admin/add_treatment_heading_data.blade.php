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

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.css">
 <div class="head-banner">
         <ul class="breadcrumb">
            <li>
               <a href="{{url('admin/home')}}">Home</a>
            </li>
            <li>
               @if($id==0)
               <a href=""><span>Add Treatment Heading</span></a>
               @else
               <a href=""><span>Update Treatment Heading</span></a>
               @endif
            </li>
         </ul>
      </div>
      <div class="page mt-4 hosting-page title1 page-with" style="display: block;">
         <div class="list1">
           @if($id==0)
            <h4 class="mb-4">Add Treatment Heading</h4>
          @else
            <h4 class="mb-4">Update Treatment Heading</h4>
            @endif
         </div>
         <form action="{{url('admin/store_add_treatment_heading_data')}}/{{$id}}" method="post" enctype="multipart/form-data">
            @csrf
         <div class="detail table-responsive">
            <div class="details_main">

    

                
               <div class="details_inner">
                  <div class="part">
                     <div class="row">
                        <div class="col-lg-4 label">
                           <label>Title</label>
                        </div>
                        <div class="col-lg-10 data">
                           <input type="text" placeholder="Enter Title" name="title" value="{{$title}}" >
                             @if($errors->has('title')) <p class="error_mes">{{ $errors->first('title') }}</p> @endif
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
                  <a href="{{url('admin/treatment_heading')}}">Back to Home?</a>
               </div>
            </div>
         </div>

         </form>
      </div>

<style type="text/css">

    .change-section{
            border: 1px solid #44a6b1;
            text-decoration: none;
            padding: 10px;
            color: white;
            background-color: #44a6b1;
            transition: all 0.3s linear;
         }

         .change-section:hover{
            text-decoration: none;
            color: #44a6b1;
            background-color: white;
            transition: all 0.3s linear;
         }
         .remove-section{
            margin-left: 5px;
         }
         .feature-section {
            margin: 40px 0px;
         }
         .feature-sections .data{
            margin-top: 5px;
         }

</style>


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




    $(document).on('click','.add-section',function(){
      
            var BASE_URL = "{{ url('/') }}";

            $.ajax({

             
                  url:BASE_URL+'/admin/add_description',
                  type:'GET',
                  dataType: "json",


                  success: function(response){
                  

                     $('.feature-sections').append('<div class="feature-section"><div class="details_inner"><div class="part"><div class="row"><div class="col-lg-4 label"><label>Service</label></div><div class="col-lg-10 data"><textarea placeholder="Enter description"name="description[]"></textarea>@if($errors->has('description')) <p class="error_mes">{{ $errors->first('description') }}</p> @endif</div></div>   </div></div><a class="add-section change-section">Add more</a><a data-slug="1212" class="remove-section change-section">Remove</a></div>');
                  },

                  error: function(response) {

                     alert("error");
       
                  },        

            });

         
      });




      $(document).on('click','.remove-section',function(){

    var removeThis = $(this).closest(".feature-section");

      var BASE_URL = "{{ url('/') }}";

      $.ajax({


            url:BASE_URL+'/admin/remove_description',
            type:'GET',
            dataType: "json",


            success: function(response){

               //$('.feature-sections').children().last().remove();

               removeThis.remove();

            },


            error: function(response) {

               alert("error");

            },

      });

});


</script>



@endsection
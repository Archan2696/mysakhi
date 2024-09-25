@extends('admin.layout.header')

@section('content')


<style type="text/css">
   .details_image img {
      width: 100px;
   }

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
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.css">
 <div class="head-banner">
         <ul class="breadcrumb">
            <li>
               <a href="{{url('admin/home')}}">Home</a>
            </li>
            <li>
               @if($id==0)
               <a href=""><span>Add Hormone Treatment</span></a>
               @else
               <a href=""><span>Update Hormone Treatment</span></a>
               @endif
            </li>
         </ul>
      </div>
      <div class="page mt-4 hosting-page title1 page-with" style="display: block;">
         <div class="list1">
           @if($id==0)
            <h4 class="mb-4">Add Hormone Treatment</h4>
          @else
            <h4 class="mb-4">Update Hormone Treatment</h4>
            @endif
         </div>
         <form action="{{url('admin/store_add_hormone_treatment_data')}}/{{$id}}" method="post" enctype="multipart/form-data">
            @csrf
         <div class="detail table-responsive">
            <div class="details_main">
               

                 <div class="details_inner row">
                  <div class="part-1 col-3">
                     <div class="col-lg-4 label">
                           <label>Image</label>
                        </div>
                     <div class="details_image">
                        <img src="/uploads/{{$image}}" id="blah1">
                     </div>
                     <div class="details_sub">
                        <input type="file" name="image" onchange="readURL1(this);" >
                           <input type="hidden" name="oldimage" value="{{$image}} "/>
                          @if($errors->has('image')) <p class="error_mes">{{ $errors->first('image') }}</p> @endif
                     </div>  
                  </div>  
               </div> 


               
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



               @if(count($hormone_treatment_list) == 0)
                    <div class="feature-sections">
                    <div class="feature-section">
                        <div class="details_inner">
                            <div class="part">
                                <div class="row">
                                <div class="col-lg-4 label">
                                    <label>List</label>
                                </div>
                                <div class="col-lg-10 data">
                                    <textarea placeholder="Enter List" name="list[]"></textarea>
                                        @if($errors->has('list')) <p class="error_mes">{{ $errors->first('list') }}</p> @endif
                                </div>
                                </div>   
                            </div>
                        </div>
                        <a class="add-section change-section">Add more</a>
                    </div>
                    </div>

                    @else

                    <div class="feature-sections">
                    @foreach($hormone_treatment_list as $key=>$f)
                    <div class="feature-section">
                        <div class="details_inner">
                            <div class="part">
                                <div class="row">
                                <div class="col-lg-4 label">
                                    <label>List</label>
                                </div>
                                <div class="col-lg-10 data">
                                        <textarea  placeholder="Enter List" name="list[]">{{$f->list}}</textarea>
                                        @if($errors->has('list')) <p class="error_mes">{{ $errors->first('list') }}</p> @endif
                                </div>
                                </div>
                            </div>
                        </div>
                        <a class="add-section change-section">Add more</a>

                        @if($key+1 >=2)
                        <a class="remove-section change-section">Remove</a>
                        @endif
                    </div>
                    @endforeach
                    </div>

                @endif



               <div class="uplode-btn" style="text-align: center;">
                  <button>submit</button>
                  <a href="{{url('admin/hormone_treatment')}}">Back to Home?</a>
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


        $(document).on('click','.add-section',function(){
      
            var BASE_URL = "{{ url('/') }}";

            $.ajax({

             
                  url:BASE_URL+'/admin/add_list',
                  type:'GET',
                  dataType: "json",


                  success: function(response){
                  

                     $('.feature-sections').append('<div class="feature-section"><div class="details_inner"><div class="part"><div class="row"><div class="col-lg-4 label"><label>List</label></div><div class="col-lg-10 data"><textarea placeholder="Enter List"name="list[]"></textarea>@if($errors->has('list')) <p class="error_mes">{{ $errors->first('list') }}</p> @endif</div></div>   </div></div><a class="add-section change-section">Add more</a><a data-slug="1212" class="remove-section change-section">Remove</a></div>');
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


            url:BASE_URL+'/admin/remove_list',
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
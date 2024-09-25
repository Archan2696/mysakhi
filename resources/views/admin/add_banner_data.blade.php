@extends('admin.layout.header')

@section('content')


<style type="text/css">
   .details_image img {
      width: 100px;
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
               <a href=""><span>Add Banner</span></a>
               @else
               <a href=""><span>Update Banner</span></a>
               @endif
            </li>
         </ul>
      </div>
      <div class="page mt-4 hosting-page title1 page-with" style="display: block;">
         <div class="list1">
           @if($id==0)
            <h4 class="mb-4">Add Banner</h4>
          @else
            <h4 class="mb-4">Update Banner</h4>
            @endif
         </div>
         <form action="{{url('admin/store_add_banner_data')}}/{{$id}}" method="post" enctype="multipart/form-data">
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
                           <label>Page Title</label>
                        </div>
                        <div class="col-lg-10 data">
                           <input type="text" placeholder="Enter Page Title" name="page_title" value="{{$page_title}}" >
                             @if($errors->has('page_title')) <p class="error_mes">{{ $errors->first('page_title') }}</p> @endif
                        </div>
                     </div>   
                  </div>
               </div>

                <input type="hidden" placeholder="Enter Page Name" name="page_name" value="{{$page_name}}" >

                       
               <div class="uplode-btn" style="text-align: center;">
                  <button>submit</button>
                 <a href="{{url('admin/' . $page_name.'_banner')}}">Back to Home?</a>
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


        function readURL2(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah2')
                        .attr('src', e.target.result)
                        .width(130)
                        .height(130);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        function readURL3(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah3')
                        .attr('src', e.target.result)
                        .width(130)
                        .height(130);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
        function readURL4(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah4')
                        .attr('src', e.target.result)
                        .width(130)
                        .height(130);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }


</script>



@endsection
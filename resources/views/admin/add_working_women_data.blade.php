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
               <a href=""><span>Add Working Women</span></a>
               @else
               <a href=""><span>Update Working Women</span></a>
               @endif
            </li>
         </ul>
      </div>
      <div class="page mt-4 hosting-page title1 page-with" style="display: block;">
         <div class="list1">
            @if($id==0)
            <h4 class="mb-4">Add Working Women</h4>
            @else
            <h4 class="mb-4">Update Working Women</h4>
            @endif
         </div>
         <form action="{{url('admin/store_add_working_women_data')}}/{{$id}}" method="post" enctype="multipart/form-data">
            @csrf
         <div class="detail table-responsive">
            <div class="details_main">

                <div class="details_inner">
                  <div class="part">
                     <div class="row">
                        <div class="col-lg-4 label">
                           <label>Description1</label>
                        </div>
                        <div class="col-lg-10 data">
                             <textarea type="text" name="description1">{{$description1}}</textarea>   
                              @if($errors->has('description1')) <p class="error_mes">{{ $errors->first('description1') }}</p> @endif
                        </div>
                     </div>   
                  </div>
               </div>

                <div class="details_inner">
                  <div class="part">
                     <div class="row">
                        <div class="col-lg-4 label">
                           <label>link_text</label>
                        </div>
                        <div class="col-lg-10 data">
                           <input type="text" placeholder="Enter link_text" name="link_text" value="{{$link_text}}" >
                             @if($errors->has('link_text')) <p class="error_mes">{{ $errors->first('link_text') }}</p> @endif
                        </div>
                     </div>   
                  </div>
               </div>

               <div class="details_inner">
                  <div class="part">
                     <div class="row">
                        <div class="col-lg-4 label">
                           <label>link</label>
                        </div>
                        <div class="col-lg-10 data">
                           <input type="url" placeholder="Enter link" name="link" value="{{$link}}" >
                             @if($errors->has('link')) <p class="error_mes">{{ $errors->first('link') }}</p> @endif
                        </div>
                     </div>   
                  </div>
               </div>

               <div class="details_inner">
                  <div class="part">
                     <div class="row">
                        <div class="col-lg-4 label">
                           <label>Description2</label>
                        </div>
                        <div class="col-lg-10 data">
                             <textarea type="text" name="description2">{{$description2}}</textarea>   
                              @if($errors->has('description2')) <p class="error_mes">{{ $errors->first('description2') }}</p> @endif
                        </div>
                     </div>   
                  </div>
               </div>   

               <div class="uplode-btn" style="text-align: center;">
                  <button>submit</button>
                  <a href="{{url('admin/working_women')}}">Back to Home?</a>
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
@extends('admin.layout.header')

@section('content')

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.css">
 <div class="head-banner">
         <ul class="breadcrumb">
            <li>
               <a href="{{url('admin/home')}}">Home</a>
            </li>
            <li>
               @if($id==0)
               <a href=""><span>Add Social URL</span></a>
               @else
               <a href=""><span>Update Social URL</span></a>
               @endif
            </li>
         </ul>
      </div>
      <div class="page mt-4 hosting-page title1 page-with" style="display: block;">
         <div class="list1">
           @if($id==0)
            <h4 class="mb-4">Add Social URL</h4>
          @else
            <h4 class="mb-4">Update Social URL</h4>
            @endif
         </div>
         <form action="{{url('admin/store_add_social_url_data')}}/{{$id}}" method="post" enctype="multipart/form-data">
         	@csrf
         <div class="detail table-responsive">
            <div class="details_main">

               <div class="details_inner">
                  <div class="part">
                     <div class="row">
                        <div class="col-lg-4 label">
                           <label>Linkedin URL</label>
                        </div>
                        <div class="col-lg-10 data">
                           <input type="text" placeholder="Enter Linkedin URL" name="linkedin_url" value="{{$linkedin_url}}" >
                             @if($errors->has('linkedin_url')) <p class="error_mes">{{ $errors->first('linkedin_url') }}</p> @endif
                        </div>
                     </div>   
                  </div>
               </div>  

               <div class="details_inner">
                  <div class="part">
                     <div class="row">
                        <div class="col-lg-4 label">
                           <label>Facebook URL</label>
                        </div>
                        <div class="col-lg-10 data">
                           <input type="text" placeholder="Enter Facebook URL" name="facebook_url" value="{{$facebook_url}}" >
                             @if($errors->has('facebook_url')) <p class="error_mes">{{ $errors->first('facebook_url') }}</p> @endif
                        </div>
                     </div>   
                  </div>
               </div>   


                <div class="details_inner">
                  <div class="part">
                     <div class="row">
                        <div class="col-lg-4 label">
                           <label>Insta URL</label>
                        </div>
                        <div class="col-lg-10 data">
                           <input type="text" placeholder="Enter Insta URL" name="insta_url" value="{{$insta_url}}" >
                             @if($errors->has('insta_url')) <p class="error_mes">{{ $errors->first('insta_url') }}</p> @endif
                        </div>
                     </div>   
                  </div>
               </div>  

                <div class="details_inner">
                  <div class="part">
                     <div class="row">
                        <div class="col-lg-4 label">
                           <label>Twitter URL</label>
                        </div>
                        <div class="col-lg-10 data">
                           <input type="text" placeholder="Enter Twitter URL" name="twitter_url" value="{{$twitter_url}}" >
                             @if($errors->has('twitter_url')) <p class="error_mes">{{ $errors->first('twitter_url') }}</p> @endif
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
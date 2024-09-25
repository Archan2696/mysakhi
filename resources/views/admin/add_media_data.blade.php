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
               <a href=""><span>Add Media</span></a>
            </li>
         </ul>
      </div>
      <div class="page mt-4 hosting-page title1 page-with" style="display: block;">
         <div class="list1">
            <h4 class="mb-4">Add Media</h4>
         </div>
         <form action="{{url('admin/store_add_media_data')}}/{{$id}}" method="post" enctype="multipart/form-data">
            @csrf
         <div class="detail table-responsive">
            <div class="details_main">

                <div class="details_inner row">
                  <div class="part-1 col-3">
                     <div class="col-lg-4 label">
                        </div>
                     <div class="details_sub">
                         <label for="file">Choose file to upload</label>
                            <input type="file" name="file" id="file" required>
                          @if($errors->has('file')) <p class="error_mes">{{ $errors->first('file') }}</p> @endif
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
               
              @php
                $currentYear = date('Y'); // Get the current year
                $currentYearRange = ($currentYear - ($currentYear % 1)) . '-' . ($currentYear + 1 - ($currentYear % 1));
            @endphp

               <div class="details_inner">
                  <div class="part">
                     <div class="row">
                        <div class="col-lg-4 label">
                           <label>Year</label>
                        </div>
                        <div class="col-lg-10 data">
                            <select name="year" id="year">
                           @foreach ($financial_year as $fy)
                                <option value="{{ $fy->year }}" {{ $fy->year == $currentYearRange ? 'selected' : '' }}>
                                    {{ $fy->year }}
                                </option>
                            @endforeach
                           </select>
                             @if($errors->has('year')) <p class="error_mes">{{ $errors->first('year') }}</p> @endif
                        </div>
                     </div>   
                  </div>
               </div>

               <div class="uplode-btn" style="text-align: center;">
                  <button>submit</button>
                  <a href="{{url('admin/media')}}">Back</a>
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
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });

</script>



@endsection
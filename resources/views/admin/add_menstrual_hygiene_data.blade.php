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
               <a href=""><span>Add Menstrual Hygiene Data</span></a>
               @else
               <a href=""><span>Update Menstrual Hygiene Data</span></a>
               @endif
            </li>
         </ul>
      </div>
      <div class="page mt-4 hosting-page title1 page-with" style="display: block;">
         <div class="list1">
           @if($id==0)
            <h4 class="mb-4">Add Menstrual Hygiene Data</h4>
          @else
            <h4 class="mb-4">Update Menstrual Hygiene Data</h4>
            @endif
         </div>
         <form action="{{url('admin/store_add_menstrual_hygiene_data')}}/{{$id}}" method="post" enctype="multipart/form-data">
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
                           <label>Title1</label>
                        </div>
                        <div class="col-lg-10 data">
                           <input type="text" placeholder="Enter Title1" name="title1" value="{{$title1}}" >
                             @if($errors->has('title1')) <p class="error_mes">{{ $errors->first('title1') }}</p> @endif
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



                <div class="details_inner">
                  <div class="part">
                     <div class="row">
                        <div class="col-lg-4 label">
                           <label>Title2</label>
                        </div>
                        <div class="col-lg-10 data">
                           <input type="text" placeholder="Enter Title2" name="title2" value="{{$title2}}" >
                             @if($errors->has('title2')) <p class="error_mes">{{ $errors->first('title2') }}</p> @endif
                        </div>
                     </div>   
                  </div>
               </div>


                 @if(count($list) == 0)
                    <div class="feature-sections">
                    <div class="feature-section">
                        <div class="details_inner">
                            <div class="part">
                                <div class="row">
                                <div class="col-lg-4 label">
                                    <label>List</label>
                                </div>
                                <div class="col-lg-10 data">
                                    <input type="text" placeholder="Enter List" name="list[]">
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
                    @foreach($list as $key=>$f)
                    <div class="feature-section">

                        <div class="details_inner">
                            <div class="part">
                                <div class="row">
                                <div class="col-lg-4 label">
                                    <label>List</label>
                                </div>
                                <div class="col-lg-10 data">
                                        <input type="text" placeholder="Enter List" name="list[]" value="{{$f->list}}">
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
                  <a href="{{url('admin/menstrual_hygiene')}}">Back</a>
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


           $(document).on('click','.feature-sections .add-section',function(){
      
            $('.feature-sections').append('<div class="feature-section"><div class="details_inner"><div class="part"><div class="row"><div class="col-lg-4 label"><label>List</label></div><div class="col-lg-10 data"><input type="text" placeholder="Enter List" name="list[]">@if($errors->has('list')) <p class="error_mes">{{ $errors->first('list') }}</p> @endif</div></div></div></div><a class="add-section change-section">Add more</a><a class="remove-section change-section">Remove</a></div>');
         
        });




        $(document).on('click','.feature-sections .remove-section',function(){

            var removeThis = $(this).closest(".feature-section");

            //$('.feature-sections').children().last().remove();

            removeThis.remove();

        });


</script>



@endsection
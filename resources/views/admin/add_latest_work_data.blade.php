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
               <a href=""><span>Add Latest Complete Work Data</span></a>
               @else
               <a href=""><span>Update Latest Complete Work Data</span></a>
               @endif
            </li>
         </ul>
      </div>
      <div class="page mt-4 hosting-page title1 page-with" style="display: block;">
         <div class="list1">
           @if($id==0)
            <h4 class="mb-4">Add Latest Complete Work Data</h4>
          @else
            <h4 class="mb-4">Update Latest Complete Work Data</h4>
            @endif
         </div>
         <form action="{{url('admin/store_add_latest_work_data')}}/{{$id}}" method="post" enctype="multipart/form-data">
            @csrf
         <div class="detail table-responsive">
            <div class="details_main">

                <div class="details_inner">
                 <div class="part-1">
                     <div class="col-lg-4 label">
                           <label>Image</label>
                        </div>
                        <div class="col-md-12">
                
                     <div class="d-flex">
                    @foreach($imgdata as $mi)
                    <div class="pe-4 change_visibility_{{$mi->id}}">
                        <img src="/uploads/{{$mi->image}}" width="100" height="100">
                        <!-- <a href="{{url('admin/delete_sub_img')}}/{{$mi->id}}">Delete</a> -->
                        <a class="icon__2" onclick="delete_cs_banner_list({{$mi->id}})"><i class="fas fa-trash-alt"></i></a>
                        <a href="{{url('admin/update_sub_img')}}/{{$mi->id}}">Update</a>
                    </div>
                    @endforeach
                </div>
                
                </div>
                     <div class="details_sub">
                        <input type="file" class="form-control" id="image" name="image[]" multiple>
                           @if ($errors->has('image'))
                               <span class="text-danger">{{ $errors->first('image') }}</span>
                           @endif
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



               <div class="uplode-btn" style="text-align: center;">
                  <button>submit</button>
                  <a href="{{url('admin/latest_work')}}">Back</a>
               </div>
            </div>
         </div>

         </form>
      </div>
     

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

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
      
            $('.feature-sections').append('<div class="feature-section"><div class="details_inner"><div class="part"><div class="row"><div class="col-lg-4 label"><label>Description</label></div><div class="col-lg-10 data"><textarea type="text" placeholder="Enter Description" name="description[]"></textarea> @if($errors->has('description')) <p class="error_mes">{{ $errors->first('description') }}</p> @endif</div></div>   </div></div><a class="add-section change-section">Add more</a><a class="remove-section change-section">Remove</a></div>');
         
        });




    $(document).on('click','.feature-sections .remove-section',function(){

        var removeThis = $(this).closest(".feature-section");

        //$('.feature-sections').children().last().remove();

        removeThis.remove();

    });


                   function delete_cs_banner_list($id){
                
                  swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    buttons:{
                        confirm: {
                            text : 'Yes, delete it!',
                            className : 'btn btn-success'
                        },
                        cancel: {
                            visible: true,
                            className: 'btn btn-danger'
                        }
                    }
                }).then((Delete) => {
                    if (Delete) {

                               var BASE_URL = "{{ url('/') }}";
            
                                var id = $id;
            
                                      $.ajax({
            
                                        
                                            url:BASE_URL+'/admin/delete_sub_img/'+id,
                                            type:'GET',
                                            dataType: "json",

            
                                            success: function(response){
            
                                                  $('.change_visibility_'+id).hide();
                     
                                                 },
             
                                        error: function(response) {
            
                                                 alert('error');
                      
                                            },        
                      
                                       });

                      } else {
                       swal.close();
                     }
              });

           }
           
           
           
           
           
           function change_visibility($id){
                
                  swal({
                    title: 'Are you sure?',
                    text: "Change the Visibility!",
                    type: 'warning',
                    buttons:{
                        confirm: {
                            text : 'Yes, change it!',
                            className : 'btn btn-success'
                        },
                        cancel: {
                            visible: true,
                            className: 'btn btn-danger'
                        }
                    }
                }).then((Delete) => {
                    if (Delete) {

                               var BASE_URL = "{{ url('/') }}";
            
                                var id = $id;
            
                                      $.ajax({
            
                                        
                                            url:BASE_URL+'/admin/change_status_testi/'+id,
                                            type:'GET',
                                            dataType: "json",

            
                                            success: function(response){

                                                if(response.success == 1){


                                                
                                                     $('.change_visibility_' +id).find('.btn-success').hide();

                                                     $('.change_visibility_' +id).find('.btn-danger').show();

                                                   }
                                                   else{

                                                      $('.change_visibility_'+id).find('.btn-danger').hide();

                                                      $('.change_visibility_'+id).find('.btn-success').show();
                                                   }
                     
                                                 },
             
                                        error: function(response) {

                                          
                                  
                                            },        
                      
                                       });

                      } else {
                       swal.close();
                     }
              });

           }


</script>



@endsection
@extends('admin.layout.header')

@section('content')

<style type="text/css">
    
    .text .row{
        margin-right: 0!important;
    }

</style>
  <div class="head-banner">
         <ul class="breadcrumb">
            <li>
               <a href="{{url('admin/home')}}">Home</a>
            </li>
            <li>
               <a href=""><span>CTA Details</span></a>
            </li>
         </ul>
      </div>


      <div class="page mt-4 hosting-page title1" style="display: block;">
         <div class="list1">
            <h4 class="mb-0">CTA Description</h4>
         
         </div>
         <div class="sear-list">
            <div class="row">
               <div class="col-lg-12">
                
               </div>
            </div>
         </div>
         <div class="pro-table table-responsive">
            <table class="table table-bordered table-striped text">

                @foreach($cta_description as $id)

                <tr>
                    <th>Images</th>
                </tr>
                <tr>
                    <th class="text">
                        <div class="row">
                            <div class="col-2">
                                <img src="/uploads/{{$id->image}}" width="150" height="150">
                            </div>
                        </div>
                    </th>
                </tr>

                <tr>
                    <th>Title1</th>
                </tr>
                <tr>
                    <th class="text">{{$id->title1}}</th>
                </tr>

                <tr>
                    <th>Title2</th>
                </tr>
                <tr>
                    <th class="text">{{$id->title2}}</th>
                </tr>

                <tr>
                    <th><button class="clo btn0"><a href="{{url('admin/add_cta_description_data')}}/{{$id->id}}">update</a></button></th>
                </tr>

                 @endforeach
                    
              
            </table>
            
         </div>
      </div>

   
      <style type="text/css">
         .set_width{
            height: 200px;
            width: 200px;
            object-fit: cover;
         }

        .service-img1 {
            width: 100px;
            padding: 0px;
            border: 1px solid #294992;
            background: #294992;
            margin: auto;
        }
      </style>

      
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      
          
      
      <script type="text/javascript">


        $(function() {
                 setTimeout(function() { $("#hideDiv").fadeOut(3000); }, 3000)

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
            
                                        
                                            url:BASE_URL+'/admin/delete_cta/'+id,
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
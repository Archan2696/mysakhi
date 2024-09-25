@extends('admin.layout.header')

@section('content')

        <div class="head-banner">
             <ul class="breadcrumb">
                <li>
                   <a href="{{url('admin/home')}}">Home</a>
                </li>
                <li>
                   <a href=""><span>Testimonial</span></a>
                </li>
             </ul>
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
        
         .text .row{
        margin-right: 0!important;
        }
        .overflow_scroll{
            height: 170px;
            overflow-x: hidden;
            overflow-y: scroll;
        }
        .overflow_scroll::-webkit-scrollbar {
            width: 5px;
            height: 5px;
            border-radius: 10px;
        }
        .overflow_scroll::-webkit-scrollbar-track {
            background: #f1f1f1; 
            border-radius: 10px;
        }
        .overflow_scroll::-webkit-scrollbar-thumb {
            background: #fe434c;
            border-radius: 10px;
        }
    
        .overflow_scroll::-webkit-scrollbar-thumb:hover {
            background: #fe434c; 
        }
      </style>
      
      
      <div class="page mt-4 hosting-page title1" style="display: block;">
         <div class="list1">
            <h4 class="mb-0">Testimonial Description</h4>
         
         </div>
         
         <div class="sear-list">
            <div class="row">
               <div class="col-lg-12">
                
               </div>
            </div>
         </div>
         <div class="pro-table table-responsive">
            <table class="table table-bordered table-striped text">

                @foreach($testimonial_heading as $id)

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
                    <th><button class="clo btn0"><a href="{{url('admin/update_testimonial_heading_data')}}/{{$id->id}}">update</a></button></th>
                </tr>

                 @endforeach
                    
              
            </table>
            
         </div>
      </div>



    <div class="page mt-4 hosting-page title1" style="display: block;">
         <div class="list1">
            <h4 class="mb-0">Testimonial</h4>

            
            <div class="btn1-main">
                <!-- <button class="btn1 delete-btn1">all delete</button> -->
                <button class="btn1"><a href="{{url('admin/add_testimonial_data')}}/0" style="color:white;">ADD</a></button>
            </div>
         </div>
         <div class="sear-list">
            <div class="row">
               <div class="col-lg-12">
                  <div class="sear-main">
                    <!--  <label><input type="search" class="form-control " placeholder="Find..."></label> -->
                  </div>
               </div>
            </div>
         </div>
         
         <div class="pro-table table-responsive">
            <table class="table table-bordered table-striped">
               <thead>
                  <tr>
                    <!-- <th><input type="checkbox" name="" id="chkcheckAll"/></th> -->
                     <th>Sr.No</th>
                     <th>Image</th>
                     <th>Name1</th>
                     <th>Name2</th>
                     <th>Opinion1</th>
                     <th>Opinion2</th>
                     <th>Description</th>
                     <th>Action</th>
                  </tr>
               </thead>

               @foreach($testimonial_data as $key=>$ad)
                 <tbody class="change_visibility_{{$ad->id}}">
                    <tr>
                        <!-- <td><input type="checkbox" name="ids" class="checkBoxClass" value="{{$ad->id}}"/></td> -->
                        <td>{{$key+1}}</td>
                        
                        <td>
                            <img src="/uploads/{{$ad->image}}" width="60" height="60">
                        </td>
                       
                        <td>{{$ad->name1}}</td>

                        <td>{{$ad->name2}}</td>

                        <td>{{$ad->opinion1}}</td>

                        <td>{{$ad->opinion2}}</td>

                        <td>
                            <ul class="overflow_scroll">
                            @foreach($testimonial_description as $key=>$sd)
                                @if($ad->id==$sd->testimonial_id)
                                    <li>{!!$sd->description!!}</li>
                                @endif
                            @endforeach
                            </ul>
                        </td>
                                                                     
                        <td>
                          <a class="icon__1" href="{{url('admin/add_testimonial_data')}}/{{$ad->id}}"><i class="fas fa-edit"></i></a>
                           <a class="icon__2" onclick="delete_cs_banner_list({{$ad->id}})"><i class="fas fa-trash-alt"></i></a>

                        </td>
                        
                    </tr>
                 </tbody>
               @endforeach
              
            </table>
         
         </div>
      </div>
      
      
      
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
            
                                        
                                            url:BASE_URL+'/admin/delete_testimonial/'+id,
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
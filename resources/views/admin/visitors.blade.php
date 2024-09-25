@extends('admin.layout.header')

@section('content')

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/searchpanes/2.2.0/css/searchPanes.dataTables.min.css" rel="stylesheet">

  <div class="head-banner">
         <ul class="breadcrumb">
            <li>
               <a href="{{url('admin/home')}}">Home</a>
            </li>
            <li>
               <a href=""><span>Visitors Data</span></a>
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
      </style>

      <div class="page mt-4 hosting-page title1" style="display: block;">
         <div class="list1">
            <h4 class="mb-0">Visitors Data</h4>

            
            <div class="btn1-main">
                <!-- <button class="btn1 delete-btn1">all delete</button> -->
                <!-- <button class="btn1"><a href="{{url('admin/add_expert_faq_data')}}/0" style="color:white;">ADD</a></button> -->
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
            <table class="table table-bordered table-striped" id="datatable">
               <thead>
                  <tr>
                    <!-- <th><input type="checkbox" name="" id="chkcheckAll"/></th> -->
                     <th>Sr.No</th>
                     <th>Ip Address</th>
                     <th>No. of Visits</th>
                     <th>First Visit</th>
                     <th>Last Visit</th>

                  </tr>
               </thead>

                <tbody>
                @foreach($visitors as $key=>$ad)
                    <tr class="change_visibility_{{$ad->id}}">
                        <!-- <td><input type="checkbox" name="ids" class="checkBoxClass" value="{{$ad->id}}"/></td> -->
                        <td>{{$key+1}}</td>
                       <td>{{$ad->ip_address}}</td>
                       <td>{{$ad->visits}}</td>
                       <td>{{$ad->created_at}}</td>
                       <td>{{$ad->updated_at}}</td>
                    </tr>
                @endforeach
                </tbody>



              
            </table>

         
         </div>
      </div>
      
      
      
         <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      

       <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/searchpanes/2.2.0/js/dataTables.searchPanes.min.js"></script>  
      
      <script type="text/javascript">
      
      
        $('#datatable').DataTable({
           ordering: false,
        });


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
            
                                        
                                            url:BASE_URL+'/admin/delete_forum_data/'+id,
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
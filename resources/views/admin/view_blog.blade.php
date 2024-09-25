@extends('admin.layout.header')

@section('content')

<style type="text/css">
   .arr_d{
      display: flex;
      flex-wrap: wrap;
   }
   .arr_d1{
      width: 50%;
   }
   .arr_d tr th{
      display: block;
   }
   .table-title{
      font-size: 20px;
      color: #6b6b7a;
   }
   button.clo.btn0 {
       display: block;
       margin-left: auto;
       margin-top: 2%;
       margin-bottom: 2%;
   }
   .btn0 a{
      padding: 10px 12px!important;
   }
   .button-new{
      margin-right: auto;
      margin-left: 5px!important;
   }
</style>
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
  <div class="head-banner">
         <ul class="breadcrumb">
            <li>
               <a href="{{url('admin/home')}}">Home</a>
            </li>
            <li>
               <a href=""><span>Blog Detail</span></a>
            </li>
         </ul>
      </div>

      <div class="page mt-4 hosting-page title1" style="display: block;">
         <div class="list1">
            <h4 class="mb-0">Blog  detail</h4>
         
         </div>
         <div class="sear-list">
            <div class="row">
               <div class="col-lg-12">
                
               </div>
            </div>
         </div>
         <div class="pro-table blog-detail">
            <table class="table table-bordered table-striped text">
               <tbody class="arr_d">

            	@foreach($blog as $b)
                        
                        <tr class="w-100">
                          <th>Image</th>
                          <th class="text"><img src="/uploads/{{$b->image}}" width="400" height="300"></th>
                        </tr>

                        <tr class="w-100">
                           <th>Title</th>
                           <th class="text">{{$b->title}}</th>
                        </tr>


                        <tr class="w-100">
                          <th>Author</th>
                          <th class="text">{{$b->author}}</th>
                        </tr>
                        
                        <tr class="w-100">
                          <th>Date</th>
                          <th class="text">{{$b->date}}</th>
                        </tr>
                        
                        <tr class="w-100">
                           <th>Description</th>
                           <th class="text">{{$b->description}}</th>
                        </tr>
                        
                        <tr class="w-100">
                           <th>Detail Description</th>
                           <th class="text">{!!$b->detail_description!!}</th>
                        </tr>

                 @endforeach

               </tbody>
              
            </table>
            
         </div>
      </div>

      <div class="d-flex mx-auto">
      
      <button class="clo btn0"><a href="{{url('/admin/add_blog_data')}}/{{$id}}">Update Details</a></button>

      <button class="clo btn0 button-new"><a href="{{url('/admin/blog')}}">Back to Details</a></button>
      </div>


<style type="text/css">
   
   .features-title h4 {
       font-family: 'Playfair Display';
       font-weight: 600;
       font-size: 40px;
       line-height: 52px;
       color: #00155F;
       text-align: center;
       padding-bottom: 18px;
   }
   .Features-details img {
       width: 48px;
       height: 48px;
       margin-right: 13px;
   }
   .Features-details {
       background: #FFFFFF;
       box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.16);
       border-radius: 6.32754px;
       display: flex;
       padding: 20px;
       align-items: center;
   }
   .Features-details p {
       font-family: 'Open Sans';
       font-weight: 400;
       font-size: 16px;
       line-height: 26px;
       color: #565656;
       margin: 0;
   }
   .service-image1 {
       margin: 0 0 0 auto;
   }
   .Features-main .col-lg-3 {
       display: flex;
   }

    
    
    /* -----blog details----- */

    .blogdetails-wrapper p {
        font-size: 18px;
    }
    
    .blogdetails-wrapper h1 {
        color: var(--bg-secondary-color);
    }
    
    .recentblog-image {
        position: relative;
        display: flex;
        height: auto;
        gap: 0px 12px;
    }
    
    .recent-date i {
        color: var(--primary-color);
    }
    
    .recentblog-image img {
        width: 30%;
        height: auto;
        display: flex;
    }
    
    .username-wrap {
        display: flex;
        gap: 6px;
        align-items: center;
    }
    
    .username-wrap i {
        color: var(--primary-color);
    }
    
    
    .blog-detail h3 {
        font-size: 1.75rem;
    }


</style>
   
       <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script type="text/javascript">


        $(function() {
                 setTimeout(function() { $("#hideDiv").fadeOut(3000); }, 3000)

             });


      </script> 


@endsection
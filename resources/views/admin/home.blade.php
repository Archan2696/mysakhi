@extends('admin.layout.header')

@section('content')


 <div class="head-banner">
          <ul class="breadcrumb">
              <li>
                  <a href="">Home</a>
              </li>
          </ul>
      </div>
      <div class="dash_card">
         <div class="row">
             <div class="col-lg-3 col-md-6 col-6">
                
              
               
               <div class="small-box bg-success">
                   
                   <a href="{{url('/admin/all_users')}}">
               
                  <div class="inner">
                      
                     <h3>All Users</h3>
                     @php $userCount=userCount(); @endphp
                     <p><h5>Total : {{$userCount}}</h5></p>
                  </div>
                
                  <div class="icon">
                   <i class="fa-solid fa-book"></i>
                  </div>
                  <a class="small-box-footer"></a>
                  </a>
               </div>
              
            </div>
            
            
            
            
            
            
            <div class="col-lg-3 col-md-6 col-6">
               <div class="small-box bg-info">
                   
                    <a href="{{url('/admin/visitors')}}">
                  <div class="icon">
                   <i class="fa-solid fa-book"></i>

                  </div>
                  <div class="inner">
                      <h3>All Visitors</h3>
                      @php $visitorsCount=visitorsCount(); @endphp
                     <p><h6>Total : {{$visitorsCount}}</h6></p>
                  </div>
                  <a href="#" class="small-box-footer"></a>
                  
                   </a>
               </div>
            </div>
            <!-- <div class="col-lg-3 col-md-6 col-6">
               <div class="small-box bg-warning">
                     <a href="{{url('admin/notes')}}">
                  <div class="inner">
                      <h3>Notes</h3>
                     <p><h6>Details</h6></p>
                  </div>
                  <div class="icon">
                     <i class="fas fa-box-full"></i>
                  </div>
                  <a class="small-box-footer"></a>
                  </a>
               </div>
            </div>
           
            
             <div class="col-lg-3 col-md-6 col-6">
               <div class="small-box bg-danger">
                     <a href="{{url('/admin/videos')}}">
                  <div class="inner">
                    <h3>Video</h3>
                     <p><h6>Assign</h6></p>
                  </div>
                  <div class="icon">
                     <i class="far fa-chart-bar"></i>
                  </div>
                  <a href="#" class="small-box-footer"></a>
                  </a>
               </div>
            </div>
             <div class="col-lg-3 col-md-6 col-6">
               <div class="small-box bg-secondary">
                     <a href="{{url('admin/member_list')}}">
                  <div class="inner">
                    <h3>Members</h3>
                     <p><h6>List</h6></p>
                  </div>
                  <div class="icon">
                     <i class="far fa-chart-bar"></i>
                  </div>
                  <a href="#" class="small-box-footer"></a>
                  </a>
               </div>
            </div>

            <div class="col-lg-3 col-md-6 col-6">
               <div class="small-box" style="background-color:#c57d7df2!important;">
                     <a href="{{url('admin/full_course_fee')}}">
                  <div class="inner">
                    <h3>Full Payment</h3>
                     <p><h6>History</h6></p>
                  </div>
                  <div class="icon">
                     <i class="far fa-chart-bar"></i>
                  </div>
                  <a href="#" class="small-box-footer"></a>
                  </a>
               </div>
            </div>

            <div class="col-lg-3 col-md-6 col-6">
               <div class="small-box" style="background-color:#a695dd!important;">
                     <a href="{{url('admin/half_course_fee')}}">
                  <div class="inner">
                    <h3>Half Payment</h3>
                     <p><h6>History</h6></p>
                  </div>
                  <div class="icon">
                     <i class="far fa-chart-bar"></i>
                  </div>
                  <a href="#" class="small-box-footer"></a>
                  </a>
               </div>
            </div> -->

            <!-- <div class="col-lg-3 col-md-6 col-6">
               <div class="small-box" style="background-color:#b42020!important;">
                     <a href="{{url('admin/order_list')}}/0">
                  <div class="inner">
                    <h3>Order List</h3>
                     <p><h6>List</h6></p>
                  </div>
                  <div class="icon">
                     <i class="far fa-chart-bar"></i>
                  </div>
                  <a href="#" class="small-box-footer"></a>
                  </a>
               </div>
            </div> -->
         </div>
      </div>
      
    <!--  <div class="sales">
         <div class="box-header">
            <h4><i class="fas fa-chart-area"></i>Your sales & orders</h4>
         </div>
         <div class="box-details">
            <div class="row">
               <div class="col-lg-6">
                     <div class="sales_main">
                        <div class="sales_detail">
                           <h5>Today's Sales</h5>
                           <h3>0</h3>
                        </div>
                        <div class="sales-icon">
                           <i class="fas fa-shopping-cart"></i>
                        </div>
                     </div>
               </div>
               <div class="col-lg-6">
                    <div class="sales_main">
                        <div class="sales_detail">
                           <h5>Today's Order</h5>
                           <h3>15</h3>
                        </div>
                        <div class="sales-icon">
                           <i class="fas fa-tag"></i>
                        </div>
                    </div>
               </div>
            </div>
         </div>
      </div>-->
    <!--  <div class="sales">
         <div class="box-header">
            <h4><i class="fas fa-chart-pie"></i>Your Income</h4>
         </div>
         <div class="box_main">
            <div class="d_first">
               <h3><i class="fa-solid fa-indian-rupee-sign"></i>0.00</h3>
               <p>WEEK</p>
            </div>
            <div class="d_first">
               <h3><i class="fa-solid fa-indian-rupee-sign"></i>0.01</h3>
               <p>MONTH</p>
            </div>
            <div class="d_first">
               <h3><i class="fa-solid fa-indian-rupee-sign"></i>0.20</h3>
               <p>YEAR</p>
            </div>
         </div>
         <div class="box-button">
            <div class="b-btn">
               <button>Remaining Amount - <i class="fa-solid fa-dollar-sign"></i>1,00,000.00</button>
            </div>
            <div class="b-btn1">
               <button>Total Payout - <i class="fa-solid fa-indian-rupee-sign"></i>1.00</button>
            </div>
         </div>
      </div>-->
     

  




  

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
    
    

</script>

@endsection
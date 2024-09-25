@extends('layout.header_footer')
@section('content')
<style>
    
    .results{
        gap: 15px 0;
    }
    .results .col-lg-6.col-md-6.col-sm-12.col-12{
        display:flex;
    }
    
</style>  
    @foreach($blog_banner as $bb)
    <div class="inner-banner" style="background-image:url('/uploads/{{$bb->image}}');">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-banner-title">
                        <h2>{{$bb->page_title}}</h2>
                    </div>
                    <div class="breadcrumb">
                        <a href="/" class="me-2 home">Home</a>
                        <i class="fa-solid fa-angles-right"></i>
                        <a class="ms-2">{{$bb->page_title}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach


    <section class="blog-main-Wrapper">
        <div class="my-lg-5 my-md-5 my-sm-4  my-3 ">

            <div class="container">
                <div class="row">
                    <!-- left -->
                    <div class="col-lg-4 col-12">
                        <div class="my-lg-0 my-md-4  my-3">

                            <div class="filter_form">
                                <form id="filterForm">
                                    {{csrf_field()}}
                                    <input autocomplete="off" type="text" name="search" id="input" class="text-field"
                                        placeholder="Search here...">

                                    <button id="send-search" class="search-btn"><i
                                            class="fa-solid fa-magnifying-glass"></i></button>
                                </form>
                            </div>
                            <div class="recentpostwrapper">
                                <div class="recentpostcontent">
                                    <h3>Recent Posts</h3>
                                    @foreach($recent_blog as $bg)
                                    <hr>
                                    <div class="recentblog-image">
                                       <div class="recentblog-left">
                                           <a href="#"><img src="/uploads/{{$bg->image}}" alt="image"></a>
                                       </div>
                                        
                                       
                                        <div class="recentblog-right">
                                           <a href="{{url('/blog-detail')}}/{{$bg->id}}">
                                             <p>{{$bg->title}}</p>
                                           </a>
                                            <div class="recent-date">
                                                <i class="fa-regular fa-calendar"></i>
                                                <label>{{$bg->date}}
                                                
                                                </label>
                                            </div>
                                            
                                        </div>
                                       
                                    </div>
                                    @endforeach
                                    
                                  
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- right -->
                    <div class="col-lg-8 col-md-12">
                        <div class="blog-Wrapper ">

                            <div class="row results">
                                <!-- 1 -->
                                
                                @foreach($blog as $b)
                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="blog ">
                                        <div class="imagewrapper">
                                            <a href="{{url('/blog-detail')}}/{{$b->id}}"><img src="/uploads/{{$b->image}}" alt="image"></a>
                                            <div class="dateWrap">
                                                <i class="fa-regular fa-calendar"></i>
                                                <label>{{$b->date}}</label>
                                            </div>
                                        </div>

                                        <div class="content">
                                            <div>
                                                <p class="mb-0 username-wrap "><i class="fa-solid fa-user"></i>
                                                    <span>{{$b->author}}</span> </p>
                                            </div>
                                            <div class="title">
                                                <h3><a href="{{url('/blog-detail')}}/{{$b->id}}">{{$b->title}}</a> </h3>
                                            </div>
                                            <div class="para">
                                                <p>{{$b->description}}</p>
                                            </div>

                                            <div>
                                                <button><a href="{{url('/blog-detail')}}/{{$b->id}}" target="_blank">Know more <i
                                                            class="fa-solid fa-arrow-right-long"></i></a> </button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                @endforeach
                                <div class="expert-pagination">
                                        {{$blog->links('pagination.pagination')}}
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

           
            </div>

        </div>
    </section>


    
    @foreach($cta_description as $cd)
    <section class="cta_details" style="background-image:url('/uploads/{{$cd->image}}');">
        <div class="cta_inner_details position-relative">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="cta_contents">
                            <div class="section-heading mb-0">
                                <h2 class="mb-4">{{$cd->title1}}</h2>
                                <p class="mb-4">{{$cd->title2}}</p>
                                <div class="cta-button">
                                    <button class="button">
                                        <a href="#">Contact Us</a>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endforeach
    
    
    
    
    
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">


    $("#input").keyup(function(){
        getProperties();
    });
    
    $('#send-search').click(function(){
        getProperties();
    });
    
    function getProperties(page=1){
        var BASE_URL = "{{ url('/') }}";
       
        $.ajax({
        
            url:BASE_URL+'/load-blog',
            type:'POST',
            data:$("#filterForm").serialize()+'&page='+page,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response){
              $(".results").html(response);
            },
            error: function(response) {
            
            },        
        });
    }
    
    $(document).on('click', '.pagination .page-item .clickable', function(event){
            event.preventDefault(); 
            var page = $(this).attr('href').split('page=')[1];
            getProperties(page)
;
         });
    
</script>

@endsection
@extends('layout.header_footer')
@section('content')
    
    @foreach($blog_detail_banner as $bb)
    <div class="inner-banner" style="background-image:url('/uploads/{{$bb->image}}');">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-banner-title">
                        <h2>{{$bb->page_title}}</h2>
                    </div>
                    <div class="breadcrumb">
                        <a href="#" class="me-2 home">Home</a>
                        <i class="fa-solid fa-angles-right"></i>
                        <a class="ms-2">{{$bb->page_title}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    
    
    @foreach($blog as $b)
    <div class="blogdetails-wrapper">
        <div class="container">
            <div class="row">

                <div class="col-lg-8">

                    <div class=" my-lg-5 my-md-5 my-sm-5 my-3 ">
                        <div>
                            <div class="row">
                                <div>

                                    <div>
                                        <a href="#">
                                        <img src="/uploads/{{$b->image}}" alt="image">
                                        </a>
                                    </div>

                                    <div class="d-flex align-items-center mt-2">

                                        <div class="recent-date">
                                            <i class="fa-regular fa-calendar"></i>
                                            <label>{{$b->date}}</label>
                                        </div>
                                        <div class="ps-3">
                                            <p class="mb-0 username-wrap "><i class="fa-solid fa-user"></i> <span>{{$b->author}}</span> </p>
                                        </div>
                                    </div>


                                    <div class="mt-3">

                                        <h1>{{$b->title}}</h1>
                                        <p>{{$b->description}}</p>
                                    </div>
                                </div>

                            </div>


                        </div>
                        {!!$b->detail_description!!}

                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="my-lg-5 my-md-5 my-sm-5 my-3 recent-box">
                        <div class="blog-main-Wrapper">


                            <div class="filter_form">
                                <form>
                                    <input autocomplete="off" type="text" name="input" id="input" class="text-field"
                                        placeholder="Search here..." fdprocessedid="xinase" style="display: none;">

                                    <button type="submit" class="search-btn" fdprocessedid="wef6uh"><i
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
                                            <a href="#">
                                                <img src="/uploads/{{$bg->image}}" alt="image">
                                            </a>
                                        </div>
                                        
                                        <div class="recent-info recentblog-right">
                                            <a href="{{url('/blog-detail')}}/{{$bg->id}}">
                                             <p>{{$bg->title}}</p>
                                           </a>
                                            <div class="recent-date">
                                                <i class="fa-regular fa-calendar"></i>
                                                <label>{{$bg->date}}</label>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @endforeach


    <section class="cta_details">
        <div class="cta_inner_details position-relative">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="cta_contents">
                            <div class="section-heading mb-0">
                                <h2 class="mb-4">Claim Your Free Menopause Consultation Today!</h2>
                                <p class="mb-4">Discover products, support, and expert guidance tailored to help you
                                    navigate menopause with confidence and vitality.</p>
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


@endsection
@extends('layout.header_footer')
@section('content')

    @foreach($banner as $b)
    <div class="inner-banner" style="background-image:url(/uploads/{{$b->image}})">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-banner-title">
                        <h2>{{$b->page_title}}</h2>
                    </div>
                    <div class="breadcrumb">
                        <a href="#" class="me-2 home">Home</a>
                        <i class="fa-solid fa-angles-right"></i>
                        <a class="ms-2">{{$b->page_title}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach


    <section class="working_women">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-12 ">
                    @foreach($working_women_description as $wwd)
                    <div class="section-heading">
                        <!-- <h5>Menopause & Working Women</h5> -->
                        <h2>{{$wwd->title}}</h2>
                        <p>{{$wwd->description}}</p>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5 position-relative">
                    <div class="working_women_img">
                        @foreach($working_women_description as $wwd)
                        <img src="/uploads/{{$wwd->image}}">
                        @endforeach
                    </div>
                    <!-- <div class="working_women_shape1">
                        <img src="../image/mr/5.png">
                    </div> -->
                </div>
                <div class="col-lg-7">
                    <div class="working_women_list">
                        <ul>
                            @foreach($working_women as $ww)
                            <li>
                                <i class="fa-solid fa-check"></i>{{$ww->description1}} <a href="{{$ww->link}}">{{$ww->link_text}}</a> {{$ww->description2}}
                            </li>
                            @endforeach
                            <!--<li>-->
                            <!--    <i class="fa-solid fa-check"></i><a href="#">Online Consultations</a> with healthcare professionals can help rural women who may struggle to travel long distances for appointments.-->
                            <!--</li>-->
                            <!--<li>-->
                            <!--    <i class="fa-solid fa-check"></i>Destigmatizing <a href="#">mental health</a> for rural women can help with conditions like depression and anxiety during menopause.-->
                            <!--</li>-->
                            <!--<li>-->
                            <!--    <i class="fa-solid fa-check"></i>Providing access to <a href="#">cooling fans or personal desk fans</a> for hot flashes-->
                            <!--</li>-->
                            <!--<li>-->
                            <!--    <i class="fa-solid fa-check"></i>Offering <a href="#">mindfulness and stress management workshops</a> to help with mood swings-->
                            <!--</li>-->
                            <!--<li>-->
                            <!--    <i class="fa-solid fa-check"></i>Creating designated quiet spaces for employees to rest or meditate-->
                            <!--</li>-->
                            <!--<li>-->
                            <!--    <i class="fa-solid fa-check"></i>Introducing <a href="#">ergonomic chairs or standing desks</a> to alleviate physical discomfort.-->
                            <!--</li>-->
                            <!--<li>-->
                            <!--    <i class="fa-solid fa-check"></i>Hosting <a href="#">educational sessions</a> on menopause and its effects on the body-->
                            <!--</li>-->
                            <!--<li>-->
                            <!--    <i class="fa-solid fa-check"></i>Encouraging open communication between employees and managers about their needs-->
                            <!--</li>-->
                            <!--<li>-->
                            <!--    <i class="fa-solid fa-check"></i>Organizing group <a href="#">exercise classes or yoga sessions</a> to promote physical well-being-->
                            <!--</li>-->
                            <!--<li>-->
                            <!--    <i class="fa-solid fa-check"></i>Establishing a <a href="#">support group</a> for employees going through menopause to share experiences and advice-->
                            <!--</li>-->
                        </ul>
                    </div>
                </div>
                
            </div>
        </div>
    </section>

    
      @foreach($cta_description as $cd)
    <section class="cta_details" style="background-image: url('/uploads/{{$cd->image}}');">
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
                                        <a href="{{url('/contact')}}">Contact Us</a>
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


@endsection
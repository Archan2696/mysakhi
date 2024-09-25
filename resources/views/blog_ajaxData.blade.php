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
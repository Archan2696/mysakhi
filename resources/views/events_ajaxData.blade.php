 <div class="event_detail_box">
                        @foreach($interactive_sessions as $is)
                        <div class="event-box">
                            <div class="event-image">
                                
                                @if($is->full_video =='')
                                <a href=""><img src="uploads/{{$is->image}}" alt="event-2"></a>
                                @else
                                <a href="">{!!$is->full_video!!}
                                </a>
                                @endif
                                
                                @if($is->full_video =='')
                                <div class="seat">
                                    <i class="fa-solid fa-couch"></i><span>{{$is->seat}} seat</span>
                                </div>
                                @endif
                            </div>
                            <div class="event-info">
                                <div class="event-time">
                                    <p><i class="fa-regular fa-calendar"></i>
                                        {{ \Carbon\Carbon::parse($is->date)->format('d F, Y') }}</p>
                                    <!--<p><i class="fa-regular fa-calendar"></i>-->
                                    <!--    {{$is->date}}</p>-->
                                    <span>
                                        <i class="fa-regular fa-clock"></i>
                                        {{$is->time}}</span>
                                </div>
                                <h3> <a href=""> {{$is->name}} </a></h3>
                                
                                <h5 class="topic">
                                    <span>topic</span>:<strong>{{$is->topic}}</strong>
                                </h5>

                                
                                <p class="event-para">
                                    Description: {!!$is->description!!}
                                </p>
                                
                                    @php $currentDate=\Carbon\Carbon::now()->toDateString(); @endphp
                                    @if($currentDate > $is->date)
                                    <button class="button event_button" >
                                        <a href="{{$is->watch_now}}" target="_blank">Watch Now</a>
                                    </button>
                                    @else
                                    <button class="button" onclick="get_event_fixdata({{$is->id}})">
                                        <a href="#" target="_blank" data-bs-toggle="modal" data-bs-target="#event-popup">Register</a>
                                    </button>
                                    @endif
                                
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="expert-pagination">
                                            {{$interactive_sessions->links('pagination.pagination')}}
                    </div>
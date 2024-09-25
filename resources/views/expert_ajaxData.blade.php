<div class="row mt-5">
    			<div class="expert_list_info">
    			    @foreach($expert as $e)
    				<div class="expert_list_details">
    					<div class="expert_list_img">
    						<a href="#">
                                <img src="uploads/{{$e->image}}" alt="expert">
                            </a>
    					</div>
    					<div class="expert_list_content">
    						
    						<h4>
                                <a href="#">{{$e->name}}</a>
                            </h4>
                             <div class="expert-desc">
                                <p>
                                    {!!$e->description!!}
                                </p>
                            </div>
                            @php $expertise=experties_data($e->id); @endphp
                             <p class="expert-Expertise" ><span>Expertise:</span> @foreach($expertise as $ex) {{$ex}}, @endforeach</p>
                            
                            <div class="expert-loc">
                                <i class="fa-solid fa-location-dot"></i>
                                <span>{{$e->city}},{{$e->state}}</span>
                            </div>
                           
                            <div class="expert-contact" >
                                <i class="fa-solid fa-phone"></i>
                                <span>{{$e->contact}}</span>
                            </div>
                            
                            <div class="expert-book-btn">
                                <button class="button" onclick="get_expert_fixdata({{$e->id}})">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#expert-popup">Connect</a>
                                </button>
                            </div>
                        </div>
    				</div>
    				@endforeach
    				
    				
    			</div>
    		</div>
    		<div class="expert-pagination">
                {{ $expert->links('pagination.pagination') }}
            </div>
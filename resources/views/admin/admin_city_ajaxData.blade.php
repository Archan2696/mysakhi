<select id="city" name="city">
    <option value="">select the city</option>
    @foreach($city as $c)
    @if($c->city_name==$city_data)
     <option value="{{$c->city_name}}" selected>{{$c->city_name}}</option>
    @else
     <option value="{{$c->city_name}}">{{$c->city_name}}</option>
    @endif
    @endforeach
</select>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">



    $("#input").keyup(function(){
        getProperties();
    });
    
    $("#submit").click(function(){
        getProperties();
    });
    
    $('#expertise').on('change', function() {
        getProperties();
    });
    
    $('#state').on('change', function() {
        getProperties();
        getCities();
    });
    
    $('#city').on('change', function() {
        getProperties();
    });
    
    function getCities(page=1){
        var BASE_URL = "{{ url('/') }}";
       
        $.ajax({
        
            url:BASE_URL+'/admin/admin_loadCity',
            type:'POST',
            data:$("#filterForm").serialize()+'&page='+page,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response){
              $(".cities_result").html(response);
            },
            error: function(response) {
            
            },        
        });
    }
    
    function getProperties(page=1){
        var BASE_URL = "{{ url('/') }}";
       
        $.ajax({
        
            url:BASE_URL+'/load-expert',
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
   
          
</script>
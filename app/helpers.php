<?php 

	
	function getSocialStickyData(){
	    
	    $social_sticky=DB::table('social_sticky')->first();
	    
	    return $social_sticky;
	}
	
	
	
	function experties_data($id){
	    
	    $expert=DB::table('expert')->where('id',$id)->get();
	    
	    $expertise_list=json_decode($expert[0]->expertise);
	    
	    $expert=DB::table('expertise')->get();
	    
	    $expertise=[];
	    
	    if($expertise_list !=''){
    	    foreach($expert as $e){
    	        foreach($expertise_list as $el){
    	            if($e->id == $el){
    	                $expertise[]=$e->expertise;
    	            }
    	        }
    	    }
	    }
	    
	    return $expertise;
	    
	    
	}
	
	
	
	function userCount(){
	    
	    $users=DB::table('users')->count();
	    return $users;
	}
	
	
	function visitorsCount(){
	    
	    $visitors=DB::table('visitors')->count();
	    return $visitors;
	}
	


?>
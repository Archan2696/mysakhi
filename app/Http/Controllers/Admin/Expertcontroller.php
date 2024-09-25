<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;

class Expertcontroller extends Controller
{
 
    public function __construct(){

            $this->middleware('auth:admin');
    }

     public function find_expert_banner(){  

        $data['find_expert_banner']=DB::table('banner')->where('page_name',"find_expert")->get();

        return view('admin.find_expert_banner',$data);
    }
    
     public function expert(){

        $data['expert']=DB::table('expert')->get();

        $data['expert_description']=DB::table('expert_description')->get();
        
        $data['expertise']=DB::table('expertise')->get();
        
         $data['state']=DB::table('state')->get();
        
        $data['city']=DB::table('city')->get();


        return view('admin.expert',$data);
    }

     public function update_expert_description_data($id){
        
            $expert_description=DB::table('expert_description')->where('id',$id)->get();

            $data['id']=$expert_description[0]->id;

            $data['title1']=$expert_description[0]->title1;

            $data['title2']=$expert_description[0]->title2;

        return view('admin.add_expert_description_data',$data);
    }


    public function store_update_expert_description_data(Request $request,$id){

        $validated=$request->validate([
            'title1'=>'required',
            'title2'=>'required',
        ]);

        $title1=$request->input('title1');
        $title2=$request->input('title2');
            
        DB::table('expert_description')->where('id',$id)->update(['title1'=>$title1,'title2'=>$title2]);

        return redirect('/admin/expert')->with('error','data updated successfully!!');
        
    }


    public function add_expert_data($id){
        
        $data['expertise_data']=DB::table('expertise')->get();
        
        $data['state_data']=DB::table('state')->get();
        
        $data['city_data']=DB::table('city')->get();

        
        if($id==0){

            $data['image']='';

            $data['name']='';

            $data['state']='';

            $data['city']='';

            $data['address']='';

            $data['contact']='';

            $data['expertise']='';

            $data['description']='';

            $data['id']=$id;
        }
        else{

            $expert=DB::table('expert')->where('id',$id)->get();

            $data['id']=$expert[0]->id;

            $data['image']=$expert[0]->image;

            $data['name']=$expert[0]->name;

            $data['state']=$expert[0]->state;

            $data['city']=$expert[0]->city;

            $data['address']=$expert[0]->address;

            $data['contact']=$expert[0]->contact;

            $data['expertise']=$expert[0]->expertise;

            $data['description']=$expert[0]->description;
        }

        return view('admin.add_expert_data',$data);
    }


    public function store_add_expert_data(Request $request,$id){

         if($id ==0){
                $validated=$request->validate([
                    'image'=>'required',
                    'name'=>'required',
                    'state'=>'required',
                    'city'=>'required',
                ]);
            }else{
                $validated=$request->validate([
                    'name'=>'required',
                    'state'=>'required',
                    'city'=>'required',

                ]);
            }
            

            $name=$request->input('name');
            $state=$request->input('state');
            $city=$request->input('city');
            $address=$request->input('address');
            $expertise=$request->input('expertise');
            $description=$request->input('description');
            $contact=$request->input('contact');
            
            $expertise=json_encode($expertise);

            if($id ==0){

                $filename=$request->file('image');
                $imagename='';
                if($filename !=''){
                    $destination_path='uploads';
                    $imagename=time().'_'.$filename->getClientOriginalName();
                    $filename->move($destination_path,$imagename);
                }

                DB::table('expert')->insert(['image'=>$imagename,'name'=>$name,'state'=>$state,'city'=>$city,'address'=>$address,'contact'=>$contact,'expertise'=>$expertise,'description'=>$description]);

                $message='data submitted successfully!!';
            }
            else{

                $filename=$request->file('image');
                $oldimage=$request->input('oldimage');
                $imagename='';
                if($filename !=''){
                    $destination_path='uploads';
                    $imagename=time().'_'.$filename->getClientOriginalName();
                    $filename->move($destination_path,$imagename);
                    if($oldimage !=''){
                        unlink(public_path('/uploads/'.$oldimage));
                    }
                    DB::table('expert')->where('id',$id)->update(['image'=>$imagename,]);
                }

                DB::table('expert')->where('id',$id)->update(['name'=>$name ,'state'=>$state,'city'=>$city,'address'=>$address,'expertise'=>$expertise,'contact'=>$contact,'description'=>$description]);
                $message='data updated successfully!!';
            }

            return redirect('/admin/expert')->with('error',$message);
        
    }

    

    public function delete_expert($id){

        DB::table('expert')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    }
    
      public function admin_loadCity(Request $request){
        $state = $request->input('state');
        $state=DB::table('state')->where('state_name',$state)->first();
       
        $city=DB::table('city')->where('state_id',$state->state_id);

        $city= $city->get();
        
        if(count($city)>0){
            $data['city']=$city;
             $data['city_data']=$request->input('city1');
            $data['have_property']=true;
        }else{
            $data['city']=$city;
            $data['city_data']=$request->input('city1');
            $data['have_property']=false;
        }
        return view('admin.admin_city_ajaxData',$data);
    }


    public function add_social_url_data($id){
        

            $expert=DB::table('expert')->where('id',$id)->get();

            $data['id']=$expert[0]->id;

            $data['linkedin_url']=$expert[0]->linkedin_url;

            $data['facebook_url']=$expert[0]->facebook_url;

            $data['insta_url']=$expert[0]->insta_url;

            $data['twitter_url']=$expert[0]->twitter_url;

        return view('admin.add_social_url_data',$data);
    }


    public function store_add_social_url_data(Request $request,$id){

                $validated=$request->validate([
                    'linkedin_url'=>'required',
                    'facebook_url'=>'required',
                    'insta_url'=>'required',
                    'twitter_url' => 'required'

                ]);


            $linkedin_url=$request->input('linkedin_url');
            $facebook_url=$request->input('facebook_url');
            $insta_url=$request->input('insta_url');
            $twitter_url=$request->input('twitter_url');

            DB::table('expert')->where('id',$id)->update(['linkedin_url'=>$linkedin_url,'facebook_url'=>$facebook_url,'insta_url'=>$insta_url,'twitter_url'=>$twitter_url]);


            $message='data Added successfully!!';

            return redirect('/admin/expert')->with('error',$message);
        
    }


    public function expert_faq(){

        $data['expert_faq']=DB::table('expert_faq')->get();

        $data['expert_faq_description']=DB::table('expert_faq_description')->get();
        
        return view('admin.expert_faq',$data);
    }


    public function update_expert_faq_description_data($id){
        
            $expert_faq_description=DB::table('expert_faq_description')->where('id',$id)->get();

            $data['id']=$expert_faq_description[0]->id;

            $data['title1']=$expert_faq_description[0]->title1;

            $data['title2']=$expert_faq_description[0]->title2;

        return view('admin.add_expert_faq_description_data',$data);
    }


    public function store_update_expert_faq_description_data(Request $request,$id){

        $validated=$request->validate([
            'title1'=>'required',
            'title2'=>'required',
        ]);

        $title1=$request->input('title1');
        $title2=$request->input('title2');
            
        DB::table('expert_faq_description')->where('id',$id)->update(['title1'=>$title1,'title2'=>$title2]);

        return redirect('/admin/expert_faq')->with('error','data updated successfully!!');
        
    }


    public function add_expert_faq_data($id){
        
        if($id==0){

            $data['question']='';

            $data['answer']='';

            $data['id']=$id;
        }
        else{

            $expert_faq=DB::table('expert_faq')->where('id',$id)->get();

            $data['id']=$expert_faq[0]->id;

            $data['question']=$expert_faq[0]->question;

            $data['answer']=$expert_faq[0]->answer;
        }

        return view('admin.add_expert_faq_data',$data);
    }


    public function store_add_expert_faq_data(Request $request,$id){

        $validated=$request->validate([
            'question'=>'required',
            'answer'=>'required',
        ]);

        $question=$request->input('question');

        $answer=$request->input('answer');

        if($id ==0){
            
            DB::table('expert_faq')->insert(['question'=>$question,'answer'=>$answer]);

            $message='data submitted successfully!!';
        }

        else{

            DB::table('expert_faq')->where('id',$id)->update(['question'=>$question , 'answer'=>$answer]);
            $message='data updated successfully!!';

        }

        return redirect('/admin/expert_faq')->with('error',$message);
        
    }

    

    public function delete_expert_faq($id){

        DB::table('expert_faq')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    }
    
    public function expertise(){

        $data['expertise']=DB::table('expertise')->get();

        return view('admin.expertise',$data);
    }

     

    public function add_expertise_data($id){
        
        if($id==0){

            $data['expertise']='';

            $data['id']=$id;
        }
        else{

            $expertise=DB::table('expertise')->where('id',$id)->get();

            $data['id']=$expertise[0]->id;

            $data['expertise']=$expertise[0]->expertise;
        }
            
            return view('admin.add_expertise_data',$data);
    }


    public function store_add_expertise_data(Request $request,$id){

         if($id ==0){
                $validated=$request->validate([
                    'expertise'=>'required',
                ]);
            }else{
                $validated=$request->validate([
                    'expertise'=>'required',

                ]);
            }
            
            $expertise=$request->input('expertise');

            if($id ==0){

                DB::table('expertise')->insert(['expertise'=>$expertise]);

                $message='data submitted successfully!!';
            }
            else{
                
                DB::table('expertise')->where('id',$id)->update(['expertise'=>$expertise]);
                $message='data updated successfully!!';
            }

            return redirect('/admin/expertise')->with('error',$message);
        
    }

    

    public function delete_expertise($id){

        DB::table('expertise')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    }

}

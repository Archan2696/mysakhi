<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;

class Contactcontroller extends Controller
{
    
     public function __construct(){

            $this->middleware('auth:admin');
    }

    
     public function contact_banner(){  

        $data['contact_banner']=DB::table('banner')->where('page_name',"contact")->get();

        return view('admin.contact_banner',$data);
    }
    
    
     public function contact_us_description(){

        $data['contact_us_description']=DB::table('contact_us_description')->get();

        return view('admin.contact_us_description',$data);
    }


    public function add_contact_us_description_data($id){
        
        if($id==0){

            $data['title1']='';            
            
            $data['title2']='';

            $data['id']=$id;
        }
        else{

            $contact_us_description=DB::table('contact_us_description')->where('id',$id)->get();

            $data['id']=$contact_us_description[0]->id;

            $data['title1']=$contact_us_description[0]->title1;

            $data['title2']=$contact_us_description[0]->title2;
        }

        return view('admin.add_contact_us_description_data',$data);
    }


    public function store_add_contact_us_description_data(Request $request,$id){

         if($id ==0){
                $validated=$request->validate([
                    'title1'=>'required',
                    'title2'=>'required',
                ]);
            }else{
                $validated=$request->validate([
                    'title1'=>'required',
                    'title2'=>'required',
                ]);
            }
            $title1=$request->input('title1');
            $title2=$request->input('title2');

            if($id ==0){

                DB::table('contact_us_description')->insert(['title1'=>$title1,'title2'=>$title2]);

                $message='data submitted successfully!!';
            }
            else{

                DB::table('contact_us_description')->where('id',$id)->update(['title1'=>$title1 ,'title2'=>$title2]);
                $message='data updated successfully!!';
            }

            return redirect('/admin/contact_us_description')->with('error',$message);
        
    }

  
    public function delete_contact_us_description($id){

        DB::table('contact_us_description')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    }

   public function contact_us_info(){

        $data['contact_us_info']=DB::table('contact_us_info')->get();

        return view('admin.contact_us_info',$data);
    }


    public function add_contact_us_info_data($id){
        
        if($id==0){

            $data['title']='';

            $data['description']='';

            $data['id']=$id;
        }
        else{

            $contact_us_info=DB::table('contact_us_info')->where('id',$id)->get();

            $data['id']=$contact_us_info[0]->id;

            $data['title']=$contact_us_info[0]->title;

            $data['description']=$contact_us_info[0]->description;
        }

        return view('admin.add_contact_us_info_data',$data);
    }


    public function store_add_contact_us_info_data(Request $request,$id){

         if($id ==0){
                $validated=$request->validate([
                    'title'=>'required',
                    'description'=>'required',
                ]);
            }else{
                $validated=$request->validate([
                    'title'=>'required',
                    'description'=>'required',
                ]);
            }
            

            $title=$request->input('title');
            $description=$request->input('description');

            if($id ==0){

                DB::table('contact_us_info')->insert(['title'=>$title,'description'=>$description]);

                $message='data submitted successfully!!';
            }
            else{

                DB::table('contact_us_info')->where('id',$id)->update(['title'=>$title ,'description'=>$description]);
                $message='data updated successfully!!';
            }

            return redirect('/admin/contact_us_info')->with('error',$message);
        
    }

    

    public function delete_contact_us_info($id){

        DB::table('contact_us_info')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    }


}

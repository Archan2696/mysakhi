<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use DB;

class Mythscontroller extends Controller
{
    
     public function __construct(){

            $this->middleware('auth:admin');
    }

    
      public function menopause_myths_banner(){  

        $data['menopause_myths_banner']=DB::table('banner')->where('page_name',"menopause_myths")->get();

        return view('admin.menopause_myths_banner',$data);
    }
    
     public function myths(){

        $data['myths']=DB::table('myths')->get();

        $data['myths_description']=DB::table('myths_description')->get();

        return view('admin.myths',$data);
    }



     public function update_myths_description_data($id){
        
            $myths_description=DB::table('myths_description')->where('id',$id)->get();

            $data['id']=$myths_description[0]->id;

            $data['title']=$myths_description[0]->title;

            $data['sub_title']=$myths_description[0]->sub_title;

            $data['image']=$myths_description[0]->image;

            $data['count']=$myths_description[0]->count;

        return view('admin.add_myths_description_data',$data);
    }


    public function store_update_myths_description_data(Request $request,$id){

        $validated=$request->validate([
            'title'=>'required',
            'sub_title'=>'required',
        ]);

        $title=$request->input('title');
        $sub_title=$request->input('sub_title');

        $file=$request->file('image');

        $oldimage=$request->input('oldimage');

        $imagename='';

        if($file){

            $destination_path='uploads';

            $imagename=time().'_'.$file->getClientOriginalName();

            $file->move($destination_path,$imagename);

            if($oldimage){

                unlink(public_path('/uploads/'.$oldimage));
            }

            DB::table('myths_description')->where('id',$id)->update(['image'=>$imagename]);
        }
            
        DB::table('myths_description')->where('id',$id)->update(['title'=>$title,'sub_title'=>$sub_title,'count'=>$count]);

        return redirect('/admin/myths')->with('error','data updated successfully!!');
        
    }



    public function add_myths_data($id){
        
        if($id==0){


            $data['title1']='';

            $data['title2']='';

            $data['title3']='';

            $data['description']='';

            $data['id']=$id;
        }
        else{

            $myths=DB::table('myths')->where('id',$id)->get();

            $data['id']=$myths[0]->id;

            $data['title1']=$myths[0]->title1;

            $data['title2']=$myths[0]->title2;

            $data['title3']=$myths[0]->title3;

            $data['description']=$myths[0]->description;

        }

        return view('admin.add_myths_data',$data);
    }


    public function store_add_myths_data(Request $request,$id){

         if($id ==0){
                $validated=$request->validate([
                    'title1'=>'required',
                    'title2'=>'required',
                    'title3'=>'required',
                    'description'=>'required',
                ]);
            }else{
                $validated=$request->validate([
                    'title1'=>'required',
                    'title2'=>'required',
                    'title3'=>'required',
                    'description'=>'required',
                ]);
            }
            

            $title1=$request->input('title1');

            $title2=$request->input('title2');

            $title3=$request->input('title3');

            $description=$request->input('description');

            if($id ==0){
                
                DB::table('myths')->insert(['title1'=>$title1,'title2'=>$title2,'title3'=>$title3,'description'=>$description]);
    
                $message='data submitted successfully!!';
            }
    
            else{
    
                DB::table('myths')->where('id',$id)->update(['title1'=>$title1,'title2'=>$title2,'title3'=>$title3,'description'=>$description]);
                $message='data updated successfully!!';
    
            }
    
            return redirect('/admin/myths')->with('error',$message);
        
    }

    

    public function delete_myths($id){

        DB::table('myths')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    }
}

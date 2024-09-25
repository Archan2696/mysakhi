<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;

class EssentialController extends Controller
{
     public function __construct(){

            $this->middleware('auth:admin');
    }


     public function essential_checkup_banner(){  

        $data['essential_checkup_banner']=DB::table('banner')->where('page_name',"essential_checkup")->get();

        return view('admin.essential_checkup_banner',$data);
    }
    
    public function essential_about(){

        $data['essential_about']=DB::table('essential_about')->get();

        return view('admin.essential_about',$data);
    }


    public function add_essential_about_data($id){
        
            $essential_about=DB::table('essential_about')->where('id',$id)->get();

            $data['id']=$essential_about[0]->id;

            $data['sub_title']=$essential_about[0]->sub_title;
            $data['title']=$essential_about[0]->title;
            $data['description']=$essential_about[0]->description;

        return view('admin.add_essential_about_data',$data);
    }


    public function store_add_essential_about_data(Request $request,$id){

        $validated=$request->validate([
            'sub_title'=>'required',
            'title'=>'required',
            'description'=>'required',
        ]);

        $sub_title=$request->input('sub_title');
        $title=$request->input('title');
        $description=$request->input('description');
            
        DB::table('essential_about')->where('id',$id)->update(['sub_title'=>$sub_title,'title'=>$title,'description'=>$description]);

        return redirect('/admin/essential_about')->with('error','data updated successfully!!');
        
    }





    public function essential_test(){

        $data['essential_test']=DB::table('essential_test')->get();

        $data['essential_test_description']=DB::table('essential_test_description')->get();

        return view('admin.essential_test',$data);
    }


    public function update_essential_test_description_data($id){
        
            $essential_test_description=DB::table('essential_test_description')->where('id',$id)->get();

            $data['id']=$essential_test_description[0]->id;

            $data['image']=$essential_test_description[0]->image;

            $data['title']=$essential_test_description[0]->title;

        return view('admin.add_essential_test_description_data',$data);
    }


    public function store_update_essential_test_description_data(Request $request,$id){

        $validated=$request->validate([
            'title'=>'required',
        ]);

        $title=$request->input('title');

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
            DB::table('essential_test_description')->where('id',$id)->update(['image'=>$imagename,]);
        }
            
        DB::table('essential_test_description')->where('id',$id)->update(['title'=>$title]);

        return redirect('/admin/essential_test')->with('error','data updated successfully!!');
        
    }


    public function add_essential_test_data($id){
        
        if($id==0){

            $data['test_type']='';

            $data['title']='';

            $data['description']='';

            $data['id']=$id;
        }
        else{

            $essential_test=DB::table('essential_test')->where('id',$id)->get();

            $data['id']=$essential_test[0]->id;

            $data['test_type']=$essential_test[0]->test_type;

            $data['title']=$essential_test[0]->title;

            $data['description']=$essential_test[0]->description;
        }

        return view('admin.add_essential_test_data',$data);
    }


    public function store_add_essential_test_data(Request $request,$id){

        
            if($id ==0){
                $validated=$request->validate([
                    'test_type'=>'required',
                    'title'=>'required',
                    'description'=>'required',
                ]);
            }else{
                $validated=$request->validate([
                    'test_type'=>'required',
                    'title'=>'required',
                    'description'=>'required',
                ]);
            }

            
            $test_type=$request->input('test_type');
            $title=$request->input('title');
            $description=$request->input('description');

            if($id ==0){

                DB::table('essential_test')->insert(['test_type'=>$test_type,'title'=>$title,'description'=>$description]);

                $message='data submitted successfully!!';
            }
            else{

                DB::table('essential_test')->where('id',$id)->update(['test_type'=>$test_type ,'title'=>$title ,'description'=>$description]);
                $message='data updated successfully!!';
            }

            return redirect('/admin/essential_test')->with('error',$message);
    }

    

    public function delete_essential_test($id){

        DB::table('essential_test')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    }






    public function essential_info(){

        $data['essential_info']=DB::table('essential_info')->get();

        return view('admin.essential_info',$data);
    }


    public function add_essential_info_data($id){
        
            $essential_info=DB::table('essential_info')->where('id',$id)->get();

            $data['id']=$essential_info[0]->id;

            $data['title1']=$essential_info[0]->title1;
            $data['description1']=$essential_info[0]->description1;

            $data['title2']=$essential_info[0]->title2;
            $data['description2']=$essential_info[0]->description2;

        return view('admin.add_essential_info_data',$data);
    }


    public function store_add_essential_info_data(Request $request,$id){

        $validated=$request->validate([
            'title1'=>'required',
            'description1'=>'required',
            'title2'=>'required',
            'description2'=>'required',
        ]);

        $title1=$request->input('title1');
        $description1=$request->input('description1');

        $title2=$request->input('title2');
        $description2=$request->input('description2');
            
        DB::table('essential_info')->where('id',$id)->update(['title1'=>$title1,'description1'=>$description1,'title2'=>$title2,'description2'=>$description2]);

        return redirect('/admin/essential_info')->with('error','data updated successfully!!');
        
    }
    
    
    public function essential_cta_description(){  

        $data['essential_cta_description']=DB::table('essential_cta_description')->get();

        return view('admin.essential_cta_description',$data);
    }


    public function add_essential_cta_description_data($id){
        
            $essential_cta_description=DB::table('essential_cta_description')->where('id',$id)->get();

            $data['id']=$essential_cta_description[0]->id;

            $data['image']=$essential_cta_description[0]->image;
            $data['title']=$essential_cta_description[0]->title;
            $data['description']=$essential_cta_description[0]->description;

        return view('admin.add_essential_cta_description_data',$data);
    }


    public function store_add_essential_cta_description_data(Request $request,$id){

        $validated=$request->validate([
            'title'=>'required',
            'description'=>'required',
        ]);

        $title=$request->input('title');
        $description=$request->input('description');

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
            DB::table('essential_cta_description')->where('id',$id)->update(['image'=>$imagename,]);
        }
            
        DB::table('essential_cta_description')->where('id',$id)->update(['title'=>$title,'description'=>$description]);

        return redirect('/admin/essential_cta_description')->with('error','data updated successfully!!');
        
    }
}

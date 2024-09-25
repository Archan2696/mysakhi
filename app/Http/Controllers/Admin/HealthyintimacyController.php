<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;

class HealthyintimacyController extends Controller
{
    
    
     public function __construct(){

            $this->middleware('auth:admin');
    }
    
    public function healthy_sexuality_intimacy_banner(){  

        $data['healthy_sexuality_intimacy_banner']=DB::table('banner')->where('page_name',"healthy_sexuality_intimacy")->get();

        return view('admin.healthy_sexuality_intimacy_banner',$data);
    }




    public function healthy_intimacy_about(){

        $data['healthy_intimacy_about']=DB::table('healthy_intimacy_about')->get();

        $data['healthy_intimacy_about_description']=DB::table('about_meno_phases_description')->get();

        return view('admin.healthy_intimacy_about',$data);
    }

    public function add_healthy_intimacy_about_data($id){
        
        if($id==0){

            $data['image']='';

            $data['highlight_title']='';

            $data['title']='';

            $data['highlight_text']='';

            $data['description']='';

            $data['description1']='';

            $data['id']=$id;
        }
        else{

            $healthy_intimacy_about=DB::table('healthy_intimacy_about')->where('id',$id)->get();

            $data['id']=$healthy_intimacy_about[0]->id;

            $data['image']=$healthy_intimacy_about[0]->image;

            $data['highlight_title']=$healthy_intimacy_about[0]->highlight_title;

            $data['title']=$healthy_intimacy_about[0]->title;

            $data['highlight_text']=$healthy_intimacy_about[0]->highlight_text;

            $data['description']=$healthy_intimacy_about[0]->description;

            $data['description1']=$healthy_intimacy_about[0]->description1;
        }

        return view('admin.add_healthy_intimacy_about_data',$data);
    }


    public function store_add_healthy_intimacy_about_data(Request $request,$id){

            if($id ==0){
                $validated=$request->validate([
                    'image'=>'required',
                    'highlight_title'=>'required',
                    'title'=>'required',
                    'highlight_text'=>'required',
                    'description'=>'required',
                    'description1'=>'required',
                ]);
            }else{
                $validated=$request->validate([
                    'highlight_title'=>'required',
                    'title'=>'required',
                    'highlight_text'=>'required',
                ]);
            }
            
            $image=$request->input('image');
            $highlight_title=$request->input('highlight_title');
            $title=$request->input('title');
            $highlight_text=$request->input('highlight_text');
            $description=$request->input('description');
            $description1=$request->input('description1');

            if($id ==0){

                $filename=$request->file('image');
                $imagename='';
                if($filename !=''){
                    $destination_path='uploads';
                    $imagename=time().'_'.$filename->getClientOriginalName();
                    $filename->move($destination_path,$imagename);
                }

                DB::table('healthy_intimacy_about')->insert(['image'=>$imagename,'highlight_title'=>$highlight_title,'title'=>$title,'highlight_text'=>$highlight_text,'description'=>$description,'description1'=>$description1,]);

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
                    DB::table('healthy_intimacy_about')->where('id',$id)->update(['image'=>$imagename,]);
                }

                DB::table('healthy_intimacy_about')->where('id',$id)->update(['highlight_title'=>$highlight_title,'title'=>$title,'highlight_text'=>$highlight_text,'description'=>$description,'description1'=>$description1,]);
                $message='data updated successfully!!';
            }

            return redirect('/admin/healthy_intimacy_about')->with('error',$message);
        
    }

















    public function healthy_intimacy_factors(){

        $data['healthy_intimacy_factors']=DB::table('healthy_intimacy_factors')->get();

        $data['healthy_intimacy_factors_description']=DB::table('healthy_intimacy_factors_description')->get();

        return view('admin.healthy_intimacy_factors',$data);
    }

     public function update_healthy_intimacy_factors_description_data($id){
        
            $healthy_intimacy_factors_description=DB::table('healthy_intimacy_factors_description')->where('id',$id)->get();

            $data['id']=$healthy_intimacy_factors_description[0]->id;

            $data['title']=$healthy_intimacy_factors_description[0]->title;

        return view('admin.add_healthy_intimacy_factors_description_data',$data);
    }


    public function store_update_healthy_intimacy_factors_description_data(Request $request,$id){

        $validated=$request->validate([
            'title'=>'required',
        ]);

        $title=$request->input('title');
            
        DB::table('healthy_intimacy_factors_description')->where('id',$id)->update(['title'=>$title,]);

        return redirect('/admin/healthy_intimacy_factors')->with('error','data updated successfully!!');
        
    }


    public function add_healthy_intimacy_factors_data($id){
        
        if($id==0){

            $data['image']='';

            $data['description']='';

            $data['id']=$id;
        }
        else{

            $healthy_intimacy_factors=DB::table('healthy_intimacy_factors')->where('id',$id)->get();

            $data['id']=$healthy_intimacy_factors[0]->id;

            $data['image']=$healthy_intimacy_factors[0]->image;

            $data['description']=$healthy_intimacy_factors[0]->description;
        }

        return view('admin.add_healthy_intimacy_factors_data',$data);
    }


    public function store_add_healthy_intimacy_factors_data(Request $request,$id){

         if($id ==0){
                $validated=$request->validate([
                    'image'=>'required',
                    'description'=>'required',
                ]);
            }else{
                $validated=$request->validate([
                    'description'=>'required',
                ]);
            }
            

            $description=$request->input('description');

            if($id ==0){

                $filename=$request->file('image');
                $imagename='';
                if($filename !=''){
                    $destination_path='uploads';
                    $imagename=time().'_'.$filename->getClientOriginalName();
                    $filename->move($destination_path,$imagename);
                }

                DB::table('healthy_intimacy_factors')->insert(['image'=>$imagename,'description'=>$description,]);

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
                    DB::table('healthy_intimacy_factors')->where('id',$id)->update(['image'=>$imagename,]);
                }

                DB::table('healthy_intimacy_factors')->where('id',$id)->update(['description'=>$description,]);
                $message='data updated successfully!!';
            }

            return redirect('/admin/healthy_intimacy_factors')->with('error',$message);
        
    }

    

    public function delete_healthy_intimacy_factors($id){

        $usedata=DB::table('healthy_intimacy_factors')->where('id',$id)->get();

        $image=$usedata[0]->image;
        if($image !=''){
            unlink(public_path('/uploads/'.$image));
        }

        DB::table('healthy_intimacy_factors')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    }














    public function healthy_intimacy_hormonal(){

        $data['healthy_intimacy_hormonal']=DB::table('healthy_intimacy_hormonal')->get();

        $data['healthy_intimacy_hormonal_description']=DB::table('healthy_intimacy_hormonal_description')->get();

        return view('admin.healthy_intimacy_hormonal',$data);
    }

     public function update_healthy_intimacy_hormonal_description_data($id){
        
            $healthy_intimacy_hormonal_description=DB::table('healthy_intimacy_hormonal_description')->where('id',$id)->get();

            $data['id']=$healthy_intimacy_hormonal_description[0]->id;

            $data['image']=$healthy_intimacy_hormonal_description[0]->image;

            $data['title']=$healthy_intimacy_hormonal_description[0]->title;

            $data['description']=$healthy_intimacy_hormonal_description[0]->description;

        return view('admin.add_healthy_intimacy_hormonal_description_data',$data);
    }


    public function store_update_healthy_intimacy_hormonal_description_data(Request $request,$id){

        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $title = $request->input('title');
        $description = $request->input('description');
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

            DB::table('healthy_intimacy_hormonal_description')->where('id',$id)->update(['image'=>$imagename]);
        }


        DB::table('healthy_intimacy_hormonal_description')->where('id',$id)->update(['title'=>$title,'description'=>$description,]);

        return redirect('/admin/healthy_intimacy_hormonal')->with('error','data updated successfully!!');
        
    }


    public function add_healthy_intimacy_hormonal_data($id){
        
        if($id==0){

            $data['title']='';

            $data['description']='';

            $data['id']=$id;
        }
        else{

            $healthy_intimacy_hormonal=DB::table('healthy_intimacy_hormonal')->where('id',$id)->get();

            $data['id']=$healthy_intimacy_hormonal[0]->id;

            $data['title']=$healthy_intimacy_hormonal[0]->title;

            $data['description']=$healthy_intimacy_hormonal[0]->description;
        }

        return view('admin.add_healthy_intimacy_hormonal_data',$data);
    }


    public function store_add_healthy_intimacy_hormonal_data(Request $request,$id){

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

                DB::table('healthy_intimacy_hormonal')->insert(['title'=>$title,'description'=>$description,]);

                $message='data submitted successfully!!';
            }
            else{
                    DB::table('healthy_intimacy_hormonal')->where('id',$id)->update(['title'=>$title,'description'=>$description,]);
                $message='data updated successfully!!';

                
            }

            return redirect('/admin/healthy_intimacy_hormonal')->with('error',$message);
        
    }

    

    public function delete_healthy_intimacy_hormonal($id){

        $usedata=DB::table('healthy_intimacy_hormonal')->where('id',$id)->get();


        DB::table('healthy_intimacy_hormonal')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    }











}

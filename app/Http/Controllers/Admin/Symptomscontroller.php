<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;

class Symptomscontroller extends Controller 
{
     public function __construct(){

            $this->middleware('auth:admin');
    }

    
     public function symptoms_details_banner(){  

        $data['symptoms_details_banner']=DB::table('banner')->where('page_name',"symptoms_details")->get();

        return view('admin.symptoms_details_banner',$data);
    }
    
    
     public function management_banner(){  

        $data['management_banner']=DB::table('banner')->where('page_name',"management")->get();

        return view('admin.management_banner',$data);
    }
    
    
    public function symptoms_heading(){

        $data['symptoms_heading']=DB::table('symptoms_heading')->get();

        return view('admin.symptoms_heading',$data);
    }


    public function add_symptoms_heading_data($id){
        
        if($id==0){


            $data['title1']='';

            $data['title2']='';

            $data['description1']='';

            $data['description2']='';

            $data['id']=$id;
        }
        else{

            $symptoms_heading=DB::table('symptoms_heading')->where('id',$id)->get();

            $data['id']=$symptoms_heading[0]->id;

            $data['title1']=$symptoms_heading[0]->title1;

            $data['title2']=$symptoms_heading[0]->title2;

            $data['description1']=$symptoms_heading[0]->description1;

            $data['description2']=$symptoms_heading[0]->description2;

        }

        return view('admin.add_symptoms_heading_data',$data);
    }


    public function store_add_symptoms_heading_data(Request $request,$id){

         if($id ==0){
                $validated=$request->validate([
                    'title1'=>'required',
                    'title2'=>'required',
                    'description1'=>'required',
                    'description2'=>'required',
                ]);
            }else{
                $validated=$request->validate([
                    'title1'=>'required',
                    'title2'=>'required',
                    'description1'=>'required',
                    'description2'=>'required',
                ]);
            }
            

            $title1=$request->input('title1');

            $title2=$request->input('title2');

            $description1=$request->input('description1');

            $description2=$request->input('description2');

            if($id ==0){
                
                DB::table('symptoms_heading')->insert(['title1'=>$title1,'title2'=>$title2,'description1'=>$description1,'description2'=>$description2]);
    
                $message='data submitted successfully!!';
            }
    
            else{
    
                DB::table('symptoms_heading')->where('id',$id)->update(['title1'=>$title1,'title2'=>$title2,'description1'=>$description1,'description2'=>$description2]);
                $message='data updated successfully!!';
    
            }
    
            return redirect('/admin/symptoms_heading')->with('error',$message);
        
    }

    

    public function delete_symptoms_heading($id){

        DB::table('symptoms_heading')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    }

    public function menopause_effect(){

        $data['menopause_effect']=DB::table('menopause_effect')->get();

        return view('admin.menopause_effect',$data);
    }


    public function add_menopause_effect_data($id){
        
        if($id==0){


            $data['title1']='';

            $data['title2']='';

            $data['description']='';

            $data['id']=$id;
        }
        else{

            $menopause_effect=DB::table('menopause_effect')->where('id',$id)->get();

            $data['id']=$menopause_effect[0]->id;

            $data['title1']=$menopause_effect[0]->title1;

            $data['title2']=$menopause_effect[0]->title2;

            $data['description']=$menopause_effect[0]->description;

        }

        return view('admin.add_menopause_effect_data',$data);
    }


    public function store_add_menopause_effect_data(Request $request,$id){

         if($id ==0){
                $validated=$request->validate([
                    'title1'=>'required',
                    'title2'=>'required',
                    'description'=>'required',
                ]);
            }else{
                $validated=$request->validate([
                    'title1'=>'required',
                    'title2'=>'required',
                    'description'=>'required',
                ]);
            }
            

            $title1=$request->input('title1');

            $title2=$request->input('title2');

            $description=$request->input('description');

            if($id ==0){
                
                DB::table('menopause_effect')->insert(['title1'=>$title1,'title2'=>$title2,'description'=>$description]);
    
                $message='data submitted successfully!!';
            }
    
            else{
    
                DB::table('menopause_effect')->where('id',$id)->update(['title1'=>$title1,'title2'=>$title2,'description'=>$description]);
                $message='data updated successfully!!';
    
            }
    
            return redirect('/admin/menopause_effect')->with('error',$message);
        
    }

    

    public function delete_menopause_effect($id){

        DB::table('menopause_effect')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    }

     public function heart_effect(){

        $data['heart_effect']=DB::table('heart_effect')->get();

        $data['heart_effect_description']=DB::table('heart_effect_description')->get();

        return view('admin.heart_effect',$data);
    }



     public function update_heart_effect_description_data($id){
        
            $heart_effect_description=DB::table('heart_effect_description')->where('id',$id)->get();

            $data['id']=$heart_effect_description[0]->id;

            $data['title']=$heart_effect_description[0]->title;

            $data['description']=$heart_effect_description[0]->description;

            $data['image']=$heart_effect_description[0]->image;

        return view('admin.add_heart_effect_description_data',$data);
    }


    public function store_update_heart_effect_description_data(Request $request,$id){

        $validated=$request->validate([
            'title'=>'required',
            'description'=>'required',
        ]);

        $title=$request->input('title');
        $description=$request->input('description');

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

            DB::table('heart_effect_description')->where('id',$id)->update(['image'=>$imagename]);
        }
            
        DB::table('heart_effect_description')->where('id',$id)->update(['title'=>$title,'description'=>$description]);

        return redirect('/admin/heart_effect')->with('error','data updated successfully!!');
        
    }



    public function add_heart_effect_data($id){
        
        if($id==0){


            $data['title']='';

            $data['description']='';

            $data['id']=$id;
        }
        else{

            $heart_effect=DB::table('heart_effect')->where('id',$id)->get();

            $data['id']=$heart_effect[0]->id;

            $data['title']=$heart_effect[0]->title;

            $data['description']=$heart_effect[0]->description;

        }

        return view('admin.add_heart_effect_data',$data);
    }


    public function store_add_heart_effect_data(Request $request,$id){

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
                
                DB::table('heart_effect')->insert(['title'=>$title,'description'=>$description]);
    
                $message='data submitted successfully!!';
            }
    
            else{
    
                DB::table('heart_effect')->where('id',$id)->update(['title'=>$title,'description'=>$description]);
                $message='data updated successfully!!';
    
            }
    
            return redirect('/admin/heart_effect')->with('error',$message);
        
    }

    

    public function delete_heart_effect($id){

        DB::table('heart_effect')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    }


    public function bone_effect(){

        $data['bone_effect']=DB::table('bone_effect')->get();

        $data['bone_effect_description']=DB::table('bone_effect_description')->get();

        return view('admin.bone_effect',$data);
    }



     public function update_bone_effect_description_data($id){
        
            $bone_effect_description=DB::table('bone_effect_description')->where('id',$id)->get();

            $data['id']=$bone_effect_description[0]->id;

            $data['title']=$bone_effect_description[0]->title;

            $data['description']=$bone_effect_description[0]->description;

        return view('admin.add_bone_effect_description_data',$data);
    }


    public function store_update_bone_effect_description_data(Request $request,$id){

        $validated=$request->validate([
            'title'=>'required',
            'description'=>'required',
        ]);

        $title=$request->input('title');
        $description=$request->input('description');
            
        DB::table('bone_effect_description')->where('id',$id)->update(['title'=>$title,'description'=>$description]);

        return redirect('/admin/bone_effect')->with('error','data updated successfully!!');
        
    }



    public function add_bone_effect_data($id){
        
        if($id==0){


            $data['title']='';

            $data['description']='';

            $data['id']=$id;
        }
        else{

            $bone_effect=DB::table('bone_effect')->where('id',$id)->get();

            $data['id']=$bone_effect[0]->id;

            $data['title']=$bone_effect[0]->title;

            $data['description']=$bone_effect[0]->description;

        }

        return view('admin.add_bone_effect_data',$data);
    }


    public function store_add_bone_effect_data(Request $request,$id){

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
                
                DB::table('bone_effect')->insert(['title'=>$title,'description'=>$description]);
    
                $message='data submitted successfully!!';
            }
    
            else{
    
                DB::table('bone_effect')->where('id',$id)->update(['title'=>$title,'description'=>$description]);
                $message='data updated successfully!!';
    
            }
    
            return redirect('/admin/bone_effect')->with('error',$message);
        
    }

    

    public function delete_bone_effect($id){

        DB::table('bone_effect')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    }
    
    
    
    
    
    
    
    
    public function symptoms_type(){

        $data['symptoms_type']=DB::table('symptoms_type')->get();

        return view('admin.symptoms_type',$data);
    }





    public function physical_symptoms(){

        $data['physical_symptoms']=DB::table('physical_symptoms')->get();

        return view('admin.physical_symptoms',$data);
    }


    public function add_physical_symptoms_data($id){
        
        if($id==0){

            $data['image']='';

            $data['title']='';

            $data['description']='';

            $data['id']=$id;
        }
        else{

            $physical_symptoms=DB::table('physical_symptoms')->where('id',$id)->get();

            $data['id']=$physical_symptoms[0]->id;

            $data['image']=$physical_symptoms[0]->image;

            $data['title']=$physical_symptoms[0]->title;

            $data['description']=$physical_symptoms[0]->description;
        }

        return view('admin.add_physical_symptoms_data',$data);
    }


    public function store_add_physical_symptoms_data(Request $request,$id){

         if($id ==0){
                $validated=$request->validate([
                    'image'=>'required',
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

                $filename=$request->file('image');
                $imagename='';
                if($filename !=''){
                    $destination_path='uploads';
                    $imagename=time().'_'.$filename->getClientOriginalName();
                    $filename->move($destination_path,$imagename);
                }

                DB::table('physical_symptoms')->insert(['image'=>$imagename,'title'=>$title,'description'=>$description,]);

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
                    DB::table('physical_symptoms')->where('id',$id)->update(['image'=>$imagename,]);
                }

                DB::table('physical_symptoms')->where('id',$id)->update(['title'=>$title,'description'=>$description,]);
                $message='data updated successfully!!';
            }

            return redirect('/admin/physical_symptoms')->with('error',$message);
        
    }

    

    public function delete_physical_symptoms($id){

        $usedata=DB::table('physical_symptoms')->where('id',$id)->get();

        $image=$usedata[0]->image;
        if($image !=''){
            unlink(public_path('/uploads/'.$image));
        }

        DB::table('physical_symptoms')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    }









    public function vaginal_symptoms(){

        $data['vaginal_symptoms']=DB::table('vaginal_symptoms')->get();

        return view('admin.vaginal_symptoms',$data);
    }


    public function add_vaginal_symptoms_data($id){
        
        if($id==0){

            $data['image']='';

            $data['title']='';

            $data['description']='';

            $data['id']=$id;
        }
        else{

            $vaginal_symptoms=DB::table('vaginal_symptoms')->where('id',$id)->get();

            $data['id']=$vaginal_symptoms[0]->id;

            $data['image']=$vaginal_symptoms[0]->image;

            $data['title']=$vaginal_symptoms[0]->title;

            $data['description']=$vaginal_symptoms[0]->description;
        }

        return view('admin.add_vaginal_symptoms_data',$data);
    }


    public function store_add_vaginal_symptoms_data(Request $request,$id){

         if($id ==0){
                $validated=$request->validate([
                    'image'=>'required',
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

                $filename=$request->file('image');
                $imagename='';
                if($filename !=''){
                    $destination_path='uploads';
                    $imagename=time().'_'.$filename->getClientOriginalName();
                    $filename->move($destination_path,$imagename);
                }

                DB::table('vaginal_symptoms')->insert(['image'=>$imagename,'title'=>$title,'description'=>$description,]);

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
                    DB::table('vaginal_symptoms')->where('id',$id)->update(['image'=>$imagename,]);
                }

                DB::table('vaginal_symptoms')->where('id',$id)->update(['title'=>$title,'description'=>$description,]);
                $message='data updated successfully!!';
            }

            return redirect('/admin/vaginal_symptoms')->with('error',$message);
        
    }

    

    public function delete_vaginal_symptoms($id){

        $usedata=DB::table('vaginal_symptoms')->where('id',$id)->get();

        $image=$usedata[0]->image;
        if($image !=''){
            unlink(public_path('/uploads/'.$image));
        }

        DB::table('vaginal_symptoms')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    }










    public function vaginal_stages(){

        $data['vaginal_stages']=DB::table('vaginal_stages')->get();

        return view('admin.vaginal_stages',$data);
    }


    public function add_vaginal_stages_data($id){
        
        if($id==0){

            $data['title']='';

            $data['description']='';

            $data['id']=$id;
        }
        else{

            $vaginal_stages=DB::table('vaginal_stages')->where('id',$id)->get();

            $data['id']=$vaginal_stages[0]->id;

            $data['title']=$vaginal_stages[0]->title;

            $data['description']=$vaginal_stages[0]->description;
        }

        return view('admin.add_vaginal_stages_data',$data);
    }


    public function store_add_vaginal_stages_data(Request $request,$id){

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

                DB::table('vaginal_stages')->insert(['title'=>$title,'description'=>$description,]);

                $message='data submitted successfully!!';
            }
            else{

                DB::table('vaginal_stages')->where('id',$id)->update(['title'=>$title,'description'=>$description,]);
                $message='data updated successfully!!';
            }

            return redirect('/admin/vaginal_stages')->with('error',$message);
        
    }

    

    public function delete_vaginal_stages($id){

        DB::table('vaginal_stages')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    }




    public function vaginal_about(){

        $data['vaginal_about']=DB::table('vaginal_about')->get();

        return view('admin.vaginal_about',$data);
    }


    public function add_vaginal_about_data($id){
        
        if($id==0){

            $data['image']='';

            $data['description']='';

            $data['id']=$id;
        }
        else{

            $vaginal_about=DB::table('vaginal_about')->where('id',$id)->get();

            $data['id']=$vaginal_about[0]->id;

            $data['image']=$vaginal_about[0]->image;

            $data['description']=$vaginal_about[0]->description;
        }

        return view('admin.add_vaginal_about_data',$data);
    }


    public function store_add_vaginal_about_data(Request $request,$id){

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

                DB::table('vaginal_about')->insert(['image'=>$imagename,'description'=>$description,]);

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
                    DB::table('vaginal_about')->where('id',$id)->update(['image'=>$imagename,]);
                }

                DB::table('vaginal_about')->where('id',$id)->update(['description'=>$description,]);
                $message='data updated successfully!!';
            }

            return redirect('/admin/vaginal_about')->with('error',$message);
        
    }

    

    public function delete_vaginal_about($id){

        $usedata=DB::table('vaginal_about')->where('id',$id)->get();

        $image=$usedata[0]->image;
        if($image !=''){
            unlink(public_path('/uploads/'.$image));
        }

        DB::table('vaginal_about')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    }





    public function psychosocial_symptoms(){

        $data['psychosocial_symptoms']=DB::table('psychosocial_symptoms')->get();

        return view('admin.psychosocial_symptoms',$data);
    }


    public function add_psychosocial_symptoms_data($id){
        
        if($id==0){

            $data['image']='';

            $data['title']='';

            $data['description']='';

            $data['id']=$id;
        }
        else{

            $psychosocial_symptoms=DB::table('psychosocial_symptoms')->where('id',$id)->get();

            $data['id']=$psychosocial_symptoms[0]->id;

            $data['image']=$psychosocial_symptoms[0]->image;

            $data['title']=$psychosocial_symptoms[0]->title;

            $data['description']=$psychosocial_symptoms[0]->description;
        }

        return view('admin.add_psychosocial_symptoms_data',$data);
    }


    public function store_add_psychosocial_symptoms_data(Request $request,$id){

         if($id ==0){
                $validated=$request->validate([
                    'image'=>'required',
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

                $filename=$request->file('image');
                $imagename='';
                if($filename !=''){
                    $destination_path='uploads';
                    $imagename=time().'_'.$filename->getClientOriginalName();
                    $filename->move($destination_path,$imagename);
                }

                DB::table('psychosocial_symptoms')->insert(['image'=>$imagename,'title'=>$title,'description'=>$description,]);

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
                    DB::table('psychosocial_symptoms')->where('id',$id)->update(['image'=>$imagename,]);
                }

                DB::table('psychosocial_symptoms')->where('id',$id)->update(['title'=>$title,'description'=>$description,]);
                $message='data updated successfully!!';
            }

            return redirect('/admin/psychosocial_symptoms')->with('error',$message);
        
    }

    

    public function delete_psychosocial_symptoms($id){

        $usedata=DB::table('psychosocial_symptoms')->where('id',$id)->get();

        $image=$usedata[0]->image;
        if($image !=''){
            unlink(public_path('/uploads/'.$image));
        }

        DB::table('psychosocial_symptoms')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    }







    public function psychosocial_mood(){

        $data['psychosocial_mood']=DB::table('psychosocial_mood')->get();

        $data['psychosocial_mood_list']=DB::table('psychosocial_mood_list')->get();

        return view('admin.psychosocial_mood',$data);
    }


    public function add_psychosocial_mood_data($id){
        
        if($id==0){

            $data['title']='';

            $data['description']='';

            $data['id']=$id;
        }
        else{

            $psychosocial_mood=DB::table('psychosocial_mood')->where('id',$id)->get();

            $data['id']=$psychosocial_mood[0]->id;

            $data['title']=$psychosocial_mood[0]->title;

            $data['description']=$psychosocial_mood[0]->description;
        }

        $data['psychosocial_mood_list']=DB::table('psychosocial_mood_list')->get();

        return view('admin.add_psychosocial_mood_data',$data);
    }


    public function store_add_psychosocial_mood_data(Request $request,$id){

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

                DB::table('psychosocial_mood')->insert(['title'=>$title,'description'=>$description,]);

                $list=$request->input('list');

                $count=0;

                if($list !=''){

                    $count=count($list);

                    for($i=0 ; $i<$count;$i++){

                       $list_data=$list[$i];
                       
                       DB::table('psychosocial_mood_list')->insert(['list'=>$list_data]);

                    }
                }

                $message='data submitted successfully!!';
            }
            else{

                DB::table('psychosocial_mood')->where('id',$id)->update(['title'=>$title,'description'=>$description,]);

                DB::table('psychosocial_mood_list')->delete();

                $list=$request->input('list');

                $count=0;

                if($list !=''){

                    $count=count($list);

                    for($i=0 ; $i<$count;$i++){

                       $list_data=$list[$i];
                       
                       DB::table('psychosocial_mood_list')->insert(['list'=>$list_data]);

                    }
                }

                $message='data updated successfully!!';
            }

            return redirect('/admin/psychosocial_mood')->with('error',$message);
        
    }

    

    public function delete_psychosocial_mood($id){

        $usedata=DB::table('psychosocial_mood')->where('id',$id)->get();

        $image=$usedata[0]->image;
        if($image !=''){
            unlink(public_path('/uploads/'.$image));
        }

        DB::table('psychosocial_mood')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    }


    public function add_list(){

        return response()->json([
            'success'=>'200',
        ]);
    }

    public function remove_list(){

        return response()->json([
            'success'=>'200',
        ]);
    }




    public function psychosocial_about(){

        $data['psychosocial_about']=DB::table('psychosocial_about')->get();

        return view('admin.psychosocial_about',$data);
    }


    public function add_psychosocial_about_data($id){
        
        if($id==0){

            $data['title']='';

            $data['description']='';

            $data['id']=$id;
        }
        else{

            $psychosocial_about=DB::table('psychosocial_about')->where('id',$id)->get();

            $data['id']=$psychosocial_about[0]->id;

            $data['title']=$psychosocial_about[0]->title;

            $data['description']=$psychosocial_about[0]->description;
        }

        return view('admin.add_psychosocial_about_data',$data);
    }


    public function store_add_psychosocial_about_data(Request $request,$id){

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
                
                DB::table('psychosocial_about')->insert(['title'=>$title,'description'=>$description,]);

                $message='data submitted successfully!!';
            }
            else{

                DB::table('psychosocial_about')->where('id',$id)->update(['title'=>$title,'description'=>$description,]);
                $message='data updated successfully!!';
            }

            return redirect('/admin/psychosocial_about')->with('error',$message);
        
    }

    

    public function delete_psychosocial_about($id){

        $usedata=DB::table('psychosocial_about')->where('id',$id)->get();

        $image=$usedata[0]->image;
        if($image !=''){
            unlink(public_path('/uploads/'.$image));
        }

        DB::table('psychosocial_about')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    }
    
 public function symptoms_management_heading(){

        $data['symptoms_management_heading']=DB::table('symptoms_management_heading')->get();

        return view('admin.symptoms_management_heading',$data);
    }


    public function add_symptoms_management_heading_data($id){
        
        if($id==0){


            $data['title1']='';

            $data['title2']='';

            $data['id']=$id;
        }
        else{

            $symptoms_management_heading=DB::table('symptoms_management_heading')->where('id',$id)->get();

            $data['id']=$symptoms_management_heading[0]->id;

            $data['title1']=$symptoms_management_heading[0]->title1;

            $data['title2']=$symptoms_management_heading[0]->title2;


        }

        return view('admin.add_symptoms_management_heading_data',$data);
    }


    public function store_add_symptoms_management_heading_data(Request $request,$id){

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
                
                DB::table('symptoms_management_heading')->insert(['title1'=>$title1,'title2'=>$title2]);
    
                $message='data submitted successfully!!';
            }
    
            else{
    
                DB::table('symptoms_management_heading')->where('id',$id)->update(['title1'=>$title1,'title2'=>$title2]);
                $message='data updated successfully!!';
    
            }
    
            return redirect('/admin/symptoms_management_heading')->with('error',$message);
        
    }

    

    public function delete_symptoms_management_heading($id){

        DB::table('symptoms_management_heading')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    }


    public function lifestyle_changes(){

        $data['lifestyle_changes']=DB::table('lifestyle_changes')->get();

        $data['lifestyle_changes_description']=DB::table('lifestyle_changes_description')->get();

        return view('admin.lifestyle_changes',$data);
    }



     public function update_lifestyle_changes_description_data($id){
        
            $lifestyle_changes_description=DB::table('lifestyle_changes_description')->where('id',$id)->get();

            $data['id']=$lifestyle_changes_description[0]->id;

            $data['title']=$lifestyle_changes_description[0]->title;

            $data['description']=$lifestyle_changes_description[0]->description;

            $data['image']=$lifestyle_changes_description[0]->image;

        return view('admin.add_lifestyle_changes_description_data',$data);
    }


    public function store_update_lifestyle_changes_description_data(Request $request,$id){

        $validated=$request->validate([
            'title'=>'required',
            'description'=>'required',
        ]);

        $title=$request->input('title');
        $description=$request->input('description');

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

            DB::table('lifestyle_changes_description')->where('id',$id)->update(['image'=>$imagename]);
        }
            
        DB::table('lifestyle_changes_description')->where('id',$id)->update(['title'=>$title,'description'=>$description]);

        return redirect('/admin/lifestyle_changes')->with('error','data updated successfully!!');
        
    }



    public function add_lifestyle_changes_data($id){
        
        if($id==0){


            $data['title']='';

            $data['description']='';

            $data['id']=$id;
        }
        else{

            $lifestyle_changes=DB::table('lifestyle_changes')->where('id',$id)->get();

            $data['id']=$lifestyle_changes[0]->id;

            $data['title']=$lifestyle_changes[0]->title;

            $data['description']=$lifestyle_changes[0]->description;

        }

        return view('admin.add_lifestyle_changes_data',$data);
    }


    public function store_add_lifestyle_changes_data(Request $request,$id){

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
                
                DB::table('lifestyle_changes')->insert(['title'=>$title,'description'=>$description]);
    
                $message='data submitted successfully!!';
            }
    
            else{
    
                DB::table('lifestyle_changes')->where('id',$id)->update(['title'=>$title,'description'=>$description]);
                $message='data updated successfully!!';
    
            }
    
            return redirect('/admin/lifestyle_changes')->with('error',$message);
        
    }

    

    public function delete_lifestyle_changes($id){

        DB::table('lifestyle_changes')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    }

    public function therapies(){

        $data['therapies']=DB::table('therapies')->get();

        return view('admin.therapies',$data);
    }


    public function add_therapies_data($id){
        
        if($id==0){


            $data['title']='';

            $data['id']=$id;
        }
        else{

            $therapies=DB::table('therapies')->where('id',$id)->get();

            $data['id']=$therapies[0]->id;

            $data['title']=$therapies[0]->title;

        }

        return view('admin.add_therapies_data',$data);
    }


    public function store_add_therapies_data(Request $request,$id){

         if($id ==0){
                $validated=$request->validate([
                    'title'=>'required',
                ]);
            }else{
                $validated=$request->validate([
                    'title21'=>'required',
                ]);
            }
            

            $title=$request->input('title');



            if($id ==0){
                
                DB::table('therapies')->insert(['title'=>$title]);
    
                $message='data submitted successfully!!';
            }
    
            else{
    
                DB::table('therapies')->where('id',$id)->update(['title'=>$title]);
                $message='data updated successfully!!';
    
            }
    
            return redirect('/admin/therapies')->with('error',$message);
        
    }

    

    public function delete_therapies($id){

        DB::table('therapies')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    }

    public function alternative_therapies(){

        $data['alternative_therapies']=DB::table('alternative_therapies')->get();

        $data['alternative_therapies_description']=DB::table('alternative_therapies_description')->get();

        return view('admin.alternative_therapies',$data);
    }



     public function update_alternative_therapies_description_data($id){
        
            $alternative_therapies_description=DB::table('alternative_therapies_description')->where('id',$id)->get();

            $data['id']=$alternative_therapies_description[0]->id;

            $data['title']=$alternative_therapies_description[0]->title;

            $data['description']=$alternative_therapies_description[0]->description;

        return view('admin.add_alternative_therapies_description_data',$data);
    }


    public function store_update_alternative_therapies_description_data(Request $request,$id){

        $validated=$request->validate([
            'title'=>'required',
            'description'=>'required',
        ]);

        $title=$request->input('title');
        $description=$request->input('description');
            
        DB::table('alternative_therapies_description')->where('id',$id)->update(['title'=>$title,'description'=>$description]);

        return redirect('/admin/alternative_therapies')->with('error','data updated successfully!!');
        
    }



    public function add_alternative_therapies_data($id){
        
        if($id==0){


            $data['title']='';

            $data['description']='';

            $data['id']=$id;
        }
        else{

            $alternative_therapies=DB::table('alternative_therapies')->where('id',$id)->get();

            $data['id']=$alternative_therapies[0]->id;

            $data['title']=$alternative_therapies[0]->title;

            $data['description']=$alternative_therapies[0]->description;

        }

        return view('admin.add_alternative_therapies_data',$data);
    }


    public function store_add_alternative_therapies_data(Request $request,$id){

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
                
                DB::table('alternative_therapies')->insert(['title'=>$title,'description'=>$description]);
    
                $message='data submitted successfully!!';
            }
    
            else{
    
                DB::table('alternative_therapies')->where('id',$id)->update(['title'=>$title,'description'=>$description]);
                $message='data updated successfully!!';
    
            }
    
            return redirect('/admin/alternative_therapies')->with('error',$message);
        
    }

    

    public function delete_alternative_therapies($id){

        DB::table('alternative_therapies')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    }

    public function complementry_therapies(){

        $data['complementry_therapies']=DB::table('complementry_therapies')->get();

        return view('admin.complementry_therapies',$data);
    }


        public function add_complementry_therapies_data($id){
        
        if($id==0){


            $data['title']='';

            $data['description']='';

            $data['id']=$id;
        }
        else{

            $complementry_therapies=DB::table('complementry_therapies')->where('id',$id)->get();

            $data['id']=$complementry_therapies[0]->id;

            $data['title']=$complementry_therapies[0]->title;

            $data['description']=$complementry_therapies[0]->description;

        }

        return view('admin.add_complementry_therapies_data',$data);
    }


        public function store_add_complementry_therapies_data(Request $request,$id){

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
                
                DB::table('complementry_therapies')->insert(['title'=>$title,'description'=>$description]);
    
                $message='data submitted successfully!!';
            }
    
            else{
    
                DB::table('complementry_therapies')->where('id',$id)->update(['title'=>$title,'description'=>$description]);
                $message='data updated successfully!!';
    
            }
    
            return redirect('/admin/complementry_therapies')->with('error',$message);
        
    }

    

        public function delete_complementry_therapies($id){

        DB::table('complementry_therapies')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    }



     public function manage_symptoms(){

        $data['manage_symptoms']=DB::table('manage_symptoms')->get();

        $data['manage_symptoms_description']=DB::table('manage_symptoms_description')->get();

        return view('admin.manage_symptoms',$data);
    }


        public function update_manage_symptoms_description_data($id){
        
            $manage_symptoms_description=DB::table('manage_symptoms_description')->where('id',$id)->get();

            $data['id']=$manage_symptoms_description[0]->id;            
            $data['title']=$manage_symptoms_description[0]->title;

        return view('admin.add_manage_symptoms_description_data',$data);
    }


        public function store_update_manage_symptoms_description_data(Request $request,$id){

        $validated=$request->validate([
            'title'=>'required',
        ]);

        $title=$request->input('title');

        DB::table('manage_symptoms_description')->where('id',$id)->update(['title'=>$title]);

        return redirect('/admin/manage_symptoms')->with('error','data updated successfully!!');
        
    }


        public function add_manage_symptoms_data($id){
        
        if($id==0){

            $data['image']='';

            $data['title']='';

            $data['description']='';

            $data['id']=$id;
        }
        else{

            $manage_symptoms=DB::table('manage_symptoms')->where('id',$id)->get();

            $data['id']=$manage_symptoms[0]->id;

            $data['image']=$manage_symptoms[0]->image;

            $data['title']=$manage_symptoms[0]->title;

            $data['description']=$manage_symptoms[0]->description;
        }

        return view('admin.add_manage_symptoms_data',$data);
    }


        public function store_add_manage_symptoms_data(Request $request,$id){

        
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
            

            $title=$request->input('title');
            $description=$request->input('description');

            if($id ==0){

                $filename=$request->file('image');
                $imagename='';
                if($filename !=''){
                    $destination_path='uploads';
                    $imagename=time().'_'.$filename->getClientOriginalName();
                    $filename->move($destination_path,$imagename);
                }

                DB::table('manage_symptoms')->insert(['image'=>$imagename,'title'=>$title,'description'=>$description]);

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
                    DB::table('manage_symptoms')->where('id',$id)->update(['image'=>$imagename,]);
                }

                DB::table('manage_symptoms')->where('id',$id)->update(['title'=>$title ,'description'=>$description]);
                $message='data updated successfully!!';
            }

            return redirect('/admin/manage_symptoms')->with('error',$message);
    }

    

    public function delete_manage_symptoms($id){

        $userdata=DB::table('manage_symptoms')->where('id',$id)->get();

        $image=$userdata[0]->image;

        if($image !=''){
            unlink(public_path('/uploads/'.$image));
        }

        DB::table('manage_symptoms')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    }


    public function treatment_heading(){

        $data['treatment_heading']=DB::table('treatment_heading')->get();

        return view('admin.treatment_heading',$data);
    }


    public function add_treatment_heading_data($id){
        
        if($id==0){


            $data['title']='';

            $data['description']='';

            $data['id']=$id;
        }
        else{

            $treatment_heading=DB::table('treatment_heading')->where('id',$id)->get();

            $data['id']=$treatment_heading[0]->id;

            $data['title']=$treatment_heading[0]->title;

            $data['description']=$treatment_heading[0]->description;

        }

        return view('admin.add_treatment_heading_data',$data);
    }


    public function store_add_treatment_heading_data(Request $request,$id){

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
                
                DB::table('treatment_heading')->insert(['title'=>$title,'description'=>$description]);
    
                $message='data submitted successfully!!';
            }
    
            else{
    
                DB::table('treatment_heading')->where('id',$id)->update(['title'=>$title,'description'=>$description]);
                $message='data updated successfully!!';
    
            }
    
            return redirect('/admin/treatment_heading')->with('error',$message);
        
    }

    

    public function delete_treatment_heading($id){

        DB::table('treatment_heading')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    }


    public function hormone_treatment(){

        $data['hormone_treatment']=DB::table('hormone_treatment')->get();

        $data['hormone_treatment_list']=DB::table('hormone_treatment_list')->get();

        $data['hormone_treatment_description']=DB::table('hormone_treatment_description')->get();

        return view('admin.hormone_treatment',$data);
    }



     public function update_hormone_treatment_description_data($id){
        
            $hormone_treatment_description=DB::table('hormone_treatment_description')->where('id',$id)->get();

            $data['id']=$hormone_treatment_description[0]->id;

            $data['title']=$hormone_treatment_description[0]->title;

            $data['description1']=$hormone_treatment_description[0]->description1;

            $data['description2']=$hormone_treatment_description[0]->description2;

        return view('admin.add_hormone_treatment_description_data',$data);
    }


    public function store_update_hormone_treatment_description_data(Request $request,$id){

        $validated=$request->validate([
            'title'=>'required',
            'description1'=>'required',
            'description2'=>'required',
        ]);

        $title=$request->input('title');
        $description1=$request->input('description1');
        $description2=$request->input('description2');
            
        DB::table('hormone_treatment_description')->where('id',$id)->update(['title'=>$title,'description1'=>$description1,'description2'=>$description2]);

        return redirect('/admin/hormone_treatment')->with('error','data updated successfully!!');
        
    }



    public function add_hormone_treatment_data($id){
        
        if($id==0){

            $data['title']='';

            $data['image']='';

            $data['id']=$id;
        }
        else{

            $hormone_treatment=DB::table('hormone_treatment')->where('id',$id)->get();

            $data['id']=$hormone_treatment[0]->id;

            $data['title']=$hormone_treatment[0]->title;

            $data['image']=$hormone_treatment[0]->image;
        }

        $data['hormone_treatment_list']=DB::table('hormone_treatment_list')->where('list_id',$id)->get();

        return view('admin.add_hormone_treatment_data',$data);
    }


    public function store_add_hormone_treatment_data(Request $request,$id){

         if($id ==0){
                $validated=$request->validate([
                    'title'=>'required',
                    'image'=>'required',
                ]);
            }else{
                $validated=$request->validate([
                    'title'=>'required',
                ]);
            }
            

            $title=$request->input('title');

            if($id ==0){

                $filename=$request->file('image');
                $imagename='';
                if($filename !=''){
                    $destination_path='uploads';
                    $imagename=time().'_'.$filename->getClientOriginalName();
                    $filename->move($destination_path,$imagename);
                }

                DB::table('hormone_treatment')->insert(['image'=>$imagename,'title'=>$title,]);

                $list_id=DB::table('hormone_treatment')->max('id');
                $list=$request->input('list');

                $count=0;

                if($list !=''){

                    $count=count($list);

                    for($i=0 ; $i<$count;$i++){

                       $list_data=$list[$i];
                       
                       DB::table('hormone_treatment_list')->insert(['list'=>$list_data,'list_id'=>$list_id]);

                    }
                }

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
                    DB::table('hormone_treatment')->where('id',$id)->update(['image'=>$imagename,]);
                }

                DB::table('hormone_treatment')->where('id',$id)->update(['title'=>$title ]);
                DB::table('hormone_treatment_list')->where('list_id',$id)->delete();
                $list_id=$id;
                $list=$request->input('list');

                $count=0;

                if($list !=''){

                    $count=count($list);

                    for($i=0 ; $i<$count;$i++){

                       $list_data=$list[$i];
                       
                       DB::table('hormone_treatment_list')->insert(['list'=>$list_data,'list_id'=>$list_id]);

                    }
                }

                $message='data updated successfully!!';
            }

            return redirect('/admin/hormone_treatment')->with('error',$message);
        
    }

    

    public function delete_hormone_treatment($id){

        $usedata=DB::table('hormone_treatment')->where('id',$id)->get();

        $image=$usedata[0]->image;
        if($image !=''){
            unlink(public_path('/uploads/'.$image));
        }

        DB::table('hormone_treatment')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    }

 


     public function low_dose_treatment(){

        $data['low_dose_treatment_description']=DB::table('low_dose_treatment_description')->get();

        return view('admin.low_dose_treatment',$data);
    }



     public function update_low_dose_treatment_description_data($id){
        
            $low_dose_treatment_description=DB::table('low_dose_treatment_description')->where('id',$id)->get();

            $data['id']=$low_dose_treatment_description[0]->id;

            $data['title']=$low_dose_treatment_description[0]->title;

            $data['description']=$low_dose_treatment_description[0]->description;

        return view('admin.add_low_dose_treatment_description_data',$data);
    }


    public function store_update_low_dose_treatment_description_data(Request $request,$id){

        $validated=$request->validate([
            'title'=>'required',
            'description'=>'required',
        ]);

        $title=$request->input('title');
        $description=$request->input('description');
            
        DB::table('low_dose_treatment_description')->where('id',$id)->update(['title'=>$title,'description'=>$description]);

        return redirect('/admin/low_dose_treatment')->with('error','data updated successfully!!');
        
    }


    public function vaginal_treatment(){

        $data['vaginal_treatment']=DB::table('vaginal_treatment')->get();

        $data['vaginal_treatment_description']=DB::table('vaginal_treatment_description')->get();

        return view('admin.vaginal_treatment',$data);
    }



     public function update_vaginal_treatment_description_data($id){
        
            $vaginal_treatment_description=DB::table('vaginal_treatment_description')->where('id',$id)->get();

            $data['id']=$vaginal_treatment_description[0]->id;

            $data['title']=$vaginal_treatment_description[0]->title;

            $data['description1']=$vaginal_treatment_description[0]->description1;

            $data['description2']=$vaginal_treatment_description[0]->description2;

        return view('admin.add_vaginal_treatment_description_data',$data);
    }


    public function store_update_vaginal_treatment_description_data(Request $request,$id){

        $validated=$request->validate([
            'title'=>'required',
            'description1'=>'required',
            'description2'=>'required',
        ]);

        $title=$request->input('title');
        $description1=$request->input('description1');
        $description2=$request->input('description2');
            
        DB::table('vaginal_treatment_description')->where('id',$id)->update(['title'=>$title,'description1'=>$description1,'description2'=>$description2]);

        return redirect('/admin/vaginal_treatment')->with('error','data updated successfully!!');
        
    }



    public function add_vaginal_treatment_data($id){
        
        if($id==0){

            $data['title']='';

            $data['description']='';

            $data['benefit_description']='';

            $data['id']=$id;
        }
        else{

            $vaginal_treatment=DB::table('vaginal_treatment')->where('id',$id)->get();

            $data['id']=$vaginal_treatment[0]->id;

            $data['title']=$vaginal_treatment[0]->title;

            $data['description']=$vaginal_treatment[0]->description;

            $data['benefit_description']=$vaginal_treatment[0]->benefit_description;

        }

        return view('admin.add_vaginal_treatment_data',$data);
    }


    public function store_add_vaginal_treatment_data(Request $request,$id){

         if($id ==0){
                $validated=$request->validate([
                    'title'=>'required',
                    'description'=>'required',
                    'benefit_description'=>'required',

                ]);
            }else{
                $validated=$request->validate([
                    'title'=>'required',
                    'description'=>'required',
                    'benefit_description'=>'required',
                ]);
            }
            

            $title=$request->input('title');
            $description=$request->input('description');
            $benefit_description=$request->input('benefit_description');


            if($id ==0){
                
                DB::table('vaginal_treatment')->insert(['title'=>$title,'description'=>$description,'benefit_description'=>$benefit_description]);
    
                $message='data submitted successfully!!';
            }
    
            else{
    
                DB::table('vaginal_treatment')->where('id',$id)->update(['title'=>$title,'description'=>$description,'benefit_description'=>$benefit_description]);
                $message='data updated successfully!!';
    
            }

            
            return redirect('/admin/vaginal_treatment')->with('error',$message);
        
    }

    

    public function delete_vaginal_treatment($id){

        DB::table('vaginal_treatment')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    }
    
    
      public function prescription_treatment(){

        $data['prescription_treatment_description']=DB::table('prescription_treatment_description')->get();

        return view('admin.prescription_treatment',$data);
    }



     public function update_prescription_treatment_description_data($id){
        
            $prescription_treatment_description=DB::table('prescription_treatment_description')->where('id',$id)->get();

            $data['id']=$prescription_treatment_description[0]->id;

            $data['title']=$prescription_treatment_description[0]->title;

            $data['description']=$prescription_treatment_description[0]->description;

        return view('admin.add_prescription_treatment_description_data',$data);
    }


    public function store_update_prescription_treatment_description_data(Request $request,$id){

        $validated=$request->validate([
            'title'=>'required',
            'description'=>'required',
        ]);

        $title=$request->input('title');
        $description=$request->input('description');
            
        DB::table('prescription_treatment_description')->where('id',$id)->update(['title'=>$title,'description'=>$description]);

        return redirect('/admin/prescription_treatment')->with('error','data updated successfully!!');
        
    }



}

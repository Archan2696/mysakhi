<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class AboutController extends Controller
{
     public function __construct(){

            $this->middleware('auth:admin');
    }
    
    public function about_banner(){

        $data['about_banner']=DB::table('about_banner')->get();

        return view('admin.about.about_banner',$data);
    }


    public function add_about_banner_data($id){
        
            $about_banner=DB::table('about_banner')->where('id',$id)->get();

            $data['id']=$about_banner[0]->id;

            $data['image']=$about_banner[0]->image;

            $data['title1']=$about_banner[0]->title1;
            $data['title2']=$about_banner[0]->title2;
            $data['title3']=$about_banner[0]->title3;

        return view('admin.about.add_about_banner_data',$data);
    }


    public function store_add_about_banner_data(Request $request,$id){

        $validated=$request->validate([
            'title1'=>'required',
            'title2'=>'required',
            'title3'=>'required',
        ]);

        $title1=$request->input('title1');
        $title2=$request->input('title2');
        $title3=$request->input('title3');

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
            DB::table('about_banner')->where('id',$id)->update(['image'=>$imagename,]);
        }
            
        DB::table('about_banner')->where('id',$id)->update(['title1'=>$title1,'title2'=>$title2,'title3'=>$title3]);

        return redirect('/admin/about_banner')->with('error','data updated successfully!!');
        
    }




    public function about_meno_phases(){

        $data['about_meno_phases']=DB::table('about_meno_phases')->get();

        $data['about_meno_phases_description']=DB::table('about_meno_phases_description')->get();

        return view('admin.about.about_meno_phases',$data);
    }

     public function update_about_meno_phases_description_data($id){
        
            $about_meno_phases_description=DB::table('about_meno_phases_description')->where('id',$id)->get();

            $data['id']=$about_meno_phases_description[0]->id;

            $data['title']=$about_meno_phases_description[0]->title;

        return view('admin.about.add_about_meno_phases_description_data',$data);
    }


    public function store_update_about_meno_phases_description_data(Request $request,$id){

        $validated=$request->validate([
            'title'=>'required',
        ]);

        $title=$request->input('title');
            
        DB::table('about_meno_phases_description')->where('id',$id)->update(['title'=>$title,]);

        return redirect('/admin/about_meno_phases')->with('error','data updated successfully!!');
        
    }


    public function add_about_meno_phases_data($id){
        
        if($id==0){

            $data['image']='';

            $data['name']='';

            $data['id']=$id;
        }
        else{

            $about_meno_phases=DB::table('about_meno_phases')->where('id',$id)->get();

            $data['id']=$about_meno_phases[0]->id;

            $data['image']=$about_meno_phases[0]->image;

            $data['name']=$about_meno_phases[0]->name;
        }

        return view('admin.about.add_about_meno_phases_data',$data);
    }


    public function store_add_about_meno_phases_data(Request $request,$id){

         if($id ==0){
                $validated=$request->validate([
                    'image'=>'required',
                    'name'=>'required',
                ]);
            }else{
                $validated=$request->validate([
                    'name'=>'required',
                ]);
            }
            

            $name=$request->input('name');

            if($id ==0){

                $filename=$request->file('image');
                $imagename='';
                if($filename !=''){
                    $destination_path='uploads';
                    $imagename=time().'_'.$filename->getClientOriginalName();
                    $filename->move($destination_path,$imagename);
                }

                DB::table('about_meno_phases')->insert(['image'=>$imagename,'name'=>$name,]);

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
                    DB::table('about_meno_phases')->where('id',$id)->update(['image'=>$imagename,]);
                }

                DB::table('about_meno_phases')->where('id',$id)->update(['name'=>$name]);
                $message='data updated successfully!!';
            }

            return redirect('/admin/about_meno_phases')->with('error',$message);
        
    }

    

    public function delete_about_meno_phases($id){

        $usedata=DB::table('about_meno_phases')->where('id',$id)->get();

        $image=$usedata[0]->image;
        if($image !=''){
            unlink(public_path('/uploads/'.$image));
        }

        DB::table('about_meno_phases')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    }






    public function about_phase_qa(){

        $data['about_phase_qa']=DB::table('about_phase_qa')->get();

        $data['about_phase_qa_description']=DB::table('about_meno_phases_description')->get();

        return view('admin.about.about_phase_qa',$data);
    }

     public function update_about_phase_qa_description_data($id){
        
            $about_phase_qa_description=DB::table('about_meno_phases_description')->where('id',$id)->get();

            $data['id']=$about_phase_qa_description[0]->id;

            $data['sub_title']=$about_phase_qa_description[0]->sub_title;

        return view('admin.about.add_about_phase_qa_description_data',$data);
    }


    public function store_update_about_phase_qa_description_data(Request $request,$id){

        $validated=$request->validate([
            'sub_title'=>'required',
        ]);

        $sub_title=$request->input('sub_title');
            
        DB::table('about_meno_phases_description')->where('id',$id)->update(['sub_title'=>$sub_title,]);

        return redirect('/admin/about_phase_qa')->with('error','data updated successfully!!');
        
    }


    public function add_about_phase_qa_data($id){
        
        if($id==0){

            $data['question']='';

            $data['answer']='';

            $data['id']=$id;
        }
        else{

            $about_phase_qa=DB::table('about_phase_qa')->where('id',$id)->get();

            $data['id']=$about_phase_qa[0]->id;

            $data['question']=$about_phase_qa[0]->question;

            $data['answer']=$about_phase_qa[0]->answer;
        }

        return view('admin.about.add_about_phase_qa_data',$data);
    }


    public function store_add_about_phase_qa_data(Request $request,$id){

            $validated=$request->validate([
                'question'=>'required',
                'answer'=>'required',
            ]);
            
            $question=$request->input('question');
            $answer=$request->input('answer');

            if($id ==0){

                DB::table('about_phase_qa')->insert(['question'=>$question,'answer'=>$answer,]);

                $message='data submitted successfully!!';
            }
            else{

                DB::table('about_phase_qa')->where('id',$id)->update(['question'=>$question,'answer'=>$answer,]);
                $message='data updated successfully!!';
            }

            return redirect('/admin/about_phase_qa')->with('error',$message);
        
    }

    

    public function delete_about_phase_qa($id){

        DB::table('about_phase_qa')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    }






    public function about_symptoms(){

        $data['about_symptoms']=DB::table('about_symptoms')->get();

        $data['about_symptoms_description']=DB::table('about_symptoms_description')->get();

        return view('admin.about.about_symptoms',$data);
    }

     public function update_about_symptoms_description_data($id){
        
            $about_symptoms_description=DB::table('about_symptoms_description')->where('id',$id)->get();

            $data['id']=$about_symptoms_description[0]->id;

            $data['title']=$about_symptoms_description[0]->title;

            $data['sub_title']=$about_symptoms_description[0]->sub_title;

        return view('admin.about.add_about_symptoms_description_data',$data);
    }


    public function store_update_about_symptoms_description_data(Request $request,$id){

        $validated=$request->validate([
            'title'=>'required',
            'sub_title'=>'required',
        ]);

        $title=$request->input('title');

        $sub_title=$request->input('sub_title');
            
        DB::table('about_symptoms_description')->where('id',$id)->update(['title'=>$title,'sub_title'=>$sub_title,]);

        return redirect('/admin/about_symptoms')->with('error','data updated successfully!!');
        
    }


    public function add_about_symptoms_data($id){
        
        if($id==0){

            $data['image']='';

            $data['title']='';

            $data['sub_title']='';

            $data['description']='';

            $data['id']=$id;
        }
        else{

            $about_symptoms=DB::table('about_symptoms')->where('id',$id)->get();

            $data['id']=$about_symptoms[0]->id;

            $data['image']=$about_symptoms[0]->image;

            $data['title']=$about_symptoms[0]->title;

            $data['sub_title']=$about_symptoms[0]->sub_title;

            $data['description']=$about_symptoms[0]->description;
        }

        return view('admin.about.add_about_symptoms_data',$data);
    }


    public function store_add_about_symptoms_data(Request $request,$id){

         if($id ==0){
                $validated=$request->validate([
                    'image'=>'required',
                    'title'=>'required',
                    'sub_title'=>'required',
                    'description'=>'required',
                ]);
            }else{
                $validated=$request->validate([
                    'title'=>'required',
                    'sub_title'=>'required',
                    'description'=>'required',
                ]);
            }
            

            $title=$request->input('title');
            $sub_title=$request->input('sub_title');
            $description=$request->input('description');

            if($id ==0){

                $filename=$request->file('image');
                $imagename='';
                if($filename !=''){
                    $destination_path='uploads';
                    $imagename=time().'_'.$filename->getClientOriginalName();
                    $filename->move($destination_path,$imagename);
                }

                DB::table('about_symptoms')->insert(['image'=>$imagename,'title'=>$title,'sub_title'=>$sub_title,'description'=>$description,]);

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
                    DB::table('about_symptoms')->where('id',$id)->update(['image'=>$imagename,]);
                }

                DB::table('about_symptoms')->where('id',$id)->update(['title'=>$title,'sub_title'=>$sub_title,'description'=>$description,]);
                $message='data updated successfully!!';
            }

            return redirect('/admin/about_symptoms')->with('error',$message);
        
    }

    

    public function delete_about_symptoms($id){

        $usedata=DB::table('about_symptoms')->where('id',$id)->get();

        $image=$usedata[0]->image;
        if($image !=''){
            unlink(public_path('/uploads/'.$image));
        }

        DB::table('about_symptoms')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    }










    public function about_modification(){

        $data['about_modification']=DB::table('about_modification')->get();

        $data['about_modification_description']=DB::table('about_modification_description')->get();

        return view('admin.about.about_modification',$data);
    }

     public function update_about_modification_description_data($id){
        
            $about_modification_description=DB::table('about_modification_description')->where('id',$id)->get();

            $data['id']=$about_modification_description[0]->id;

            $data['title']=$about_modification_description[0]->title;

            $data['sub_title']=$about_modification_description[0]->sub_title;

        return view('admin.about.add_about_modification_description_data',$data);
    }


    public function store_update_about_modification_description_data(Request $request,$id){

        $validated=$request->validate([
            'title'=>'required',
            'sub_title'=>'required',
        ]);

        $title=$request->input('title');

        $sub_title=$request->input('sub_title');
            
        DB::table('about_modification_description')->where('id',$id)->update(['title'=>$title,'sub_title'=>$sub_title,]);

        return redirect('/admin/about_modification')->with('error','data updated successfully!!');
        
    }


    public function add_about_modification_data($id){
        
        if($id==0){

            $data['title']='';

            $data['description']='';

            $data['id']=$id;
        }
        else{

            $about_modification=DB::table('about_modification')->where('id',$id)->get();

            $data['id']=$about_modification[0]->id;

            $data['title']=$about_modification[0]->title;

            $data['description']=$about_modification[0]->description;
        }

        return view('admin.about.add_about_modification_data',$data);
    }


    public function store_add_about_modification_data(Request $request,$id){

            $validated=$request->validate([
                'title'=>'required',
                'description'=>'required',
            ]);
            
            

            $title=$request->input('title');
            $description=$request->input('description');

            if($id ==0){

                DB::table('about_modification')->insert(['title'=>$title,'description'=>$description,]);

                $message='data submitted successfully!!';
            }
            else{

                DB::table('about_modification')->where('id',$id)->update(['title'=>$title,'description'=>$description,]);
                $message='data updated successfully!!';
            }

            return redirect('/admin/about_modification')->with('error',$message);
        
    }

    

    public function delete_about_modification($id){
        
        DB::table('about_modification')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    }









    public function about_checkup(){

        $data['about_checkup']=DB::table('about_checkup')->get();

        return view('admin.about.about_checkup',$data);
    }


    public function add_about_checkup_data($id){
        
            $about_checkup=DB::table('about_checkup')->where('id',$id)->get();

            $data['id']=$about_checkup[0]->id;

            $data['image']=$about_checkup[0]->image;
            $data['s_image']=$about_checkup[0]->s_image;

            $data['title1']=$about_checkup[0]->title1;
            $data['title2']=$about_checkup[0]->title2;
            $data['h_text']=$about_checkup[0]->h_text;
            $data['description']=$about_checkup[0]->description;

        return view('admin.about.add_about_checkup_data',$data);
    }


    public function store_add_about_checkup_data(Request $request,$id){

        $validated=$request->validate([
            'title1'=>'required',
            'title2'=>'required',
            'highlight_text'=>'required',
            'description'=>'required',
        ]);

        $title1=$request->input('title1');
        $title2=$request->input('title2');
        $highlight_text=$request->input('highlight_text');
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
            DB::table('about_checkup')->where('id',$id)->update(['image'=>$imagename,]);
        }

        $fileimage1=$request->file('s_image');
        $oldimage1=$request->input('olds_image');
        $imagename1='';
        if($fileimage1 !=''){
            $destination_path1='uploads';
            $imagename1=time().'_'.$fileimage1->getClientOriginalName();
            $fileimage1->move($destination_path1,$imagename1);
            if($oldimage1 !=''){
                unlink(public_path('/uploads/'.$oldimage1));
            }
            DB::table('about_checkup')->where('id',$id)->update(['s_image'=>$imagename1,]);
        }
            
        DB::table('about_checkup')->where('id',$id)->update(['title1'=>$title1,'title2'=>$title2,'h_text'=>$highlight_text,'description'=>$description,]);

        return redirect('/admin/about_checkup')->with('error','data updated successfully!!');
        
    }








    public function about_healthy(){

        $data['about_healthy']=DB::table('about_healthy')->get();

        return view('admin.about.about_healthy',$data);
    }


    public function add_about_healthy_data($id){
        
            $about_healthy=DB::table('about_healthy')->where('id',$id)->get();

            $data['id']=$about_healthy[0]->id;

            $data['image']=$about_healthy[0]->image;
            $data['title']=$about_healthy[0]->title;
            $data['description']=$about_healthy[0]->description;

        return view('admin.about.add_about_healthy_data',$data);
    }


    public function store_add_about_healthy_data(Request $request,$id){

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
            DB::table('about_healthy')->where('id',$id)->update(['image'=>$imagename,]);
        }
            
        DB::table('about_healthy')->where('id',$id)->update(['title'=>$title,'description'=>$description,]);

        return redirect('/admin/about_healthy')->with('error','data updated successfully!!');
        
    }







    public function about_work(){

        $data['about_work']=DB::table('about_work')->get();

        return view('admin.about.about_work',$data);
    }


    public function add_about_work_data($id){
        
            $about_work=DB::table('about_work')->where('id',$id)->get();

            $data['id']=$about_work[0]->id;

            $data['image']=$about_work[0]->image;
            $data['title']=$about_work[0]->title;
            $data['description']=$about_work[0]->description;

        return view('admin.about.add_about_work_data',$data);
    }


    public function store_add_about_work_data(Request $request,$id){

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
            DB::table('about_work')->where('id',$id)->update(['image'=>$imagename,]);
        }
            
        DB::table('about_work')->where('id',$id)->update(['title'=>$title,'description'=>$description,]);

        return redirect('/admin/about_work')->with('error','data updated successfully!!');
        
    }






    public function about_myths(){

        $data['about_myths']=DB::table('about_myths')->get();

        return view('admin.about.about_myths',$data);
    }


    public function add_about_myths_data($id){
        
            $about_myths=DB::table('about_myths')->where('id',$id)->get();

            $data['id']=$about_myths[0]->id;

            $data['image']=$about_myths[0]->image;
            $data['title']=$about_myths[0]->title;
            $data['description']=$about_myths[0]->description;

        return view('admin.about.add_about_myths_data',$data);
    }


    public function store_add_about_myths_data(Request $request,$id){

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
            DB::table('about_myths')->where('id',$id)->update(['image'=>$imagename,]);
        }
            
        DB::table('about_myths')->where('id',$id)->update(['title'=>$title,'description'=>$description,]);

        return redirect('/admin/about_myths')->with('error','data updated successfully!!');
        
    }

    public function about_cta(){

        $data['about_cta']=DB::table('about_cta')->get();

        return view('admin.about.about_cta',$data);
    }


    public function add_about_cta_data($id){
        
            $about_cta=DB::table('about_cta')->where('id',$id)->get();

            $data['id']=$about_cta[0]->id;

            $data['image']=$about_cta[0]->image;
            $data['title1']=$about_cta[0]->title1;
            $data['title2']=$about_cta[0]->title2;
            $data['title3']=$about_cta[0]->title3;

        return view('admin.about.add_about_cta_data',$data);
    }


    public function store_add_about_cta_data(Request $request,$id){

        $validated=$request->validate([
            'title1'=>'required',
            'title2'=>'required',
            'title3'=>'required',
        ]);

        $title1=$request->input('title1');
        $title2=$request->input('title2');
        $title3=$request->input('title3');

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
            DB::table('about_cta')->where('id',$id)->update(['image'=>$imagename,]);
        }
            
        DB::table('about_cta')->where('id',$id)->update(['title1'=>$title1,'title2'=>$title2,'title3'=>$title3,]);

        return redirect('/admin/about_cta')->with('error','data updated successfully!!');
        
    }
    


}

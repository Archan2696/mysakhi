<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;

class Resourcecontroller extends Controller
{


    public function __construct(){

            $this->middleware('auth:admin');
    }
    
     public function patient_stories_banner(){  

        $data['patient_stories_banner']=DB::table('banner')->where('page_name',"patient_stories")->orwhere('page_name',"patient_detail")->get();

        return view('admin.patient_stories_banner',$data);
    }
    
      public function patient_detail_banner(){  

        $data['patient_stories_banner']=DB::table('banner')->where('page_name',"patient_stories")->orwhere('page_name',"patient_detail")->get();

        return view('admin.patient_detail_banner',$data);
    }
    
     public function glossary_faq_banner(){  

        $data['glossary_faq_banner']=DB::table('banner')->where('page_name',"glossary_faq")->get();

        return view('admin.glossary_faq_banner',$data);
    }
    

    public function glossary_title(){

        $data['glossary_title']=DB::table('glossary_title')->get();

        return view('admin.glossary_title',$data);
    }


    public function add_glossary_title_data($id){
        
        if($id==0){

            $data['title']='';

            $data['id']=$id;
        }
        else{

            $glossary_title=DB::table('glossary_title')->where('id',$id)->get();

            $data['id']=$glossary_title[0]->id;

            $data['title']=$glossary_title[0]->title;
        }

        return view('admin.add_glossary_title_data',$data);
    }


    public function store_add_glossary_title_data(Request $request,$id){

         if($id ==0){
                $validated=$request->validate([
                    'title'=>'required',
                ]);
            }else{
                $validated=$request->validate([
                    'title'=>'required',
                ]);
            }
            

            $title=$request->input('title');

            if($id ==0){

                DB::table('glossary_title')->insert(['title'=>$title]);

                $message='data submitted successfully!!';
            }
            else{

                DB::table('glossary_title')->where('id',$id)->update(['title'=>$title]);
                $message='data updated successfully!!';
            }

            return redirect('/admin/glossary_title')->with('error',$message);
        
    }

    

    public function delete_glossary_title($id){

        DB::table('glossary_title')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    }

       public function glossary_faq(){

        $data['glossary_title']=DB::table('glossary_title')->get();

        $data['glossary_faq']=DB::table('glossary_faq')->get();

        return view('admin.glossary_faq',$data);
    }


    public function add_glossary_faq_data($id){

        $data['glossary_title']=DB::table('glossary_title')->get();
        
        if($id==0){

            $data['title_id']='';            

            $data['question']='';

            $data['answer']='';

            $data['id']=$id;
        }
        else{

            $glossary_faq=DB::table('glossary_faq')->where('id',$id)->get();

            $data['id']=$glossary_faq[0]->id;

            $data['title_id']=$glossary_faq[0]->title_id;

            $data['question']=$glossary_faq[0]->question;

            $data['answer']=$glossary_faq[0]->answer;
        }

        return view('admin.add_glossary_faq_data',$data);
    }


    public function store_add_glossary_faq_data(Request $request,$id){

         if($id ==0){
                $validated=$request->validate([
                    'title_id'=>'required',
                    'question'=>'required',
                    'answer'=>'required',
                ]);
            }else{
                $validated=$request->validate([
                    'title_id'=>'required',
                    'question'=>'required',
                    'answer'=>'required',
                ]);
            }
            

            $question=$request->input('question');
            $answer=$request->input('answer');
            $title_id=$request->input('title_id');

            if($id ==0){

                DB::table('glossary_faq')->insert(['title_id'=>$title_id,'question'=>$question,'answer'=>$answer]);

                $message='data submitted successfully!!';
            }
            else{

                DB::table('glossary_faq')->where('id',$id)->update(['title_id'=>$title_id,'question'=>$question ,'answer'=>$answer]);
                $message='data updated successfully!!';
            }

            return redirect('/admin/glossary_faq')->with('error',$message);
        
    }

    

    public function delete_glossary_faq($id){

        DB::table('glossary_faq')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    }



    public function testimonial(){

        $data['testimonial_data']=DB::table('testimonial')->get();

        $data['testimonial_description']=DB::table('testimonial_description')->get();

        $data['testimonial_heading']=DB::table('testimonial_heading')->get();

        return view('admin.testimonial',$data);
    }


    public function update_testimonial_heading_data($id){
        
            $testimonial_heading=DB::table('testimonial_heading')->where('id',$id)->get();

            $data['id']=$testimonial_heading[0]->id;

            $data['title1']=$testimonial_heading[0]->title1;
            $data['title2']=$testimonial_heading[0]->title2;

        return view('admin.add_testimonial_heading_data',$data);
    }


    public function store_update_testimonial_heading_data(Request $request,$id){

        $validated=$request->validate([
            'title1'=>'required',
            'title2'=>'required',
        ]);

        $title1=$request->input('title1');
        $title2=$request->input('title2');

        DB::table('testimonial_heading')->where('id',$id)->update(['title1'=>$title1,'title2'=>$title2]);

        return redirect('/admin/testimonial')->with('error','data updated successfully!!');
        
    }


    public function add_testimonial_data($id){
        
        if($id==0){

            $data['name1']='';

            $data['name2']='';

            $data['opinion1']='';

            $data['opinion2']='';

            $data['image']='';

            $data['description']=[];

            $data['id']=$id;
        }
        else{

            $testimonial=DB::table('testimonial')->where('id',$id)->get();

            $data['id']=$testimonial[0]->id;

            $data['name1']=$testimonial[0]->name1;

            $data['name2']=$testimonial[0]->name2;

            $data['opinion1']=$testimonial[0]->opinion1;

            $data['opinion2']=$testimonial[0]->opinion2;

            $data['image']=$testimonial[0]->image;

            $data['description']=DB::table('testimonial_description')->where('testimonial_id',$id)->get();;
        }

        return view('admin.add_testimonial_data',$data);
    }


    public function store_add_testimonial_data(Request $request,$id){



        if($id ==0){
                $validated=$request->validate([
                    'image'=>'required',
                    'name1'=>'required',
                    'name2'=>'required',
                    'opinion1'=>'required',
                    'description'=>'required',
                ]);
            }else{
                $validated=$request->validate([
                    'name1'=>'required',
                    'name2'=>'required',
                    'opinion1'=>'required',
                    'description'=>'required',
                ]);
            }
            

            $name1=$request->input('name1');
            $name2=$request->input('name2');
            $opinion1=$request->input('opinion1');
            $opinion2=$request->input('opinion2');

            if($id ==0){

                $filename=$request->file('image');
                $imagename='';
                if($filename !=''){
                    $destination_path='uploads';
                    $imagename=time().'_'.$filename->getClientOriginalName();
                    $filename->move($destination_path,$imagename);
                }

                DB::table('testimonial')->insert(['image'=>$imagename,'name1'=>$name1,'name2'=>$name2,'opinion1'=>$opinion1,'opinion2'=>$opinion2]);

                  $testimonial_id =DB::table('testimonial')->max('id');

                    $description=$request->input('description');

                    $count=0;


                    if($description !=''){

                        $count=count($description);

                        for($i=0 ; $i<$count;$i++){

                           $description_data=$description[$i];
                           
                           DB::table('testimonial_description')->insert(['testimonial_id'=>$testimonial_id,'description'=>$description_data]);

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
                    DB::table('testimonial')->where('id',$id)->update(['image'=>$imagename,]);
                }

                    
                    DB::table('testimonial')->where('id',$id)->update(['name1'=>$name1,'name2'=>$name2,'opinion1'=>$opinion1,'opinion2'=>$opinion2]);


                    DB::table('testimonial_description')->where('testimonial_id',$id)->delete();


                    $description=$request->input('description');

                    $count=0;


                    if($description !=''){

                        $count=count($description);

                        for($i=0 ; $i<$count;$i++){

                           $description_data=$description[$i];
                           
                           DB::table('testimonial_description')->insert(['testimonial_id'=>$id,'description'=>$description_data]);

                        }
                    }
            }
                $message='data updated successfully!!';

            return redirect('/admin/testimonial')->with('error',$message);
        
    }

    

    public function delete_testimonial($id){

            $userdata=DB::table('testimonial')->where('id', $id)->get();

            $image=$userdata[0]->image;

            if($image !=''){
                unlink(public_path('/uploads/'.$image));
            }

            DB::table('testimonial_description')->where('testimonial_id', $id)->delete();

            DB::table('testimonial')->where('id', $id)->delete();
                return response()->json([
                    'success'=>'200',
        ]);
    }



    public function add_description(){
        
        return response()->json([
            'success'=>'200',
        ]);
    }



    public function remove_description(){
        
        return response()->json([
            'success'=>'200',
        ]);
    }



    public function glossary_faq_description(){

        $data['glossary_faq_description']=DB::table('glossary_faq_description')->get();

        return view('admin.glossary_faq_description',$data);
    }


    public function add_glossary_faq_description_data($id){
        
            $glossary_faq_description=DB::table('glossary_faq_description')->where('id',$id)->get();

            $data['id']=$glossary_faq_description[0]->id;

            $data['title']=$glossary_faq_description[0]->title;

            $data['description']=$glossary_faq_description[0]->description;

            $data['faq_title']=$glossary_faq_description[0]->faq_title;

        return view('admin.add_glossary_faq_description_data',$data);
    }


    public function store_add_glossary_faq_description_data(Request $request,$id){

        $validated=$request->validate([
            'title'=>'required',
            'description'=>'required',
            'faq_title'=>'required',
        ]);

        $title=$request->input('title');
        $description=$request->input('description');
        $faq_title=$request->input('faq_title');
            
        DB::table('glossary_faq_description')->where('id',$id)->update(['title'=>$title,'description'=>$description,'faq_title'=>$faq_title]);

        return redirect('/admin/glossary_faq_description')->with('error','data updated successfully!!');
        
    }



}

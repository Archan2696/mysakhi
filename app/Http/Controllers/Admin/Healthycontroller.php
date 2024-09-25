<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class Healthycontroller extends Controller
{
     public function __construct(){

            $this->middleware('auth:admin');
    }
    
    public function menopause_relationship(){

        $data['menopause_relationship']=DB::table('menopause_relationship')->get();

        $data['menopause_relationship_list']=DB::table('menopause_relationship_list')->get();

        $data['menopause_relationship_description']=DB::table('menopause_relationship_description')->get();

        return view('admin.menopause_relationship',$data);
    }



     public function update_menopause_relationship_description_data($id){
        
            $menopause_relationship_description=DB::table('menopause_relationship_description')->where('id',$id)->get();

            $data['id']=$menopause_relationship_description[0]->id;

            $data['title1']=$menopause_relationship_description[0]->title1;

            $data['title2']=$menopause_relationship_description[0]->title2;

            $data['description']=$menopause_relationship_description[0]->description;
            
            $data['highlight_description']=$menopause_relationship_description[0]->highlight_description;

        return view('admin.add_menopause_relationship_description_data',$data);
    }


    public function store_update_menopause_relationship_description_data(Request $request,$id){

        $validated=$request->validate([
            'title1'=>'required',
            'title2'=>'required',
            'description'=>'required',
            'highlight_description'=>'required',
        ]);

        $title1=$request->input('title1');
        $title2=$request->input('title2');
        $description=$request->input('description');
        $highlight_description=$request->input('highlight_description');
            
        DB::table('menopause_relationship_description')->where('id',$id)->update(['title1'=>$title1,'title2'=>$title2,'description'=>$description,'highlight_description'=>$highlight_description]);

        return redirect('/admin/menopause_relationship')->with('error','data updated successfully!!');
        
    }



    public function add_menopause_relationship_data($id){
        
        if($id==0){

            $data['title']='';

            $data['id']=$id;
        }
        else{

            $menopause_relationship=DB::table('menopause_relationship')->where('id',$id)->get();

            $data['id']=$menopause_relationship[0]->id;

            $data['title']=$menopause_relationship[0]->title;
        }

        $data['menopause_relationship_list']=DB::table('menopause_relationship_list')->where('list_id',$id)->get();

        return view('admin.add_menopause_relationship_data',$data);
    }


    public function store_add_menopause_relationship_data(Request $request,$id){

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

                DB::table('menopause_relationship')->insert(['title'=>$title,]);

                $list_id=DB::table('menopause_relationship')->max('id');
                $list=$request->input('list');
                $list_title=$request->input('list_title');


                $count=0;

                if($list !=''){

                    $count=count($list);

                    for($i=0 ; $i<$count;$i++){

                       $list_data=$list[$i];
                        $list_title_data=$list_title[$i];
                       
                       DB::table('menopause_relationship_list')->insert(['list'=>$list_data,'list_title'=>$list_title_data,'list_id'=>$list_id]);

                    }
                }

                $message='data submitted successfully!!';
            }
            else{

                DB::table('menopause_relationship')->where('id',$id)->update(['title'=>$title ]);
                DB::table('menopause_relationship_list')->where('list_id',$id)->delete();
                $list_id=$id;
                $list=$request->input('list');
                $list_title=$request->input('list_title');

                $count=0;

                if($list !=''){

                    $count1=count($list);
                     $count2=count($list_title);
                     
                    for($i=0 ; $i<$count1;$i++){

                      $list_data=$list[$i];
                        $list_title_data=$list_title[$i];
                       
                       DB::table('menopause_relationship_list')->insert(['list_title'=>$list_title_data,'list'=>$list_data,'list_id'=>$list_id]);

                    }
                    
                }

                $message='data updated successfully!!';
            }

            return redirect('/admin/menopause_relationship')->with('error',$message);
        
    }

    

    public function delete_menopause_relationship($id){

        DB::table('menopause_relationship')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    }


    public function interesting_facts(){

        $data['interesting_facts']=DB::table('interesting_facts')->get();

        $data['interesting_facts_description']=DB::table('interesting_facts_description')->get();

        return view('admin.interesting_facts',$data);
    }



     public function update_interesting_facts_description_data($id){
        
            $interesting_facts_description=DB::table('interesting_facts_description')->where('id',$id)->get();

            $data['id']=$interesting_facts_description[0]->id;

            $data['title']=$interesting_facts_description[0]->title;

        return view('admin.add_interesting_facts_description_data',$data);
    }


    public function store_update_interesting_facts_description_data(Request $request,$id){

        $validated=$request->validate([
            'title'=>'required',
        ]);

        $title=$request->input('title');
            
        DB::table('interesting_facts_description')->where('id',$id)->update(['title'=>$title]);

        return redirect('/admin/interesting_facts')->with('error','data updated successfully!!');
        
    }



    public function add_interesting_facts_data($id){
        
        if($id==0){


            $data['title']='';

            $data['description']='';

            $data['id']=$id;
        }
        else{

            $interesting_facts=DB::table('interesting_facts')->where('id',$id)->get();

            $data['id']=$interesting_facts[0]->id;

            $data['title']=$interesting_facts[0]->title;

            $data['description']=$interesting_facts[0]->description;

        }

        return view('admin.add_interesting_facts_data',$data);
    }


    public function store_add_interesting_facts_data(Request $request,$id){

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
                
                DB::table('interesting_facts')->insert(['title'=>$title,'description'=>$description]);
    
                $message='data submitted successfully!!';
            }
    
            else{
    
                DB::table('interesting_facts')->where('id',$id)->update(['title'=>$title,'description'=>$description]);
                $message='data updated successfully!!';
    
            }
    
            return redirect('/admin/interesting_facts')->with('error',$message);
        
    }

    

    public function delete_interesting_facts($id){

        DB::table('interesting_facts')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    }

     public function monohealth(){

        $data['monohealth']=DB::table('monohealth')->get();

        return view('admin.monohealth',$data);
    }



     public function add_monohealth_data($id){
        
           if($id==0){


            $data['image1']='';

            $data['image2']='';

            $data['description1']='';

            $data['description2']='';

            $data['id']=$id;
        }
        else{

            $interesting_facts=DB::table('monohealth')->where('id',$id)->get();

            $data['id']=$interesting_facts[0]->id;

            $data['image1']=$interesting_facts[0]->image1;

            $data['image2']=$interesting_facts[0]->image2;

            $data['description1']=$interesting_facts[0]->description1;

            $data['description2']=$interesting_facts[0]->description2;

        }
        return view('admin.add_monohealth_data',$data);
    }


    public function store_add_monohealth_data(Request $request,$id){

        $validated=$request->validate([
            'description1'=>'required',
            'description2'=>'required',
        ]);

        $description1=$request->input('description1');
        $description2=$request->input('description2');

        $file1=$request->file('image1');

        $file2=$request->file('image2');

        $oldimage1=$request->input('oldimage1');

        $oldimage2=$request->input('oldimage2');

        $imagename1='';

        $imagename2='';

        if($file1){

            $destination_path1='uploads';

            $imagename1=time().'_'.$file1->getClientOriginalName();

            $file1->move($destination_path1,$imagename1);

            if($oldimage1){

                unlink(public_path('/uploads/'.$oldimage1));
            }

            DB::table('monohealth')->where('id',$id)->update(['image1'=>$imagename1]);
        }

        if($file2){

            $destination_path2='uploads';

            $imagename2=time().'_'.$file2->getClientOriginalName();

            $file2->move($destination_path2,$imagename2);

            if($oldimage2){

                unlink(public_path('/uploads/'.$oldimage2));
            }

            DB::table('monohealth')->where('id',$id)->update(['image2'=>$imagename2]);
        }
            
        DB::table('monohealth')->where('id',$id)->update(['description1'=>$description1,'description2'=>$description2]);

        return redirect('/admin/monohealth')->with('error','data updated successfully!!');
        
    }


    public function negative_changes_heading(){

        $data['negative_changes_heading']=DB::table('negative_changes_heading')->get();

        return view('admin.negative_changes_heading',$data);
        }



     public function add_negative_changes_heading_data($id){
        
           if($id==0){


            $data['title1']='';

            $data['title2']='';

            $data['description']='';
            
            $data['remember_description']='';

            $data['id']=$id;
        }
        else{

            $interesting_facts=DB::table('negative_changes_heading')->where('id',$id)->get();

            $data['id']=$interesting_facts[0]->id;

            $data['title1']=$interesting_facts[0]->title1;

            $data['title2']=$interesting_facts[0]->title2;

            $data['description']=$interesting_facts[0]->description;
            
            $data['remember_description']=$interesting_facts[0]->remember_description;

        }
        return view('admin.add_negative_changes_heading_data',$data);
    }


    public function store_add_negative_changes_heading_data(Request $request,$id){

        $validated=$request->validate([
            'title1'=>'required',
            'title2'=>'required',
            'description'=>'required',
            'remember_description'=>'required',
        ]);

        $title1=$request->input('title1');
        $title2=$request->input('title2');
        $description=$request->input('description');
        $remember_description=$request->input('remember_description');
            
        DB::table('negative_changes_heading')->where('id',$id)->update(['title1'=>$title1,'title2'=>$title2,'description'=>$description,'remember_description'=>$remember_description]);

        return redirect('/admin/negative_changes_heading')->with('error','data updated successfully!!');
        
    }

    public function understand_changes(){

        $data['understand_changes']=DB::table('understand_changes')->get();

        $data['understand_changes_description']=DB::table('understand_changes_description')->get();

        return view('admin.understand_changes',$data);
    }



     public function update_understand_changes_description_data($id){
        
            $understand_changes_description=DB::table('understand_changes_description')->where('id',$id)->get();

            $data['id']=$understand_changes_description[0]->id;

            $data['title']=$understand_changes_description[0]->title;

            $data['image']=$understand_changes_description[0]->image;

        return view('admin.add_understand_changes_description_data',$data);
    }


    public function store_update_understand_changes_description_data(Request $request,$id){

        $validated=$request->validate([
            'title'=>'required',
        ]);

        $title=$request->input('title');

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

            DB::table('understand_changes_description')->where('id',$id)->update(['image'=>$imagename]);
        }
            
        DB::table('understand_changes_description')->where('id',$id)->update(['title'=>$title]);

        return redirect('/admin/understand_changes')->with('error','data updated successfully!!');
        
    }



    public function add_understand_changes_data($id){
        
        if($id==0){


            $data['title']='';

            $data['image']='';

            $data['description']='';

            $data['id']=$id;
        }
        else{

            $understand_changes=DB::table('understand_changes')->where('id',$id)->get();

            $data['id']=$understand_changes[0]->id;

            $data['title']=$understand_changes[0]->title;

            $data['image']=$understand_changes[0]->image;

            $data['description']=$understand_changes[0]->description;

        }

        return view('admin.add_understand_changes_data',$data);
    }


    public function store_add_understand_changes_data(Request $request,$id){

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

                $filename=$request->file('image');
                $imagename='';
                if($filename !=''){
                    $destination_path='uploads';
                    $imagename=time().'_'.$filename->getClientOriginalName();
                    $filename->move($destination_path,$imagename);
                }

                DB::table('understand_changes')->insert(['image'=>$imagename,'title'=>$title,'description'=>$description]);

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
                    DB::table('understand_changes')->where('id',$id)->update(['image'=>$imagename,]);
                }

                DB::table('understand_changes')->where('id',$id)->update(['title'=>$title ,'description'=>$description]);
                $message='data updated successfully!!';
            }
    
            return redirect('/admin/understand_changes')->with('error',$message);
        
    }

    

    public function delete_understand_changes($id){


        $userdata=DB::table('understand_changes')->where('id',$id)->get();

        $image=$userdata[0]->image;

        if($image !=''){
            unlink(public_path('/uploads/'.$image));
        }

        DB::table('understand_changes')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    }


    public function keeping_alive(){

        $data['keeping_alive']=DB::table('keeping_alive')->get();

        $data['keeping_alive_description']=DB::table('keeping_alive_description')->get();

        return view('admin.keeping_alive',$data);
    }



     public function update_keeping_alive_description_data($id){
        
            $keeping_alive_description=DB::table('keeping_alive_description')->where('id',$id)->get();

            $data['id']=$keeping_alive_description[0]->id;

            $data['title']=$keeping_alive_description[0]->title;

            $data['image']=$keeping_alive_description[0]->image;

        return view('admin.add_keeping_alive_description_data',$data);
    }


    public function store_update_keeping_alive_description_data(Request $request,$id){

        $validated=$request->validate([
            'title'=>'required',
        ]);

        $title=$request->input('title');

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

            DB::table('keeping_alive_description')->where('id',$id)->update(['image'=>$imagename]);
        }
            
        DB::table('keeping_alive_description')->where('id',$id)->update(['title'=>$title]);

        return redirect('/admin/keeping_alive')->with('error','data updated successfully!!');
        
    }



    public function add_keeping_alive_data($id){
        
        if($id==0){


            $data['title']='';

            $data['description']='';

            $data['id']=$id;
        }
        else{

            $keeping_alive=DB::table('keeping_alive')->where('id',$id)->get();

            $data['id']=$keeping_alive[0]->id;

            $data['title']=$keeping_alive[0]->title;

            $data['description']=$keeping_alive[0]->description;

        }

        return view('admin.add_keeping_alive_data',$data);
    }


    public function store_add_keeping_alive_data(Request $request,$id){

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
                
                DB::table('keeping_alive')->insert(['title'=>$title,'description'=>$description]);
    
                $message='data submitted successfully!!';
            }
    
            else{
    
                DB::table('keeping_alive')->where('id',$id)->update(['title'=>$title,'description'=>$description]);
                $message='data updated successfully!!';
    
            }
    
            return redirect('/admin/keeping_alive')->with('error',$message);
        
    }

    

    public function delete_keeping_alive($id){

        DB::table('keeping_alive')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    }

}
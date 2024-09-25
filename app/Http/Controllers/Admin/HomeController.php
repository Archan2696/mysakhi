<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;

class HomeController extends Controller
{

    public function __construct(){

            $this->middleware('auth:admin');
    }

    public function home_concerned(){

        $data['home_concerned']=DB::table('home_concerned')->get();

        $data['home_concerned_description']=DB::table('home_concerned_description')->get();

        return view('admin.home_concerned',$data);
    }


    public function update_home_concerned_description_data($id){
        
            $home_concerned_description=DB::table('home_concerned_description')->where('id',$id)->get();

            $data['id']=$home_concerned_description[0]->id;

            $data['image']=$home_concerned_description[0]->image;

            $data['title1']=$home_concerned_description[0]->title1;

            $data['title2']=$home_concerned_description[0]->title2;

            $data['title3']=$home_concerned_description[0]->title3;

            $data['sub_title1']=$home_concerned_description[0]->sub_title1;

            $data['sub_title2']=$home_concerned_description[0]->sub_title2;

        return view('admin.add_home_concerned_description_data',$data);
    }


    public function store_update_home_concerned_description_data(Request $request,$id){

        $validated=$request->validate([
            'title1'=>'required',
            'title2'=>'required',
            'title3'=>'required',
            'sub_title1'=>'required',
            'sub_title2'=>'required',
        ]);

        $title1=$request->input('title1');
        $title2=$request->input('title2');
        $title3=$request->input('title3');
        $sub_title1=$request->input('sub_title1');
        $sub_title2=$request->input('sub_title2');

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

            DB::table('home_concerned_description')->where('id',$id)->update(['image'=>$imagename]);
        }
            
        DB::table('home_concerned_description')->where('id',$id)->update(['title1'=>$title1,'title2'=>$title2,'title3'=>$title3,'sub_title1'=>$sub_title1,'sub_title2'=>$sub_title2]);

        return redirect('/admin/home_concerned')->with('error','data updated successfully!!');
        
    }


    public function add_home_concerned_data($id){
        
        if($id==0){

            $data['name']='';

            $data['count']='';

            $data['id']=$id;
        }
        else{

            $home_concerned=DB::table('home_concerned')->where('id',$id)->get();

            $data['id']=$home_concerned[0]->id;

            $data['name']=$home_concerned[0]->name;

            $data['count']=$home_concerned[0]->count;
        }

        return view('admin.add_home_concerned_data',$data);
    }


    public function store_add_home_concerned_data(Request $request,$id){

        $validated=$request->validate([
            'name'=>'required',
            'count'=>'required',
        ]);

        $name=$request->input('name');

        $count=$request->input('count');

        if($id ==0){
            
            DB::table('home_concerned')->insert(['name'=>$name,'count'=>$count]);

            $message='data submitted successfully!!';
        }

        else{

            DB::table('home_concerned')->where('id',$id)->update(['name'=>$name , 'count'=>$count]);
            $message='data updated successfully!!';

        }

        return redirect('/admin/home_concerned')->with('error',$message);
        
    }

    

    public function delete_home_concerned($id){

        DB::table('home_concerned')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    }






    public function home_mission(){

        $data['home_mission']=DB::table('home_mission')->get();

        $data['home_mission_description']=DB::table('home_mission_description')->get();

        return view('admin.home_mission',$data);
    }


    public function update_home_mission_description_data($id){
        
            $home_mission_description=DB::table('home_mission_description')->where('id',$id)->get();

            $data['id']=$home_mission_description[0]->id;

            $data['image1']=$home_mission_description[0]->image1;
            // $data['image2']=$home_mission_description[0]->image2;
            // $data['image3']=$home_mission_description[0]->image3;
            // $data['image4']=$home_mission_description[0]->image4;

            $data['title1']=$home_mission_description[0]->title1;
            $data['title2']=$home_mission_description[0]->title2;

        return view('admin.add_home_mission_description_data',$data);
    }


    public function store_update_home_mission_description_data(Request $request,$id){

        $validated=$request->validate([
            'title1'=>'required',
            'title2'=>'required',
        ]);

        $title1=$request->input('title1');
        $title2=$request->input('title2');

        $filename1=$request->file('image1');
        $oldimage1=$request->input('oldimage1');
        $imagename1='';
        if($filename1 !=''){
            $destination_path1='uploads';
            $imagename1=time().'_'.$filename1->getClientOriginalName();
            $filename1->move($destination_path1,$imagename1);
            if($oldimage1 !=''){
                unlink(public_path('/uploads/'.$oldimage1));
            }
            DB::table('home_mission_description')->where('id',$id)->update(['image1'=>$imagename1,]);
        }

        // $filename2=$request->file('image2');
        // $oldimage2=$request->input('oldimage2');
        // $imagename2='';
        // if($filename2 !=''){
        //     $destination_path2='uploads';
        //     $imagename2=time().'_'.$filename2->getClientOriginalName();
        //     $filename2->move($destination_path2,$imagename2);
        //     if($oldimage2 !=''){
        //         unlink(public_path('/uploads/'.$oldimage2));
        //     }
        //     DB::table('home_mission_description')->where('id',$id)->update(['image2'=>$imagename2,]);
        // }

        // $filename3=$request->file('image3');
        // $oldimage3=$request->input('oldimage3');
        // $imagename3='';
        // if($filename3 !=''){
        //     $destination_path3='uploads';
        //     $imagename3=time().'_'.$filename3->getClientOriginalName();
        //     $filename3->move($destination_path3,$imagename3);
        //     if($oldimage3 !=''){
        //         unlink(public_path('/uploads/'.$oldimage3));
        //     }
        //     DB::table('home_mission_description')->where('id',$id)->update(['image3'=>$imagename3,]);
        // }

        // $filename4=$request->file('image4');
        // $oldimage4=$request->input('oldimage4');
        // $imagename4='';
        // if($filename4 !=''){
        //     $destination_path4='uploads';
        //     $imagename4=time().'_'.$filename4->getClientOriginalName();
        //     $filename4->move($destination_path4,$imagename4);
        //     if($oldimage4 !=''){
        //         unlink(public_path('/uploads/'.$oldimage4));
        //     }
        //     DB::table('home_mission_description')->where('id',$id)->update(['image4'=>$imagename4,]);
        // }

            
        DB::table('home_mission_description')->where('id',$id)->update(['title1'=>$title1,'title2'=>$title2]);

        return redirect('/admin/home_mission')->with('error','data updated successfully!!');
        
    }


    public function add_home_mission_data($id){
        
        if($id==0){

            $data['image']='';

            $data['title']='';

            $data['description']='';

            $data['id']=$id;
        }
        else{

            $home_mission=DB::table('home_mission')->where('id',$id)->get();

            $data['id']=$home_mission[0]->id;

            $data['image']=$home_mission[0]->image;

            $data['title']=$home_mission[0]->title;

            $data['description']=$home_mission[0]->description;
        }

        return view('admin.add_home_mission_data',$data);
    }


    public function store_add_home_mission_data(Request $request,$id){

        
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

                DB::table('home_mission')->insert(['image'=>$imagename,'title'=>$title,'description'=>$description]);

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
                    DB::table('home_mission')->where('id',$id)->update(['image'=>$imagename,]);
                }

                DB::table('home_mission')->where('id',$id)->update(['title'=>$title ,'description'=>$description]);
                $message='data updated successfully!!';
            }

            return redirect('/admin/home_mission')->with('error',$message);
    }

    

    public function delete_home_mission($id){

        $userdata=DB::table('home_mission')->where('id',$id)->get();

        $image=$userdata[0]->image;

        if($image !=''){
            unlink(public_path('/uploads/'.$image));
        }

        DB::table('home_mission')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    }


    public function home_contact_us(){

        $data['home_contact_us']=DB::table('home_contact_us')->get();

        return view('admin.home_contact_us',$data);
    }


    public function add_home_contact_us_data($id){
        
        if($id==0){

            $data['image']='';

            $data['title']='';

            $data['description']='';

            $data['id']=$id;
        }
        else{

            $home_contact_us=DB::table('home_contact_us')->where('id',$id)->get();

            $data['id']=$home_contact_us[0]->id;

            $data['image']=$home_contact_us[0]->image;

            $data['title']=$home_contact_us[0]->title;

            $data['description']=$home_contact_us[0]->description;
        }

        return view('admin.add_home_contact_us_data',$data);
    }


    public function store_add_home_contact_us_data(Request $request,$id){

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

                DB::table('home_contact_us')->insert(['image'=>$imagename,'title'=>$title,'description'=>$description]);

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
                    DB::table('home_contact_us')->where('id',$id)->update(['image'=>$imagename,]);
                }

                DB::table('home_contact_us')->where('id',$id)->update(['title'=>$title ,'description'=>$description]);
                $message='data updated successfully!!';
            }

            return redirect('/admin/home_contact_us')->with('error',$message);
        
    }

    

    public function delete_home_contact_us($id){

        DB::table('home_contact_us')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    }


    public function home_faq(){

        $data['home_faq']=DB::table('home_faq')->get();

        $data['home_faq_description']=DB::table('home_faq_description')->get();

        return view('admin.home_faq',$data);
    }


    public function update_home_faq_description_data($id){
        
            $home_faq_description=DB::table('home_faq_description')->where('id',$id)->get();

            $data['id']=$home_faq_description[0]->id;

            $data['image']=$home_faq_description[0]->image;

            $data['title1']=$home_faq_description[0]->title1;

            $data['title2']=$home_faq_description[0]->title2;

        return view('admin.add_home_faq_description_data',$data);
    }


    public function store_update_home_faq_description_data(Request $request,$id){

        $validated=$request->validate([
            'title1'=>'required',
            'title2'=>'required',
        ]);

        $title1=$request->input('title1');
        $title2=$request->input('title2');

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

            DB::table('home_faq_description')->where('id',$id)->update(['image'=>$imagename]);
        }
            
        DB::table('home_faq_description')->where('id',$id)->update(['title1'=>$title1,'title2'=>$title2]);

        return redirect('/admin/home_faq')->with('error','data updated successfully!!');
        
    }


    public function add_home_faq_data($id){
        
        if($id==0){

            $data['question']='';

            $data['answer']='';

            $data['id']=$id;
        }
        else{

            $home_faq=DB::table('home_faq')->where('id',$id)->get();

            $data['id']=$home_faq[0]->id;

            $data['question']=$home_faq[0]->question;

            $data['answer']=$home_faq[0]->answer;
        }

        return view('admin.add_home_faq_data',$data);
    }


    public function store_add_home_faq_data(Request $request,$id){

        $validated=$request->validate([
            'question'=>'required',
            'answer'=>'required',
        ]);

        $question=$request->input('question');

        $answer=$request->input('answer');

        if($id ==0){
            
            DB::table('home_faq')->insert(['question'=>$question,'answer'=>$answer]);

            $message='data submitted successfully!!';
        }

        else{

            DB::table('home_faq')->where('id',$id)->update(['question'=>$question , 'answer'=>$answer]);
            $message='data updated successfully!!';

        }

        return redirect('/admin/home_faq')->with('error',$message);
        
    }

    

    public function delete_home_faq($id){

        DB::table('home_faq')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    }


    public function home_stages(){

        $data['home_stages']=DB::table('home_stages')->get();

        $data['home_stages_description']=DB::table('home_stages_description')->get();

        return view('admin.home_stages',$data);
    }


    public function update_home_stages_description_data($id){
        
            $home_stages_description=DB::table('home_stages_description')->where('id',$id)->get();

            $data['id']=$home_stages_description[0]->id;

            $data['title1']=$home_stages_description[0]->title1;
            $data['title2']=$home_stages_description[0]->title2;

        return view('admin.add_home_stages_description_data',$data);
    }


    public function store_update_home_stages_description_data(Request $request,$id){

        $validated=$request->validate([
            'title1'=>'required',
            'title2'=>'required',
        ]);

        $title1=$request->input('title1');
        $title2=$request->input('title2');

        DB::table('home_stages_description')->where('id',$id)->update(['title1'=>$title1,'title2'=>$title2]);

        return redirect('/admin/home_stages')->with('error','data updated successfully!!');
        
    }


    public function add_home_stages_data($id){
        
        if($id==0){

            $data['image']='';

            $data['title']='';
            
            $data['link']='';

            $data['description']='';

            $data['id']=$id;
        }
        else{

            $home_stages=DB::table('home_stages')->where('id',$id)->get();

            $data['id']=$home_stages[0]->id;

            $data['image']=$home_stages[0]->image;

            $data['title']=$home_stages[0]->title;
            
            $data['link']=$home_stages[0]->link;

            $data['description']=$home_stages[0]->description;
        }

        return view('admin.add_home_stages_data',$data);
    }


    public function store_add_home_stages_data(Request $request,$id){

        
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
            $link=$request->input('link');
            $description=$request->input('description');

            if($id ==0){

                $filename=$request->file('image');
                $imagename='';
                if($filename !=''){
                    $destination_path='uploads';
                    $imagename=time().'_'.$filename->getClientOriginalName();
                    $filename->move($destination_path,$imagename);
                }

                DB::table('home_stages')->insert(['image'=>$imagename,'title'=>$title,'link'=>$link,'description'=>$description]);

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
                    DB::table('home_stages')->where('id',$id)->update(['image'=>$imagename,]);
                }

                DB::table('home_stages')->where('id',$id)->update(['link'=>$link,'title'=>$title ,'description'=>$description]);
                $message='data updated successfully!!';
            }

            return redirect('/admin/home_stages')->with('error',$message);
    }

    

    public function delete_home_stages($id){

        $userdata=DB::table('home_stages')->where('id',$id)->get();

        $image=$userdata[0]->image;

        if($image !=''){
            unlink(public_path('/uploads/'.$image));
        }

        DB::table('home_stages')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    }






    public function home_choose_us(){

        $data['home_choose_us']=DB::table('home_choose_us')->get();

        $data['home_choose_us_description']=DB::table('home_choose_us_description')->get();

        return view('admin.home_choose_us',$data);
    }


    public function update_home_choose_us_description_data($id){
        
            $home_choose_us_description=DB::table('home_choose_us_description')->where('id',$id)->get();

            $data['id']=$home_choose_us_description[0]->id;

            $data['image']=$home_choose_us_description[0]->image;
            
            $data['title1']=$home_choose_us_description[0]->title1;
            $data['title2']=$home_choose_us_description[0]->title2;

        return view('admin.add_home_choose_us_description_data',$data);
    }


    public function store_update_home_choose_us_description_data(Request $request,$id){

        $validated=$request->validate([
            'title1'=>'required',
            'title2'=>'required',
        ]);

        $title1=$request->input('title1');
        $title2=$request->input('title2');

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
            DB::table('home_choose_us_description')->where('id',$id)->update(['image'=>$imagename,]);
        }
            
        DB::table('home_choose_us_description')->where('id',$id)->update(['title1'=>$title1,'title2'=>$title2]);

        return redirect('/admin/home_choose_us')->with('error','data updated successfully!!');
        
    }


    public function add_home_choose_us_data($id){
        
        if($id==0){

            $data['image']='';

            $data['title']='';

            $data['description']='';

            $data['id']=$id;
        }
        else{

            $home_choose_us=DB::table('home_choose_us')->where('id',$id)->get();

            $data['id']=$home_choose_us[0]->id;

            $data['image']=$home_choose_us[0]->image;

            $data['title']=$home_choose_us[0]->title;

            $data['description']=$home_choose_us[0]->description;
        }

        return view('admin.add_home_choose_us_data',$data);
    }


    public function store_add_home_choose_us_data(Request $request,$id){

        
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

                DB::table('home_choose_us')->insert(['image'=>$imagename,'title'=>$title,'description'=>$description]);

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
                    DB::table('home_choose_us')->where('id',$id)->update(['image'=>$imagename,]);
                }

                DB::table('home_choose_us')->where('id',$id)->update(['title'=>$title ,'description'=>$description]);
                $message='data updated successfully!!';
            }

            return redirect('/admin/home_choose_us')->with('error',$message);
    }

    

    public function delete_home_choose_us($id){

        $userdata=DB::table('home_choose_us')->where('id',$id)->get();

        $image=$userdata[0]->image;

        if($image !=''){
            unlink(public_path('/uploads/'.$image));
        }

        DB::table('home_choose_us')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    }






    public function home_resource(){

        $data['home_resource']=DB::table('home_resource')->get();

        $data['home_resource_description']=DB::table('home_resource_description')->get();

        return view('admin.home_resource',$data);
    }


    public function update_home_resource_description_data($id){
        
            $home_resource_description=DB::table('home_resource_description')->where('id',$id)->get();

            $data['id']=$home_resource_description[0]->id;

            $data['title1']=$home_resource_description[0]->title1;
            $data['title2']=$home_resource_description[0]->title2;

        return view('admin.add_home_resource_description_data',$data);
    }


    public function store_update_home_resource_description_data(Request $request,$id){

        $validated=$request->validate([
            'title1'=>'required',
            'title2'=>'required',
        ]);

        $title1=$request->input('title1');
        $title2=$request->input('title2');

        DB::table('home_resource_description')->where('id',$id)->update(['title1'=>$title1,'title2'=>$title2]);

        return redirect('/admin/home_resource')->with('error','data updated successfully!!');
        
    }


    public function add_home_resource_data($id){
        
        if($id==0){

            $data['image']='';

            $data['title']='';
            
            $data['link']='';

            $data['description']='';

            $data['id']=$id;
        }
        else{

            $home_resource=DB::table('home_resource')->where('id',$id)->get();

            $data['id']=$home_resource[0]->id;

            $data['image']=$home_resource[0]->image;

            $data['title']=$home_resource[0]->title;
            
            $data['link']=$home_resource[0]->link;

            $data['description']=$home_resource[0]->description;
        }

        return view('admin.add_home_resource_data',$data);
    }


    public function store_add_home_resource_data(Request $request,$id){

        
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
            $link=$request->input('link');
            $description=$request->input('description');

            if($id ==0){

                $filename=$request->file('image');
                $imagename='';
                if($filename !=''){
                    $destination_path='uploads';
                    $imagename=time().'_'.$filename->getClientOriginalName();
                    $filename->move($destination_path,$imagename);
                }

                DB::table('home_resource')->insert(['image'=>$imagename,'link'=>$link,'title'=>$title,'description'=>$description]);

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
                    DB::table('home_resource')->where('id',$id)->update(['image'=>$imagename,]);
                }

                DB::table('home_resource')->where('id',$id)->update(['link'=>$link,'title'=>$title ,'description'=>$description]);
                $message='data updated successfully!!';
            }

            return redirect('/admin/home_resource')->with('error',$message);
    }

    

    public function delete_home_resource($id){

        $userdata=DB::table('home_resource')->where('id',$id)->get();

        $image=$userdata[0]->image;

        if($image !=''){
            unlink(public_path('/uploads/'.$image));
        }

        DB::table('home_resource')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    }


}






<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;

class WorkingWomenController extends Controller
{
    
     public function __construct(){

            $this->middleware('auth:admin');
    } 
    
    
    public function working_women_banner(){  

        $data['working_women_banner']=DB::table('banner')->where('page_name',"working_women")->get();

        return view('admin.working_women_banner',$data);
    }
    
    public function working_women(){

        $data['working_women']=DB::table('working_women')->get();

        $data['working_women_description']=DB::table('working_women_description')->get();

        return view('admin.working_women',$data);
    }


    public function update_working_women_description_data($id){
        
            $working_women_description=DB::table('working_women_description')->where('id',$id)->get();

            $data['id']=$working_women_description[0]->id;

            $data['image']=$working_women_description[0]->image;

            $data['title']=$working_women_description[0]->title;
            $data['description']=$working_women_description[0]->description;

        return view('admin.add_working_women_description_data',$data);
    }


    public function store_update_working_women_description_data(Request $request,$id){

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
            DB::table('working_women_description')->where('id',$id)->update(['image'=>$imagename,]);
        }
            
        DB::table('working_women_description')->where('id',$id)->update(['title'=>$title,'description'=>$description]);

        return redirect('/admin/working_women')->with('error','data updated successfully!!');
        
    }


    public function add_working_women_data($id){
        
        if($id==0){

            $data['description1']='';

            $data['link']='';

            $data['link_text']='';

            $data['description2']='';

            $data['id']=$id;
        }
        else{

            $working_women=DB::table('working_women')->where('id',$id)->get();

            $data['id']=$working_women[0]->id;

            $data['description1']=$working_women[0]->description1;

            $data['link']=$working_women[0]->link;

            $data['link_text']=$working_women[0]->link_text;

            $data['description2']=$working_women[0]->description2;
        }

        return view('admin.add_working_women_data',$data);
    }


    public function store_add_working_women_data(Request $request,$id){

            $description1=$request->input('description1');
            $link=$request->input('link');
            $link_text=$request->input('link_text');
            $description2=$request->input('description2');

            if($description1 == '' && $link == '' && $link_text == '' && $description2 == ''){
                $validated=$request->validate([
                    'description1'=>'required',
                ]);
            }

            if($id ==0){

                DB::table('working_women')->insert(['description1'=>$description1,'link'=>$link,'link_text'=>$link_text,'description2'=>$description2]);

                $message='data submitted successfully!!';
            }
            else{

                DB::table('working_women')->where('id',$id)->update(['description1'=>$description1 ,'link'=>$link ,'link_text'=>$link_text,'description2'=>$description2]);
                $message='data updated successfully!!';
            }

            return redirect('/admin/working_women')->with('error',$message);
    }

    

    public function delete_working_women($id){

        DB::table('working_women')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    }
}

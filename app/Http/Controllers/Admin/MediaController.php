<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;

class MediaController extends Controller
{
    public function media_banner(){  

        $data['media_banner']=DB::table('banner')->where('page_name',"media")->get();

        return view('admin.media_banner',$data);
    }
    

    public function media(){

        $data['media']=DB::table('media')->get();
        
        $data['media_description']=DB::table('media_description')->get();
        
        $data['financial_year']=DB::table('financial_year')->get();

        return view('admin.media',$data);
    }
    
    public function update_media_description_data($id){
        
            $media_description=DB::table('media_description')->where('id',$id)->get();

            $data['id']=$media_description[0]->id;

            $data['title1']=$media_description[0]->title1;

            $data['title2']=$media_description[0]->title2;

        return view('admin.add_media_description_data',$data);
    }


    public function store_update_media_description_data(Request $request,$id){

        $validated=$request->validate([
            'title1'=>'required',
            'title2'=>'required',
        ]);

        $title1=$request->input('title1');
        $title2=$request->input('title2');

            
        DB::table('media_description')->where('id',$id)->update(['title1'=>$title1,'title2'=>$title2]);

        return redirect('/admin/media')->with('error','data updated successfully!!');
        
    }



    public function add_media_data($id){
        
       
         $data['financial_year']=DB::table('financial_year')->get();
         
        
        if($id==0){

            $data['title']='';

            $data['year']='';

            $data['file']='';

            $data['id']=$id;
        }
        else{

            $media=DB::table('media')->where('id',$id)->get();
            
           

            $data['id']=$media[0]->id;

            $data['title']=$media[0]->title;

            $data['year']=$media[0]->date;

            $data['file']=$media[0]->author;

        }

        return view('admin.add_media_data',$data);
    }


    public function store_add_media_data(Request $request,$id){


                $validated=$request->validate([
                   'file' => 'required|mimes:jpg,jpeg,png,pdf',
                    'title'=>'required',
                    'year'=>'required',
                ]);
           
            

            $title=$request->input('title');
            $year=$request->input('year');
           
            $filePath = $request->file('file')->store('upload_doc', 'public');

                $fileName = $request->file('file')->getClientOriginalName();
            
                    DB::table('media')->insert([
                        'title' => $title,
                         'year' => $year,
                         'filename' => $fileName,
                        'filepath' => $filePath,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);


                $message='data submitted successfully!!';

            return redirect('/admin/media')->with('error',$message);
        
    }

    

    public function delete_media($id){

            $userdata=DB::table('media')->where('id', $id)->get();

            $filepath=$userdata[0]->filepath;
               
            if($filepath !=''){
                unlink(storage_path("app/public/{$filepath}"));
            }
       
            DB::table('media')->where('id', $id)->delete();
            
            return response()->json([
                    'success'=>'200',
        ]);
    }
    
    

}

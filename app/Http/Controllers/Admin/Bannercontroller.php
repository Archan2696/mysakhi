<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;

class Bannercontroller extends Controller
{
     public function __construct(){
    
                $this->middleware('auth:admin');
        }


     public function add_banner_data($id){
        
        if($id==0){

            $data['image']='';

            $data['page_name']='';

            $data['page_title']='';

            $data['id']=$id;
        }
        else{

            $banner=DB::table('banner')->where('id',$id)->get();

            $data['id']=$banner[0]->id;

            $data['image']=$banner[0]->image;

            $data['page_name']=$banner[0]->page_name;

            $data['page_title']=$banner[0]->page_title;

        }

        return view('admin.add_banner_data',$data);
    }


    public function store_add_banner_data(Request $request,$id){

         if($id ==0){
                $validated=$request->validate([
                    'image'=>'required',
                    'page_name'=>'required',
                    'page_title'=>'required',
                ]);
            }else{
                $validated=$request->validate([
                    'page_name'=>'required',
                    'page_title'=>'required',

                ]);
            }
            

            $page_name=$request->input('page_name');
            $page_title=$request->input('page_title');

            if($id ==0){

                $filename=$request->file('image');
                $imagename='';
                if($filename !=''){
                    $destination_path='uploads';
                    $imagename=time().'_'.$filename->getClientOriginalName();
                    $filename->move($destination_path,$imagename);
                }

                DB::table('banner')->insert(['image'=>$imagename,'page_name'=>$page_name,'page_title'=>$page_title]);

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
                    DB::table('banner')->where('id',$id)->update(['image'=>$imagename,]);
                }

                DB::table('banner')->where('id',$id)->update(['page_name'=>$page_name ,'page_title'=>$page_title]);
                $message='data updated successfully!!';
            }

            return redirect('/admin/'.$page_name.'_banner')->with('error',$message);
        
    }



}




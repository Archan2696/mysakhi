<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;

class BlogController extends Controller
{
    public function blog_banner(){  

        $data['blog_banner']=DB::table('banner')->where('page_name',"blog")->orwhere('page_name','blog-detail')->get();

        return view('admin.blog_banner',$data);
    }
    
    
    public function blog_detail_banner(){  

        $data['blog_banner']=DB::table('banner')->where('page_name',"blog")->orwhere('page_name','blog-detail')->get();

        return view('admin.blog_banner',$data);
    }
    
    
    
    public function blog(){

        $data['blog']=DB::table('blog')->get();

        return view('admin.blog',$data);
    }



    public function add_blog_data($id){
        
        if($id==0){

            $data['title']='';

            $data['date']='';

            $data['author']='';

            $data['detail_description']='';

            $data['image']='';

            $data['description']='';

            $data['id']=$id;
        }
        else{

            $blog=DB::table('blog')->where('id',$id)->get();

            $data['id']=$blog[0]->id;

            $data['title']=$blog[0]->title;

            $data['date']=$blog[0]->date;

            $data['author']=$blog[0]->author;

            $data['detail_description']=$blog[0]->detail_description;

            $data['description']=$blog[0]->description;

            $data['image']=$blog[0]->image;
        }

        return view('admin.add_blog_data',$data);
    }


    public function store_add_blog_data(Request $request,$id){



        if($id ==0){
                $validated=$request->validate([
                    'image'=>'required',
                    'title'=>'required',
                    'date'=>'required',
                    'author'=>'required',
                    'detail_description'=>'required',
                    'description'=>'required',
                ]);
            }else{
                $validated=$request->validate([
                    'title'=>'required',
                    'date'=>'required',
                    'author'=>'required',
                    'detail_description'=>'required',
                    'description'=>'required',
                ]);
            }
            

            $title=$request->input('title');
            $date=$request->input('date');
            $author=$request->input('author');
            $detail_description=$request->input('detail_description');
            $description=$request->input('description');

            if($id ==0){

                $filename=$request->file('image');
                $imagename='';
                if($filename !=''){
                    $destination_path='uploads';
                    $imagename=time().'_'.$filename->getClientOriginalName();
                    $filename->move($destination_path,$imagename);
                }

                DB::table('blog')->insert(['image'=>$imagename,'title'=>$title,'date'=>$date,'author'=>$author,'detail_description'=>$detail_description,'description'=>$description]);

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
                    DB::table('blog')->where('id',$id)->update(['image'=>$imagename,]);
                }

                    
                DB::table('blog')->where('id',$id)->update(['title'=>$title,'date'=>$date,'author'=>$author,'detail_description'=>$detail_description,'description'=>$description]);

            }
                $message='data updated successfully!!';

            return redirect('/admin/blog')->with('error',$message);
        
    }

    

    public function delete_blog($id){

            $userdata=DB::table('blog')->where('id', $id)->get();

            $image=$userdata[0]->image;

            if($image !=''){
                unlink(public_path('/uploads/'.$image));
            }

            DB::table('blog_description')->where('blog_id', $id)->delete();

            DB::table('blog')->where('id', $id)->delete();
                return response()->json([
                    'success'=>'200',
        ]);
    }
    
    
    
    public function view_blog($id){

        $data['blog']=DB::table('blog')->where('id',$id)->get();
        
        $data['id']=$id;

        return view('admin.view_blog',$data);
    }
}

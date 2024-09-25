<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;

class EventController extends Controller
{
    public function __construct(){

            $this->middleware('auth:admin');
    }



    public function events_banner(){  

        $data['events_banner']=DB::table('banner')->where('page_name',"events")->get();

        return view('admin.events_banner',$data);
    }

    public function interactive_sessions(){

        $data['interactive_sessions']=DB::table('interactive_sessions')->OrderBy('date','asc')->get();

        $data['interactive_sessions_description']=DB::table('interactive_sessions_description')->get();

        return view('admin.interactive_sessions',$data);
    }

    public function update_interactive_sessions_description_data($id){
        
            $interactive_sessions_description=DB::table('interactive_sessions_description')->where('id',$id)->get();

            $data['id']=$interactive_sessions_description[0]->id;

            $data['title1']=$interactive_sessions_description[0]->title1;
            $data['title2']=$interactive_sessions_description[0]->title2;

        return view('admin.add_interactive_sessions_description_data',$data);
    }


    public function store_update_interactive_sessions_description_data(Request $request,$id){

        $validated=$request->validate([
            'title1'=>'required',
            'title2'=>'required',
        ]);

        $title1=$request->input('title1');
        $title2=$request->input('title2');

        DB::table('interactive_sessions_description')->where('id',$id)->update(['title1'=>$title1,'title2'=>$title2]);

        return redirect('/admin/interactive_sessions')->with('error','data updated successfully!!');
        
    }

    public function add_interactive_sessions_data($id){
        
        if($id==0){

            $data['image']='';
            $data['name']='';
            $data['topic']='';
            $data['seat']='';
            $data['date']='';
            $data['time']='';
            $data['city']='';
            $data['description']='';
            $data['watch_now']='';
            $data['full_video']='';
            $data['id']=$id;
        }
        else{

            $interactive_sessions=DB::table('interactive_sessions')->where('id',$id)->get();

            $data['id']=$interactive_sessions[0]->id;

            $data['image']=$interactive_sessions[0]->image;
            $data['name']=$interactive_sessions[0]->name;
            $data['topic']=$interactive_sessions[0]->topic;
            $data['seat']=$interactive_sessions[0]->seat;
            $data['date']=$interactive_sessions[0]->date;
            $data['time']=$interactive_sessions[0]->time;
            $data['city']=$interactive_sessions[0]->city;
            $data['watch_now']=$interactive_sessions[0]->watch_now;
            $data['full_video']=$interactive_sessions[0]->full_video;
            $data['description']=$interactive_sessions[0]->description;
        }

        return view('admin.add_interactive_sessions_data',$data);
    }


    public function store_add_interactive_sessions_data(Request $request,$id){

        
            if($id ==0){
                $validated=$request->validate([
                    'image'=>'required',
                    'name'=>'required',
                    'topic'=>'required',
                    'seat'=>'required',
                    'date'=>'required',
                    'time'=>'required',
                    'city'=>'required',
                    'description'=>'required',
                ]);
            }else{
                $validated=$request->validate([
                    'name'=>'required',
                    'topic'=>'required',
                    'seat'=>'required',
                    'date'=>'required',
                    'time'=>'required',
                    'city'=>'required',
                    'description'=>'required',
                ]);
            }
            

            $topic=$request->input('topic');
            $name=$request->input('name');
            $seat=$request->input('seat');
            $date=$request->input('date');
            $time=$request->input('time');
            $city=$request->input('city');
            $description=$request->input('description');
            $watch_now=$request->input('watch_now');
            $full_video=$request->input('full_video');

            if($id ==0){

                $filename=$request->file('image');
                $imagename='';
                if($filename !=''){
                    $destination_path='uploads';
                    $imagename=time().'_'.$filename->getClientOriginalName();
                    $filename->move($destination_path,$imagename);
                }

                DB::table('interactive_sessions')->insert(['image'=>$imagename,'name'=>$name,'topic'=>$topic,'seat'=>$seat,'date'=>$date,'time'=>$time,'city'=>$city,'description'=>$description,'watch_now'=>$watch_now,'full_video'=>$full_video]);

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
                    DB::table('interactive_sessions')->where('id',$id)->update(['image'=>$imagename,]);
                }

                DB::table('interactive_sessions')->where('id',$id)->update(['name'=>$name,'topic'=>$topic,'seat'=>$seat,'date'=>$date,'time'=>$time,'city'=>$city,'description'=>$description,'watch_now'=>$watch_now,'full_video'=>$full_video]);
                $message='data updated successfully!!';
            }

            return redirect('/admin/interactive_sessions')->with('error',$message);
    }

    

    public function delete_interactive_sessions($id){

        $userdata=DB::table('interactive_sessions')->where('id',$id)->get();

        $image=$userdata[0]->image;

        if($image !=''){
            unlink(public_path('/uploads/'.$image));
        }

        DB::table('interactive_sessions')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    }
}

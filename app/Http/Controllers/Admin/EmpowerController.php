<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;

class EmpowerController extends Controller
{
     public function empowering_communities_banner(){  

        $data['empowering_communities_banner']=DB::table('banner')->where('page_name',"empowering_communities")->get();

        return view('admin.empowering_communities_banner',$data);
    }


    public function health_sanitation(){

        $data['health_sanitation']=DB::table('health_sanitation')->get();

        $data['health_sanitation_description']=DB::table('health_sanitation_description')->get();

        return view('admin.health_sanitation',$data);
    }


    public function update_health_sanitation_description_data($id){
        
            $health_sanitation_description=DB::table('health_sanitation_description')->where('id',$id)->get();

            $data['id']=$health_sanitation_description[0]->id;

            $data['title']=$health_sanitation_description[0]->title;

        return view('admin.add_health_sanitation_description_data',$data);
    }


    public function store_update_health_sanitation_description_data(Request $request,$id){

        $validated=$request->validate([
            'title'=>'required',
        ]);

        $title=$request->input('title');
    
        DB::table('health_sanitation_description')->where('id',$id)->update(['title'=>$title]);

        return redirect('/admin/health_sanitation')->with('error','data updated successfully!!');
        
    }


    public function add_health_sanitation_data($id){
        
        if($id==0){

            $data['title']='';

            $data['image1']='';

            $data['image2']='';

            $data['description']=[];

            $data['id']=$id;
        }
        else{

            $health_sanitation=DB::table('health_sanitation')->where('id',$id)->get();

            $data['id']=$health_sanitation[0]->id;

            $data['title']=$health_sanitation[0]->title;

            $data['image1']=$health_sanitation[0]->image1;

            $data['image2']=$health_sanitation[0]->image2;

            $data['description']=json_decode($health_sanitation[0]->description);

            if($health_sanitation[0]->description==''){
                $data['description']=[];
            }

        }

        return view('admin.add_health_sanitation_data',$data);
    }


    public function store_add_health_sanitation_data(Request $request,$id){

        
            if($id ==0){
                $validated=$request->validate([
                    'image1'=>'required',
                    'image2'=>'required',
                    'title'=>'required',
                ]);
            }else{
                $validated=$request->validate([
                    'title'=>'required',
                ]);
            }
            

            $title=$request->input('title');
            $description=$request->input('description');

            $descriptionData=[];

                if(!empty($description)){
                    $i=0;
                    foreach($description as $key=>$d){
                        $descriptionData[$i]['des']=$description[$key];
                        $i++;
                    }

                    $descriptionData=json_encode($descriptionData);
                }


            if($id ==0){

                $filename1=$request->file('image1');
                $filename2=$request->file('image2');
                $imagename1='';
                $imagename2='';
                if($filename1 !=''){
                    $destination_path1='uploads';
                    $imagename1=time().'_'.$filename1->getClientOriginalName();
                    $filename1->move($destination_path1,$imagename1);
                }

                if($filename2 !=''){
                    $destination_path2='uploads';
                    $imagename2=time().'_'.$filename2->getClientOriginalName();
                    $filename2->move($destination_path2,$imagename2);
                }

                DB::table('health_sanitation')->insert(['image1'=>$imagename1,'image2'=>$imagename2,'title'=>$title,'description'=>$descriptionData]);

                $message='data submitted successfully!!';
            }
            else{

                $filename1=$request->file('image1');
                $filename2=$request->file('image2');
                $oldimage1=$request->input('oldimage1');
                $oldimage2=$request->input('oldimage2');
                $imagename1='';
                $imagename2='';
                if($filename1 !=''){
                    $destination_path1='uploads';
                    $imagename1=time().'_'.$filename1->getClientOriginalName();
                    $filename1->move($destination_path1,$imagename1);
                    if($oldimage1 !=''){
                        unlink(public_path('/uploads/'.$oldimage1));
                    }
                    DB::table('health_sanitation')->where('id',$id)->update(['image1'=>$imagename1,]);
                }

                 if($filename2 !=''){
                    $destination_path2='uploads';
                    $imagename2=time().'_'.$filename2->getClientOriginalName();
                    $filename2->move($destination_path2,$imagename2);
                    if($oldimage2 !=''){
                        unlink(public_path('/uploads/'.$oldimage2));
                    }
                    DB::table('health_sanitation')->where('id',$id)->update(['image2'=>$imagename2,]);
                }

                DB::table('health_sanitation')->where('id',$id)->update(['title'=>$title,'description'=>$descriptionData]);
                $message='data updated successfully!!';
            }

            return redirect('/admin/health_sanitation')->with('error',$message);
    }

    

    public function delete_health_sanitation($id){

        $userdata=DB::table('health_sanitation')->where('id',$id)->get();

        $image1=$userdata[0]->image1;

        $image2=$userdata[0]->image2;

        if($image1 !=''){
            unlink(public_path('/uploads/'.$image1));
        }

        if($image2 !=''){
            unlink(public_path('/uploads/'.$image2));
        }

        DB::table('health_sanitation')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    }

    public function menstrual_hygiene(){

        $data['menstrual_hygiene']=DB::table('menstrual_hygiene')->get();

        $data['menstrual_hygiene_description']=DB::table('menstrual_hygiene_description')->get();

        return view('admin.menstrual_hygiene',$data);
    }


    public function update_menstrual_hygiene_description_data($id){
        
            $menstrual_hygiene_description=DB::table('menstrual_hygiene_description')->where('id',$id)->get();

            $data['id']=$menstrual_hygiene_description[0]->id;

            $data['title']=$menstrual_hygiene_description[0]->title;

        return view('admin.add_menstrual_hygiene_description_data',$data);
    }


    public function store_update_menstrual_hygiene_description_data(Request $request,$id){

        $validated=$request->validate([
            'title'=>'required',
        ]);

        $title=$request->input('title');
    
        DB::table('menstrual_hygiene_description')->where('id',$id)->update(['title'=>$title]);

        return redirect('/admin/menstrual_hygiene')->with('error','data updated successfully!!');
        
    }


    public function add_menstrual_hygiene_data($id){
        
        if($id==0){

            $data['title1']='';

            $data['title2']='';

            $data['image']='';

            $data['list']=[];

            $data['description']='';

            $data['id']=$id;
        }
        else{

            $menstrual_hygiene=DB::table('menstrual_hygiene')->where('id',$id)->get();

            $data['id']=$menstrual_hygiene[0]->id;

            $data['title1']=$menstrual_hygiene[0]->title1;

            $data['title2']=$menstrual_hygiene[0]->title2;

            $data['image']=$menstrual_hygiene[0]->image;

            $data['description']=$menstrual_hygiene[0]->description;

            $data['list']=json_decode($menstrual_hygiene[0]->list);

            if($menstrual_hygiene[0]->list==''){
                $data['list']=[];
            }

        }

        return view('admin.add_menstrual_hygiene_data',$data);
    }


    public function store_add_menstrual_hygiene_data(Request $request,$id){

        
            if($id ==0){
                $validated=$request->validate([
                    'image'=>'required',
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
            $list=$request->input('list');

            $listData=[];

                if(!empty($list)){
                    $i=0;
                    foreach($list as $key=>$d){
                        $listData[$i]['list']=$list[$key];
                        $i++;
                    }

                    $listData=json_encode($listData);
                }


            if($id ==0){

                $filename=$request->file('image');
                $imagename='';
                if($filename !=''){
                    $destination_path='uploads';
                    $imagename=time().'_'.$filename->getClientOriginalName();
                    $filename->move($destination_path,$imagename);
                }

                DB::table('menstrual_hygiene')->insert(['image'=>$imagename,'title1'=>$title1,'title2'=>$title2,'list'=>$listData,'description'=>$description]);

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
                    DB::table('menstrual_hygiene')->where('id',$id)->update(['image'=>$imagename]);
                }

                DB::table('menstrual_hygiene')->where('id',$id)->update(['title1'=>$title1,'title2'=>$title2,'list'=>$listData,'description'=>$description]);
                $message='data updated successfully!!';
            }

            return redirect('/admin/menstrual_hygiene')->with('error',$message);
    }

    

    public function delete_menstrual_hygiene($id){

        $userdata=DB::table('menstrual_hygiene')->where('id',$id)->get();

        $image=$userdata[0]->image;

        if($image !=''){
            unlink(public_path('/uploads/'.$image));
        }

        DB::table('menstrual_hygiene')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    }



    public function latest_work(){

        $data['latest_work']=DB::table('latest_work')->get();

        $data['latest_work_description']=DB::table('latest_work_description')->get();

        $data['imgdata']=DB::table('latest_work_image')->get();

        return view('admin.latest_work',$data);
    }


    public function update_latest_work_description_data($id){
        
            $latest_work_description=DB::table('latest_work_description')->where('id',$id)->get();

            $data['id']=$latest_work_description[0]->id;

            $data['title']=$latest_work_description[0]->title;

        return view('admin.add_latest_work_description_data',$data);
    }


    public function store_update_latest_work_description_data(Request $request,$id){

        $validated=$request->validate([
            'title'=>'required',
        ]);

        $title=$request->input('title');
    
        DB::table('latest_work_description')->where('id',$id)->update(['title'=>$title]);

        return redirect('/admin/latest_work')->with('error','data updated successfully!!');
        
    }


    public function add_latest_work_data($id){
        
        $data['imgdata']=DB::table('latest_work_image')->where('latest_work_id',$id)->get();

        if($id==0){

            $data['title']='';

            $data['image']='';

            $data['id']=$id;
        }
        else{

            $latest_work=DB::table('latest_work')->where('id',$id)->get();

            $data['id']=$latest_work[0]->id;

            $data['title']=$latest_work[0]->title;

        }

        return view('admin.add_latest_work_data',$data);
    }


    public function store_add_latest_work_data(Request $request,$id){

        
            if($id ==0){
                $validated=$request->validate([
                    'image'=>'required',
                    'title'=>'required',
                ]);
            }else{
                $validated=$request->validate([
                    'title'=>'required',
                ]);
            }
            

            $title=$request->input('title');


            if($id==0){

                        DB::table('latest_work')->insert(['title'=>$title]);

                        $latest_work_id=DB::table('latest_work')->max('id');

                        $file=$request->file('image');

                        $imagename='';

                        if($file != '')
                        {

                        foreach($file as $f)
                        {

                            $destination_path='uploads';

                            $imagename=time().'_'.$f->getClientOriginalName();

                            $f->move($destination_path,$imagename);

                            DB::table('latest_work_image')->insert(['image'=>$imagename ,'latest_work_id'=>$latest_work_id]);

                        }
                }
                $message='data submitted successfully!!';

            }
            else{

                DB::table('latest_work')->where('id',$id)->update(['title'=>$title]);

                $file=$request->file('image');

                $oldimage=$request->input('oldimage');

                $imagename='';

                if($file !=''){

                foreach($file as $f)
                {
                    $destination_path='uploads';

                    $imagename=time().'_'.$f->getClientOriginalName();

                    $f->move($destination_path,$imagename);

                    if($oldimage !=''){
                         unlink(public_path('/uploads/'.$oldimage));
                    }

                    DB::table('latest_work_image')->where('latest_work_id',$id)->insert(['image'=>$imagename,'latest_work_id'=>$id]);

                }

                }
                

                $message='data updated successfully!!';
            }

            return redirect('/admin/latest_work')->with('error',$message);
    }

    

    public function delete_latest_work($id){

        $imgdata=DB::table('latest_work_image')->where('latest_work_id',$id)->get();

        $image=$imgdata[0]->image;

        if($image !=''){
            unlink(public_path('/uploads/'.$image));
        }

        DB::table('latest_work_image')->where('latest_work_id',$id)->delete();

        DB::table('latest_work')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    }


     public function delete_sub_img($id)
    {
        $imgdata=DB::table('latest_work_image')->where('id',$id)->get();

        $image=$imgdata[0]->image;

        $latest_work_id=$imgdata[0]->latest_work_id;

        if($image != '')
        {

             unlink(public_path('/uploads/'.$image));
        }

        DB::table('latest_work_image')->where('id',$id)->delete();

            return response()->json([
                'success'=>'200',
            ]);    }

    public function update_sub_img($id)
    {

        $imgdata=DB::table('latest_work_image')->where('id',$id)->get();

        $data['image']=$imgdata[0]->image;

        $data['id']=$imgdata[0]->id;

        $data['latest_work_id']=$imgdata[0]->latest_work_id;

        return view('admin.update_sub_img',$data);
    }

    public function store_update_sub_img(Request $request,$id)
    {

        $validate=$request->validate([
            'image'=>'required',
        ]);

        $file=$request->file('image');

        $imagename='';

        $oldimage=$request->file('oldimage');

        if($file != '')
        {
            $destination_path='uploads';

            $imagename=time().'_'.$file->getClientOriginalName();

            $file->move($destination_path,$imagename);

            if($oldimage != '')
            {
                unlink(public_path('/uploads/',$oldimage));
            }

            DB::table('latest_work_image')->where('id',$id)->update(['image'=>$imagename]);
        }

        $imgdata=DB::table('latest_work_image')->where('id',$id)->get();

        $latest_work_id=$imgdata[0]->latest_work_id;

        return redirect('admin/add_latest_work_data/'.$latest_work_id)->with('success','Image Updated Successfully!!'); 


    }

}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportUser;
use App\Exports\ExportInquiry;
use App\Exports\ExportForum;
use App\Exports\ExportAppointment;
use App\Exports\ExportSubscription;
use App\Models\User;
use App\Models\Inquiry;
use App\Models\Forum;
use App\Models\Appointment;
use App\Models\Subscription;
use App\Models\Visitor;

class HeaderFooterController extends Controller
{
     public function __construct(){

            $this->middleware('auth:admin');
    }
    
    public function all_users()
    
    {
         $data['all_users']=DB::table('users')->get();

        return view('admin.all_users',$data);
    }

    public function cta_description(){  

        $data['cta_description']=DB::table('cta_description')->get();

        return view('admin.cta_description',$data);
    }


    public function add_cta_description_data($id){
        
            $cta_description=DB::table('cta_description')->where('id',$id)->get();

            $data['id']=$cta_description[0]->id;

            $data['image']=$cta_description[0]->image;
            $data['title1']=$cta_description[0]->title1;
            $data['title2']=$cta_description[0]->title2;

        return view('admin.add_cta_description_data',$data);
    }


    public function store_add_cta_description_data(Request $request,$id){

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
            DB::table('cta_description')->where('id',$id)->update(['image'=>$imagename,]);
        }
            
        DB::table('cta_description')->where('id',$id)->update(['title1'=>$title1,'title2'=>$title2]);

        return redirect('/admin/cta_description')->with('error','data updated successfully!!');
        
    }


    public function footer_description(){  

        $data['footer_description']=DB::table('footer_description')->get();

        return view('admin.footer_description',$data);
    }


    public function add_footer_description_data($id){
        
            $footer_description=DB::table('footer_description')->where('id',$id)->get();

            $data['id']=$footer_description[0]->id;

            $data['image']=$footer_description[0]->image;
            $data['title1']=$footer_description[0]->title1;
            $data['title2']=$footer_description[0]->title2;
            $data['disclaimer_description']=$footer_description[0]->disclaimer_description;
            $data['copyright']=$footer_description[0]->copyright;

        return view('admin.add_footer_description_data',$data);
    }


    public function store_add_footer_description_data(Request $request,$id){

        $validated=$request->validate([
            'title1'=>'required',
            'title2'=>'required',
            'disclaimer_description'=>'required',
            'copyright'=>'required',
        ]);

        $title1=$request->input('title1');
        $title2=$request->input('title2');
        $disclaimer_description=$request->input('disclaimer_description');
        $copyright=$request->input('copyright');

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
            DB::table('footer_description')->where('id',$id)->update(['image'=>$imagename,]);
        }
            
        DB::table('footer_description')->where('id',$id)->update(['title1'=>$title1,'title2'=>$title2,'disclaimer_description'=>$disclaimer_description,'copyright'=>$copyright]);

        return redirect('/admin/footer_description')->with('error','data updated successfully!!');
        
    }
    
    
     public function social_sticky(){  

        $data['social_sticky']=DB::table('social_sticky')->get();

        return view('admin.social_sticky',$data);
    }


    public function add_social_sticky_data($id){
        
            $social_sticky=DB::table('social_sticky')->where('id',$id)->get();

            $data['id']=$social_sticky[0]->id;

            $data['facebook_url']=$social_sticky[0]->facebook_url;
            $data['insta_url']=$social_sticky[0]->insta_url;
            $data['twitter_url']=$social_sticky[0]->twitter_url;

        return view('admin.add_social_sticky_data',$data);
    }


    public function store_add_social_sticky_data(Request $request,$id){

     

        $facebook_url=$request->input('facebook_url');
        $insta_url=$request->input('insta_url');
        $twitter_url=$request->input('twitter_url');
 
        DB::table('social_sticky')->where('id',$id)->update(['facebook_url'=>$facebook_url,'insta_url'=>$insta_url,'twitter_url'=>$twitter_url]);

        return redirect('/admin/social_sticky')->with('error','data updated successfully!!');
        
    }


    public function visitors(){

        $data['visitors'] = Visitor::get();

        return view('admin.visitors',$data);
    }





    public function forum_data(){

        $data['expert_forum']=DB::table('expert_forum')->get();


        return view('admin.forum_data',$data);
    }
    
    



    public function delete_forum_data($id){

        DB::table('expert_forum')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    }






    public function event_inquiry(){

        $data['events_forum']=DB::table('events_forum')->get();

        return view('admin.event_inquiry',$data);
    }



    public function delete_event_inquiry($id){

        DB::table('events_forum')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    }




    public function expert_appointment(){

        $data['book_forum']=DB::table('book_forum')->get();

        return view('admin.expert_appointment',$data);
    }



    public function delete_expert_appointment($id){

        DB::table('book_forum')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    }
    
    
     public function subscription_data(){

        $data['newsletter']=DB::table('newsletter')->get();

        return view('admin.subscription_data',$data);
    }



    public function delete_subscription_data($id){

        DB::table('newsletter')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    }




    public function exportUsers(Request $request){
        return Excel::download(new ExportUser, 'users.xlsx');
    }
    
     public function exportInquiry(Request $request){
        return Excel::download(new ExportInquiry, 'inquiry.xlsx');
    }
    
     public function exportForum(Request $request){
        return Excel::download(new ExportForum, 'forum.xlsx');
    }
    
     public function exportAppointment(Request $request){
        return Excel::download(new ExportAppointment, 'appointment.xlsx');
    }
    
     public function exportSubscription(Request $request){
        return Excel::download(new ExportSubscription, 'subscription.xlsx');
    }
}

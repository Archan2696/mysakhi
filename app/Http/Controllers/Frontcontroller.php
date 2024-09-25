<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\User;
use Hash;
use Validator;
use Auth;
use Twilio\Rest\Client;
use Carbon\Carbon;
use App\Models\Visitor;

class Frontcontroller extends Controller
{

    protected function guard(){

        return Auth::guard('admin');

    }
    
    
    
    
    
   
    public function index(Request $request){
        
        $currentDate = Carbon::now()->toDateString();
        
        $data['contact_us_info']=DB::table('contact_us_info')->get();
        
        $data['admins']=DB::table('admins')->get();

        $data['home_concerned']=DB::table('home_concerned')->get();

        $data['home_concerned_description']=DB::table('home_concerned_description')->get();

        $data['home_mission']=DB::table('home_mission')->get();

        $data['home_mission_description']=DB::table('home_mission_description')->get();

        $data['home_stages']=DB::table('home_stages')->get();

        $data['home_stages_description']=DB::table('home_stages_description')->get();
        
        $data['home_choose_us_description']=DB::table('home_choose_us_description')->get();

        $data['home_choose_us']=DB::table('home_choose_us')->get();

        $data['home_resource']=DB::table('home_resource')->get();

        $data['home_resource_description']=DB::table('home_resource_description')->get();

        $data['home_contact_us']=DB::table('home_contact_us')->get();

        $data['home_faq']=DB::table('home_faq')->get();

        $data['home_faq_description']=DB::table('home_faq_description')->get();

        $data['testimonial']=DB::table('testimonial')->get();

        $data['expert']=DB::table('expert')->get();

        $data['expert_description']=DB::table('expert_description')->get();

        $data['interactive_sessions']=DB::table('interactive_sessions')->whereDate('date', '>=', $currentDate)->OrderBy('date','desc')->take(3)->get();

        $data['interactive_sessions_description']=DB::table('interactive_sessions_description')->get();
        
        $data['footer_description']=DB::table('footer_description')->get();
        
        $ip = $request->ip();
        
        $visitor = Visitor::get()->where('ip_address',$ip)->first();

        if($visitor != null)
        {
            Visitor::where('ip_address', $ip)->increment('visits');
        }
        else{

            $visitor = Visitor::firstOrCreate(['ip_address' => $ip]);
        }


        return view('index',$data);
    }

    public function getFixEventData($id)
    {
        $data = DB::table('interactive_sessions')->where('id',$id)->first();

        return response()->json($data);
    }

    public function getFixExpertData($id)
    {
        $data = DB::table('expert')->where('id',$id)->first();

        return response()->json($data);
    }
    
    
    public function logout(){

        Auth::guard('web')->logout();

        return redirect('/');
    }
    
    
    
    
    
    // public function learn_about_menopause()
    // {
    //     //header footer data
    //     $data['contact_us_info']=DB::table('contact_us_info')->get();
        
    //     $data['admins']=DB::table('admins')->get();
        

    //     $data['about_banner']=DB::table('about_banner')->get();

    //     $data['about_meno_phases']=DB::table('about_meno_phases')->get();

    //     $data['about_meno_phases_description']=DB::table('about_meno_phases_description')->get();

    //     $data['about_phase_qa']=DB::table('about_phase_qa')->get();

    //     $data['about_symptoms']=DB::table('about_symptoms')->get();

    //     $data['about_symptoms_description']=DB::table('about_symptoms_description')->get(); 
        
    //     $data['about_modification_description']=DB::table('about_modification_description')->get();

    //     $data['about_modification']=DB::table('about_modification')->get();

    //     $data['about_checkup']=DB::table('about_checkup')->get();
        
    //     $data['about_healthy']=DB::table('about_healthy')->get();

    //     $data['about_work']=DB::table('about_work')->get();

    //     $data['about_myths']=DB::table('about_myths')->get();

    //     $data['about_cta']=DB::table('about_cta')->get();
        
    //     $data['footer_description']=DB::table('footer_description')->get();

    //     return view('learn-about-menopause',$data);

    // }
    
    
    
    public function events()
    
    {
        $data['events_banner']=DB::table('banner')->where('page_name',"events")->get();

        $data['contact_us_info']=DB::table('contact_us_info')->get();
        
        $data['admins']=DB::table('admins')->get();
        
        
        $data['cta_description']=DB::table('cta_description')->get();

        $data['interactive_sessions']=DB::table('interactive_sessions')->OrderBy('date','desc')->paginate(10);
        
        $data['footer_description']=DB::table('footer_description')->get();

        return view('events',$data);

    }
    
    
    public function findexpert()
    {
        $data['find_expert_banner']=DB::table('banner')->where('page_name',"find_expert")->get();

        $data['contact_us_info']=DB::table('contact_us_info')->get();
        
        $data['admins']=DB::table('admins')->get();
    
        $data['cta_description']=DB::table('cta_description')->get();

        $data['expert']=DB::table('expert')->paginate(4);

        $data['expert_faq_description']=DB::table('expert_faq_description')->get();

        $data['expert_faq']=DB::table('expert_faq')->get();
        
        $data['footer_description']=DB::table('footer_description')->get();

        $data['expertise']=DB::table('expertise')->get();
        
        $data['state']=DB::table('state')->get();
        
        $data['city']=DB::table('city')->get();

        return view('find-expert',$data);

    }
    
    
    public function blog()
    {
        $data['blog_banner']=DB::table('banner')->where('page_name',"blog")->get();

        $data['contact_us_info']=DB::table('contact_us_info')->get();
        
        $data['footer_description']=DB::table('footer_description')->get();
        
        $data['admins']=DB::table('admins')->get();
        
        $data['cta_description']=DB::table('cta_description')->get();
        
        
        
        $data['blog']=DB::table('blog')->paginate(4);
        
        $data['recent_blog']=DB::table('blog')->inRandomOrder()->limit(3)->get();
        
        return view('blog',$data);

    }
    
    
    public function media()
    {
        $data['media_banner']=DB::table('banner')->where('page_name',"media")->get();

        $data['contact_us_info']=DB::table('contact_us_info')->get();
        
        $data['footer_description']=DB::table('footer_description')->get();
        
        $data['admins']=DB::table('admins')->get();
        
        $data['cta_description']=DB::table('cta_description')->get();
        
        $data['media_description']=DB::table('media_description')->get();

        $data['media']=DB::table('media')->orderBy('created_at', 'desc')->get();
        
        $data['financial_year'] = DB::table('media')
                ->select('year', DB::raw('GROUP_CONCAT(id) as ids'), DB::raw('GROUP_CONCAT(title) as titles'))
                ->groupBy('year')
                 ->orderBy('year', 'desc')
                ->get();
                
    

        return view('media',$data);

    }
    
    
    
    public function blog_detail($id)
    {
        $data['blog_detail_banner']=DB::table('banner')->where('page_name',"blog-detail")->get();

        $data['contact_us_info']=DB::table('contact_us_info')->get();
        
        $data['footer_description']=DB::table('footer_description')->get();
        
        $data['admins']=DB::table('admins')->get();
        
        $data['cta_description']=DB::table('cta_description')->get();
        
        
        
        $data['blog']=DB::table('blog')->where('id',$id)->get();
        
        $data['recent_blog']=DB::table('blog')->inRandomOrder()->limit(3)->get();
        
        return view('blog-detail',$data);

    }


    public function empowering_communities(Request $request){
        
        $data['empowering_communities_banner']=DB::table('banner')->where('page_name',"empowering_communities")->get();

        $data['contact_us_info']=DB::table('contact_us_info')->get();
        
        $data['footer_description']=DB::table('footer_description')->get();
        
        $data['admins']=DB::table('admins')->get();
        
        $data['cta_description']=DB::table('cta_description')->get();



        
        $data['health_sanitation']=DB::table('health_sanitation')->get();
        
        $data['health_sanitation_description']=DB::table('health_sanitation_description')->get();

        $data['menstrual_hygiene']=DB::table('menstrual_hygiene')->get();

        $data['menstrual_hygiene_description']=DB::table('menstrual_hygiene_description')->get();

        $data['latest_work']=DB::table('latest_work')->get();

        $data['latest_work_description']=DB::table('latest_work_description')->get();

        $data['latest_work_image']=DB::table('latest_work_image')->get();


        return view('empowering_communities',$data);
    }

    public function verify_login(Request $request){

        $validator = Validator::make($request->all(), [
            'phone_no' => 'required',
        ]);

        $validator1 = Validator::make($request->all(), [
            'otp' => 'required',
        ]);


        if ($validator->passes() && $validator1->fails()) {

            $phone_no=$request->phone_no;
            $otp=$this->generateRandomString(4);

            $this->sendSMS($phone_no, $otp);

            $userData=User::where('phone_no',$phone_no)->get();
            if(count($userData) ==0){
                User::create(['phone_no'=>$phone_no,'otp'=>$otp,'password'=>Hash::make($otp)]);
            }else{
                User::where('phone_no',$phone_no)->update(['otp'=>$otp,'password'=>Hash::make($otp)]);
            }

            return response()->json(['success'=>'2']);
            

        }elseif($validator1->passes()){

            $phone_no=$request->phone_no;
            $otp=$request->otp;

            $remember=($request->input('remember')) ? true : false;
            $login_atempt=Auth::guard('web')->attempt([
                'phone_no'=>$request->phone_no,
                'password'=>$request->otp
              ],$remember);

            if ($login_atempt) {
                $request->session()->regenerate();
                return response()->json(['success'=>'1']);
            }else{
                return response()->json(['success'=>'0']);
            }

        }else{
            if($validator->passes()){
                return response()->json(['error'=>$validator1->errors()]);
            }else{
                return response()->json(['error'=>$validator->errors()]);
            }
            
        }
    }




    function generateRandomString($length = 4) {
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
             $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
      return $randomString;
    }

    // private function sendSMS($to, $otp)
    // {
    //     $twilio_sid ='ACb1a763f74b98c164d482aa8f4b453774';
    //     $twilio_auth_token ='5bfe9a34e04bef89cbd5407da5c0267c';
    //     $twilio_phone_number ='+14193749634';

    //     $client = new Client($twilio_sid, $twilio_auth_token);

    //     $client->messages->create(
    //         "+91".$to,
    //         [
    //             'from' => $twilio_phone_number,
    //             'body' => "Your OTP is: $otp",
    //         ]
    //     );
    // }
    
    
    
    
    // public function sendSMS($to, $otp){
    
    //     $username = 'Jagsonpal';
    //     $password = '53bd257c';
    //     $sender = 'MYSKHI';
    //     $mobile = '91'.$to;
    //     $type = 1;
    //     $product = 1;
    //     $template = '1707171739029503166';
    //     $message = urlencode($otp.' is your OTP for login mysakhi.in. kindly do not share with anyone. - MySakhi');

    //     $url = 'http://makemysms.in/api/sendsms.php?username='.$username.'&password='.$password.'&sender='.$sender.'&mobile='.$mobile.'&type='.$type.'&product='.$product.'&template='.$template.'&message='.$message;
        
    //     $url = trim($url);
    //     $url = preg_replace('/[^\x20-\x7E]/', '', $url);

    //     $ch = curl_init();
    //     curl_setopt($ch, CURLOPT_URL, $url);
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    //     $response = curl_exec($ch);

    //     if (curl_errno($ch)) {
    //         $error_msg = curl_error($ch);
    //     }

    //     curl_close($ch);

    //     if (isset($error_msg)) {
    //         return response()->json(['error' => $error_msg], 400);
    //     }

    //     return response()->json(['success' => $response], 200);
    // }
    
    
    
    public function sendSMS($to, $otp){
    
        $username = 'Jagsonpal';
        $password = '53bd257c';
        $sender = 'MYSKHI';
        $mobile = '91'.$to;
        $type = 1;
        $product = 1;
        $template = '1707171739029503166';
        $message = urlencode($otp.' is your OTP for login mysakhi.in. kindly do not share with anyone. - MySakhi');

        //$url = 'http://makemysms.in/api/sendsms.php?username='.$username.'&password='.$password.'&sender='.$sender.'&mobile='.$mobile.'&type='.$type.'&product='.$product.'&template='.$template.'&message='.$message;
        
        $url='https://mdssend.in/api.php?username='.$username.'&apikey=0HB2S8FIcDqj&senderid='.$sender.'&route=TRANS&mobile='.$mobile.'&text='.$message;
        
        $url = trim($url);
        $url = preg_replace('/[^\x20-\x7E]/', '', $url);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            $error_msg = curl_error($ch);
        }
        
        curl_close($ch);
        

        if (isset($error_msg)) {
            return response()->json(['error' => $error_msg], 400);
        }

        return response()->json(['success' => $response], 200);
    }
    

    public function coming_soon()
    {
        return view('coming_soon');

    }
    
    
    public function loadEvent(Request $request){
        $search = $request->input('search');
        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');
        
        $interactive_sessions=DB::table('interactive_sessions');

        
        if($search!=''){
            $interactive_sessions->where('name','LIKE','%'.$search.'%');
        }
        

        if($startDate!=''){
            $interactive_sessions->where('date','>=',$startDate);
        }
        
        if($endDate!=''){
            $interactive_sessions->where('date','<=',$endDate);
        }
            

        $interactive_sessions= $interactive_sessions->OrderBy('date','desc')->paginate(10);
        
        if(count($interactive_sessions)>0){
            $data['interactive_sessions']=$interactive_sessions;
            $data['have_property']=true;
        }else{
            $data['have_property']=false;
        }
        return view('events_ajaxData',$data);
    }
    
        
    public function loadExpert(Request $request){
        $search = $request->input('input');
        $state = $request->input('state');
        $city = $request->input('city');
        $expertise = $request->input('expertise');
       
        $expert=DB::table('expert');

        
        if($search!=''){
            $expert->where('name','LIKE','%'.$search.'%');
        }
        
        if($state!=''){
            $expert->where('state','LIKE','%'.$state.'%');
        }
        
        
        if($city!=''){
            $expert->where('city','LIKE','%'.$city.'%');
        }
        
        if($expertise!=''){
            $expert->where('expertise','LIKE','%'.$expertise.'%');
        }
        
        $expert= $expert->paginate(4);
        
        if(count($expert)>0){
            $data['expert']=$expert;
            $data['have_property']=true;
        }else{
            $data['expert']=$expert;
            $data['have_property']=false;
        }
        return view('expert_ajaxData',$data);
    }
    
    public function loadCity(Request $request){
        $state = $request->input('state');
        $state=DB::table('state')->where('state_name',$state)->first();
       
        $city=DB::table('city')->where('state_id',$state->state_id);

        $city= $city->get();
        
        if(count($city)>0){
            $data['city']=$city;
            $data['have_property']=true;
        }else{
            $data['city']=$city;
            $data['have_property']=false;
        }
        return view('city_ajaxData',$data);
    }
    
    public function loadBlog(Request $request){
        $search = $request->input('search');
        
        $blog=DB::table('blog');

        
        if($search!=''){
            $blog->where('title','LIKE','%'.$search.'%')->orwhere('author','LIKE','%'.$search.'%');
        }
        
        // if($search!=''){
        //     $blog->where('author','LIKE','%'.$search.'%');
        // }
        

        $blog= $blog->paginate(4);

        if(count($blog)>0){
            $data['blog']=$blog;
            $data['have_property']=true;
        }else{
            $data['blog']=DB::table('blog')->paginate(4);
            $data['have_property']=false;
        }
        return view('blog_ajaxData',$data);
    }
    
    
     public function previewFile($id)
    {
        // Retrieve the file information from the database
        $file = DB::table('media')->where('id', $id)->first();

        if ($file) {
            $filePath = storage_path("app/public/{$file->filepath}");

            if (file_exists($filePath)) {
                return response()->file($filePath, [
                    'Content-Disposition' => 'inline; filename="' . $file->filename . '"'
                ]);
            } else {
                return response()->json(['error' => 'File not found.'], 404);
            }
        } else {
            return response()->json(['error' => 'File not found.'], 404);
        }
    }
    

}

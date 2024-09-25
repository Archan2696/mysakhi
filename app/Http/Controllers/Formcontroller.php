<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;


use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Log;
use DateTime;
use Helper;

use \Mpdf\Mpdf as PDF;
use Illuminate\Support\Facades\Lang;

class Formcontroller extends Controller
{
    public function getForumData(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'city' => 'required',
            'email' => 'required|email:rfc,dns',
            'phone_no' => 'required',
            'message' => 'required',
        ]);

        if ($validator->passes()) {
        $name=$request->name;
        $email=$request->email;
        $phone_no=$request->phone_no;
        $message=$request->message;
        $city=$request->city;
        $mytime = Carbon::now('Asia/Kolkata');

        $expert_forum=DB::table('expert_forum')->insert(['name'=>$name,'email'=>$email,'phone_no'=>$phone_no,'city'=>$city,'message'=>$message,'date'=>$mytime,]);

        if($email){

            $admin_detail=DB::table('admins')->get();

            $aemail=$admin_detail[0]->email;
            $aname=$admin_detail[0]->name;
            $aphone_no=$admin_detail[0]->phone_no;
       
            $meta['FROM_EMAIL']= "jpmedicalinsights@gmail.com";
            $meta['admin_email']="jpmedicalinsights@gmail.com";
            $meta['subject']="Someone need expert help";
            $meta['name']=$aname;
            $meta['email']=$email;
            $meta['data']="New Inquiry !!";
             
                 
            Mail::send('email.new_email', $meta, function($m) use($meta){
        
               $m->from($meta['FROM_EMAIL'],'New Get Started Inquiry');
               $m->to($meta['admin_email']);
               $m->subject($meta['subject']);
            });




            $meta['FROM_EMAIL']="jpmedicalinsights@gmail.com";
            $meta['client_email']="$email";
            $meta['subject']="New Get Started Inquiry";
            $meta['name']=$name;
            $meta['data']="Thank you for your response !!";
      
           Mail::send('email.new_email1', $meta, function($m) use($meta){
        
               $m->from($meta['FROM_EMAIL'],'Inquiry submitted successfully');
               $m->to($meta['client_email']);
               $m->subject($meta['subject']); 
             });
            

            return response()->json(['success'=>'Response Sent successfully.']);
            
        }
    }

        return response()->json(['error'=>$validator->errors()]);
        
    }
    
    
    
    
    
    public function send_newsletter(Request $request){

        $validator = Validator::make($request->all(), [
            'subscribe_email' => 'required|email:rfc,dns|unique:newsletter,email',
        ]);

        if ($validator->passes()) {
        $email=$request->subscribe_email;
        $mytime = Carbon::now('Asia/Kolkata');

        $newsletter=DB::table('newsletter')->insert(['email'=>$email,'date'=>$mytime,]);

        if($email){

        //     $admin_detail=DB::table('admins')->get();

        //     $aemail=$admin_detail[0]->email;
        //     $aname=$admin_detail[0]->name;
        //     $aphone_no=$admin_detail[0]->phone_no;
       
        //     $meta['FROM_EMAIL']= "jpmedicalinsights@gmail.com";
        //     $meta['admin_email']="jpmedicalinsights@gmail.com";
        //     $meta['subject']="Someone need expert help";
        //     $meta['name']=$aname;
        //     $meta['email']=$email;
        //     $meta['data']="New Subscription !!";
             
                 
        //     Mail::send('email.new_email', $meta, function($m) use($meta){
        
        //       $m->from($meta['FROM_EMAIL'],'New Subscription');
        //       $m->to($meta['admin_email']);
        //       $m->subject($meta['subject']);
        //     });




        //     $meta['FROM_EMAIL']="jpmedicalinsights@gmail.com";
        //     $meta['client_email']="$email";
        //     $meta['subject']="My Sakhi Subscription";
        //     $meta['name']=$email;
        //     $meta['data']="Thank you for your support !!";
      
        //   Mail::send('email.new_email1', $meta, function($m) use($meta){
        
        //       $m->from($meta['FROM_EMAIL'],'Email submitted successfully');
        //       $m->to($meta['client_email']);
        //       $m->subject($meta['subject']); 
        //      });
            

            return response()->json(['success'=>'Response Sent successfully.']);
            
        }
    }

        return response()->json(['error'=>$validator->errors()]);
        
    }
    
    
    


     public function getEventData(Request $request){

        $validator = Validator::make($request->all(), [
            'ename' => 'required',
            'date' => 'required',
            'time' => 'required',
            'name' => 'required',
            'city' => 'required',
            'email' => 'required|email:rfc,dns',
            'phone' => 'required',
            'check' => 'required|accepted',
        ]);

        if ($validator->passes()) {
        $ename=$request->ename;
        $date=$request->date;
        $time=$request->time;
        $name=$request->name;
        $city=$request->city;
        $email=$request->email;
        $phone=$request->phone;

        $events_forum=DB::table('events_forum')->insert(['ename'=>$ename,'date'=>$date,'time'=>$time,'name'=>$name,'city'=>$city,'email'=>$email,'phone'=>$phone]);

        if($email){

            $admin_detail=DB::table('admins')->get();

            $aemail=$admin_detail[0]->email;
            $aname=$admin_detail[0]->name;
            $aphone_no=$admin_detail[0]->phone_no;

       
            $meta['FROM_EMAIL']= "jpmedicalinsights@gmail.com";
            $meta['admin_email']="jpmedicalinsights@gmail.com";
            $meta['subject']="Event Registration";
            $meta['name']=$aname;
            $meta['email']=$email;
            $meta['data']="Event Registration !!";
             
                 
            Mail::send('email.admin_event', $meta, function($m) use($meta){
        
               $m->from($meta['FROM_EMAIL'],'Event Registration');
               $m->to($meta['admin_email']);
               $m->subject($meta['subject']);
            });




            $meta['FROM_EMAIL']="jpmedicalinsights@gmail.com";
            $meta['client_email']="$email";
            $meta['subject']="Event Registration";
            $meta['name']=$name;
            $meta['data']="Thank you for your response !!";
      
           Mail::send('email.user_event', $meta, function($m) use($meta){
        
               $m->from($meta['FROM_EMAIL'],'Event Registration Completed successfully');
               $m->to($meta['client_email']);
               $m->subject($meta['subject']); 
             });
            

            return response()->json(['success'=>'Response Sent successfully.']);
            
        }
    }

        return response()->json(['error'=>$validator->errors()]);
        
    }


    public function getBookData(Request $request){

        $validator = Validator::make($request->all(), [
            'ename' => 'required',
            'ecity' => 'required',
            'date' => 'required',
            'time' => 'required|date_format:H:i',
            'name' => 'required',
            'city' => 'required',
            'email' => 'required|email:rfc,dns',
            'phone' => 'required',
            'check' => 'required|accepted',
        ]);

        if ($validator->passes()) {
        $ename=$request->ename;
        $ecity=$request->ecity;
        $date=$request->date;
        $time=$request->time;
        $name=$request->name;
        $city=$request->city;
        $email=$request->email;
        $phone=$request->phone;

        $book_forum=DB::table('book_forum')->insert(['ename'=>$ename,'ecity'=>$ecity,'date'=>$date,'time'=>$time,'name'=>$name,'city'=>$city,'email'=>$email,'phone'=>$phone]);

        if($email){

            $admin_detail=DB::table('admins')->get();

            $aemail=$admin_detail[0]->email;
            $aname=$admin_detail[0]->name;
            $aphone_no=$admin_detail[0]->phone_no;

       
            $meta['FROM_EMAIL']= "jpmedicalinsights@gmail.com";
            $meta['admin_email']="jpmedicalinsights@gmail.com";
            $meta['subject']="Someone need expert help";
            $meta['name']=$aname;
            $meta['email']=$email;
            $meta['data']="Expert Inquiry !!";
             
                 
            Mail::send('email.new_email', $meta, function($m) use($meta){
        
               $m->from($meta['FROM_EMAIL'],'Expert Inquiry');
               $m->to($meta['admin_email']);
               $m->subject($meta['subject']);
            });




            $meta['FROM_EMAIL']="jpmedicalinsights@gmail.com";
            $meta['client_email']="$email";
            $meta['subject']="Expert Inquiry";
            $meta['name']=$name;
            $meta['data']="Thank you for your response !!";
      
           Mail::send('email.new_email1', $meta, function($m) use($meta){
        
               $m->from($meta['FROM_EMAIL'],'Expert Inquiry submitted successfully');
               $m->to($meta['client_email']);
               $m->subject($meta['subject']); 
             });
            

            return response()->json(['success'=>'Response Sent successfully.']);
            
        }
    }

        return response()->json(['error'=>$validator->errors()]);
        
    }
    
    
    
    
    
    public function send_menopause_data(Request $request)
    {
        $documentFileName = "menopause_data.pdf";
 
        $document = new PDF( [
            'mode' => 'utf-8',
            'format' => [350, 300],
            'margin_header' => '3',
            'margin_top' => '20',
            'margin_bottom' => '20',
            'margin_footer' => '2',
        ]);     
 
        $header = [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="'.$documentFileName.'"'
        ];
        
        $likelihood='VERY LIKELY';
        
        if($request->likelihood ==1){
            $likelihood='VERY UNLIKELY';
        }elseif($request->likelihood ==2){
            $likelihood='UNLIKELY';
        }elseif($request->likelihood ==3){
            $likelihood='LIKELY';
        }else{
            $likelihood='VERY LIKELY';
        }
   
        $document->WriteHTML('<div style="text-align:center;margin-bottom:20px;"><img src="https://mysakhi.in/image/new-logo.png" style="width:10%;" alt="img"></div>
                    <style> .head{font-weight:600;}</style>
        ');
        $document->WriteHTML('<table style="border-collapse: collapse;">
               <tbody>
                <tr>
                    <td class="head"><b>Do you have periods?</b></td>
                    <td>:</td>
                    <td class="capital"> '.$request->radio_group.' </td>
                </tr>
                <tr><td><p style="visibility:hidden;"> lorem </p></td></tr>
                <tr>
                    <td class="head"><b>HOT FLUSHES </b></td>
                    <td>:</td>
                    <td class="capital"> '.$request->hot_flushes.' </td>
                </tr>
                <tr><td><p style="visibility:hidden;"> lorem </p></td></tr>
                <tr>
                    <td class="head"><b>DIFFICULTY SLEEPING </b></td>
                    <td>:</td>
                    <td class="capital"> '.$request->difficulty_sleeping.' </td>
                </tr>
                <tr><td><p style="visibility:hidden;"> lorem </p></td></tr>
                <tr>
                    <td class="head"><b>MOOD CHANGES </b></td>
                    <td>:</td>
                    <td class="capital"> '.$request->mood_changes.' </td>
                </tr>
                <tr><td><p style="visibility:hidden;"> lorem </p></td></tr>
                <tr>
                    <td class="head"><b>LOW ENERGY </b></td>
                    <td>:</td>
                    <td class="capital"> '.$request->low_energy.' </td>
                </tr>
                <tr><td><p style="visibility:hidden;"> lorem </p></td></tr>
                <tr>
                    <td class="head"><b>BRAIN FOG </b></td>
                    <td>:</td>
                    <td class="capital"> '.$request->brain_fog.' </td>
                </tr>
                <tr><td><p style="visibility:hidden;"> lorem </p></td></tr>
                <tr>
                    <td class="head"><b>HEART PALPITATIONS </b></td>
                    <td>:</td>
                    <td class="capital"> '.$request->heart_palpitations.' </td>
                </tr>
                <tr><td><p style="visibility:hidden;"> lorem </p></td></tr>
                <tr>
                    <td class="head"><b>JOINT/MUSCLE ACHE </b></td>
                    <td>:</td>
                    <td class="capital"> '.$request->muscle_ache.' </td>
                </tr>
                <tr><td><p style="visibility:hidden;"> lorem </p></td></tr>
                <tr>
                    <td class="head"><b>HEADACHES &/OR MIGRAINES </b></td>
                    <td>:</td>
                    <td class="capital"> '.$request->headaches.' </td>
                </tr>
                <tr><td><p style="visibility:hidden;"> lorem </p></td></tr>
                <tr>
                    <td class="head"><b>INCREASED URINATION FREQUENCY </b></td>
                    <td>:</td>
                    <td class="capital"> '.$request->unination_frequency.' </td>
                </tr>
                <tr><td><p style="visibility:hidden;"> lorem </p></td></tr>
                <tr>
                    <td class="head"><b>VAGINAL DRYNESS </b></td>
                    <td>:</td>
                    <td class="capital"> '.$request->vaginal_dryness.' </td>
                </tr>
                <tr><td><p style="visibility:hidden;"> lorem </p></td></tr>
                <tr>
                    <td class="head"><b>LOSS OF SEX DRIVE </b></td>
                    <td>:</td>
                    <td class="capital"> '.$request->sex_drive.' </td>
                </tr>
                <tr><td><p style="visibility:hidden;"> lorem </p></td></tr>
                <tr>
                    <td class="head"><b>PAINFUL INTERCOURSE </b></td>
                    <td>:</td>
                    <td class="capital"> '.$request->painful_intercourse.' </td>
                </tr>
                <tr><td><p style="visibility:hidden;"> lorem </p></td></tr>
                <tr>
                    <td class="head"><b>HAIR CHANGES </b></td>
                    <td>:</td>
                    <td class="capital"> '.$request->hair_changes.' </td>
                </tr>
                <tr><td><p style="visibility:hidden;"> lorem </p></td></tr><tr>
                    <td class="head"><b>SKIN CHANGES </b></td>
                    <td>:</td>
                    <td class="capital"> '.$request->skin_changes.' </td>
                </tr>
                <tr><td><p style="visibility:hidden;"> lorem </p></td></tr>
                <tr>
                    <td class="head"><b>WAIST CIRCUMFERENCE </b></td>
                    <td>:</td>
                    <td class="capital"> '.$request->waist_circumference.' </td>
                </tr>
                <tr><td><p style="visibility:hidden;"> lorem </p></td></tr>
                <tr>
                    <td class="head"><b>WEIGHT GAIN </b></td>
                    <td>:</td>
                    <td class="capital"> '.$request->weight_gain.' </td>
                </tr>
                <tr><td><p style="visibility:hidden;"> lorem </p></td></tr>
                <tr>
                    <td class="head"><b>Have you ever been diagnosed with breast cancer? </b></td>
                    <td>:</td>
                    <td class="capital"> '.$request->symptoms1.' </td>
                </tr>
                <tr><td><p style="visibility:hidden;"> lorem </p></td></tr>
                <tr>
                    <td class="head"><b>Do you have a family history of breast cancer? </b></td>
                    <td>:</td>
                    <td class="capital"> '.$request->symptoms2.' </td>
                </tr>
                <tr><td><p style="visibility:hidden;"> lorem </p></td></tr>
                <tr>
                    <td class="head"><b>Have you ever been told you’re at risk of/or diagnosed with blood clot forms in a vein (venous thromboembolism i.e., VTE)? </b></td>
                    <td>:</td>
                    <td class="capital"> '.$request->symptoms3.' </td>
                </tr>
                <tr><td><p style="visibility:hidden;"> lorem </p></td></tr>
                <tr>
                    <td class="head"><b>Have you ever suffered a stroke? </b></td>
                    <td>:</td>
                    <td class="capital"> '.$request->symptoms4.' </td>
                </tr>
                <tr><td><p style="visibility:hidden;"> lorem </p></td></tr>
                <tr>
                    <td class="head"><b>What is your age group? </b></td>
                    <td>:</td>
                    <td class="capital"> '.$request->age_group.' </td>
                </tr>
                <tr><td><p style="visibility:hidden;"> lorem </p></td></tr>
                <tr>
                    <td class="head" style="width:30%;"><b>Any of the symptoms mentioned above affecting your quality of life? e.g. impact on relationship with spouse, home life, work life </b></td>
                    <td>:</td>
                    <td class="capital"> '.$request->affection1.' </td>
                </tr>
                <tr><td><p style="visibility:hidden;"> lorem </p></td></tr>
                <tr>
                    <td class="head"><b>Do you smoke? </b></td>
                    <td>:</td>
                    <td class="capital"> '.$request->affection2.' </td>
                </tr>
                <tr><td><p style="visibility:hidden;"> lorem </p></td></tr>
                <tr>
                    <td class="head"><b>Do you drink alcohol? </b></td>
                    <td>:</td>
                    <td class="capital"> '.$request->affection3.' </td>
                </tr>
                <tr><td><p style="visibility:hidden;"> lorem </p></td></tr>
                <tr>
                    <td class="head"><b>Do you exercise regularly? </b></td>
                    <td>:</td>
                    <td class="capital"> '.$request->affection4.' </td>
                </tr>
                <tr><td><p style="visibility:hidden;"> lorem </p></td></tr>
                <tr>
                    <td class="head"><b>How likely are you to talk to your doctor about your symptoms within the next 12 months? </b></td>
                    <td>:</td>
                    <td class="capital"> '.$likelihood.' </td>
                </tr>

                </tbody>
                </table>');


        // $document->WriteHTML('
        //     <tr>
        //         <td style="padding: 0.75rem;border: 2px solid #c1b7b74a;">'.$request->radio_group.'</td>

        //         <td style="padding: 0.75rem;border: 2px solid #c1b7b74a;">'.$request->how_flushes.'</td>

        //         <td style="padding: 0.75rem;border: 2px solid #c1b7b74a;">
        //             '.$request->difficulty_sleeping.'
        //         </td>

        //         <td style="padding: 0.75rem;border: 2px solid #c1b7b74a;">
        //             '.$request->mood_changes.'
        //         </td>

        //         <td style="padding: 0.75rem;border: 2px solid #c1b7b74a;">
        //             '.$request->low_energy.'
        //         </td>

        //         <td style="padding: 0.75rem;border: 2px solid #c1b7b74a;">
        //           '.$request->brain_fog.'
        //         </td>

        //         <td style="padding: 0.75rem;border: 2px solid #c1b7b74a;">
        //           '.$request->heart_palpitations.'
        //         </td>
        //         <td style="padding: 0.75rem;border: 2px solid #c1b7b74a;">
        //             '.$request->muscle_ache.'
        //         </td>

        //         <td style="padding: 0.75rem;border: 2px solid #c1b7b74a;">
        //           '.$request->headaches.'
        //         </td>

        //         <td style="padding: 0.75rem;border: 2px solid #c1b7b74a;">
        //           '.$request->unination_frequency.'
        //         </td>
        //         <td style="padding: 0.75rem;border: 2px solid #c1b7b74a;">
        //             '.$request->vaginal_dryness.'
        //         </td>

        //         <td style="padding: 0.75rem;border: 2px solid #c1b7b74a;">
        //           '.$request->sex_drive.'
        //         </td>

        //         <td style="padding: 0.75rem;border: 2px solid #c1b7b74a;">
        //           '.$request->painful_intercourse.'
        //         </td>
        //         <td style="padding: 0.75rem;border: 2px solid #c1b7b74a;">
        //             '.$request->hair_changes.'
        //         </td>

        //         <td style="padding: 0.75rem;border: 2px solid #c1b7b74a;">
        //           '.$request->skin_changes.'
        //         </td>

        //         <td style="padding: 0.75rem;border: 2px solid #c1b7b74a;">
        //           '.$request->waist_circumference.'
        //         </td>
        //         <td style="padding: 0.75rem;border: 2px solid #c1b7b74a;">
        //             '.$request->weight_gain.'
        //         </td>

        //         <td style="padding: 0.75rem;border: 2px solid #c1b7b74a;">
        //           '.$request->symptoms1.'
        //         </td>

        //         <td style="padding: 0.75rem;border: 2px solid #c1b7b74a;">
        //           '.$request->symptoms2.'
        //         </td>
        //         <td style="padding: 0.75rem;border: 2px solid #c1b7b74a;">
        //             '.$request->symptoms3.'
        //         </td>

        //         <td style="padding: 0.75rem;border: 2px solid #c1b7b74a;">
        //           '.$request->symptoms4.'
        //         </td>

        //         <td style="padding: 0.75rem;border: 2px solid #c1b7b74a;">
        //           '.$request->age_group.'
        //         </td>
        //         <td style="padding: 0.75rem;border: 2px solid #c1b7b74a;">
        //             '.$request->affection1.'
        //         </td>

        //         <td style="padding: 0.75rem;border: 2px solid #c1b7b74a;">
        //           '.$request->affection2.'
        //         </td>

        //         <td style="padding: 0.75rem;border: 2px solid #c1b7b74a;">
        //           '.$request->affection3.'
        //         </td>

        //         <td style="padding: 0.75rem;border: 2px solid #c1b7b74a;">
        //           '.$request->affection4.'
        //         </td>

        //         <td style="padding: 0.75rem;border: 2px solid #c1b7b74a;">
        //           '.$request->likelihood.'
        //         </td>
        //         <tbody>
        //         </table>
        //         ');
                 
        Storage::disk('public')->put($documentFileName, $document->Output($documentFileName, "S"));
         
        return Storage::disk('public')->download($documentFileName, 'Request', $header);
    }
}

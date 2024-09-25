<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Models\User;
use Hash;
use Validator;
use Auth;
use Twilio\Rest\Client;

class FrontAuthController extends Controller
{
    public function __construct(){

            $this->middleware('auth:web');
    }

    // public function events()
    
    // {
    //     $data['events_banner']=DB::table('banner')->where('page_name',"events")->get();

    //     $data['contact_us_info']=DB::table('contact_us_info')->get();
        
    //     $data['admins']=DB::table('admins')->get();
        
        
    //     $data['cta_description']=DB::table('cta_description')->get();

    //     $data['interactive_sessions']=DB::table('interactive_sessions')->OrderBy('date','asc')->get();
        
    //     $data['footer_description']=DB::table('footer_description')->get();

    //     return view('events',$data);

    // }


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

    public function contact()
    {
        $data['contact_banner']=DB::table('banner')->where('page_name',"contact")->get();

        $data['contact_us_info']=DB::table('contact_us_info')->get();
        
        $data['admins']=DB::table('admins')->get();
    
        $data['contact_us_info']=DB::table('contact_us_info')->get();

        $data['contact_us_description']=DB::table('contact_us_description')->get();
        
        $data['footer_description']=DB::table('footer_description')->get();

        return view('contact',$data);

    } 
    
    
    
    public function glossary_faq()
    {
        $data['glossary_faq_banner']=DB::table('banner')->where('page_name',"glossary_faq")->get();

        $data['contact_us_info']=DB::table('contact_us_info')->get();
        
        $data['footer_description']=DB::table('footer_description')->get();
        
        $data['admins']=DB::table('admins')->get();
        
        $data['cta_description']=DB::table('cta_description')->get();
        
        
        $data['glossary_faq']=DB::table('glossary_faq')->get();
        
        $data['glossary']=DB::table('glossary')->get();
        
        $data['glossary_title']=DB::table('glossary_title')->get();
        
        $data['glossary_faq_description']=DB::table('glossary_faq_description')->first();

        return view('glossary_faq',$data);

    }
    
    
    
    
    
    // public function blog()
    // {
    //     $data['blog_banner']=DB::table('banner')->where('page_name',"blog")->get();

    //     $data['contact_us_info']=DB::table('contact_us_info')->get();
        
    //     $data['footer_description']=DB::table('footer_description')->get();
        
    //     $data['admins']=DB::table('admins')->get();
        
    //     $data['cta_description']=DB::table('cta_description')->get();
        
        
        
    //     $data['blog']=DB::table('blog')->get();
        
    //     $data['recent_blog']=DB::table('blog')->inRandomOrder()->limit(3)->get();
        
    //     return view('blog',$data);

    // }
    
    
    
    // public function blog_detail($id)
    // {
    //     $data['blog_detail_banner']=DB::table('banner')->where('page_name',"blog-detail")->get();

    //     $data['contact_us_info']=DB::table('contact_us_info')->get();
        
    //     $data['footer_description']=DB::table('footer_description')->get();
        
    //     $data['admins']=DB::table('admins')->get();
        
    //     $data['cta_description']=DB::table('cta_description')->get();
        
        
        
    //     $data['blog']=DB::table('blog')->where('id',$id)->get();
        
    //     $data['recent_blog']=DB::table('blog')->inRandomOrder()->limit(3)->get();
        
    //     return view('blog-detail',$data);

    // }
    
    
    
    
    public function learn_about_menopause()
    {
        //header footer data
        $data['contact_us_info']=DB::table('contact_us_info')->get();
        
        $data['admins']=DB::table('admins')->get();
        

        $data['about_banner']=DB::table('about_banner')->get();

        $data['about_meno_phases']=DB::table('about_meno_phases')->get();

        $data['about_meno_phases_description']=DB::table('about_meno_phases_description')->get();

        $data['about_phase_qa']=DB::table('about_phase_qa')->get();

        $data['about_symptoms']=DB::table('about_symptoms')->get();

        $data['about_symptoms_description']=DB::table('about_symptoms_description')->get(); 
        
        $data['about_modification_description']=DB::table('about_modification_description')->get();

        $data['about_modification']=DB::table('about_modification')->get();

        $data['about_checkup']=DB::table('about_checkup')->get();
        
        $data['about_healthy']=DB::table('about_healthy')->get();

        $data['about_work']=DB::table('about_work')->get();

        $data['about_myths']=DB::table('about_myths')->get();

        $data['about_cta']=DB::table('about_cta')->get();
        
        $data['footer_description']=DB::table('footer_description')->get();

        return view('learn-about-menopause',$data);

    }
    
    public function menopause_myths()
    {
        $data['menopause_myths_banner']=DB::table('banner')->where('page_name',"menopause_myths")->get();

        $data['contact_us_info']=DB::table('contact_us_info')->get();
        
        $data['admins']=DB::table('admins')->get();
        
        $data['myths']=DB::table('myths')->get();

        $data['myths_description']=DB::table('myths_description')->get();

        $data['cta_description']=DB::table('cta_description')->get();
        
        $data['footer_description']=DB::table('footer_description')->get();

        return view('menopause-myths',$data);

    }
    
    public function patient_detail($id)
    {
        $data['patient_detail_banner']=DB::table('banner')->where('page_name',"patient_detail")->get();

        $data['contact_us_info']=DB::table('contact_us_info')->get();
        
        $data['admins']=DB::table('admins')->get();
        
        $data['cta_description']=DB::table('cta_description')->get();

        $data['testimonial']=DB::table('testimonial')->where('id',$id)->get();

        $data['testimonial_description']=DB::table('testimonial_description')->get();

        $data['testimonial_heading']=DB::table('testimonial_heading')->get();
        
        $data['footer_description']=DB::table('footer_description')->get();

        return view('patient_detail',$data);

    }
    
    public function patient_stories()
    {
        $data['patient_stories_banner']=DB::table('banner')->where('page_name',"patient_stories")->get();
        
        $data['home_resource']=DB::table('home_resource')->where('title','Inspiring Stories')->first();

        $data['contact_us_info']=DB::table('contact_us_info')->get();
        
        $data['admins']=DB::table('admins')->get();
        
        $data['testimonial']=DB::table('testimonial')->get();        
        
        $data['testimonial_heading']=DB::table('testimonial_heading')->get();

        $data['cta_description']=DB::table('cta_description')->get();
        
        $data['footer_description']=DB::table('footer_description')->get();

        return view('patient-stories',$data);

    }
    
    public function symptoms_details()
    {
        
        $data['symptoms_details_banner']=DB::table('banner')->where('page_name',"symptoms_details")->get();

        $data['contact_us_info']=DB::table('contact_us_info')->get();
        
        $data['admins']=DB::table('admins')->get();
       
        $data['symptoms_type']=DB::table('symptoms_type')->get();

        $data['psychosocial_symptoms']=DB::table('psychosocial_symptoms')->get();
        
        $data['physical_symptoms']=DB::table('physical_symptoms')->get();
        
        $data['psychosocial_about']=DB::table('psychosocial_about')->get();
        
        $data['psychosocial_mood']=DB::table('psychosocial_mood')->get();
        
        $data['psychosocial_mood_list']=DB::table('psychosocial_mood_list')->get();
        
        $data['symptoms_type']=DB::table('symptoms_type')->get();
        
        $data['vaginal_about']=DB::table('vaginal_about')->get();
        
        $data['vaginal_stages']=DB::table('vaginal_stages')->get();
        
        $data['vaginal_symptoms']=DB::table('vaginal_symptoms')->get();
        
        $data['symptoms_heading']=DB::table('symptoms_heading')->get();
        
        $data['cta_description']=DB::table('cta_description')->get();
        
        $data['symptoms_heading']=DB::table('symptoms_heading')->get();

        $data['heart_effect']=DB::table('heart_effect')->get();

        $data['heart_effect_description']=DB::table('heart_effect_description')->get();

        $data['bone_effect']=DB::table('bone_effect')->get();

        $data['bone_effect_description']=DB::table('bone_effect_description')->get();        

        $data['footer_description']=DB::table('footer_description')->get();
        
        return view('symptoms-details',$data);

    }
    
     public function essential_checkup()
    {
        $data['essential_checkup_banner']=DB::table('banner')->where('page_name',"essential_checkup")->get();

        $data['contact_us_info']=DB::table('contact_us_info')->get();
        
        $data['admins']=DB::table('admins')->get();
        
        $data['essential_about']=DB::table('essential_about')->get();        
        
        $data['essential_info']=DB::table('essential_info')->get();

        $data['essential_test']=DB::table('essential_test')->get();

        $data['essential_test_description']=DB::table('essential_test_description')->get();

        $data['essential_cta_description']=DB::table('essential_cta_description')->get();

        $data['footer_description']=DB::table('footer_description')->get();
        
        return view('essential-checkup',$data);

    }
    
      public function management()
    {
        $data['management_banner']=DB::table('banner')->where('page_name',"management")->get();

        $data['contact_us_info']=DB::table('contact_us_info')->get();
        
        $data['admins']=DB::table('admins')->get();
        
        $data['complementry_therapies']=DB::table('complementry_therapies')->get();        
        
        $data['alternative_therapies']=DB::table('alternative_therapies')->get();

        $data['alternative_therapies_description']=DB::table('alternative_therapies_description')->get();

        $data['hormone_treatment']=DB::table('hormone_treatment')->get();

        $data['hormone_treatment_description']=DB::table('hormone_treatment_description')->get();

        $data['hormone_treatment_list']=DB::table('hormone_treatment_list')->get();

        $data['lifestyle_changes']=DB::table('lifestyle_changes')->get();

        $data['lifestyle_changes_description']=DB::table('lifestyle_changes_description')->get();

        $data['low_dose_treatment_description']=DB::table('low_dose_treatment_description')->get();

        $data['manage_symptoms']=DB::table('manage_symptoms')->get();

        $data['manage_symptoms_description']=DB::table('manage_symptoms_description')->get();

        $data['prescription_treatment_description']=DB::table('prescription_treatment_description')->get();

        $data['symptoms_management_heading']=DB::table('symptoms_management_heading')->get();

        $data['therapies']=DB::table('therapies')->get();

        $data['treatment_heading']=DB::table('treatment_heading')->get();

        $data['vaginal_treatment']=DB::table('vaginal_treatment')->get();

        $data['vaginal_treatment_description']=DB::table('vaginal_treatment_description')->get();

        $data['cta_description']=DB::table('cta_description')->get();

        $data['footer_description']=DB::table('footer_description')->get();
        
        return view('management',$data);

    }
    
    
    
    public function working_women()
    {
        
        $data['banner']=DB::table('banner')->where('page_name',"working_women")->get();

        $data['contact_us_info']=DB::table('contact_us_info')->get();
        
        $data['admins']=DB::table('admins')->get();
        
        $data['footer_description']=DB::table('footer_description')->get();
        
        $data['cta_description']=DB::table('cta_description')->get();
        
        $data['working_women']=DB::table('working_women')->get();

        $data['working_women_description']=DB::table('working_women_description')->get();

        return view('working-women',$data);

    }
    
    
    public function healthy_sexuality_intimacy()
        {
            
            
            $data['contact_us_info']=DB::table('contact_us_info')->get();
            
            $data['admins']=DB::table('admins')->get();
            
            $data['footer_description']=DB::table('footer_description')->get();
            
            $data['cta_description']=DB::table('cta_description')->get();
            
            
            
            
            $data['banner']=DB::table('banner')->where('page_name',"healthy_sexuality_intimacy")->get();

            $data['healthy_intimacy_about']=DB::table('healthy_intimacy_about')->get();
        
            $data['healthy_intimacy_factors']=DB::table('healthy_intimacy_factors')->get();

            $data['healthy_intimacy_factors_description']=DB::table('healthy_intimacy_factors_description')->get();

            $data['healthy_intimacy_hormonal']=DB::table('healthy_intimacy_hormonal')->get();

            $data['healthy_intimacy_hormonal_description']=DB::table('healthy_intimacy_hormonal_description')->get();

            $data['interesting_facts']=DB::table('interesting_facts')->get();

            $data['interesting_facts_description']=DB::table('interesting_facts_description')->get();

            $data['monohealth']=DB::table('monohealth')->get();

            $data['negative_changes_heading']=DB::table('negative_changes_heading')->get();

            $data['understand_changes']=DB::table('understand_changes')->get();

            $data['understand_changes_description']=DB::table('understand_changes_description')->get();

            $data['keeping_alive_description']=DB::table('keeping_alive_description')->get();

            $data['keeping_alive']=DB::table('keeping_alive')->get();
            
            $data['menopause_relationship_description']=DB::table('menopause_relationship_description')->get();

            $data['menopause_relationship_list']=DB::table('menopause_relationship_list')->get();

            $data['menopause_relationship']=DB::table('menopause_relationship')->get();

        
            return view('healthy-sexuality-intimacy',$data);
        
        }
}

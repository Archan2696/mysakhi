<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\Adminlogincontroller;

use App\Http\Controllers\Admin\Admincontroller;

use App\Http\Controllers\Admin\HomeController;

use App\Http\Controllers\Admin\Resourcecontroller;

use App\Http\Controllers\Admin\Expertcontroller;

use App\Http\Controllers\Admin\Contactcontroller;

use App\Http\Controllers\Admin\EventController;

use App\Http\Controllers\Admin\HeaderFooterController;

use App\Http\Controllers\Admin\AboutController;

use App\Http\Controllers\Admin\Mythscontroller;

use App\Http\Controllers\Admin\Symptomscontroller;

use App\Http\Controllers\Admin\Bannercontroller;

use App\Http\Controllers\Admin\EssentialController;

use App\Http\Controllers\Admin\WorkingWomenController;

use App\Http\Controllers\Admin\Healthycontroller;

use App\Http\Controllers\Admin\HealthyintimacyController;

use App\Http\Controllers\Admin\BlogController;

use App\Http\Controllers\Admin\MediaController;

use App\Http\Controllers\Admin\EmpowerController;



use App\Http\Controllers\Frontcontroller;
use App\Http\Controllers\Formcontroller;
use App\Http\Controllers\FrontAuthController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[Frontcontroller::class, 'index']);
Route::get('/coming_soon',[Frontcontroller::class, 'coming_soon']);

Route::post('/getForumData',[Formcontroller::class, 'getForumData']);
Route::post('/getEventData',[Formcontroller::class, 'getEventData']);
Route::post('/getBookData',[Formcontroller::class, 'getBookData']);
Route::post('/send_newsletter',[Formcontroller::class, 'send_newsletter']);

Route::get('/getFixEventData/{id}',[Frontcontroller::class, 'getFixEventData']);
Route::get('/getFixExpertData/{id}',[Frontcontroller::class, 'getFixExpertData']);

Route::post('/verify_login',[Frontcontroller::class, 'verify_login']);

Route::post('/send_menopause_data',[Formcontroller::class, 'send_menopause_data']);

Route::post('/load-event',[Frontcontroller::class, 'loadEvent']);
Route::post('/load-expert',[Frontcontroller::class, 'loadExpert']);
Route::post('/load-blog',[Frontcontroller::class, 'loadBlog']);
Route::post('/load-city',[Frontcontroller::class, 'loadCity']);

Route::get('/logout',[Frontcontroller::class, 'logout']);

Route::get('/blog',[Frontcontroller::class, 'blog']);

Route::get('/media',[Frontcontroller::class, 'media']);

Route::get('/preview/{id}', [Frontcontroller::class, 'previewFile'])->name('file.preview');

Route::get('/blog-detail/{id}',[Frontcontroller::class, 'blog_detail']);


Route::get('/contact',[FrontAuthController::class, 'contact']);
Route::get('/events',[Frontcontroller::class, 'events']);
Route::get('/find-expert',[Frontcontroller::class, 'findexpert']);
Route::get('/glossary_faq',[FrontAuthController::class, 'glossary_faq']);
Route::get('/learn-about-menopause',[FrontAuthController::class, 'learn_about_menopause']);
Route::get('/menopause-myths',[FrontAuthController::class, 'menopause_myths']);
Route::get('/patient_detail/{id}',[FrontAuthController::class, 'patient_detail']);
Route::get('/patient-stories',[FrontAuthController::class, 'patient_stories']);
Route::get('/symptoms-details',[FrontAuthController::class, 'symptoms_details']);
Route::get('/symptoms-management',[FrontAuthController::class, 'symptoms_management']);
Route::get('/essential-checkup',[FrontAuthController::class, 'essential_checkup']);
Route::get('/management',[FrontAuthController::class, 'management']);
Route::get('/working-women',[FrontAuthController::class, 'working_women']);
Route::get('/healthy-sexuality-intimacy',[FrontAuthController::class, 'healthy_sexuality_intimacy']);
Route::get('/empowering_communities',[Frontcontroller::class, 'empowering_communities']);

Route::get('/stories_detail/{id}',[FrontAuthController::class, 'patient_detail']);
Route::get('/inspiring-stories',[FrontAuthController::class, 'patient_stories']);




Route::prefix('admin')->group(function(){  
    Route::get('/login',[Adminlogincontroller::class, 'login']);
    Route::post('/login',[Adminlogincontroller::class, 'authenticate'])->name('login');
    Route::get('/logout',[Adminlogincontroller::class, 'logout'])->name('adminlogout');
    Route::get('/forgetpasswordview',[Adminlogincontroller::class, 'forgetpasswordview'])->name('forgetpasswordview');
    Route::post('/resetpasswordlink',[Adminlogincontroller::class, 'resetpasswordlink'])->name('resetpasswordlink');
    Route::get('/resetpasswordview/{id}',[Adminlogincontroller::class, 'resetpasswordview'])->name('resetpasswordview');
    Route::post('/resetpassword/{id}',[Adminlogincontroller::class, 'resetpassword'])->name('resetpassword');
    Route::get('/changepassword',[Admincontroller::class, 'changepassword']);
    Route::post('/updatepassword/{id}',[Admincontroller::class, 'updatepassword']);
    Route::get('/edit_profile',[Admincontroller::class, 'edit_profile']);
    Route::post('/store_edit_profile',[Admincontroller::class, 'store_edit_profile']);
    
    
    
    Route::get('/home',[Admincontroller::class, 'home']);

    
    
      // Bannercontroller      Bannercontroller      Bannercontroller     Bannercontroller     Bannercontroller     Bannercontroller     Bannercontroller    


    Route::get('/add_banner_data/{id}',[Bannercontroller::class, 'add_banner_data']);
    Route::post('/store_add_banner_data/{id}',[Bannercontroller::class, 'store_add_banner_data']);

     // HomeController      HomeController      HomeController     HomeController     HomeController     HomeController     HomeController    


    Route::get('/home_concerned',[HomeController::class, 'home_concerned']);
    Route::get('/update_home_concerned_description_data/{id}',[HomeController::class, 'update_home_concerned_description_data']);
    Route::post('/store_update_home_concerned_description_data/{id}',[HomeController::class, 'store_update_home_concerned_description_data']);
    Route::get('/add_home_concerned_data/{id}',[HomeController::class, 'add_home_concerned_data']);
    Route::post('/store_add_home_concerned_data/{id}',[HomeController::class, 'store_add_home_concerned_data']);
    Route::get('/delete_home_concerned/{id}',[HomeController::class, 'delete_home_concerned']);


    Route::get('/home_mission',[HomeController::class, 'home_mission']);
    Route::get('/update_home_mission_description_data/{id}',[HomeController::class, 'update_home_mission_description_data']);
    Route::post('/store_update_home_mission_description_data/{id}',[HomeController::class, 'store_update_home_mission_description_data']);
    Route::get('/add_home_mission_data/{id}',[HomeController::class, 'add_home_mission_data']);
    Route::post('/store_add_home_mission_data/{id}',[HomeController::class, 'store_add_home_mission_data']);
    Route::get('/delete_home_mission/{id}',[HomeController::class, 'delete_home_mission']);


    Route::get('/home_stages',[HomeController::class, 'home_stages']);
    Route::get('/update_home_stages_description_data/{id}',[HomeController::class, 'update_home_stages_description_data']);
    Route::post('/store_update_home_stages_description_data/{id}',[HomeController::class, 'store_update_home_stages_description_data']);
    Route::get('/add_home_stages_data/{id}',[HomeController::class, 'add_home_stages_data']);
    Route::post('/store_add_home_stages_data/{id}',[HomeController::class, 'store_add_home_stages_data']);
    Route::get('/delete_home_stages/{id}',[HomeController::class, 'delete_home_stages']);



    Route::get('/home_choose_us',[HomeController::class, 'home_choose_us']);
    Route::get('/update_home_choose_us_description_data/{id}',[HomeController::class, 'update_home_choose_us_description_data']);
    Route::post('/store_update_home_choose_us_description_data/{id}',[HomeController::class, 'store_update_home_choose_us_description_data']);
    Route::get('/add_home_choose_us_data/{id}',[HomeController::class, 'add_home_choose_us_data']);
    Route::post('/store_add_home_choose_us_data/{id}',[HomeController::class, 'store_add_home_choose_us_data']);
    Route::get('/delete_home_choose_us/{id}',[HomeController::class, 'delete_home_choose_us']);




    Route::get('/home_resource',[HomeController::class, 'home_resource']);
    Route::get('/update_home_resource_description_data/{id}',[HomeController::class, 'update_home_resource_description_data']);
    Route::post('/store_update_home_resource_description_data/{id}',[HomeController::class, 'store_update_home_resource_description_data']);
    Route::get('/add_home_resource_data/{id}',[HomeController::class, 'add_home_resource_data']);
    Route::post('/store_add_home_resource_data/{id}',[HomeController::class, 'store_add_home_resource_data']);
    Route::get('/delete_home_resource/{id}',[HomeController::class, 'delete_home_resource']);


    Route::get('/home_contact_us',[HomeController::class, 'home_contact_us']);
    Route::get('/add_home_contact_us_data/{id}',[HomeController::class, 'add_home_contact_us_data']);
    Route::post('/store_add_home_contact_us_data/{id}',[HomeController::class, 'store_add_home_contact_us_data']);
    Route::get('/delete_home_contact_us/{id}',[HomeController::class, 'delete_home_contact_us']);


    Route::get('/home_faq',[HomeController::class, 'home_faq']);
    Route::get('/update_home_faq_description_data/{id}',[HomeController::class, 'update_home_faq_description_data']);
    Route::post('/store_update_home_faq_description_data/{id}',[HomeController::class, 'store_update_home_faq_description_data']);
    Route::get('/add_home_faq_data/{id}',[HomeController::class, 'add_home_faq_data']);
    Route::post('/store_add_home_faq_data/{id}',[HomeController::class, 'store_add_home_faq_data']);
    Route::get('/delete_home_faq/{id}',[HomeController::class, 'delete_home_faq']);




    
    // AboutController          AboutController          AboutController          AboutController          AboutController       


    Route::get('/about_banner',[AboutController::class, 'about_banner']);
    Route::get('/add_about_banner_data/{id}',[AboutController::class, 'add_about_banner_data']);
    Route::post('/store_add_about_banner_data/{id}',[AboutController::class, 'store_add_about_banner_data']);



    Route::get('/about_meno_phases',[AboutController::class, 'about_meno_phases']);
    Route::get('/update_about_meno_phases_description_data/{id}',[AboutController::class, 'update_about_meno_phases_description_data']);
    Route::post('/store_update_about_meno_phases_description_data/{id}',[AboutController::class, 'store_update_about_meno_phases_description_data']);
    Route::get('/add_about_meno_phases_data/{id}',[AboutController::class, 'add_about_meno_phases_data']);
    Route::post('/store_add_about_meno_phases_data/{id}',[AboutController::class, 'store_add_about_meno_phases_data']);
    Route::get('/delete_about_meno_phases/{id}',[AboutController::class, 'delete_about_meno_phases']);



    Route::get('/about_phase_qa',[AboutController::class, 'about_phase_qa']);
    Route::get('/update_about_phase_qa_description_data/{id}',[AboutController::class, 'update_about_phase_qa_description_data']);
    Route::post('/store_update_about_phase_qa_description_data/{id}',[AboutController::class, 'store_update_about_phase_qa_description_data']);
    Route::get('/add_about_phase_qa_data/{id}',[AboutController::class, 'add_about_phase_qa_data']);
    Route::post('/store_add_about_phase_qa_data/{id}',[AboutController::class, 'store_add_about_phase_qa_data']);
    Route::get('/delete_about_phase_qa/{id}',[AboutController::class, 'delete_about_phase_qa']);



    Route::get('/about_symptoms',[AboutController::class, 'about_symptoms']);
    Route::get('/update_about_symptoms_description_data/{id}',[AboutController::class, 'update_about_symptoms_description_data']);
    Route::post('/store_update_about_symptoms_description_data/{id}',[AboutController::class, 'store_update_about_symptoms_description_data']);
    Route::get('/add_about_symptoms_data/{id}',[AboutController::class, 'add_about_symptoms_data']);
    Route::post('/store_add_about_symptoms_data/{id}',[AboutController::class, 'store_add_about_symptoms_data']);
    Route::get('/delete_about_symptoms/{id}',[AboutController::class, 'delete_about_symptoms']);


    Route::get('/about_modification',[AboutController::class, 'about_modification']);
    Route::get('/update_about_modification_description_data/{id}',[AboutController::class, 'update_about_modification_description_data']);
    Route::post('/store_update_about_modification_description_data/{id}',[AboutController::class, 'store_update_about_modification_description_data']);
    Route::get('/add_about_modification_data/{id}',[AboutController::class, 'add_about_modification_data']);
    Route::post('/store_add_about_modification_data/{id}',[AboutController::class, 'store_add_about_modification_data']);
    Route::get('/delete_about_modification/{id}',[AboutController::class, 'delete_about_modification']);



    Route::get('/about_checkup',[AboutController::class, 'about_checkup']);
    Route::get('/add_about_checkup_data/{id}',[AboutController::class, 'add_about_checkup_data']);
    Route::post('/store_add_about_checkup_data/{id}',[AboutController::class, 'store_add_about_checkup_data']);


    Route::get('/about_healthy',[AboutController::class, 'about_healthy']);
    Route::get('/add_about_healthy_data/{id}',[AboutController::class, 'add_about_healthy_data']);
    Route::post('/store_add_about_healthy_data/{id}',[AboutController::class, 'store_add_about_healthy_data']);


    Route::get('/about_work',[AboutController::class, 'about_work']);
    Route::get('/add_about_work_data/{id}',[AboutController::class, 'add_about_work_data']);
    Route::post('/store_add_about_work_data/{id}',[AboutController::class, 'store_add_about_work_data']);


    Route::get('/about_myths',[AboutController::class, 'about_myths']);
    Route::get('/add_about_myths_data/{id}',[AboutController::class, 'add_about_myths_data']);
    Route::post('/store_add_about_myths_data/{id}',[AboutController::class, 'store_add_about_myths_data']);



    Route::get('/about_cta',[AboutController::class, 'about_cta']);
    Route::get('/add_about_cta_data/{id}',[AboutController::class, 'add_about_cta_data']);
    Route::post('/store_add_about_cta_data/{id}',[AboutController::class, 'store_add_about_cta_data']);
    
    
    
    
    


    
    // Mythscontroller          Mythscontroller          Mythscontroller          Mythscontroller          Mythscontroller       

    Route::get('/menopause_myths_banner',[Mythscontroller::class, 'menopause_myths_banner']);

    Route::get('/myths',[Mythscontroller::class, 'myths']);
    Route::get('/update_myths_description_data/{id}',[Mythscontroller::class, 'update_myths_description_data']);
    Route::post('/store_update_myths_description_data/{id}',[Mythscontroller::class, 'store_update_myths_description_data']);
    Route::get('/add_myths_data/{id}',[Mythscontroller::class, 'add_myths_data']);
    Route::post('/store_add_myths_data/{id}',[Mythscontroller::class, 'store_add_myths_data']);
    Route::get('/delete_myths/{id}',[Mythscontroller::class, 'delete_myths']);
    
    

    // EventController      EventController      EventController     EventController     EventController     EventController     EventController    

    Route::get('/events_banner',[EventController::class, 'events_banner']);

    Route::get('/interactive_sessions',[EventController::class, 'interactive_sessions']);
     Route::get('/update_interactive_sessions_description_data/{id}',[EventController::class, 'update_interactive_sessions_description_data']);
    Route::post('/store_update_interactive_sessions_description_data/{id}',[EventController::class, 'store_update_interactive_sessions_description_data']);
    Route::get('/add_interactive_sessions_data/{id}',[EventController::class, 'add_interactive_sessions_data']);
    Route::post('/store_add_interactive_sessions_data/{id}',[EventController::class, 'store_add_interactive_sessions_data']);
    Route::get('/delete_interactive_sessions/{id}',[EventController::class, 'delete_interactive_sessions']);



    
     // ResourceController      ResourceController      ResourceController     ResourceController     ResourceController     ResourceController     ResourceController    

    Route::get('/patient_stories_banner',[Resourcecontroller::class, 'patient_stories_banner']);
    Route::get('/patient_detail_banner',[Resourcecontroller::class, 'patient_detail_banner']);
    Route::get('/glossary_faq_banner',[Resourcecontroller::class, 'glossary_faq_banner']);

    Route::get('/glossary_title',[Resourcecontroller::class, 'glossary_title']);
    Route::get('/add_glossary_title_data/{id}',[Resourcecontroller::class, 'add_glossary_title_data']);
    Route::post('/store_add_glossary_title_data/{id}',[Resourcecontroller::class, 'store_add_glossary_title_data']);
    Route::get('/delete_glossary_title/{id}',[Resourcecontroller::class, 'delete_glossary_title']);

    
    Route::get('/glossary_faq_description',[Resourcecontroller::class, 'glossary_faq_description']);
    Route::get('/add_glossary_faq_description_data/{id}',[Resourcecontroller::class, 'add_glossary_faq_description_data']);
    Route::post('/store_add_glossary_faq_description_data/{id}',[Resourcecontroller::class, 'store_add_glossary_faq_description_data']);
    
    
    Route::get('/glossary_faq',[Resourcecontroller::class, 'glossary_faq']);
    Route::get('/add_glossary_faq_data/{id}',[Resourcecontroller::class, 'add_glossary_faq_data']);
    Route::post('/store_add_glossary_faq_data/{id}',[Resourcecontroller::class, 'store_add_glossary_faq_data']);
    Route::get('/delete_glossary_faq/{id}',[Resourcecontroller::class, 'delete_glossary_faq']);

 
    Route::get('/testimonial',[Resourcecontroller::class, 'testimonial']);
    Route::get('/update_testimonial_heading_data/{id}',[Resourcecontroller::class, 'update_testimonial_heading_data']);
    Route::post('/store_update_testimonial_heading_data/{id}',[Resourcecontroller::class, 'store_update_testimonial_heading_data']);
    Route::get('/add_testimonial_data/{id}',[Resourcecontroller::class, 'add_testimonial_data']);
    Route::post('/store_add_testimonial_data/{id}',[Resourcecontroller::class, 'store_add_testimonial_data']);
    Route::get('/delete_testimonial/{id}',[Resourcecontroller::class, 'delete_testimonial']);

    Route::get('/add_description',[Resourcecontroller::class, 'add_description']);
    Route::get('/remove_description',[Resourcecontroller::class, 'remove_description']);

     // ExpertController      ExpertController      ExpertController     ExpertController     ExpertController     ExpertController     ExpertController    

    Route::get('/find_expert_banner',[Expertcontroller::class, 'find_expert_banner']);

    Route::get('/expert',[Expertcontroller::class, 'expert']);
    Route::get('/update_expert_description_data/{id}',[Expertcontroller::class, 'update_expert_description_data']);
    Route::post('/store_update_expert_description_data/{id}',[Expertcontroller::class, 'store_update_expert_description_data']);
    Route::get('/add_expert_data/{id}',[Expertcontroller::class, 'add_expert_data']);
    Route::post('/store_add_expert_data/{id}',[Expertcontroller::class, 'store_add_expert_data']);
    Route::get('/delete_expert/{id}',[Expertcontroller::class, 'delete_expert']);
    Route::get('/add_social_url_data/{id}',[Expertcontroller::class, 'add_social_url_data']);
    Route::post('/store_add_social_url_data/{id}',[Expertcontroller::class, 'store_add_social_url_data']);
    
    Route::post('/admin_loadCity',[Expertcontroller::class, 'admin_loadCity']);


    Route::get('/expert_faq',[Expertcontroller::class, 'expert_faq']);
    Route::get('/update_expert_faq_description_data/{id}',[Expertcontroller::class, 'update_expert_faq_description_data']);
    Route::post('/store_update_expert_faq_description_data/{id}',[Expertcontroller::class, 'store_update_expert_faq_description_data']);
    Route::get('/add_expert_faq_data/{id}',[Expertcontroller::class, 'add_expert_faq_data']);
    Route::post('/store_add_expert_faq_data/{id}',[Expertcontroller::class, 'store_add_expert_faq_data']);
    Route::get('/delete_expert_faq/{id}',[Expertcontroller::class, 'delete_expert_faq']);
    
     Route::get('/expertise',[Expertcontroller::class, 'expertise']);
    Route::get('/add_expertise_data/{id}',[Expertcontroller::class, 'add_expertise_data']);
    Route::post('/store_add_expertise_data/{id}',[Expertcontroller::class, 'store_add_expertise_data']);
    Route::get('/delete_expertise/{id}',[Expertcontroller::class, 'delete_expertise']);
    
    
    
    
    
    //WorkingWomenController    WorkingWomenController     WorkingWomenController     WorkingWomenController     WorkingWomenController     


    Route::get('/working_women_banner',[WorkingWomenController::class, 'working_women_banner']);
    
    Route::get('/working_women',[WorkingWomenController::class, 'working_women']);
    Route::get('/update_working_women_description_data/{id}',[WorkingWomenController::class, 'update_working_women_description_data']);
    Route::post('/store_update_working_women_description_data/{id}',[WorkingWomenController::class, 'store_update_working_women_description_data']);
    Route::get('/add_working_women_data/{id}',[WorkingWomenController::class, 'add_working_women_data']);
    Route::post('/store_add_working_women_data/{id}',[WorkingWomenController::class, 'store_add_working_women_data']);
    Route::get('/delete_working_women/{id}',[WorkingWomenController::class, 'delete_working_women']);







     // ContactController      ContactController      ContactController     ContactController     ContactController     ContactController     ContactController    

    Route::get('/contact_banner',[Contactcontroller::class, 'contact_banner']);

    Route::get('/contact_us_info',[Contactcontroller::class, 'contact_us_info']);
    Route::get('/add_contact_us_info_data/{id}',[Contactcontroller::class, 'add_contact_us_info_data']);
    Route::post('/store_add_contact_us_info_data/{id}',[Contactcontroller::class, 'store_add_contact_us_info_data']);
    Route::get('/delete_contact_us_info/{id}',[Contactcontroller::class, 'delete_contact_us_info']);


    Route::get('/contact_us_description',[Contactcontroller::class, 'contact_us_description']);
    Route::get('/add_contact_us_description_data/{id}',[Contactcontroller::class, 'add_contact_us_description_data']);
    Route::post('/store_add_contact_us_description_data/{id}',[Contactcontroller::class, 'store_add_contact_us_description_data']);
    Route::get('/delete_contact_us_description/{id}',[Contactcontroller::class, 'delete_contact_us_description']);
    
    
     // Symptomscontroller      Symptomscontroller      Symptomscontroller     Symptomscontroller     Symptomscontroller     
     
     
    Route::get('/symptoms_details_banner',[Symptomscontroller::class, 'symptoms_details_banner']);
    Route::get('/management_banner',[Symptomscontroller::class, 'management_banner']);

    Route::get('/symptoms_heading',[Symptomscontroller::class, 'symptoms_heading']);
    Route::get('/add_symptoms_heading_data/{id}',[Symptomscontroller::class, 'add_symptoms_heading_data']);
    Route::post('/store_add_symptoms_heading_data/{id}',[Symptomscontroller::class, 'store_add_symptoms_heading_data']);
    Route::get('/delete_symptoms_heading/{id}',[Symptomscontroller::class, 'delete_symptoms_heading']);

    Route::get('/menopause_effect',[Symptomscontroller::class, 'menopause_effect']);
    Route::get('/add_menopause_effect_data/{id}',[Symptomscontroller::class, 'add_menopause_effect_data']);
    Route::post('/store_add_menopause_effect_data/{id}',[Symptomscontroller::class, 'store_add_menopause_effect_data']);
    Route::get('/delete_menopause_effect/{id}',[Symptomscontroller::class, 'delete_menopause_effect']);


    Route::get('/heart_effect',[Symptomscontroller::class, 'heart_effect']);
    Route::get('/update_heart_effect_description_data/{id}',[Symptomscontroller::class, 'update_heart_effect_description_data']);
    Route::post('/store_update_heart_effect_description_data/{id}',[Symptomscontroller::class, 'store_update_heart_effect_description_data']);
    Route::get('/add_heart_effect_data/{id}',[Symptomscontroller::class, 'add_heart_effect_data']);
    Route::post('/store_add_heart_effect_data/{id}',[Symptomscontroller::class, 'store_add_heart_effect_data']);
    Route::get('/delete_heart_effect/{id}',[Symptomscontroller::class, 'delete_heart_effect']);



    Route::get('/bone_effect',[Symptomscontroller::class, 'bone_effect']);
    Route::get('/update_bone_effect_description_data/{id}',[Symptomscontroller::class, 'update_bone_effect_description_data']);
    Route::post('/store_update_bone_effect_description_data/{id}',[Symptomscontroller::class, 'store_update_bone_effect_description_data']);
    Route::get('/add_bone_effect_data/{id}',[Symptomscontroller::class, 'add_bone_effect_data']);
    Route::post('/store_add_bone_effect_data/{id}',[Symptomscontroller::class, 'store_add_bone_effect_data']);
    Route::get('/delete_bone_effect/{id}',[Symptomscontroller::class, 'delete_bone_effect']);
    
    
    Route::get('/symptoms_type',[SymptomsController::class, 'symptoms_type']);
           

    Route::get('/physical_symptoms',[SymptomsController::class, 'physical_symptoms']);
    Route::get('/add_physical_symptoms_data/{id}',[SymptomsController::class, 'add_physical_symptoms_data']);
    Route::post('/store_add_physical_symptoms_data/{id}',[SymptomsController::class, 'store_add_physical_symptoms_data']);
    Route::get('/delete_physical_symptoms/{id}',[SymptomsController::class, 'delete_physical_symptoms']);




    Route::get('/vaginal_symptoms',[SymptomsController::class, 'vaginal_symptoms']);
    Route::get('/add_vaginal_symptoms_data/{id}',[SymptomsController::class, 'add_vaginal_symptoms_data']);
    Route::post('/store_add_vaginal_symptoms_data/{id}',[SymptomsController::class, 'store_add_vaginal_symptoms_data']);
    Route::get('/delete_vaginal_symptoms/{id}',[SymptomsController::class, 'delete_vaginal_symptoms']);


    Route::get('/vaginal_stages',[SymptomsController::class, 'vaginal_stages']);
    Route::get('/add_vaginal_stages_data/{id}',[SymptomsController::class, 'add_vaginal_stages_data']);
    Route::post('/store_add_vaginal_stages_data/{id}',[SymptomsController::class, 'store_add_vaginal_stages_data']);
    Route::get('/delete_vaginal_stages/{id}',[SymptomsController::class, 'delete_vaginal_stages']);


    Route::get('/vaginal_about',[SymptomsController::class, 'vaginal_about']);
    Route::get('/add_vaginal_about_data/{id}',[SymptomsController::class, 'add_vaginal_about_data']);
    Route::post('/store_add_vaginal_about_data/{id}',[SymptomsController::class, 'store_add_vaginal_about_data']);
    Route::get('/delete_vaginal_about/{id}',[SymptomsController::class, 'delete_vaginal_about']);




    Route::get('/psychosocial_symptoms',[SymptomsController::class, 'psychosocial_symptoms']);
    Route::get('/add_psychosocial_symptoms_data/{id}',[SymptomsController::class, 'add_psychosocial_symptoms_data']);
    Route::post('/store_add_psychosocial_symptoms_data/{id}',[SymptomsController::class, 'store_add_psychosocial_symptoms_data']);
    Route::get('/delete_psychosocial_symptoms/{id}',[SymptomsController::class, 'delete_psychosocial_symptoms']);


    Route::get('/psychosocial_about',[SymptomsController::class, 'psychosocial_about']);
    Route::get('/add_psychosocial_about_data/{id}',[SymptomsController::class, 'add_psychosocial_about_data']);
    Route::post('/store_add_psychosocial_about_data/{id}',[SymptomsController::class, 'store_add_psychosocial_about_data']);
    Route::get('/delete_psychosocial_about/{id}',[SymptomsController::class, 'delete_psychosocial_about']);


    Route::get('/psychosocial_mood',[SymptomsController::class, 'psychosocial_mood']);
    Route::get('/add_psychosocial_mood_data/{id}',[SymptomsController::class, 'add_psychosocial_mood_data']);
    Route::post('/store_add_psychosocial_mood_data/{id}',[SymptomsController::class, 'store_add_psychosocial_mood_data']);
    Route::get('/delete_psychosocial_mood/{id}',[SymptomsController::class, 'delete_psychosocial_mood']);


    Route::get('/add_list',[SymptomsController::class, 'add_list']);
    Route::get('/remove_list',[SymptomsController::class, 'remove_list']);
    
    Route::get('/symptoms_management_heading',[Symptomscontroller::class, 'symptoms_management_heading']);
    Route::get('/add_symptoms_management_heading_data/{id}',[Symptomscontroller::class, 'add_symptoms_management_heading_data']);
    Route::post('/store_add_symptoms_management_heading_data/{id}',[Symptomscontroller::class, 'store_add_symptoms_management_heading_data']);
    Route::get('/delete_symptoms_management_heading/{id}',[Symptomscontroller::class, 'delete_symptoms_management_heading']);


    Route::get('/lifestyle_changes',[Symptomscontroller::class, 'lifestyle_changes']);
    Route::get('/update_lifestyle_changes_description_data/{id}',[Symptomscontroller::class, 'update_lifestyle_changes_description_data']);
    Route::post('/store_update_lifestyle_changes_description_data/{id}',[Symptomscontroller::class, 'store_update_lifestyle_changes_description_data']);
    Route::get('/add_lifestyle_changes_data/{id}',[Symptomscontroller::class, 'add_lifestyle_changes_data']);
    Route::post('/store_add_lifestyle_changes_data/{id}',[Symptomscontroller::class, 'store_add_lifestyle_changes_data']);
    Route::get('/delete_lifestyle_changes/{id}',[Symptomscontroller::class, 'delete_lifestyle_changes']);

    Route::get('/therapies',[Symptomscontroller::class, 'therapies']);
    Route::get('/add_therapies_data/{id}',[Symptomscontroller::class, 'add_therapies_data']);
    Route::post('/store_add_therapies_data/{id}',[Symptomscontroller::class, 'store_add_therapies_data']);
    Route::get('/delete_therapies/{id}',[Symptomscontroller::class, 'delete_therapies']);

     Route::get('/alternative_therapies',[Symptomscontroller::class, 'alternative_therapies']);
    Route::get('/update_alternative_therapies_description_data/{id}',[Symptomscontroller::class, 'update_alternative_therapies_description_data']);
    Route::post('/store_update_alternative_therapies_description_data/{id}',[Symptomscontroller::class, 'store_update_alternative_therapies_description_data']);
    Route::get('/add_alternative_therapies_data/{id}',[Symptomscontroller::class, 'add_alternative_therapies_data']);
    Route::post('/store_add_alternative_therapies_data/{id}',[Symptomscontroller::class, 'store_add_alternative_therapies_data']);
    Route::get('/delete_alternative_therapies/{id}',[Symptomscontroller::class, 'delete_alternative_therapies']);

     Route::get('/complementry_therapies',[Symptomscontroller::class, 'complementry_therapies']);
    Route::get('/add_complementry_therapies_data/{id}',[Symptomscontroller::class, 'add_complementry_therapies_data']);
    Route::post('/store_add_complementry_therapies_data/{id}',[Symptomscontroller::class, 'store_add_complementry_therapies_data']);
    Route::get('/delete_complementry_therapies/{id}',[Symptomscontroller::class, 'delete_complementry_therapies']);


    Route::get('/manage_symptoms',[Symptomscontroller::class, 'manage_symptoms']);
    Route::get('/update_manage_symptoms_description_data/{id}',[Symptomscontroller::class, 'update_manage_symptoms_description_data']);
    Route::post('/store_update_manage_symptoms_description_data/{id}',[Symptomscontroller::class, 'store_update_manage_symptoms_description_data']);
    Route::get('/add_manage_symptoms_data/{id}',[Symptomscontroller::class, 'add_manage_symptoms_data']);
    Route::post('/store_add_manage_symptoms_data/{id}',[Symptomscontroller::class, 'store_add_manage_symptoms_data']);
    Route::get('/delete_manage_symptoms/{id}',[Symptomscontroller::class, 'delete_manage_symptoms']);

    Route::get('/treatment_heading',[Symptomscontroller::class, 'treatment_heading']);
    Route::get('/add_treatment_heading_data/{id}',[Symptomscontroller::class, 'add_treatment_heading_data']);
    Route::post('/store_add_treatment_heading_data/{id}',[Symptomscontroller::class, 'store_add_treatment_heading_data']);
    Route::get('/delete_treatment_heading/{id}',[Symptomscontroller::class, 'delete_treatment_heading']);

    Route::get('/hormone_treatment',[Symptomscontroller::class, 'hormone_treatment']);
    Route::get('/update_hormone_treatment_description_data/{id}',[Symptomscontroller::class, 'update_hormone_treatment_description_data']);
    Route::post('/store_update_hormone_treatment_description_data/{id}',[Symptomscontroller::class, 'store_update_hormone_treatment_description_data']);
    Route::get('/add_hormone_treatment_data/{id}',[Symptomscontroller::class, 'add_hormone_treatment_data']);
    Route::post('/store_add_hormone_treatment_data/{id}',[Symptomscontroller::class, 'store_add_hormone_treatment_data']);
    Route::get('/delete_hormone_treatment/{id}',[Symptomscontroller::class, 'delete_hormone_treatment']);



    Route::get('/low_dose_treatment',[Symptomscontroller::class, 'low_dose_treatment']);
    Route::get('/update_low_dose_treatment_description_data/{id}',[Symptomscontroller::class, 'update_low_dose_treatment_description_data']);
    Route::post('/store_update_low_dose_treatment_description_data/{id}',[Symptomscontroller::class, 'store_update_low_dose_treatment_description_data']);

    Route::get('/vaginal_treatment',[Symptomscontroller::class, 'vaginal_treatment']);
    Route::get('/update_vaginal_treatment_description_data/{id}',[Symptomscontroller::class, 'update_vaginal_treatment_description_data']);
    Route::post('/store_update_vaginal_treatment_description_data/{id}',[Symptomscontroller::class, 'store_update_vaginal_treatment_description_data']);
    Route::get('/add_vaginal_treatment_data/{id}',[Symptomscontroller::class, 'add_vaginal_treatment_data']);
    Route::post('/store_add_vaginal_treatment_data/{id}',[Symptomscontroller::class, 'store_add_vaginal_treatment_data']);
    Route::get('/delete_vaginal_treatment/{id}',[Symptomscontroller::class, 'delete_vaginal_treatment']);

    Route::get('/prescription_treatment',[Symptomscontroller::class, 'prescription_treatment']);
    Route::get('/update_prescription_treatment_description_data/{id}',[Symptomscontroller::class, 'update_prescription_treatment_description_data']);
    Route::post('/store_update_prescription_treatment_description_data/{id}',[Symptomscontroller::class, 'store_update_prescription_treatment_description_data']);
    
    
    
    
    //EssentialController     EssentialController     EssentialController     EssentialController     EssentialController     EssentialController     

    Route::get('/essential_checkup_banner',[EssentialController::class, 'essential_checkup_banner']);


    Route::get('/essential_about',[EssentialController::class, 'essential_about']);
    Route::get('/add_essential_about_data/{id}',[EssentialController::class, 'add_essential_about_data']);
    Route::post('/store_add_essential_about_data/{id}',[EssentialController::class, 'store_add_essential_about_data']);


    Route::get('/essential_test',[EssentialController::class, 'essential_test']);
    Route::get('/update_essential_test_description_data/{id}',[EssentialController::class, 'update_essential_test_description_data']);
    Route::post('/store_update_essential_test_description_data/{id}',[EssentialController::class, 'store_update_essential_test_description_data']);
    Route::get('/add_essential_test_data/{id}',[EssentialController::class, 'add_essential_test_data']);
    Route::post('/store_add_essential_test_data/{id}',[EssentialController::class, 'store_add_essential_test_data']);
    Route::get('/delete_essential_test/{id}',[EssentialController::class, 'delete_essential_test']);



    Route::get('/essential_info',[EssentialController::class, 'essential_info']);
    Route::get('/add_essential_info_data/{id}',[EssentialController::class, 'add_essential_info_data']);
    Route::post('/store_add_essential_info_data/{id}',[EssentialController::class, 'store_add_essential_info_data']);



    Route::get('/essential_cta_description',[EssentialController::class, 'essential_cta_description']);
    Route::get('/add_essential_cta_description_data/{id}',[EssentialController::class, 'add_essential_cta_description_data']);
    Route::post('/store_add_essential_cta_description_data/{id}',[EssentialController::class, 'store_add_essential_cta_description_data']);
    
    
    
    // Healthycontroller      Healthycontroller      Healthycontroller     Healthycontroller     Healthycontroller      

    Route::get('/menopause_relationship',[Healthycontroller::class, 'menopause_relationship']);
    Route::get('/update_menopause_relationship_description_data/{id}',[Healthycontroller::class, 'update_menopause_relationship_description_data']);
    Route::post('/store_update_menopause_relationship_description_data/{id}',[Healthycontroller::class, 'store_update_menopause_relationship_description_data']);
    Route::get('/add_menopause_relationship_data/{id}',[Healthycontroller::class, 'add_menopause_relationship_data']);
    Route::post('/store_add_menopause_relationship_data/{id}',[Healthycontroller::class, 'store_add_menopause_relationship_data']);
    Route::get('/delete_menopause_relationship/{id}',[Healthycontroller::class, 'delete_menopause_relationship']);


    Route::get('/interesting_facts',[Healthycontroller::class, 'interesting_facts']);
    Route::get('/update_interesting_facts_description_data/{id}',[Healthycontroller::class, 'update_interesting_facts_description_data']);
    Route::post('/store_update_interesting_facts_description_data/{id}',[Healthycontroller::class, 'store_update_interesting_facts_description_data']);
    Route::get('/add_interesting_facts_data/{id}',[Healthycontroller::class, 'add_interesting_facts_data']);
    Route::post('/store_add_interesting_facts_data/{id}',[Healthycontroller::class, 'store_add_interesting_facts_data']);
    Route::get('/delete_interesting_facts/{id}',[Healthycontroller::class, 'delete_interesting_facts']);


    Route::get('/monohealth',[Healthycontroller::class, 'monohealth']);
    Route::get('/add_monohealth_data/{id}',[Healthycontroller::class, 'add_monohealth_data']);
    Route::post('/store_add_monohealth_data/{id}',[Healthycontroller::class, 'store_add_monohealth_data']);


    Route::get('/negative_changes_heading',[Healthycontroller::class, 'negative_changes_heading']);
    Route::get('/add_negative_changes_heading_data/{id}',[Healthycontroller::class, 'add_negative_changes_heading_data']);
    Route::post('/store_add_negative_changes_heading_data/{id}',[Healthycontroller::class, 'store_add_negative_changes_heading_data']);



    Route::get('/understand_changes',[Healthycontroller::class, 'understand_changes']);
    Route::get('/update_understand_changes_description_data/{id}',[Healthycontroller::class, 'update_understand_changes_description_data']);
    Route::post('/store_update_understand_changes_description_data/{id}',[Healthycontroller::class, 'store_update_understand_changes_description_data']);
    Route::get('/add_understand_changes_data/{id}',[Healthycontroller::class, 'add_understand_changes_data']);
    Route::post('/store_add_understand_changes_data/{id}',[Healthycontroller::class, 'store_add_understand_changes_data']);
    Route::get('/delete_understand_changes/{id}',[Healthycontroller::class, 'delete_understand_changes']);



    Route::get('/keeping_alive',[Healthycontroller::class, 'keeping_alive']);
    Route::get('/update_keeping_alive_description_data/{id}',[Healthycontroller::class, 'update_keeping_alive_description_data']);
    Route::post('/store_update_keeping_alive_description_data/{id}',[Healthycontroller::class, 'store_update_keeping_alive_description_data']);
    Route::get('/add_keeping_alive_data/{id}',[Healthycontroller::class, 'add_keeping_alive_data']);
    Route::post('/store_add_keeping_alive_data/{id}',[Healthycontroller::class, 'store_add_keeping_alive_data']);
    Route::get('/delete_keeping_alive/{id}',[Healthycontroller::class, 'delete_keeping_alive']);
    
    // Healthy Intimacy Banner
    Route::get('/healthy_sexuality_intimacy_banner',[HealthyintimacyController::class, 'healthy_sexuality_intimacy_banner']);

    Route::get('/healthy_intimacy_about',[HealthyintimacyController::class, 'healthy_intimacy_about']);
    Route::get('/add_healthy_intimacy_about_data/{id}',[HealthyintimacyController::class, 'add_healthy_intimacy_about_data']);
    Route::post('/store_add_healthy_intimacy_about_data/{id}',[HealthyintimacyController::class, 'store_add_healthy_intimacy_about_data']);

    Route::get('/healthy_intimacy_factors',[HealthyintimacyController::class, 'healthy_intimacy_factors']);
    Route::get('/update_healthy_intimacy_factors_description_data/{id}',[HealthyintimacyController::class, 'update_healthy_intimacy_factors_description_data']);
    Route::post('/store_update_healthy_intimacy_factors_description_data/{id}',[HealthyintimacyController::class, 'store_update_healthy_intimacy_factors_description_data']);
    Route::get('/add_healthy_intimacy_factors_data/{id}',[HealthyintimacyController::class, 'add_healthy_intimacy_factors_data']);
    Route::post('/store_add_healthy_intimacy_factors_data/{id}',[HealthyintimacyController::class, 'store_add_healthy_intimacy_factors_data']);
    Route::get('/delete_healthy_intimacy_factors/{id}',[HealthyintimacyController::class, 'delete_healthy_intimacy_factors']);

    Route::get('/healthy_intimacy_hormonal',[HealthyintimacyController::class, 'healthy_intimacy_hormonal']);
    Route::get('/update_healthy_intimacy_hormonal_description_data/{id}',[HealthyintimacyController::class, 'update_healthy_intimacy_hormonal_description_data']);
    Route::post('/store_update_healthy_intimacy_hormonal_description_data/{id}',[HealthyintimacyController::class, 'store_update_healthy_intimacy_hormonal_description_data']);
    Route::get('/add_healthy_intimacy_hormonal_data/{id}',[HealthyintimacyController::class, 'add_healthy_intimacy_hormonal_data']);
    Route::post('/store_add_healthy_intimacy_hormonal_data/{id}',[HealthyintimacyController::class, 'store_add_healthy_intimacy_hormonal_data']);
    Route::get('/delete_healthy_intimacy_hormonal/{id}',[HealthyintimacyController::class, 'delete_healthy_intimacy_hormonal']);
    
    
    
    
    
    
    
    // BlogController      BlogController      BlogController     BlogController     BlogController     BlogController     BlogController    


    Route::get('/blog_banner',[BlogController::class, 'blog_banner']);

    Route::get('/blog-detail_banner',[BlogController::class, 'blog_detail_banner']);

    Route::get('/blog',[BlogController::class, 'blog']);
    Route::get('/add_blog_data/{id}',[BlogController::class, 'add_blog_data']);
    Route::post('/store_add_blog_data/{id}',[BlogController::class, 'store_add_blog_data']);
    Route::get('/delete_blog/{id}',[BlogController::class, 'delete_blog']);
    
    Route::get('/view_blog/{id}',[BlogController::class, 'view_blog']);
    
    
     // MediaController      MediaController      MediaController     MediaController     MediaController     MediaController     MediaController    


    Route::get('/media_banner',[MediaController::class, 'media_banner']);

    Route::get('/media',[MediaController::class, 'media']);
    Route::get('/update_media_description_data/{id}',[MediaController::class, 'update_media_description_data']);
    Route::post('/store_update_media_description_data/{id}',[MediaController::class, 'store_update_media_description_data']);
    Route::get('/add_media_data/{id}',[MediaController::class, 'add_media_data']);
    Route::post('/store_add_media_data/{id}',[MediaController::class, 'store_add_media_data']);
    Route::get('/delete_media/{id}',[MediaController::class, 'delete_media']);
    
    
    
      // EmpoweringController      EmpoweringController      EmpoweringController     EmpoweringController     EmpoweringController     EmpoweringController     EmpoweringController    

    Route::get('/empowering_communities_banner',[EmpowerController::class, 'empowering_communities_banner']);

    Route::get('/health_sanitation',[EmpowerController::class, 'health_sanitation']);
    Route::get('/update_health_sanitation_description_data/{id}',[EmpowerController::class, 'update_health_sanitation_description_data']);
    Route::post('/store_update_health_sanitation_description_data/{id}',[EmpowerController::class, 'store_update_health_sanitation_description_data']);
    Route::get('/add_health_sanitation_data/{id}',[EmpowerController::class, 'add_health_sanitation_data']);
    Route::post('/store_add_health_sanitation_data/{id}',[EmpowerController::class, 'store_add_health_sanitation_data']);
    Route::get('/delete_health_sanitation/{id}',[EmpowerController::class, 'delete_health_sanitation']);


    Route::get('/menstrual_hygiene',[EmpowerController::class, 'menstrual_hygiene']);
    Route::get('/update_menstrual_hygiene_description_data/{id}',[EmpowerController::class, 'update_menstrual_hygiene_description_data']);
    Route::post('/store_update_menstrual_hygiene_description_data/{id}',[EmpowerController::class, 'store_update_menstrual_hygiene_description_data']);
    Route::get('/add_menstrual_hygiene_data/{id}',[EmpowerController::class, 'add_menstrual_hygiene_data']);
    Route::post('/store_add_menstrual_hygiene_data/{id}',[EmpowerController::class, 'store_add_menstrual_hygiene_data']);
    Route::get('/delete_menstrual_hygiene/{id}',[EmpowerController::class, 'delete_menstrual_hygiene']);


    Route::get('/latest_work',[EmpowerController::class, 'latest_work']);
    Route::get('/update_latest_work_description_data/{id}',[EmpowerController::class, 'update_latest_work_description_data']);
    Route::post('/store_update_latest_work_description_data/{id}',[EmpowerController::class, 'store_update_latest_work_description_data']);
    Route::get('/add_latest_work_data/{id}',[EmpowerController::class, 'add_latest_work_data']);
    Route::post('/store_add_latest_work_data/{id}',[EmpowerController::class, 'store_add_latest_work_data']);
    Route::get('/delete_latest_work/{id}',[EmpowerController::class, 'delete_latest_work']);

    Route::get('/update_sub_img/{id}',[EmpowerController::class,'update_sub_img']);
    Route::post('/store_update_sub_img/{id}',[EmpowerController::class,'store_update_sub_img']);
    Route::get('/delete_sub_img/{id}',[EmpowerController::class,'delete_sub_img']);
    
    
    
    

    // HeaderFooterController      HeaderFooterController      HeaderFooterController     HeaderFooterController     HeaderFooterController      


    Route::get('/cta_description',[HeaderFooterController::class, 'cta_description']);
    Route::get('/add_cta_description_data/{id}',[HeaderFooterController::class, 'add_cta_description_data']);
    Route::post('/store_add_cta_description_data/{id}',[HeaderFooterController::class, 'store_add_cta_description_data']);

    Route::get('/footer_description',[HeaderFooterController::class, 'footer_description']);
    Route::get('/add_footer_description_data/{id}',[HeaderFooterController::class, 'add_footer_description_data']);
    Route::post('/store_add_footer_description_data/{id}',[HeaderFooterController::class, 'store_add_footer_description_data']);
    
    
    Route::get('/social_sticky',[HeaderFooterController::class, 'social_sticky']);
    Route::get('/add_social_sticky_data/{id}',[HeaderFooterController::class, 'add_social_sticky_data']);
    Route::post('/store_add_social_sticky_data/{id}',[HeaderFooterController::class, 'store_add_social_sticky_data']);



    Route::get('/visitors',[HeaderFooterController::class, 'visitors']);
    Route::get('/forum_data',[HeaderFooterController::class, 'forum_data']);
    Route::get('/delete_forum_data/{id}',[HeaderFooterController::class, 'delete_forum_data']);

    Route::get('/event_inquiry',[HeaderFooterController::class, 'event_inquiry']);
    Route::get('/delete_event_inquiry/{id}',[HeaderFooterController::class, 'delete_event_inquiry']);

    Route::get('/expert_appointment',[HeaderFooterController::class, 'expert_appointment']);
    Route::get('/delete_expert_appointment/{id}',[HeaderFooterController::class, 'delete_expert_appointment']);


    Route::get('/subscription_data',[HeaderFooterController::class, 'subscription_data']);
    Route::get('/delete_subscription_data/{id}',[HeaderFooterController::class, 'delete_subscription_data']);
    
    
    
        Route::get('/all_users',[HeaderFooterController::class, 'all_users']);

        Route::get('/export-users',[HeaderFooterController::class,'exportUsers'])->name('export-users');
        Route::get('/export-inquiry',[HeaderFooterController::class,'exportInquiry'])->name('export-inquiry');
        Route::get('/export-forum',[HeaderFooterController::class,'exportForum'])->name('export-forum');
        Route::get('/export-appointment',[HeaderFooterController::class,'exportAppointment'])->name('export-appointment');
        Route::get('/export-subscription',[HeaderFooterController::class,'exportSubscription'])->name('export-subscription');

});

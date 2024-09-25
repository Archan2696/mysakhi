<html>
<head>
  <title>Admin</title>
  <link rel="icon" href="/image/logo.png">
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="icon" href="/image/favicon.png">
      <link rel="stylesheet" type="text/css" href="/css/admin_home.css">
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
      <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Philosopher:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">


      
</head>
<style type="text/css">
   .logo h1 {
   font-size: 35px;
   font-weight: 800;
   margin: 0;
   text-transform: uppercase;
}
.logo h1 a{
   color:#df453e;
}
.logo h1 a span{
   color:#1b3e41;
}
.logo h1 a:hover{
   text-decoration: none;
}

.text{

   font-weight: 400;
}
.text th{

   text-align: left;

   border: none !important;
}
.error_mes{

   color: red;
}
</style>
<body>  
   <header class="page-header">
      <nav class="main-menu">
         <!-- <div class="logo">
               <h1><a href="{{url('admin/home')}}">rent<span>al</span></a></h1>
         </div> -->
         <a href="{{url('/admin/home')}}"class="logo"><img src="/image/new-logo.png" alt="img"></a>
         <ul class="menu main_drop">
            <li><a href="{{url('admin/home')}}"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span> </a>
            </li>

            <li><a href="#"><i class="fas fa-comments"></i><span>Inquiry</span> <i class="fa-solid fa-chevron-down"></i></a>
               <ul class="drp-menu">
                  <!--<li><a href="{{url('admin/visitors')}}">Visitors</a></li>-->
                  <li><a href="{{url('admin/forum_data')}}">Forum Data</a></li>
                  <li><a href="{{url('admin/event_inquiry')}}">Event Inquiry</a></li>
                  <li><a href="{{url('admin/expert_appointment')}}">Expert Appointment</a></li>
                  <li><a href="{{url('admin/subscription_data')}}">Subscription Data</a></li>
               </ul>
            </li>

             <li><a href="#"><i class="fas fa-home"></i><span>Home</span> <i class="fa-solid fa-chevron-down"></i></a>
               <ul class="drp-menu">
                  <li><a href="{{url('admin/home_concerned')}}">Home Concerned</a></li>
                  <li><a href="{{url('admin/home_mission')}}">Home Mission</a></li>
                  <li><a href="{{url('admin/home_stages')}}">Home Stages</a></li>
                  <li><a href="{{url('admin/home_choose_us')}}">Home Choose Us</a></li>
                  <li><a href="{{url('admin/home_resource')}}">Home Resources</a></li>
                  <li><a href="{{url('admin/home_faq')}}">Home FAQ</a></li>
                  <li><a href="{{url('admin/home_contact_us')}}">Home Contact Us</a></li>
               </ul>
            </li>
            
            <li><a href="#"><i class="fas fa-file-alt"></i><span>About Menopause</span> <i class="fa-solid fa-chevron-down"></i></a>
               <ul class="drp-menu">
                  <li><a href="{{url('admin/about_banner')}}">About Banner</a></li>
                  <li><a href="{{url('admin/about_meno_phases')}}">About Menopause Phases</a></li>
                  <li><a href="{{url('admin/about_phase_qa')}}">About Phases Questions</a></li>
                  <li><a href="{{url('admin/about_symptoms')}}">About Symptoms</a></li>
                  <li><a href="{{url('admin/about_modification')}}">About Modification</a></li>
                  <li><a href="{{url('admin/about_checkup')}}">About Checkup</a></li>
                  <li><a href="{{url('admin/about_healthy')}}">About Healthy</a></li>
                  <li><a href="{{url('admin/about_work')}}">About Work</a></li>
                  <li><a href="{{url('admin/about_myths')}}">About Myths</a></li>
                  <li><a href="{{url('admin/about_cta')}}">About CTA section</a></li>
               </ul>
            </li>
            
             <li><a href="#"><i class="fas fa-venus"></i><span>Menopause</span> <i class="fa-solid fa-chevron-down"></i></a>
               <ul class="drp-menu">
                    <li><a href="#"><i class="fas fa-thermometer-half"></i><span>Symptoms & Complications</span> <i class="fa-solid fa-chevron-down"></i></a>
                       <ul class="drp-menu">
                          <li><a href="{{url('admin/symptoms_details_banner')}}">Symptoms Detail Banner</a></li>
                          <li><a href="{{url('admin/symptoms_heading')}}">Symptoms Heading</a></li>
                          <li><a href="{{url('admin/symptoms_type')}}">Symptoms Type</a></li>
                          <li><a href="#"><i class="fas fa-heartbeat"></i><span>Effects</span> <i class="fa-solid fa-chevron-down"></i></a>
                            <ul class="drp-menu">
                          <li><a href="{{url('admin/menopause_effect')}}">Menopause Effect</a></li>
                          <li><a href="{{url('admin/heart_effect')}}">Heart Effect</a></li>
                          <li><a href="{{url('admin/bone_effect')}}">Bone Effect</a></li>
                            </ul>
                      </ul>
                    </li>
                    
                    <li><a href="#"><i class="fas fa-notes-medical"></i><span>Management</span> <i class="fa-solid fa-chevron-down"></i></a>
                            <ul class="drp-menu">
                                    <li><a href="{{url('admin/management_banner')}}">Manage Symptoms Banner</a></li>
                                    <li><a href="{{url('admin/symptoms_management_heading')}}">Symptoms Management Heading</a></li>
                                    <li><a href="{{url('admin/lifestyle_changes')}}">Lifestyle Changes</a></li>
                                    <li><a href="{{url('admin/manage_symptoms')}}">Manage Symptoms</a></li>
                                    <li><a href="#"><i class="fas fa-band-aid"></i><span>Therapies</span> <i class="fa-solid fa-chevron-down"></i></a>
                                         <ul class="drp-menu">
                                                    <li><a href="{{url('admin/therapies')}}">Therapies Heading</a></li>
                                                    <li><a href="{{url('admin/alternative_therapies')}}">Alternative Therapies</a></li>
                                                    <li><a href="{{url('admin/complementry_therapies')}}">Complimentary Therapies</a></li>
                                        </ul>
                                    <li><a href="#"><i class="fas fa-stethoscope"></i><span>Treatment</span> <i class="fa-solid fa-chevron-down"></i></a>
                                        <ul class="drp-menu">
                                                       <li><a href="{{url('admin/treatment_heading')}}">Treatment Heading</a></li>
                                                      <li><a href="{{url('admin/hormone_treatment')}}">Hormone Treatment</a></li>
                                                      <li><a href="{{url('admin/low_dose_treatment')}}">Low Dose Treatment</a></li>
                                                      <li><a href="{{url('admin/vaginal_treatment')}}">Vaginal Treatment</a></li>
                                                      <li><a href="{{url('admin/prescription_treatment')}}">Prescription Treatment</a></li>
                                        </ul>
                            
                            </ul>
                    </li>
              
                    <li><a href="#"><i class="fas fa-question-circle"></i><span>Essential Check Ups</span> <i class="fa-solid fa-chevron-down"></i></a>
                       <ul class="drp-menu">
                            <li><a href="{{url('admin/essential_checkup_banner')}}">Essential Checkup Banner</a></li>
                          <li><a href="{{url('admin/essential_about')}}">Essential About</a></li>
                          <li><a href="{{url('admin/essential_test')}}">Essential Test</a></li>
                          <li><a href="{{url('admin/essential_info')}}">Essential Info</a></li>
                          <li><a href="{{url('admin/essential_cta_description')}}">Essential CTA Description</a></li>
                       </ul>
                    </li>
                      
                    <li><a href="#"><i class="fas fa-phone"></i><span>Healthy Sexuality & Intimacy</span> <i class="fa-solid fa-chevron-down"></i></a>
                       <ul class="drp-menu">
                           <li><a href="{{url('admin/healthy_sexuality_intimacy_banner')}}">Intimacy Banner</a></li>
                          <li><a href="{{url('admin/healthy_intimacy_about')}}">Intimacy About</a></li>
                          <li><a href="{{url('admin/healthy_intimacy_factors')}}">Factors</a></li>
                          <li><a href="{{url('admin/healthy_intimacy_hormonal')}}">Hormonal</a></li>
                          <li><a href="{{url('admin/monohealth')}}">Monohealth</a></li>
                          <li><a href="{{url('admin/negative_changes_heading')}}">Negative Changes Heading</a></li>
                          <li><a href="{{url('admin/understand_changes')}}">Understand Changes</a></li>
                          <li><a href="{{url('admin/keeping_alive')}}">Keeping Alive</a></li>
                          <li><a href="{{url('admin/interesting_facts')}}">Interesting Facts</a></li>
                          <li><a href="{{url('admin/menopause_relationship')}}">Menopause and Relationship</a></li>
                      
                       </ul>
                    </li>
                     <li><a href="#"><i class="fas fa-briefcase"></i><span>Managing Menopause at Work</span> <i class="fa-solid fa-chevron-down"></i></a>
                           <ul class="drp-menu">
                              <li><a href="{{url('admin/working_women_banner')}}">Working Women Banner</a></li>
                              <li><a href="{{url('admin/working_women')}}">Working Women</a></li>
                           </ul>
                    </li>
                    <li><a href="#"><i class="fas fa-exclamation-circle"></i> <span>Menopause Myths</span> <i class="fa-solid fa-chevron-down"></i></a>
                           <ul class="drp-menu">
                            <li><a href="{{url('admin/menopause_myths_banner')}}">Myths Banner</a></li>
                              <li><a href="{{url('admin/myths')}}">Myths</a></li>
                           </ul>
                    </li>
            
               </ul>
            </li>
            
            
            
             <li><a href="#"><i class="fas fa-question-circle"></i><span>Resource Library</span> <i class="fa-solid fa-chevron-down"></i></a>
               <ul class="drp-menu">
                   <li><a href="#"><i class="fas fa-book"></i><span>Inspiring Stories</span> <i class="fa-solid fa-chevron-down"></i></a>
                           <ul class="drp-menu">
                              <li><a href="{{url('admin/patient_stories_banner')}}">Patient Stories Banner</a></li>
                              <li><a href="{{url('admin/testimonial')}}">Inspiring Stories</a></li>
            
                           </ul>
                    </li>
                    <li><a href="#"><i class="fas fa-info-circle"></i><span>Glossary & FAQ</span> <i class="fa-solid fa-chevron-down"></i></a>
                           <ul class="drp-menu">
                              <li><a href="{{url('admin/glossary_faq_banner')}}">Glossary & FAQ Banner</a></li>
                              <li><a href="{{url('admin/glossary_title')}}">Glossary & FAQ Title</a></li>
                              <li><a href="{{url('admin/glossary_faq')}}">Glossary & FAQ</a></li>
                           </ul>
                    </li>
                      <li><a href="#"><i class="fas fa-blog"></i> <span>Blog</span> <i class="fa-solid fa-chevron-down"></i></a>
                           <ul class="drp-menu">
                                <li><a href="{{url('admin/blog_banner')}}">Blog Banner</a></li>
                              <li><a href="{{url('admin/blog')}}">Blog List</a></li>
                           </ul>
                      </li>
                      
                      <li><a href="#"><i class="fas fa-photo-video"></i> <span>Media</span> <i class="fa-solid fa-chevron-down"></i></a>
                           <ul class="drp-menu">
                                <li><a href="{{url('admin/media_banner')}}">Media Banner</a></li>
                              <li><a href="{{url('admin/media')}}">Media</a></li>
                           </ul>
                      </li>
 

               </ul>
            </li>


            
             
            <!-- <li><a href="#"><i class="fas fa-exclamation-circle"></i> <span>Myths</span> <i class="fa-solid fa-chevron-down"></i></a>-->
            <!--   <ul class="drp-menu">-->
            <!--    <li><a href="{{url('admin/menopause_myths_banner')}}">Myths Banner</a></li>-->
            <!--      <li><a href="{{url('admin/myths')}}">Myths</a></li>-->
            <!--   </ul>-->
            <!--</li>-->

            
             <li><a href="#"><i class="fas fa-calendar"></i> <span>Events</span> <i class="fa-solid fa-chevron-down"></i></a>
               <ul class="drp-menu">
                <li><a href="{{url('admin/events_banner')}}">Events Banner</a></li>
                  <li><a href="{{url('admin/interactive_sessions')}}">Events</a></li>
               </ul>
            </li>
            
            
            
             <li><a href="#"><i class="fas fa-question-circle"></i><span>Empowering Communities</span> <i class="fa-solid fa-chevron-down"></i></a>
               <ul class="drp-menu">
                  <li><a href="{{url('admin/empowering_communities_banner')}}">Empowering Communities Banner</a></li>
                  <li><a href="{{url('admin/health_sanitation')}}">Health and Sanitation</a></li>
                  <li><a href="{{url('admin/menstrual_hygiene')}}">Menstrual Hygiene</a></li>
                  <li><a href="{{url('admin/latest_work')}}">Latest Work</a></li>

               </ul>
            </li>
            
            
            <!--<li><a href="#"><i class="fas fa-blog"></i> <span>Blog</span> <i class="fa-solid fa-chevron-down"></i></a>-->
            <!--   <ul class="drp-menu">-->
            <!--    <li><a href="{{url('admin/blog_banner')}}">Blog Banner</a></li>-->
            <!--      <li><a href="{{url('admin/blog')}}">Blog List</a></li>-->
            <!--   </ul>-->
            <!--</li>-->


            <!--<li><a href="#"><i class="fas fa-thermometer-half"></i><span>Symptoms</span> <i class="fa-solid fa-chevron-down"></i></a>-->
            <!--   <ul class="drp-menu">-->
            <!--      <li><a href="{{url('admin/symptoms_details_banner')}}">Symptoms Detail Banner</a></li>-->
            <!--      <li><a href="{{url('admin/symptoms_heading')}}">Symptoms Heading</a></li>-->
            <!--      <li><a href="{{url('admin/symptoms_type')}}">Symptoms Type</a></li>-->
            <!--      <li><a href="#"><i class="fas fa-heartbeat"></i><span>Effects</span> <i class="fa-solid fa-chevron-down"></i></a>-->
            <!--        <ul class="drp-menu">-->
            <!--      <li><a href="{{url('admin/menopause_effect')}}">Menopause Effect</a></li>-->
            <!--      <li><a href="{{url('admin/heart_effect')}}">Heart Effect</a></li>-->
            <!--      <li><a href="{{url('admin/bone_effect')}}">Bone Effect</a></li>-->
            <!--        </ul>-->
            <!--    <li><a href="#"><i class="fas fa-notes-medical"></i><span>Symptoms Management</span> <i class="fa-solid fa-chevron-down"></i></a>-->
            <!--        <ul class="drp-menu">-->
            <!--                <li><a href="{{url('admin/management_banner')}}">Manage Symptoms Banner</a></li>-->
            <!--                <li><a href="{{url('admin/symptoms_management_heading')}}">Symptoms Management Heading</a></li>-->
            <!--                <li><a href="{{url('admin/lifestyle_changes')}}">Lifestyle Changes</a></li>-->
            <!--                <li><a href="{{url('admin/manage_symptoms')}}">Manage Symptoms</a></li>-->
            <!--                <li><a href="#"><i class="fas fa-band-aid"></i><span>Therapies</span> <i class="fa-solid fa-chevron-down"></i></a>-->
            <!--                     <ul class="drp-menu">-->
            <!--                                <li><a href="{{url('admin/therapies')}}">Therapies Heading</a></li>-->
            <!--                                <li><a href="{{url('admin/alternative_therapies')}}">Alternative Therapies</a></li>-->
            <!--                                <li><a href="{{url('admin/complementry_therapies')}}">Complimentary Therapies</a></li>-->
            <!--                    </ul>-->
            <!--                <li><a href="#"><i class="fas fa-stethoscope"></i><span>Treatment</span> <i class="fa-solid fa-chevron-down"></i></a>-->
            <!--                    <ul class="drp-menu">-->
            <!--                                   <li><a href="{{url('admin/treatment_heading')}}">Treatment Heading</a></li>-->
            <!--                                  <li><a href="{{url('admin/hormone_treatment')}}">Hormone Treatment</a></li>-->
            <!--                                  <li><a href="{{url('admin/low_dose_treatment')}}">Low Dose Treatment</a></li>-->
            <!--                                  <li><a href="{{url('admin/vaginal_treatment')}}">Vaginal Treatment</a></li>-->
            <!--                                  <li><a href="{{url('admin/prescription_treatment')}}">Prescription Treatment</a></li>-->
            <!--                    </ul>-->
                    
            <!--        </ul>-->
            <!--   </ul>-->
            <!--</li>-->
            
            
            <!--<li><a href="#"><i class="fas fa-notes-medical"></i><span>Symptoms Management</span> <i class="fa-solid fa-chevron-down"></i></a>-->
            <!--   <ul class="drp-menu">-->
            <!--    <li><a href="{{url('admin/management_banner')}}">Manage Symptoms Banner</a></li>-->
            <!--      <li><a href="{{url('admin/symptoms_management_heading')}}">Symptoms Management Heading</a></li>-->
            <!--      <li><a href="{{url('admin/lifestyle_changes')}}">Lifestyle Changes</a></li>-->
            <!--      <li><a href="{{url('admin/therapies')}}">Therapies Heading</a></li>-->
            <!--      <li><a href="{{url('admin/alternative_therapies')}}">Alternative Therapies</a></li>-->
            <!--      <li><a href="{{url('admin/complementry_therapies')}}">Complimentary Therapies</a></li>-->
            <!--      <li><a href="{{url('admin/manage_symptoms')}}">Manage Symptoms</a></li>-->
            <!--      <li><a href="{{url('admin/treatment_heading')}}">Treatment Heading</a></li>-->
            <!--      <li><a href="{{url('admin/hormone_treatment')}}">Hormone Treatment</a></li>-->
            <!--      <li><a href="{{url('admin/low_dose_treatment')}}">Low Dose Treatment</a></li>-->
            <!--      <li><a href="{{url('admin/vaginal_treatment')}}">Vaginal Treatment</a></li>-->
            <!--      <li><a href="{{url('admin/prescription_treatment')}}">Prescription Treatment</a></li>-->
            <!--   </ul>-->
            <!--</li>-->
            
            
            <!--<li><a href="#"><i class="fas fa-phone"></i><span>Healthy Sexuality and Intimacy</span> <i class="fa-solid fa-chevron-down"></i></a>-->
            <!--   <ul class="drp-menu">-->
            <!--       <li><a href="{{url('admin/healthy_sexuality_intimacy_banner')}}">Intimacy Banner</a></li>-->
            <!--      <li><a href="{{url('admin/healthy_intimacy_about')}}">Intimacy About</a></li>-->
            <!--      <li><a href="{{url('admin/healthy_intimacy_factors')}}">Factors</a></li>-->
            <!--      <li><a href="{{url('admin/healthy_intimacy_hormonal')}}">Hormonal</a></li>-->
            <!--      <li><a href="{{url('admin/monohealth')}}">Monohealth</a></li>-->
            <!--      <li><a href="{{url('admin/negative_changes_heading')}}">Negative Changes Heading</a></li>-->
            <!--      <li><a href="{{url('admin/understand_changes')}}">Understand Changes</a></li>-->
            <!--      <li><a href="{{url('admin/keeping_alive')}}">Keeping Alive</a></li>-->
            <!--      <li><a href="{{url('admin/interesting_facts')}}">Interesting Facts</a></li>-->
            <!--      <li><a href="{{url('admin/menopause_relationship')}}">Menopause and Relationship</a></li>-->
                  
                  
                  
                  
            <!--   </ul>-->
            <!--</li>-->
            
            <!--<li><a href="#"><i class="fas fa-briefcase"></i><span>Working Women</span> <i class="fa-solid fa-chevron-down"></i></a>-->
            <!--   <ul class="drp-menu">-->
            <!--      <li><a href="{{url('admin/working_women_banner')}}">Working Women Banner</a></li>-->
            <!--      <li><a href="{{url('admin/working_women')}}">Working Women</a></li>-->
            <!--   </ul>-->
            <!--</li>-->

            
            <li><a href="#"><i class="fas fa-user-tie"></i><span>Find An Expert</span> <i class="fa-solid fa-chevron-down"></i></a>
               <ul class="drp-menu">
                  <li><a href="{{url('admin/find_expert_banner')}}">Find Expert Banner</a></li>
                  <li><a href="{{url('admin/expert')}}">Expert</a></li>
                  <li><a href="{{url('admin/expertise')}}">Expertise</a></li>
                  <li><a href="{{url('admin/expert_faq')}}">Expert FAQ</a></li>

               </ul>
            </li>

             <li><a href="#"><i class="fas fa-phone"></i><span>Contact Us</span> <i class="fa-solid fa-chevron-down"></i></a>
               <ul class="drp-menu">
                  <li><a href="{{url('admin/contact_banner')}}">Contact Banner</a></li>
                <li><a href="{{url('admin/contact_us_description')}}">Contact Us Description</a></li>
                  <li><a href="{{url('admin/contact_us_info')}}">Contact Us Info</a></li>

               </ul>
            </li>
            
            
            <!--<li><a href="#"><i class="fas fa-question-circle"></i><span>Essential</span> <i class="fa-solid fa-chevron-down"></i></a>-->
            <!--   <ul class="drp-menu">-->
            <!--        <li><a href="{{url('admin/essential_checkup_banner')}}">Essential Checkup Banner</a></li>-->
            <!--      <li><a href="{{url('admin/essential_about')}}">Essential About</a></li>-->
            <!--      <li><a href="{{url('admin/essential_test')}}">Essential Test</a></li>-->
            <!--      <li><a href="{{url('admin/essential_info')}}">Essential Info</a></li>-->
            <!--      <li><a href="{{url('admin/essential_cta_description')}}">Essential CTA Description</a></li>-->
            <!--   </ul>-->
            <!--</li>-->


          
            <li><a href="#"><i class="fas fa-table"></i><span>Header-Footer</span> <i class="fa-solid fa-chevron-down"></i></a>
               <ul class="drp-menu">
                  <li><a href="{{url('/admin/cta_description')}}">CTA Description</a></li>
                  <li><a href="{{url('/admin/footer_description')}}">Footer Description</a></li>
                  <li><a href="{{url('/admin/social_sticky')}}">Social Links</a></li>
               </ul>
            </li>
            
            <!--<li><a href="#"><i class="fas fa-table"></i><span>Account</span> <i class="fa-solid fa-chevron-down"></i></a>-->
            <!--   <ul class="drp-menu">-->
            <!--      <li><a href="{{url('/admin/terms_of_service')}}">Terms Of Service</a></li>-->
            <!--      <li><a href="{{url('/admin/privacy_policy')}}">Privacy Policy</a></li>-->
            <!--   </ul>-->
            <!--</li>-->
         </ul>
      </nav>
   </header>
   <section class="mobile_manu">
        <div class="container">
          <div class="row">
              <div class="col-lg-6 col-md-6 col-6">
                 <div class="mobile_logo">
                   <a href="{{url('/admin/home')}}"><img src="/image/new-logo.png"></a>
                 </div>
               </div>
               <div class="col-lg-6 col-md-6 col-6">
                  <div class="admin-profile">
                  <div class="login">
                    <div class="dropdown1">
                      <button id="myBtn1">
                        <i class="dropbtn1 fas fa-user"></i>
                     </button>
                        <div id="myDropdown1" class="dropdown-content1">
                            <a href="{{url('admin/edit_profile')}}">Edit Profile</a>
                            <a href="{{url('admin/changepassword')}}">Change Password</a>
                            <a href="{{url('admin/logout')}}"><i class="fas fa-lock"></i>Logout</a>
                        </div>
                    </div>
                  </div>
                  <div class="mobile-menu">
                     <div id="mySidepanel" class="sidepanel">
                        <div class="m_menu main-menu">
                           <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><i class="fas fa-times"></i></a>
                           <ul class="menu main_drop">
                                 <li><a href="{{url('/admin/home')}}"><span>Dashboard</span> </a>
                                 </li>
                                 
                                  <li><a href="#"><i class="fas fa-comments"></i><span>Inquiry</span> <i class="fa-solid fa-chevron-down"></i></a>
                                   <ul class="drp-menu">
                                      <li><a href="{{url('admin/forum_data')}}">Forum Data</a></li>
                                      <li><a href="{{url('admin/event_inquiry')}}">Event Inquiry</a></li>
                                      <li><a href="{{url('admin/expert_appointment')}}">Expert Appointment</a></li>
                                      <li><a href="{{url('admin/subscription_data')}}">Subscription Data</a></li>
                                   </ul>
                                </li>
                    
                                 <li><a href="#"><i class="fas fa-home"></i><span>Home</span> <i class="fa-solid fa-chevron-down"></i></a>
                                   <ul class="drp-menu">
                                      <li><a href="{{url('admin/home_concerned')}}">Home Concerned</a></li>
                                      <li><a href="{{url('admin/home_mission')}}">Home Mission</a></li>
                                      <li><a href="{{url('admin/home_stages')}}">Home Stages</a></li>
                                      <li><a href="{{url('admin/home_choose_us')}}">Home Choose Us</a></li>
                                      <li><a href="{{url('admin/home_resource')}}">Home Resources</a></li>
                                      <li><a href="{{url('admin/home_faq')}}">Home FAQ</a></li>
                                      <li><a href="{{url('admin/home_contact_us')}}">Home Contact Us</a></li>
                                   </ul>
                                </li>
                                
                                <li><a href="#"><i class="fas fa-file-alt"></i><span>About Menopause</span> <i class="fa-solid fa-chevron-down"></i></a>
                                   <ul class="drp-menu">
                                      <li><a href="{{url('admin/about_banner')}}">About Banner</a></li>
                                      <li><a href="{{url('admin/about_meno_phases')}}">About Menopause Phases</a></li>
                                      <li><a href="{{url('admin/about_phase_qa')}}">About Phases Questions</a></li>
                                      <li><a href="{{url('admin/about_symptoms')}}">About Symptoms</a></li>
                                      <li><a href="{{url('admin/about_modification')}}">About Modification</a></li>
                                      <li><a href="{{url('admin/about_checkup')}}">About Checkup</a></li>
                                      <li><a href="{{url('admin/about_healthy')}}">About Healthy</a></li>
                                      <li><a href="{{url('admin/about_work')}}">About Work</a></li>
                                      <li><a href="{{url('admin/about_myths')}}">About Myths</a></li>
                                      <li><a href="{{url('admin/about_cta')}}">About CTA section</a></li>
                                   </ul>
                                </li>
                                
                                 <li><a href="#"><i class="fas fa-venus"></i><span>Menopause</span> <i class="fa-solid fa-chevron-down"></i></a>
                                   <ul class="drp-menu">
                                        <li><a href="#"><i class="fas fa-thermometer-half"></i><span>Symptoms & Complications</span> <i class="fa-solid fa-chevron-down"></i></a>
                                           <ul class="drp-menu">
                                              <li><a href="{{url('admin/symptoms_details_banner')}}">Symptoms Detail Banner</a></li>
                                              <li><a href="{{url('admin/symptoms_heading')}}">Symptoms Heading</a></li>
                                              <li><a href="{{url('admin/symptoms_type')}}">Symptoms Type</a></li>
                                              <li><a href="#"><i class="fas fa-heartbeat"></i><span>Effects</span> <i class="fa-solid fa-chevron-down"></i></a>
                                                <ul class="drp-menu">
                                              <li><a href="{{url('admin/menopause_effect')}}">Menopause Effect</a></li>
                                              <li><a href="{{url('admin/heart_effect')}}">Heart Effect</a></li>
                                              <li><a href="{{url('admin/bone_effect')}}">Bone Effect</a></li>
                                                </ul>
                                          </ul>
                                        </li>
                                        
                                        <li><a href="#"><i class="fas fa-notes-medical"></i><span>Management</span> <i class="fa-solid fa-chevron-down"></i></a>
                                                <ul class="drp-menu">
                                                        <li><a href="{{url('admin/management_banner')}}">Manage Symptoms Banner</a></li>
                                                        <li><a href="{{url('admin/symptoms_management_heading')}}">Symptoms Management Heading</a></li>
                                                        <li><a href="{{url('admin/lifestyle_changes')}}">Lifestyle Changes</a></li>
                                                        <li><a href="{{url('admin/manage_symptoms')}}">Manage Symptoms</a></li>
                                                        <li><a href="#"><i class="fas fa-band-aid"></i><span>Therapies</span> <i class="fa-solid fa-chevron-down"></i></a>
                                                             <ul class="drp-menu">
                                                                        <li><a href="{{url('admin/therapies')}}">Therapies Heading</a></li>
                                                                        <li><a href="{{url('admin/alternative_therapies')}}">Alternative Therapies</a></li>
                                                                        <li><a href="{{url('admin/complementry_therapies')}}">Complimentary Therapies</a></li>
                                                            </ul>
                                                        <li><a href="#"><i class="fas fa-stethoscope"></i><span>Treatment</span> <i class="fa-solid fa-chevron-down"></i></a>
                                                            <ul class="drp-menu">
                                                                           <li><a href="{{url('admin/treatment_heading')}}">Treatment Heading</a></li>
                                                                          <li><a href="{{url('admin/hormone_treatment')}}">Hormone Treatment</a></li>
                                                                          <li><a href="{{url('admin/low_dose_treatment')}}">Low Dose Treatment</a></li>
                                                                          <li><a href="{{url('admin/vaginal_treatment')}}">Vaginal Treatment</a></li>
                                                                          <li><a href="{{url('admin/prescription_treatment')}}">Prescription Treatment</a></li>
                                                            </ul>
                                                
                                                </ul>
                                        </li>
                                  
                                        <li><a href="#"><i class="fas fa-question-circle"></i><span>Essential Check Ups</span> <i class="fa-solid fa-chevron-down"></i></a>
                                           <ul class="drp-menu">
                                                <li><a href="{{url('admin/essential_checkup_banner')}}">Essential Checkup Banner</a></li>
                                              <li><a href="{{url('admin/essential_about')}}">Essential About</a></li>
                                              <li><a href="{{url('admin/essential_test')}}">Essential Test</a></li>
                                              <li><a href="{{url('admin/essential_info')}}">Essential Info</a></li>
                                              <li><a href="{{url('admin/essential_cta_description')}}">Essential CTA Description</a></li>
                                           </ul>
                                        </li>
                                          
                                        <li><a href="#"><i class="fas fa-phone"></i><span>Healthy Sexuality & Intimacy</span> <i class="fa-solid fa-chevron-down"></i></a>
                                           <ul class="drp-menu">
                                               <li><a href="{{url('admin/healthy_sexuality_intimacy_banner')}}">Intimacy Banner</a></li>
                                              <li><a href="{{url('admin/healthy_intimacy_about')}}">Intimacy About</a></li>
                                              <li><a href="{{url('admin/healthy_intimacy_factors')}}">Factors</a></li>
                                              <li><a href="{{url('admin/healthy_intimacy_hormonal')}}">Hormonal</a></li>
                                              <li><a href="{{url('admin/monohealth')}}">Monohealth</a></li>
                                              <li><a href="{{url('admin/negative_changes_heading')}}">Negative Changes Heading</a></li>
                                              <li><a href="{{url('admin/understand_changes')}}">Understand Changes</a></li>
                                              <li><a href="{{url('admin/keeping_alive')}}">Keeping Alive</a></li>
                                              <li><a href="{{url('admin/interesting_facts')}}">Interesting Facts</a></li>
                                              <li><a href="{{url('admin/menopause_relationship')}}">Menopause and Relationship</a></li>
                                          
                                           </ul>
                                        </li>
                                         <li><a href="#"><i class="fas fa-briefcase"></i><span>Managing Menopause at Work</span> <i class="fa-solid fa-chevron-down"></i></a>
                                               <ul class="drp-menu">
                                                  <li><a href="{{url('admin/working_women_banner')}}">Working Women Banner</a></li>
                                                  <li><a href="{{url('admin/working_women')}}">Working Women</a></li>
                                               </ul>
                                        </li>
                                        <li><a href="#"><i class="fas fa-exclamation-circle"></i> <span>Menopause Myths</span> <i class="fa-solid fa-chevron-down"></i></a>
                                               <ul class="drp-menu">
                                                <li><a href="{{url('admin/menopause_myths_banner')}}">Myths Banner</a></li>
                                                  <li><a href="{{url('admin/myths')}}">Myths</a></li>
                                               </ul>
                                        </li>
                                
                                           </ul>
                                        </li>
                                        
                                        
                                        
                                         <li><a href="#"><i class="fas fa-question-circle"></i><span>Resource Library</span> <i class="fa-solid fa-chevron-down"></i></a>
                                           <ul class="drp-menu">
                                               <li><a href="#"><i class="fas fa-book"></i><span>Inspiring Stories</span> <i class="fa-solid fa-chevron-down"></i></a>
                                                       <ul class="drp-menu">
                                                          <li><a href="{{url('admin/patient_stories_banner')}}">Patient Stories Banner</a></li>
                                                          <li><a href="{{url('admin/testimonial')}}">Inspiring Stories</a></li>
                                        
                                                       </ul>
                                                </li>
                                                <li><a href="#"><i class="fas fa-info-circle"></i><span>Glossary & FAQ</span> <i class="fa-solid fa-chevron-down"></i></a>
                                                       <ul class="drp-menu">
                                                          <li><a href="{{url('admin/glossary_faq_banner')}}">Glossary & FAQ Banner</a></li>
                                                          <li><a href="{{url('admin/glossary_title')}}">Glossary & FAQ Title</a></li>
                                                          <li><a href="{{url('admin/glossary_faq')}}">Glossary & FAQ</a></li>
                                                       </ul>
                                                </li>
                                                  <li><a href="#"><i class="fas fa-blog"></i> <span>Blog</span> <i class="fa-solid fa-chevron-down"></i></a>
                                                       <ul class="drp-menu">
                                                            <li><a href="{{url('admin/blog_banner')}}">Blog Banner</a></li>
                                                          <li><a href="{{url('admin/blog')}}">Blog List</a></li>
                                                       </ul>
                                                  </li>
                                                  
                                                  <li><a href="#"><i class="fas fa-photo-video"></i> <span>Media</span> <i class="fa-solid fa-chevron-down"></i></a>
                                                       <ul class="drp-menu">
                                                            <li><a href="{{url('admin/media_banner')}}">Media Banner</a></li>
                                                          <li><a href="{{url('admin/media')}}">Media</a></li>
                                                       </ul>
                                                  </li>
                             
                            
                                           </ul>
                                        </li>
                                        
                                         <li><a href="#"><i class="fas fa-calendar"></i> <span>Events</span> <i class="fa-solid fa-chevron-down"></i></a>
                                           <ul class="drp-menu">
                                            <li><a href="{{url('admin/events_banner')}}">Events Banner</a></li>
                                              <li><a href="{{url('admin/interactive_sessions')}}">Events</a></li>
                                           </ul>
                                        </li>
                                        
                                        
                                         <li><a href="#"><i class="fas fa-question-circle"></i><span>Empowering Communities</span> <i class="fa-solid fa-chevron-down"></i></a>
                                           <ul class="drp-menu">
                                              <li><a href="{{url('admin/empowering_communities_banner')}}">Empowering Communities Banner</a></li>
                                              <li><a href="{{url('admin/health_sanitation')}}">Health and Sanitation</a></li>
                                              <li><a href="{{url('admin/menstrual_hygiene')}}">Menstrual Hygiene</a></li>
                                              <li><a href="{{url('admin/latest_work')}}">Latest Work</a></li>
                            
                                           </ul>
                                        </li>
                                        
                                         <li><a href="#"><i class="fas fa-user-tie"></i><span>Find An Expert</span> <i class="fa-solid fa-chevron-down"></i></a>
                                           <ul class="drp-menu">
                                              <li><a href="{{url('admin/find_expert_banner')}}">Find Expert Banner</a></li>
                                              <li><a href="{{url('admin/expert')}}">Expert</a></li>
                                              <li><a href="{{url('admin/expertise')}}">Expertise</a></li>
                                              <li><a href="{{url('admin/expert_faq')}}">Expert FAQ</a></li>
                            
                                           </ul>
                                        </li>
                            
                                         <li><a href="#"><i class="fas fa-phone"></i><span>Contact Us</span> <i class="fa-solid fa-chevron-down"></i></a>
                                           <ul class="drp-menu">
                                              <li><a href="{{url('admin/contact_banner')}}">Contact Banner</a></li>
                                            <li><a href="{{url('admin/contact_us_description')}}">Contact Us Description</a></li>
                                              <li><a href="{{url('admin/contact_us_info')}}">Contact Us Info</a></li>
                            
                                           </ul>
                                        </li>
                                      
                                        <li><a href="#"><i class="fas fa-table"></i><span>Header-Footer</span> <i class="fa-solid fa-chevron-down"></i></a>
                                           <ul class="drp-menu">
                                              <li><a href="{{url('/admin/cta_description')}}">CTA Description</a></li>
                                              <li><a href="{{url('/admin/footer_description')}}">Footer Description</a></li>
                                              <li><a href="{{url('/admin/social_sticky')}}">Social Links</a></li>
                                           </ul>
                                        </li>
            
                           </ul>                
                        </div>
                     </div>
                     <button class="openbtn" onclick="openNav()"><i class="fas fa-bars"></i></button> 
                  </div>
                      </div>
                   </div>
              </div>
          </div>
        </div>
   </section>
   <section class="page-content">
      <div class="search-and-user">
         <div class="row">
            <div class="col-lg-6 col-md-6 col-6">
                  <ul class="admin-menu">
                    <li>
                       <div class="switch">
                         <label for="mode">
                         </label>
                       </div>
                       <button class="collapse-btn" aria-expanded="true" aria-label="collapse menu">
                         <i class="fas fa-bars"></i>
                         <span>Collapse</span>
                       </button>
                    </li>
                 </ul>
            </div>
            <div class="col-lg-6 col-md-6 col-6">
                 <div class="admin-profile">
                     <div class="login">
                       <div class="dropdown1">
                         <button id="myBtn1">
                           <span class="greeting">My Account</span>
                           <i class="dropbtn1 fas fa-user"></i>
                        </button>
                           <div id="myDropdown1" class="dropdown-content1">
                             <a href="{{url('admin/edit_profile')}}">Edit Profile</a>
                             <a href="{{url('admin/changepassword')}}">Change Password</a>
                            <a href="{{url('admin/logout')}}"><i class="fas fa-lock"></i>Logout</a>
                           </div>
                       </div>
                     </div>
                 </div>
            </div>
         </div>
      </div>
      <div>

             @if ($message = Session::get('error'))
            <div  id="hideDiv" class="alert alert-success alert-block" >
                <!--     <input type="text" class="close" data-dismiss="alert"></input> -->
                <strong style="padding-top : 5px !important; display: inline-block;">{{ $message }}</strong>
             </div>
           @endif
         @yield('content')
      </div>



   </section>



    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

   <script type="text/javascript">

    $(function() {
                 setTimeout(function() { $("#hideDiv").fadeOut(3000); }, 3000)

             });


      $('.main-menu>ul>li>a, .main-menu ul.drp-menu>li>a').on('click', function(e) {
      var element = $(this).parent('li');
      if (element.hasClass('open')) {
        element.removeClass('open');
        element.find('li').removeClass('open');
        element.find('ul').slideUp(500,"swing");
      }
      else {
        element.addClass('open');
        element.children('ul').slideDown(800,"swing");
        element.siblings('li').children('ul').slideUp(800,"swing");
        element.siblings('li').removeClass('open');
        element.siblings('li').find('li').removeClass('open');
        element.siblings('li').find('ul').slideUp(1000,"swing");
      }
      });

        $('.dropdown1').click(function(){
        $('.dropdown-content1').toggle();
        });

      function openNav() {
            document.getElementById("mySidepanel").style.width = "100%";
        }
        function closeNav() {
            document.getElementById("mySidepanel").style.width = "0";
        }

    </script>
   <script type="text/javascript">
      const html = document.documentElement;
      const body = document.body;
      const menuLinks = document.querySelectorAll(".admin-menu a");
      const collapseBtn = document.querySelector(".admin-menu .collapse-btn");
      const toggleMobileMenu = document.querySelector(".toggle-mob-menu");
      const switchInput = document.querySelector(".switch input");
      const switchLabel = document.querySelector(".switch label");
      const switchLabelText = switchLabel.querySelector("span:last-child");
      const collapsedClass = "collapsed";
      const lightModeClass = "light-mode";

      collapseBtn.addEventListener("click", function () {
        body.classList.toggle(collapsedClass);
        this.getAttribute("aria-expanded") == "true"
          ? this.setAttribute("aria-expanded", "false")
          : this.setAttribute("aria-expanded", "true");
        this.getAttribute("aria-label") == "collapse menu"
          ? this.setAttribute("aria-label", "expand menu")
          : this.setAttribute("aria-label", "collapse menu");
      });

      toggleMobileMenu.addEventListener("click", function () {
        body.classList.toggle("mob-menu-opened");
        this.getAttribute("aria-expanded") == "true"
          ? this.setAttribute("aria-expanded", "false")
          : this.setAttribute("aria-expanded", "true");
        this.getAttribute("aria-label") == "open menu"
          ? this.setAttribute("aria-label", "close menu")
          : this.setAttribute("aria-label", "open menu");
      });

      for (const link of menuLinks) {
        link.addEventListener("mouseenter", function () {
          if (
            body.classList.contains(collapsedClass) &&
            window.matchMedia("(min-width: 768px)").matches
          ) {
            const tooltip = this.querySelector("span").textContent;
            this.setAttribute("title", tooltip);
          } else {
            this.removeAttribute("title");
          }
        });
      }

      if (localStorage.getItem("dark-mode") === "false") {
        html.classList.add(lightModeClass);
        switchInput.checked = false;
        switchLabelText.textContent = "Light";
      }

      switchInput.addEventListener("input", function () {
        html.classList.toggle(lightModeClass);
        if (html.classList.contains(lightModeClass)) {
          switchLabelText.textContent = "Light";
          localStorage.setItem("dark-mode", "false");
        } else {
          switchLabelText.textContent = "Dark";
          localStorage.setItem("dark-mode", "true");
        }
      });
    </script>
    
    
</body>
</html>

 
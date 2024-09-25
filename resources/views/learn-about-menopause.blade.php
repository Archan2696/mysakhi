@extends('layout.header_footer')

@section('content')
    <link rel="stylesheet" type="text/css" href="/css/menopause.css">

<style type="text/css">

/*------  Our Mission CSS  ------*/
.bg-mission-section{
    padding: 60px 0px 90px;
    background-color: rgb(242 143 137 / 10%);
}
.mission-image{
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 25px;
}
.mission-image .mission-first {
    margin-top: 25px;
    margin-bottom: -25px;
}
.mission-image img{
    border-radius: 10px;
}
.mission-info{
    margin-left: 20px;
    border-bottom: 2px dashed #000;
}
.mission-info:last-child{
    border-bottom: none;
}
.mission-inner-info{
    display: flex;
    align-items: center;
}
.mission-content{
    margin-left: 30px;
}
.mission-content p{margin-bottom: 0 !important;}
.education-icon{width: 100px}

.symptoms-card {
        display: none;
    }
    .symptoms-que {
        display: block;
    }
/*.medical-history {*/
/*    display: none;*/
/*}*/

/*.lifestyle {*/
/*    display: none;*/
/*}*/
.symptoms-arrow {
    display: none;
}

.symptoms-next-prev {
    display: flex;
    gap: 20px;
    align-items: center;
}


.error-msg{
    color: red;
    font-size: 18px;
    display:none;
}
</style>


    <!--<div class="inner-banner">-->
    <!--    <div class="container">-->
    <!--        <div class="row">-->
    <!--            <div class="col-lg-12">-->
    <!--                <div class="inner-banner-title">-->
    <!--                    <h2>Learn about menopause</h2>-->
    <!--                </div>-->
    <!--                <div class="breadcrumb">-->
    <!--                    <a href="#" class="me-2 home">Home</a>-->
    <!--                    <i class="fa-solid fa-angles-right"></i>-->
    <!--                    <a class="ms-2">Learn about menopause</a>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->

    @foreach($about_banner as $ab)
    <div class="aboutus-guide-section" style="background-image: url(/uploads/{{$ab->image}});">
        <div class="container">
            <div class="row">
                <div class="col-lg-10">
                    <div class="guide-content">
                       
                       
                       
                        <div class="guide-title">
                            <p>{!!$ab->title1!!}</p>
                        </div>
                        <ul class="guide-item">
                            <li>
                                <span>{!!$ab->title2!!}</span>
                            </li>
                        </ul>
                        <div class="guide-top">
                            <p>
                                {!!$ab->title3!!}
                            </p>
                        </div>
                       
                    </div>
                  
                </div>
                
            </div>
        </div>
    </div>
  @endforeach
    
    
    <div class="phase-qa-section">
        @foreach($about_meno_phases_description as $ad)
         <div class="container">
             <div class="section-heading">
                <h2>{{$ad->title}}</h2>
            </div>
            <div class="row">
                <div class="col-lg-4">
                 
                    <div class="phase-steps">
                        @foreach($about_meno_phases as $key=>$amp)
                        @if($key+1 == 1)
                        <div class="phase-item phase-item1">
                        @else
                        <div class="phase-item">
                        @endif
                            <div class="phase-item-number">
                                0{{$key+1}}
                            </div>
                            <div class="phase-item-icon">
                                <span class="phase-item-icon">
                                    <img src="/uploads/{{$amp->image}}" alt="">
                                </span>
                            </div>
                            <h4 class="phase-item-title">
                                {{$amp->name}}
                            </h4>
                        </div>
                        @endforeach
                    </div>
                    
                </div>
                <div class="col-lg-8">
                    <div class="phase-qa-inner">
                        <div class="main-phase">
                            <div class="phase-q">
                                <span>{{$ad->sub_title}}</span>
                            </div>
                            <div class="phase-form">
                            <form action="">
                                @foreach($about_phase_qa as $aq)
                                <div class="pahse-input">
                                    <label class="pahse-qa-box">
                                        <div class="check">
                                            <input type="radio" id="{{$ad->id}}" name="menopause_phase">
                                            <div class="checkmark"></div>
                                        </div>
                                        <span class="phase-title">{{$aq->question}}</span>
                                        <div class="qs-box">
                                            <span>{{$aq->answer}}</span>
                                        </div>
                                    </label>
                                    
                                </div>
                                @endforeach
                            
                            </form>
                            <div class="phase-button">
                                <button class="button">
                                    <a href="#">find out more</a>
                                </button>
                            </div>
                        </div>
                            
                        </div>
                    </div>
                </div>
            </div>
             
        </div>
    </div>
    @endforeach

    

    <div class="symptoms-section">
        <div class="container">
            <div class="section-heading">
                <h5>Check your Signs & Symptoms </h5>
                <h2>
                   Prepare for your menopause consultation
                </h2>
            </div>
            
             <div class="symptoms-form">
                <form method="post" id="pdf_form" action="{{url('/send_menopause_data')}}" >

                    {{ csrf_field() }}
                    <div id="symptoms-accordion">
                       
                         <div  class="symptoms-card" id="section1">
                              <div class="symptoms-inner-box">
                                <div class="symptoms-title">
                                    <span>Q. Do you have periods? </span>
                                </div>
                                <div class="mysakhi-radio">
                                 
                                    <label class="filter-label">
                                        <input type="radio" id="p1" name="radio_group" value="YES, I have regular periods">
                                        <div class="checkmark"></div>
                                        <span>YES, I have regular periods</span>
                                    </label>
                                </div>
                                <div class="mysakhi-radio">
                                    
                                    <label class="filter-label">
                                        <input type="radio" id="p1" name="radio_group" value="YES, But my periods have become more irregular">
                                        <div class="checkmark"></div>
                                        <span>YES, But my periods have become more irregular</span>
                                    </label>
                                </div>
                                <div class="mysakhi-radio">
                                    
                                    <label class="filter-label">
                                        <input type="radio" id="p1" name="radio_group" value="NO, My periods stopped within the last 12 months">
                                        <div class="checkmark"></div>
                                        <span>NO, My periods stopped within the last 12 months</span>
                                    </label>
                                </div>
                                <div class="mysakhi-radio">
                                    
                                    <label class="filter-label">
                                        <input type="radio" id="p1" name="radio_group" value="NO, My periods stopped more than 12 months ago">
                                        <div class="checkmark"></div>
                                        <span>NO, My periods stopped more than 12 months ago</span>
                                    </label>
                                </div>
                                <div class="mysakhi-radio">
                                    
                                    <label class="filter-label">
                                        <input type="radio" id="p1" name="radio_group" value="NO, I have had my womb (uterus) removed (hysterectomy)">
                                        <div class="checkmark"></div>
                                        <span>NO, I have had my womb (uterus) removed (hysterectomy)</span>
                                    </label>
                                </div>
                                </div>
                                <div id="error_message" style="color: red;"></div>
                         </div>
                         <div class="symptoms-card" id="section2">
                             <div class="symptoms-checklist">
                                    <div class="symptoms-title">
                                        <span>Q. Do you have any of the following symptoms?</span>
                                    </div>
                                    <div class="symptoms-right-title">
                                        <ul>
                                            <li>
                                                <span>not at all</span>
                                            </li>
                                            <li>
                                                <span>regularly</span>
                                            </li>
                                            <li>
                                                <span>intensely</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="symptoms-checklist-item">
                                        <div class="symptoms-checklist-title">
                                            <span>HOT FLUSHES </span>
                                        </div>
                                        <div class="symptoms-checklist-info">
                                            <div class="symptoms-checklist-box">
                                                <label class="filter-label">
                                                    <input type="radio" id="s1" name="hot_flushes" value="Not at all">
                                                    <div class="checkmark"></div>
                                                </label>
                                            </div>
                                            <div class="symptoms-checklist-box">
                                                <label class="filter-label">
                                                    <input type="radio" id="s1" name="hot_flushes" value="Regularly">
                                                    <div class="checkmark"></div>
                                                </label>
                                            </div>
                                            <div class="symptoms-checklist-box">
                                                <label class="filter-label">
                                                    <input type="radio" id="s1" name="hot_flushes" value="Intensely">
                                                    <div class="checkmark"></div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="symptoms-checklist-item">
                                        <div class="symptoms-checklist-title">
                                            <span>NIGHT SWEATS</span>
                                        </div>
                                        <div class="symptoms-checklist-info">
                                            <div class="symptoms-checklist-box">
                                                <label class="filter-label">
                                                    <input type="radio" id="s2" name="night_sweats" value="Not at all" >
                                                    <div class="checkmark"></div>
                                                </label>
                                            </div>
                                            <div class="symptoms-checklist-box">
                                                <label class="filter-label">
                                                    <input type="radio" id="s2" name="night_sweats" value="Regularly">
                                                    <div class="checkmark"></div>
                                                </label>
                                            </div>
                                            <div class="symptoms-checklist-box">
                                                <label class="filter-label">
                                                    <input type="radio" id="s2" name="night_sweats" value="Intensely">
                                                    <div class="checkmark"></div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                     <div class="symptoms-checklist-item">
                                        <div class="symptoms-checklist-title">
                                            <span>DIFFICULTY SLEEPING</span>
                                        </div>
                                        <div class="symptoms-checklist-info">
                                            <div class="symptoms-checklist-box">
                                                <label class="filter-label">
                                                    <input type="radio" id="s3" name="difficulty_sleeping" value="Not at all">
                                                    <div class="checkmark"></div>
                                                </label>
                                            </div>
                                            <div class="symptoms-checklist-box">
                                                <label class="filter-label">
                                                    <input type="radio" id="s3" name="difficulty_sleeping" value="Regularly">
                                                    <div class="checkmark"></div>
                                                </label>
                                            </div>
                                            <div class="symptoms-checklist-box">
                                                <label class="filter-label">
                                                    <input type="radio" id="s3" name="difficulty_sleeping" value="Intensely">
                                                    <div class="checkmark"></div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                     <div class="symptoms-checklist-item">
                                        <div class="symptoms-checklist-title">
                                            <span>MOOD CHANGES</span>
                                        </div>
                                        <div class="symptoms-checklist-info">
                                            <div class="symptoms-checklist-box">
                                                <label class="filter-label">
                                                    <input type="radio" id="s4" name="mood_changes" value="Not at all">
                                                    <div class="checkmark"></div>
                                                </label>
                                            </div>
                                            <div class="symptoms-checklist-box">
                                                <label class="filter-label">
                                                    <input type="radio" id="s4" name="mood_changes" value="Regularly">
                                                    <div class="checkmark"></div>
                                                </label>
                                            </div>
                                            <div class="symptoms-checklist-box">
                                                <label class="filter-label">
                                                    <input type="radio" id="s4" name="mood_changes" value="Intensely">
                                                    <div class="checkmark"></div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                     <div class="symptoms-checklist-item">
                                        <div class="symptoms-checklist-title">
                                            <span>LOW ENERGY</span>
                                        </div>
                                        <div class="symptoms-checklist-info">
                                            <div class="symptoms-checklist-box">
                                                <label class="filter-label">
                                                    <input type="radio" id="s5" name="low_energy" value="Not at all">
                                                    <div class="checkmark"></div>
                                                </label>
                                            </div>
                                            <div class="symptoms-checklist-box">
                                                <label class="filter-label">
                                                    <input type="radio" id="s5" name="low_energy" value="Regularly">
                                                    <div class="checkmark"></div>
                                                </label>
                                            </div>
                                            <div class="symptoms-checklist-box">
                                                <label class="filter-label">
                                                    <input type="radio" id="s5" name="low_energy" value="Intensely">
                                                    <div class="checkmark"></div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                     <div class="symptoms-checklist-item">
                                        <div class="symptoms-checklist-title">
                                            <span>BRAIN FOG</span>
                                        </div>
                                        <div class="symptoms-checklist-info">
                                            <div class="symptoms-checklist-box">
                                                <label class="filter-label">
                                                    <input type="radio" id="s6" name="brain_fog" value="Not at all">
                                                    <div class="checkmark"></div>
                                                </label>
                                            </div>
                                            <div class="symptoms-checklist-box">
                                                <label class="filter-label">
                                                    <input type="radio" id="s6" name="brain_fog" value="Regularly">
                                                    <div class="checkmark"></div>
                                                </label>
                                            </div>
                                            <div class="symptoms-checklist-box">
                                                <label class="filter-label">
                                                    <input type="radio" id="s6" name="brain_fog" value="Intensely">
                                                    <div class="checkmark"></div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                     <div class="symptoms-checklist-item">
                                        <div class="symptoms-checklist-title">
                                            <span>HEART PALPITATIONS</span>
                                        </div>
                                        <div class="symptoms-checklist-info">
                                            <div class="symptoms-checklist-box">
                                                <label class="filter-label">
                                                    <input type="radio" id="s7" name="heart_palpitations" value="Not at all">
                                                    <div class="checkmark"></div>
                                                </label>
                                            </div>
                                            <div class="symptoms-checklist-box">
                                                <label class="filter-label">
                                                    <input type="radio" id="s7" name="heart_palpitations" value="Regularly">
                                                    <div class="checkmark"></div>
                                                </label>
                                            </div>
                                            <div class="symptoms-checklist-box">
                                                <label class="filter-label">
                                                    <input type="radio" id="s7" name="heart_palpitations" value="Intensely">
                                                    <div class="checkmark"></div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                     <div class="symptoms-checklist-item">
                                        <div class="symptoms-checklist-title">
                                            <span>JOINT/MUSCLE ACHE</span>
                                        </div>
                                        <div class="symptoms-checklist-info">
                                            <div class="symptoms-checklist-box">
                                                <label class="filter-label">
                                                    <input type="radio" id="s8" name="muscle_ache" value="Not at all">
                                                    <div class="checkmark"></div>
                                                </label>
                                            </div>
                                            <div class="symptoms-checklist-box">
                                                <label class="filter-label">
                                                    <input type="radio" id="s8" name="muscle_ache" value="Regularly">
                                                    <div class="checkmark"></div>
                                                </label>
                                            </div>
                                            <div class="symptoms-checklist-box">
                                                <label class="filter-label">
                                                    <input type="radio" id="s8" name="muscle_ache" value="Intensely">
                                                    <div class="checkmark"></div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                       <div class="symptoms-checklist-item">
                                        <div class="symptoms-checklist-title">
                                            <span>HEADACHES &/OR MIGRAINES</span>
                                        </div>
                                        <div class="symptoms-checklist-info">
                                            <div class="symptoms-checklist-box">
                                                <label class="filter-label">
                                                    <input type="radio" id="s9" name="headaches" value="Not at all">
                                                    <div class="checkmark"></div>
                                                </label>
                                            </div>
                                            <div class="symptoms-checklist-box">
                                                <label class="filter-label">
                                                    <input type="radio" id="s9" name="headaches" value="Regularly">
                                                    <div class="checkmark"></div>
                                                </label>
                                            </div>
                                            <div class="symptoms-checklist-box">
                                                <label class="filter-label">
                                                    <input type="radio" id="s9" name="headaches" value="Intensely">
                                                    <div class="checkmark"></div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                     <div class="symptoms-checklist-item">
                                        <div class="symptoms-checklist-title">
                                            <span>INCREASED URINATION FREQUENCY</span>
                                        </div>
                                        <div class="symptoms-checklist-info">
                                            <div class="symptoms-checklist-box">
                                                <label class="filter-label">
                                                    <input type="radio" id="s10" name="unination_frequency" value="Not at all">
                                                    <div class="checkmark"></div>
                                                </label>
                                            </div>
                                            <div class="symptoms-checklist-box">
                                                <label class="filter-label">
                                                    <input type="radio" id="s10" name="unination_frequency" value="Regularly">
                                                    <div class="checkmark"></div>
                                                </label>
                                            </div>
                                            <div class="symptoms-checklist-box">
                                                <label class="filter-label">
                                                    <input type="radio" id="s10" name="unination_frequency" value="Intensely">
                                                    <div class="checkmark"></div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="symptoms-checklist-item">
                                        <div class="symptoms-checklist-title">
                                            <span>VAGINAL DRYNESS</span>
                                        </div>
                                        <div class="symptoms-checklist-info">
                                            <div class="symptoms-checklist-box">
                                                <label class="filter-label">
                                                    <input type="radio" id="s11" name="vaginal_dryness" value="Not at all">
                                                    <div class="checkmark"></div>
                                                </label>
                                            </div>
                                            <div class="symptoms-checklist-box">
                                                <label class="filter-label">
                                                    <input type="radio" id="s11" name="vaginal_dryness" value="Regularly">
                                                    <div class="checkmark"></div>
                                                </label>
                                            </div>
                                            <div class="symptoms-checklist-box">
                                                <label class="filter-label">
                                                    <input type="radio" id="s11" name="vaginal_dryness" value="Intensely">
                                                    <div class="checkmark"></div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                     <div class="symptoms-checklist-item">
                                        <div class="symptoms-checklist-title">
                                            <span>LOSS OF SEX DRIVE </span>
                                        </div>
                                        <div class="symptoms-checklist-info">
                                            <div class="symptoms-checklist-box">
                                                <label class="filter-label">
                                                    <input type="radio" id="s12" name="sex_drive" value="Not at all">
                                                    <div class="checkmark"></div>
                                                </label>
                                            </div>
                                            <div class="symptoms-checklist-box">
                                                <label class="filter-label">
                                                    <input type="radio" id="s12" name="sex_drive" value="Regularly">
                                                    <div class="checkmark"></div>
                                                </label>
                                            </div>
                                            <div class="symptoms-checklist-box">
                                                <label class="filter-label">
                                                    <input type="radio" id="s12" name="sex_drive" value="Intensely">
                                                    <div class="checkmark"></div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                     <div class="symptoms-checklist-item">
                                        <div class="symptoms-checklist-title">
                                            <span>PAINFUL INTERCOURSE </span>
                                        </div>
                                        <div class="symptoms-checklist-info">
                                            <div class="symptoms-checklist-box">
                                                <label class="filter-label">
                                                    <input type="radio" id="s13" name="painful_intercourse" value="Not at all">
                                                    <div class="checkmark"></div>
                                                </label>
                                            </div>
                                            <div class="symptoms-checklist-box">
                                                <label class="filter-label">
                                                    <input type="radio" id="s13" name="painful_intercourse" value="Regularly">
                                                    <div class="checkmark"></div>
                                                </label>
                                            </div>
                                            <div class="symptoms-checklist-box">
                                                <label class="filter-label">
                                                    <input type="radio" id="s13" name="painful_intercourse" value="Intensely">
                                                    <div class="checkmark"></div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="symptoms-checklist-item">
                                        <div class="symptoms-checklist-title">
                                            <span>HAIR CHANGES </span>
                                        </div>
                                        <div class="symptoms-checklist-info">
                                            <div class="symptoms-checklist-box">
                                                <label class="filter-label">
                                                    <input type="radio" id="s14" name="hair_changes" value="Not at all">
                                                    <div class="checkmark"></div>
                                                </label>
                                            </div>
                                            <div class="symptoms-checklist-box">
                                                <label class="filter-label">
                                                    <input type="radio" id="s14" name="hair_changes" value="Regularly">
                                                    <div class="checkmark"></div>
                                                </label>
                                            </div>
                                            <div class="symptoms-checklist-box">
                                                <label class="filter-label">
                                                    <input type="radio" id="s14" name="hair_changes" value="Intensely">
                                                    <div class="checkmark"></div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="symptoms-checklist-item">
                                        <div class="symptoms-checklist-title">
                                            <span>SKIN CHANGES </span>
                                        </div>
                                        <div class="symptoms-checklist-info">
                                            <div class="symptoms-checklist-box">
                                                <label class="filter-label">
                                                    <input type="radio" id="s15" name="skin_changes" value="Not at all">
                                                    <div class="checkmark"></div>
                                                </label>
                                            </div>
                                            <div class="symptoms-checklist-box">
                                                <label class="filter-label">
                                                    <input type="radio" id="s15" name="skin_changes" value="Regularly">
                                                    <div class="checkmark"></div>
                                                </label>
                                            </div>
                                            <div class="symptoms-checklist-box">
                                                <label class="filter-label">
                                                    <input type="radio" id="s15" name="skin_changes" value="Intensely">
                                                    <div class="checkmark"></div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="symptoms-checklist-item">
                                        <div class="symptoms-checklist-title">
                                            <span>WAIST CIRCUMFERENCE </span>
                                        </div>
                                        <div class="symptoms-checklist-info">
                                            <div class="symptoms-checklist-box">
                                                <label class="filter-label">
                                                    <input type="radio" id="s16" name="waist_circumference" value="Not at all">
                                                    <div class="checkmark"></div>
                                                </label>
                                            </div>
                                            <div class="symptoms-checklist-box">
                                                <label class="filter-label">
                                                    <input type="radio" id="s16" name="waist_circumference" value="Regularly">
                                                    <div class="checkmark"></div>
                                                </label>
                                            </div>
                                            <div class="symptoms-checklist-box">
                                                <label class="filter-label">
                                                    <input type="radio" id="s16" name="waist_circumference" value="Intensely">
                                                    <div class="checkmark"></div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="symptoms-checklist-item">
                                        <div class="symptoms-checklist-title">
                                            <span>WEIGHT GAIN </span>
                                        </div>
                                        <div class="symptoms-checklist-info">
                                            <div class="symptoms-checklist-box">
                                                <label class="filter-label">
                                                    <input type="radio" id="s17" name="weight_gain" value="Not at all">
                                                    <div class="checkmark"></div>
                                                </label>
                                            </div>
                                            <div class="symptoms-checklist-box">
                                                <label class="filter-label">
                                                    <input type="radio" id="s17" name="weight_gain" value="Regularly">
                                                    <div class="checkmark"></div>
                                                </label>
                                            </div>
                                            <div class="symptoms-checklist-box">
                                                <label class="filter-label">
                                                    <input type="radio" id="s17" name="weight_gain" value="Intensely">
                                                    <div class="checkmark"></div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                         </div>
                         
                           <div class="symptoms-card medical-history" id="section3">
                                 <div class="symptoms-checklist">
                                       <div class="symptoms-title">
                                            <span>Q. Do you have any of the following symptoms?</span>
                                        </div>
                                    <div class="symptoms-right-title">
                                        <ul>
                                            <li>
                                                <span>yes</span>
                                            </li>
                                            <li>
                                                <span>no</span>
                                            </li>
                                            <li>
                                                <span>unsure</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="symptoms-checklist-item">
                                        <div class="symptoms-checklist-title">
                                            <span>Have you ever been diagnosed with breast cancer?</span>
                                        </div>
                                        <div class="symptoms-checklist-info">
                                            <div class="symptoms-checklist-box">
                                                <label class="filter-label">
                                                    <input type="radio" id="s1" name="symptoms1" value="YES">
                                                    <div class="checkmark"></div>
                                                    <!-- <span>yes</span> -->
                                                </label>
                                            </div>
                                            <div class="symptoms-checklist-box">
                                                <label class="filter-label">
                                                    <input type="radio" id="s1" name="symptoms1" value="NO">
                                                    <div class="checkmark"></div>
                                                </label>
                                            </div>
                                            <div class="symptoms-checklist-box">
                                                <label class="filter-label">
                                                    <input type="radio" id="s1" name="symptoms1" value="UNSURE">
                                                    <div class="checkmark"></div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="symptoms-checklist-item">
                                        <div class="symptoms-checklist-title">
                                            <span>Do you have a family history of breast cancer?</span>
                                        </div>
                                        <div class="symptoms-checklist-info">
                                            <div class="symptoms-checklist-box">
                                                <label class="filter-label">
                                                    <input type="radio" id="s2" name="symptoms2" value="YES">
                                                    <div class="checkmark"></div>
                                                </label>
                                            </div>
                                            <div class="symptoms-checklist-box">
                                                <label class="filter-label">
                                                    <input type="radio" id="s2" name="symptoms2" value="NO">
                                                    <div class="checkmark"></div>
                                                </label>
                                            </div>
                                            <div class="symptoms-checklist-box">
                                                <label class="filter-label">
                                                    <input type="radio" id="s2" name="symptoms2" value="UNSURE">
                                                    <div class="checkmark"></div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                     <div class="symptoms-checklist-item">
                                        <div class="symptoms-checklist-title">
                                            <span>Have you ever been told you’re at risk of/or diagnosed with blood clot forms in a
                                                vein (venous thromboembolism i.e., VTE)?</span>
                                        </div>
                                        <div class="symptoms-checklist-info">
                                            <div class="symptoms-checklist-box">
                                                <label class="filter-label">
                                                    <input type="radio" id="s3" name="symptoms3" value="YES">
                                                    <div class="checkmark"></div>
                                                </label>
                                            </div>
                                            <div class="symptoms-checklist-box">
                                                <label class="filter-label">
                                                    <input type="radio" id="s3" name="symptoms3" value="NO">
                                                    <div class="checkmark"></div>
                                                </label>
                                            </div>
                                            <div class="symptoms-checklist-box">
                                                <label class="filter-label">
                                                    <input type="radio" id="s3" name="symptoms3" value="UNSURE">
                                                    <div class="checkmark"></div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                     <div class="symptoms-checklist-item">
                                        <div class="symptoms-checklist-title">
                                            <span>Have you ever suffered a stroke?*</span>
                                        </div>
                                        <div class="symptoms-checklist-info">
                                            <div class="symptoms-checklist-box">
                                                <label class="filter-label">
                                                    <input type="radio" id="s4" name="symptoms4" value="YES">
                                                    <div class="checkmark"></div>
                                                </label>
                                            </div>
                                            <div class="symptoms-checklist-box">
                                                <label class="filter-label">
                                                    <input type="radio" id="s4" name="symptoms4" value="NO">
                                                    <div class="checkmark"></div>
                                                </label>
                                            </div>
                                            <div class="symptoms-checklist-box">
                                                <label class="filter-label">
                                                    <input type="radio" id="s4" name="symptoms4" value="UNSURE">
                                                    <div class="checkmark"></div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="symptoms-card" id="section4">
                                <div class="symptoms-inner-box">
                                <div class="symptoms-title">
                                    <span>Q. What is your age group?</span>
                                </div>
                                <div class="mysakhi-radio">
                                 
                                    <label class="filter-label">
                                        <input type="radio" id="p1" name="age_group" value="30 OR LESS">
                                        <div class="checkmark"></div>
                                        <span>30 OR LESS</span>
                                    </label>
                                </div>
                                <div class="mysakhi-radio">
                                    
                                    <label class="filter-label">
                                        <input type="radio" id="p1" name="age_group" value="31-35">
                                        <div class="checkmark"></div>
                                        <span>31-35</span>
                                    </label>
                                </div>
                                <div class="mysakhi-radio">
                                    
                                    <label class="filter-label">
                                        <input type="radio" id="p1" name="age_group" value="36-40">
                                        <div class="checkmark"></div>
                                        <span>36-40</span>
                                    </label>
                                </div>
                                <div class="mysakhi-radio">
                                    
                                    <label class="filter-label">
                                        <input type="radio" id="p1" name="age_group" value="41-45">
                                        <div class="checkmark"></div>
                                        <span>41-45</span>
                                    </label>
                                </div>
                                <div class="mysakhi-radio">
                                    
                                    <label class="filter-label">
                                        <input type="radio" id="p1" name="age_group" value="46-50">
                                        <div class="checkmark"></div>
                                        <span>46-50</span>
                                    </label>
                                </div>
                                <div class="mysakhi-radio">
                                    
                                    <label class="filter-label">
                                        <input type="radio" id="p1" name="age_group" value="51-55">
                                        <div class="checkmark"></div>
                                        <span>51-55</span>
                                    </label>
                                </div>
                                <div class="mysakhi-radio">
                                    
                                    <label class="filter-label">
                                        <input type="radio" id="p1" name="age_group" value="56-60">
                                        <div class="checkmark"></div>
                                        <span>56-60</span>
                                    </label>
                                </div>
                                <div class="mysakhi-radio">
                                    
                                    <label class="filter-label">
                                        <input type="radio" id="p1" name="age_group" value="61-65">
                                        <div class="checkmark"></div>
                                        <span>61-65</span>
                                    </label>
                                </div>
                                <div class="mysakhi-radio">
                                    
                                    <label class="filter-label">
                                        <input type="radio" id="p1" name="age_group" value="65+">
                                        <div class="checkmark"></div>
                                        <span>65+</span>
                                    </label>
                                </div>
                                </div>
                            </div>
                            <div class="symptoms-card lifestyle" id="section5">
                                 <div class="symptoms-checklist">
                                    <!-- <div class="symptoms-title">
                                        <span> Do you have any of the following symptoms?*</span>
                                    </div> -->
                                    <div class="symptoms-right-title">
                                        <ul>
                                            <li>
                                                <span>yes</span>
                                            </li>
                                            <li>
                                                <span>no</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="symptoms-checklist-item">
                                        <div class="symptoms-checklist-title">
                                            <span>Any of the symptoms mentioned above affecting your quality of life?
                                                e.g. impact on relationship with spouse, home life, work life</span>
                                        </div>
                                        <div class="symptoms-checklist-info">
                                            <div class="symptoms-checklist-box">
                                                <label class="filter-label">
                                                    <input type="radio" id="s1" name="affection1" value="YES">
                                                    <div class="checkmark"></div>
                                                </label>
                                            </div>
                                            <div class="symptoms-checklist-box">
                                                <label class="filter-label">
                                                    <input type="radio" id="s1" name="affection1" value="NO">
                                                    <div class="checkmark"></div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="symptoms-checklist-item">
                                        <div class="symptoms-checklist-title">
                                            <span>Do you smoke?</span>
                                        </div>
                                        <div class="symptoms-checklist-info">
                                            <div class="symptoms-checklist-box">
                                                <label class="filter-label">
                                                    <input type="radio" id="s2" name="affection2" value="YES">
                                                    <div class="checkmark"></div>
                                                </label>
                                            </div>
                                            <div class="symptoms-checklist-box">
                                                <label class="filter-label">
                                                    <input type="radio" id="s2" name="affection2" value="NO">
                                                    <div class="checkmark"></div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                     <div class="symptoms-checklist-item">
                                        <div class="symptoms-checklist-title">
                                            <span>Do you drink alcohol?</span>
                                        </div>
                                        <div class="symptoms-checklist-info">
                                            <div class="symptoms-checklist-box">
                                                <label class="filter-label">
                                                    <input type="radio" id="s3" name="affection3" value="YES">
                                                    <div class="checkmark"></div>
                                                </label>
                                            </div>
                                            <div class="symptoms-checklist-box">
                                                <label class="filter-label">
                                                    <input type="radio" id="s3" name="affection3" value="NO">
                                                    <div class="checkmark"></div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                     <div class="symptoms-checklist-item">
                                        <div class="symptoms-checklist-title">
                                            <span>Do you exercise regularly?</span>
                                        </div>
                                        <div class="symptoms-checklist-info">
                                            <div class="symptoms-checklist-box">
                                                <label class="filter-label">
                                                    <input type="radio" id="s4" name="affection4" value="YES">
                                                    <div class="checkmark"></div>
                                                </label>
                                            </div>
                                            <div class="symptoms-checklist-box">
                                                <label class="filter-label">
                                                    <input type="radio" id="s4" name="affection4" value="NO">
                                                    <div class="checkmark"></div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="symptoms-card" id="section6">
                                <div class="talkto-doc">
                                    <div class="symptoms-title">
                                        <span>
                                         <label for="likelihood"> Q. How likely are you to talk to your doctor about your symptoms within the next 12
                                            months? </label>
                                        </span>
                                    </div>
                                    <div class="talk-input">
                                        <input type="range" id="likelihood" name="likelihood" min="1" max="4" step="1" class="likelihood">
                                        <div id="likelihood-labels" class="likelihood-title">
                                            <span>VERY UNLIKELY</span>
                                            <span>UNLIKELY</span>
                                            <span>LIKELY</span>
                                            <span>VERY LIKELY</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="error-msg">
                                <p>This Field is required !!</p>
                            </div>
                         
                         <div class="symptoms-next-prev">
                            <div class="expert-button" >
                                <button class="button" id="prevBtn">
                                    <a href="javascript:void(0)">prev</a>
                                </button>
                            </div>
                            <div class="expert-button">
                                <button class="button"  id="nextBtn" >
                                    <a href="javascript:void(0)">next</a>
                                </button>
                            </div>
                        </div>
                        
                    </div>

                    <div class="symptoms-btn">
                        <div class="expert-button">
                            <button type="submit" class="button" disabled>
                                <a>download checklist</a>
                            </button>
                        </div>
                        <!--<div class="expert-button">-->
                        <!--    <button class="button">-->
                        <!--        <a href="#">print checklist</a>-->
                        <!--    </button>-->
                        <!--</div>-->
                        <!--<div class="expert-button">-->
                        <!--    <button class="button">-->
                        <!--        <a href="#">send checklist</a>-->
                        <!--    </button>-->
                        <!--</div>-->
                    </div>
                </form>
            </div>
            
        </div>
    </div>


    <div class="bg-lifestages signs-symptoms" id="whysection">
        <div class="container">
            @foreach($about_symptoms_description as $asd)
            <div class="section-heading">
                <h5>{{$asd->sub_title}}</h5>
                <h2>
                    {{$asd->title}}
                </h2>
            </div>
            @endforeach
            <div class="row">
                @foreach($about_symptoms as $as)
                <div class="col-lg-4 col-md-6 last-marg">
                    <div class="lifestyle-box">
                        <div class="lifestyle-info">
                            <div class="lifestyle-icon">
                                <!-- <div class="lifestyle-img">
                                    <img src="image/girl.png" alt="">
                                </div> -->
                                <h2><a href="#">{{$as->title}}</a></h2>
                                <span>{{$as->sub_title}}</span>
                            </div>
                            <div class="lifestyle-desc">
                                
                                <div class="inner-lifestyle-icon">
                                    <img src="/uploads/{{$as->image}}" alt="">
                                </div>
                                
                                <p>{{$as->description}}</p>
                                <!-- <a href="#">Learn more<i class="fa-solid fa-arrow-right"></i></a> -->
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <!--<div class="col-lg-3 col-md-6">-->
                <!--   <div class="lifestyle-box">-->
                <!--        <div class="lifestyle-info">-->
                <!--            <div class="lifestyle-icon">-->
                <!--                 <div class="lifestyle-img">-->
                <!--                    <img src="image/menopause.png" alt="">-->
                <!--                </div>-->
                <!--                <h2><a href="">Physical</a></h2>-->
                <!--                <span>Night sweats</span>-->
                <!--            </div>-->
                <!--            <div class="lifestyle-desc">-->
                                
                <!--                <p> Up to 85% of women may have night sweats during menopause, making effective management crucial for improving sleep quality.</p>-->
                <!--                 <a href="#">Learn more<i class="fa-solid fa-arrow-right"></i></a> -->
                <!--            </div>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->
            </div>
            <div class="expert-button">
                <button class="button">
                    <a href="{{url('/symptoms-details')}}">view all</a>
                </button>
            </div>
        </div>
    </div>
    
    
    <section class="lifestyle-modification">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @foreach($about_modification_description as $amd)
                    <div class="section-heading">
                        <h5>{{$amd->sub_title}}</h5>
                        <h2>{{$amd->title}}</h2>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="row">
                @foreach($about_modification as $am)
                <div class="col-lg-6 col-md-6">
                    <div class="lifestyle-modification-details">
                        <h5>{{$am->title}}</h5>
                        <p>{{$am->description}}</p>
                        <a href="#">Know More <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>



    <section class="essential-checkups">
        <div class="container">
            @foreach($about_checkup as $ac)
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="essential-checkups-img">
                        <div class="essential-checkups-img1">
                            <img src="/uploads/{{$ac->image}}">
                        </div>
                        <div class="essential-checkups-img2">
                            <img src="/uploads/{{$ac->s_image}}">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="essential-checkups-detail">
                        <div class="section-heading">
                            <h5>{{$ac->title1}}</h5>
                            <h2>{{$ac->title2}}</h2>
                            <p><span>{{$ac->h_text}}</span>{{$ac->description}}</p>
                            <button class="button">
                                <a href="{{url('/essential-checkup')}}">Discover More</a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>


    <section class="healthy-intimacy">
        <div class="container">
            <!-- <div class="row">
                <div class="healthy-intimacy-detail">
                    <div class="healthy-intimacy-description">
                        <h5>Healthy Sexuality & Intimacy</h5>
                        <p>Menopause, or the natural cessation of menstruation, can cause physical and emotional changes that affect your sexual life. In some women libido (sex drive) declines, while in others sexuality stays robust or even improves. Learn more about how to keep your sexual experience fulfilling and healthy.</p>
                        <a href="#">Know More <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
            </div> -->
            @foreach($about_healthy as $ah)
            <div class="row managing-menopause">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="section-heading">
                        <!-- <h5> Essential Check Ups</h5> -->
                        <h2>{{$ah->title}}</h2>
                        <p>{{$ah->description}}</p>
                        <a href="{{url('/healthy-sexuality-intimacy')}}">Know More <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="managing-menopause-img">
                        <img src="/uploads/{{$ah->image}}">
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>


    <section class="menopause-myths">
        <div class="container">
            @foreach($about_work as $aw)
            <div class="row managing-menopause">
                <div class="col-lg-6">
                    <div class="forum-bg">
                        <img src="/uploads/{{$aw->image}}" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="section-heading">
                        <!-- <h5> Essential Check Ups</h5> -->
                        <h2>{{$aw->title}}</h2>
                        <p>{{$aw->description}}</p>
                        <a href="{{url('/working-women')}}">Know More <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>




    <section class="lifestyle-modification myths">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <!-- <h5>Lifestyle Modification</h5> -->
                        <h2>Menopause Myths</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="menopause-myths-details">
                        @foreach($about_myths as $am)
                        <div class="row align-items-center">
                            <div class="col-lg-7 col-md-7">
                                <!--<h5>The Laughter Cure</h5>-->
                                <!--<p>Laughter may be the best medicine! Studies suggest that humor and social interaction can help reduce stress and improve mood, potentially lessening some menopausal symptoms. Find out more about the available treatment choices.</p>-->
                                <p>{{$am->description}}</p>
                                <a href="{{url('/menopause-myths')}}">Know More <i class="fa-solid fa-arrow-right"></i></a>
                            </div>
                            <div class="col-lg-5 col-md-5">
                                <div class="menopause-myths-img">
                                    <img src="/uploads/{{$am->image}}">
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <!-- <div class="col-lg-6">
                    <div class="lifestyle-modification-details">
                        <h5>Healthy Habits</h5>
                        <p><span>Spicy Surprise:</span> Spicy foods can trigger hot flashes in some women. Capsaicin, the compound that gives chilies their heat, can activate the same nerve receptors involved in regulating body temperature. Learn how exercise, nutrition, can significantly improve your overall well-being during menopause.</p>
                        <a href="#">Know More <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div> -->
            </div>
        </div>
    </section>




    @foreach($about_cta as $ac)
    <section class="cta_details about-cta" style="background-image: url('/uploads/{{$ac->image}}');">
        <div class="cta_inner_details position-relative">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                         <div class="cta_contents">
                            <div class="cta-top">
                               <ul>
                                    <li>
                                        <a href="#"><i class="fa-solid fa-arrow-right-long"></i> <span>{{$ac->title1}}</span></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa-solid fa-arrow-right-long"></i> <span>{{$ac->title2}}</span></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa-solid fa-arrow-right-long"></i> <span>{{$ac->title3}}</span></a>
                                    </li>
                               </ul>
                            </div>
                            
                              
                               
                                <div class="cta-button">
                                    <button class="button">
                                        <a href="{{url('/contact')}}">Contact Us</a>
                                    </button>
                                </div>
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> 
    @endforeach
    
    
    <input type="hidden" id="next_prev_val" name="next_prev_val" value="1">
    
    
<!--<input type="hidden" name="get_val" id="get_val" value="0">-->
<!--@if(Auth::guard('web')->user() !='')-->
<!--<input type="hidden" name="get_scroll_val" id="get_scroll_val" value="0">-->
<!--@else-->
<!--<input type="hidden" name="get_scroll_val" id="get_scroll_val" value="2">-->
<!--@endif-->

<style type="text/css">
   .success-msg-forum {
   background: #c8e1c2;
   padding: 10px;
   display: none;
   }
   .error-text{
   color: red;
   }
   .success-msg-event{
   background: #c8e1c2;
   padding: 10px;
   display: none;
   }
   .success-msg-book{
   background: #c8e1c2;
   padding: 10px;
   display: none;
   }
   .otp_field{
   display: none;
   }
   .login-msg p{
   color: white;
   text-align: center;
   }
</style>


<!-- The Modal -->
<div class="modal login-model" id="login-popup" style="pointer-events:none;">
   <div class="modal-dialog">
      <div class="modal-content">
         <!--Modal Header -->
         <div class="modal-header">
            <h4 class="modal-title">Login</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" style="display: none;"></button>
         </div>
         <!--Modal body -->
         <div class="modal-body">
            <div class="login-msg"></div>
            <form action="" class="row g-4" id="login-form">
                {{ csrf_field() }}
               <div class="col-12 phone_no_field">
                  <label>Mobile no.<span class="text-danger">*</span></label>
                  <div class="input-group">
                     <div class="input-group-text"><i class="fa-solid fa-phone"></i></div>
                     <input type="text" class="form-control" placeholder="Enter phone number" name="phone_no">
                  </div>
               </div>
               <div class="col-12 otp_field">
                  <label>Enter OTP<span class="text-danger">*</span></label>
                  <div class="input-group">
                     <div class="input-group-text"><i class="fa-solid fa-lock"></i></div>
                     <input type="text" class="form-control" placeholder="Enter otp" name="otp">
                  </div>
               </div>
               <div class="col-12 text-align-center display-flex">
                  <!--<button type="submit" class="btn btn-primary px-4 float-end mt-4">login</button> -->
                  <div class="expert-button" >
                     <button class="button" id="submit_login">
                     <a href="#">Login</a>
                     </button>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
    

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
        <script src="/js/script.js"></script>
        
        <script>
        //     $(document).ready(function(){
        //     var currentSection = 1;
        //     $('.symptoms-card:first').addClass('symptoms-que');
            
        //     // Hide previous button initially
        //     $('#prevBtn').hide();
            
        //     $('#nextBtn').click(function(e){
        //         e.preventDefault();
        //         if(currentSection < $('.symptoms-card').length) {
        //             $('.symptoms-card').removeClass('symptoms-que');
        //             $('#section'+(currentSection+1)).addClass('symptoms-que');
        //             currentSection++;
                    
        //             // Show previous button if not on the first section
        //             if(currentSection > 1) {
        //                 $('#prevBtn').show();
        //             }
        //         }
        //     });
            
        //     $('#prevBtn').click(function(e){
        //         e.preventDefault();
        //         if(currentSection > 1) {
        //             $('.symptoms-card').removeClass('symptoms-que');
        //             $('#section'+(currentSection-1)).addClass('symptoms-que');
        //             currentSection--;
                    
        //             // Hide previous button if on the first section
        //             if(currentSection === 1) {
        //                 $('#prevBtn').hide();
        //             }
        //         }
        //     });
        // });
        
        $(document).ready(function(){
            var currentSection = 1;
            $('.symptoms-card:first').addClass('symptoms-que');
            
            // Hide previous button initially
            $('#prevBtn').hide();
            
            $('#nextBtn').click(function(e){
                e.preventDefault();
                
                if(currentSection == 6){
                    if(currentSection < $('.symptoms-card').length) {
                        $('.symptoms-card').removeClass('symptoms-que');
                        $('#section'+(currentSection+1)).addClass('symptoms-que');
                        currentSection++;
                        
                        // Show previous button if not on the first section
                        if(currentSection > 1) {
                            $('#prevBtn').show();
                        }
                        $('.symptoms-btn .button').removeAttr("disabled"); 
                    }
                }
                
                
                if(currentSection == 5){
                    var affection1 = $('input[name="affection1"]:checked').val();
                    var affection2 = $('input[name="affection2"]:checked').val();
                    var affection3 = $('input[name="affection3"]:checked').val();
                    var affection4 = $('input[name="affection4"]:checked').val();
                    
                    if(affection1 == undefined || affection2 == undefined || affection3 == undefined || affection4 == undefined){
                        $('.error-msg').html('<p>All Fields are required !!</p>');
                        $('.error-msg').show();
                    }else{
                        if(currentSection < $('.symptoms-card').length) {
                            $('.symptoms-card').removeClass('symptoms-que');
                            $('#section'+(currentSection+1)).addClass('symptoms-que');
                            currentSection++;
                            
                            // Show previous button if not on the first section
                            if(currentSection > 1) {
                                $('#prevBtn').show();
                            }
                            $('.error-msg').hide(); 
                            $('.symptoms-btn .button').removeAttr("disabled");
                        }
                    }
                }
                
                
                if(currentSection == 4){
                    var age_group = $('input[name="age_group"]:checked').val();
                    
                    if(age_group == undefined){
                        $('.error-msg').html('<p>This Fields is required !!</p>');
                        $('.error-msg').show();
                    }else{
                        if(currentSection < $('.symptoms-card').length) {
                            $('.symptoms-card').removeClass('symptoms-que');
                            $('#section'+(currentSection+1)).addClass('symptoms-que');
                            currentSection++;
                            
                            // Show previous button if not on the first section
                            if(currentSection > 1) {
                                $('#prevBtn').show();
                            }
                            $('.error-msg').hide(); 
                        }
                    }
                }
                
                
                if(currentSection == 3){
                    var symptoms1 = $('input[name="symptoms1"]:checked').val();
                    var symptoms2 = $('input[name="symptoms2"]:checked').val();
                    var symptoms3 = $('input[name="symptoms3"]:checked').val();
                    var symptoms4 = $('input[name="symptoms4"]:checked').val();
                    
                    if(symptoms1 == undefined || symptoms2 == undefined || symptoms3 == undefined || symptoms4 == undefined){
                        $('.error-msg').html('<p>All Fields are required !!</p>');
                        $('.error-msg').show();
                    }else{
                        if(currentSection < $('.symptoms-card').length) {
                            $('.symptoms-card').removeClass('symptoms-que');
                            $('#section'+(currentSection+1)).addClass('symptoms-que');
                            currentSection++;
                            
                            // Show previous button if not on the first section
                            if(currentSection > 1) {
                                $('#prevBtn').show();
                            }
                            $('.error-msg').hide(); 
                        }
                    }
                }
                
                
                if(currentSection == 2){
                    var hot_flushes = $('input[name="hot_flushes"]:checked').val();
                    var night_sweats = $('input[name="night_sweats"]:checked').val();
                    var difficulty_sleeping = $('input[name="difficulty_sleeping"]:checked').val();
                    var mood_changes = $('input[name="mood_changes"]:checked').val();
                    var low_energy = $('input[name="low_energy"]:checked').val();
                    var brain_fog = $('input[name="brain_fog"]:checked').val();
                    var heart_palpitations = $('input[name="heart_palpitations"]:checked').val();
                    var muscle_ache = $('input[name="muscle_ache"]:checked').val();
                    var headaches = $('input[name="headaches"]:checked').val();
                    var unination_frequency = $('input[name="unination_frequency"]:checked').val();
                    var vaginal_dryness = $('input[name="vaginal_dryness"]:checked').val();
                    var sex_drive = $('input[name="sex_drive"]:checked').val();
                    var painful_intercourse = $('input[name="painful_intercourse"]:checked').val();
                    var hair_changes = $('input[name="hair_changes"]:checked').val();
                    var skin_changes = $('input[name="skin_changes"]:checked').val();
                    var waist_circumference = $('input[name="waist_circumference"]:checked').val();
                    var weight_gain = $('input[name="weight_gain"]:checked').val();
                    
                    if(hot_flushes == undefined || night_sweats == undefined || difficulty_sleeping == undefined || mood_changes == undefined || low_energy == undefined || brain_fog == undefined || heart_palpitations == undefined || muscle_ache == undefined || headaches == undefined || unination_frequency == undefined || vaginal_dryness == undefined || sex_drive == undefined || painful_intercourse == undefined || hair_changes == undefined || skin_changes == undefined || waist_circumference == undefined || weight_gain == undefined){
                        $('.error-msg').html('<p>All Fields are required !!</p>');
                        $('.error-msg').show();
                    }else{
                        if(currentSection < $('.symptoms-card').length) {
                            $('.symptoms-card').removeClass('symptoms-que');
                            $('#section'+(currentSection+1)).addClass('symptoms-que');
                            currentSection++;
                            
                            // Show previous button if not on the first section
                            if(currentSection > 1) {
                                $('#prevBtn').show();
                            }
                            $('.error-msg').hide(); 
                        }
                    }
                }
                
                
                if(currentSection == 1){
                    var radio_group = $('input[name="radio_group"]:checked').val();
                    if(radio_group == undefined){
                        $('.error-msg').html('<p>This Field is required !!</p>');
                        $('.error-msg').show();
                    }else{
                        if(currentSection < $('.symptoms-card').length) {
                            $('.symptoms-card').removeClass('symptoms-que');
                            $('#section'+(currentSection+1)).addClass('symptoms-que');
                            currentSection++;
                            
                            // Show previous button if not on the first section
                            if(currentSection > 1) {
                                $('#prevBtn').show();
                            }
                            $('.error-msg').hide();
                        }
                    }
                }
            });
            
            $('#prevBtn').click(function(e){
                e.preventDefault();
                $('.error-msg').hide();
                if(currentSection > 1) {
                    $('.symptoms-card').removeClass('symptoms-que');
                    $('#section'+(currentSection-1)).addClass('symptoms-que');
                    currentSection--;
                    
                    // Hide previous button if on the first section
                    if(currentSection === 1) {
                        $('#prevBtn').hide();
                    }
                }
            });
            
        });  
        
        
         
   $(document).ready(function() {
       $("#submit_login").click(function(e){
           e.preventDefault();
   
           $(".error-text").empty();
           var _token = $("input[name='_token']").val();  
           var phone_no =  $("#login-form input[name='phone_no']").val();
           var otp =  $("#login-form input[name='otp']").val();
   
              $.ajax({
               url: '/verify_login',
               type:'POST',
                 data: {_token:_token,phone_no:phone_no,otp:otp},
                 beforeSend: function(){
   
                               $('.main-loading-state').show();
    
                                $('#overlay').fadeIn();
                                
                                 $('#submit_login').prop('disabled', true);
   
                              },
   
                           complete: function(){
                               
                                 $('#submit_login').removeAttr("disabled");
   
                              $('.main-loading-state').hide();
    
                            },
                            
                   success: function(data) {
                     console.log(data.error)
                       if($.isEmptyObject(data.error)){
   
                       // $('form').each(function() {
                       //      this.reset();
                       //    });
                       console.log(data.success);
                       if(data.success == 2){
                          $(".phone_no_field").hide(); 
                          $(".otp_field").show();
                          $('.login-msg').html('<p class="bg-success">OTP sent on Phone Number</p>'); 
                       }
   
                       if(data.success == 0){
                           $(".login-msg").show(); 
                           $('.login-msg').html('<p class="bg-danger"> Invalid OTP </p>');
                       }
                       if(data.success == 1){
                           $(".login-msg").show(); 
                           $('.login-msg').html('<p class="bg-success"> OTP matched Successfully !!</p>');
                           $('.btn-close').click();
                       }
   
                        // $(".login-msg").show();
                       setTimeout(function() { $(".login-msg").fadeOut(3000); }, 3000);
   
                       }else{
                           printErrorMsg4(data.error);
   
   
                     
                        
                       }
                   }
               }); 
       }); 
   
       function printErrorMsg4 (msg) {
           $.each( msg, function( key, value ) {
           console.log(key);
             $('#login-form .'+key+'_err').css("display","block");
             $('#login-form .'+key+'_err').text(value);
   
             setTimeout(function() { $(".error-text").fadeOut(3000); }, 3000);
           });
       }
   });
   
        $(document).ready(function() {
       	$("#download_pdf").click(function(e){
           e.preventDefault();
   
           $('form').each(function() {
                this.reset();
              });

           var _token = $("input[name='_token']").val();
           var radio_group =  $("#pdf_form input[name='radio_group']").val();
           
           var hot_flushes =  $("#pdf_form input[name='hot_flushes']").val();
           var night_sweats =  $("#pdf_form input[name='night_sweats']").val();
           var difficulty_sleeping =  $("#pdf_form input[name='difficulty_sleeping']").val();
           var mood_changes =  $("#pdf_form input[name='mood_changes']").val();
           var low_energy =  $("#pdf_form input[name='low_energy']").val();
           var brain_fog =  $("#pdf_form input[name='brain_fog']").val();
           var heart_palpitations =  $("#pdf_form input[name='heart_palpitations']").val();
           var muscle_ache =  $("#pdf_form input[name='muscle_ache']").val();
           var headaches =  $("#pdf_form input[name='headaches']").val();
           var unination_frequency =  $("#pdf_form input[name='unination_frequency']").val();
           var vaginal_dryness =  $("#pdf_form input[name='vaginal_dryness']").val();
           var sex_drive =  $("#pdf_form input[name='sex_drive']").val();
           var painful_intercourse =  $("#pdf_form input[name='painful_intercourse']").val();
           var hair_changes =  $("#pdf_form input[name='hair_changes']").val();
           var skin_changes =  $("#pdf_form input[name='skin_changes']").val();
           var waist_circumference =  $("#pdf_form input[name='waist_circumference']").val();
           var weight_gain =  $("#pdf_form input[name='weight_gain']").val();

           var symptoms1 =  $("#pdf_form input[name='symptoms1']").val();
           var symptoms2 =  $("#pdf_form input[name='symptoms2']").val();
           var symptoms3 =  $("#pdf_form input[name='symptoms3']").val();
           var symptoms4 =  $("#pdf_form input[name='symptoms4']").val();

           var age_group =  $("#pdf_form input[name='age_group']").val();

           var affection1 =  $("#pdf_form input[name='affection1']").val();
           var affection2 =  $("#pdf_form input[name='affection2']").val();
           var affection3 =  $("#pdf_form input[name='affection3']").val();
           var affection4 =  $("#pdf_form input[name='affection4']").val();

           var likelihood =  $("#pdf_form input[name='likelihood']").val();
   
              $.ajax({
               url: '/send_menopause_data',
               type:'POST',
                 data: {_token:_token,radio_group:radio_group,hot_flushes:hot_flushes,night_sweats:night_sweats,difficulty_sleeping:difficulty_sleeping,mood_changes:mood_changes,low_energy:low_energy,brain_fog:brain_fog,heart_palpitations:heart_palpitations,muscle_ache:muscle_ache,headaches:headaches,unination_frequency:unination_frequency,vaginal_dryness:vaginal_dryness,sex_drive:sex_drive,painful_intercourse:painful_intercourse,hair_changes:hair_changes,skin_changes:skin_changes,waist_circumference:waist_circumference,weight_gain:weight_gain,symptoms1:symptoms1,symptoms2:symptoms2,symptoms3:symptoms3,symptoms4:symptoms4,age_group:age_group,affection1:affection1,affection2:affection2,affection3:affection3,affection4:affection4,likelihood:likelihood,},
                 beforeSend: function(){
   
                               $('#loading-bar-spinner').show();
    
                                $('#overlay').fadeIn();
                                
                                 $('#submit3').prop('disabled', true);
   
                              },
   
                           complete: function(){
                               
                                 $('#submit3').removeAttr("disabled");
   
                              $('#loading-bar-spinner').hide();
    
                            },
                            
                   success: function(data) {
                     console.log(data.error)
                       if($.isEmptyObject(data.error)){
   
                       $('form').each(function() {
                            this.reset();
                          });
                       
   
                        // $(".login-msg").show();
                       setTimeout(function() { $(".login-msg").fadeOut(3000); }, 3000);
   
                       }else{
                           printErrorMsg4(data.error);
   
   
                     
                        
                       }
                   }
               }); 
       }); 
       
       
       
   
       function printErrorMsg4 (msg) {
           $.each( msg, function( key, value ) {
           console.log(key);
             $('#login-form .'+key+'_err').css("display","block");
             $('#login-form .'+key+'_err').text(value);
   
             setTimeout(function() { $(".error-text").fadeOut(3000); }, 3000);
           });
       }
   });
   
   
            let currentSection = 1;
          const totalSections = document.querySelectorAll('.symptoms-card').length;
        
          function nextSection() {
              ALERT(11);
            // Check if the current section's question is answered
            if (!isQuestionAnswered(currentSection)) {
              document.getElementById('error_message').innerText = "Please answer the question before proceeding.";
              return;
            }
            document.getElementById('error_message').innerText = ""; // Clear any previous error message
            
            // Hide current section
            document.getElementById(`section${currentSection}`).style.display = "none";
            
            // Show next section
            currentSection++;
            if (currentSection <= totalSections) {
              document.getElementById(`section${currentSection}`).style.display = "block";
            } else {
              // If all sections are answered, you can redirect the user or perform any other action
              alert("Thank you for completing the questionnaire!");
            }
          }
        
          function isQuestionAnswered(section) {
            // Implement your logic to check if the question in the current section is answered
            const radios = document.querySelectorAll(`#section${section} input[type="radio"]`);
            for (const radio of radios) {
              if (radio.checked) {
                return true;
              }
            }
            return false;
          }
           
        
        
        </script>
@endsection
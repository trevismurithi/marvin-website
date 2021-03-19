<?php
    $type_writing = array(
        "Essay(Any)","Admission Essay","Annotated Bibliography",
        "Article Review","Book/Movie Review","Business Plan",
        "Case Study","Creative Writing","Critical thinking/Review",
        "Literature Review","Presentation or Speech","Reflective Writing",
        "Report","Research Paper","Research Proposal","Term Paper","Thesis/Dissertation",
        "Homework Assignment","Biological Assignment","Chemistry Assignment","Engineering Assignment",
        "Geography Assignment","Math Assignment","Physics Assignment","Physics Assignment",
        "Statistic Assignment","Other Assignment","Multiple choice questions","Short Answer questions",
        "Word problems","others"
    );

    $grade=array(
        "school","college","university","masters","Dectorate"
    );

    $duration = array(
        "6hrs","12hrs","1day","2days","3days","5days","7days","10days",
        "2weeks","1month","2months"
    );

    $pages = [];
    for ($i = 0; $i < 400; $i++) {
         $pages[$i] = ''.($i + 1) . 'page / ' . (275 * ($i + 1)) . ' words';
    }

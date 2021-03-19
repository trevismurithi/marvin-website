<?php
    require_once 'db.inc.php';
    require_once 'details.inc.php';
    session_start();
    //check if the user is logged in
    if(isset($_SESSION['user_id'])){
        //get the value and upload to the server
        if(isset($_POST['submit'])){
            $space = "";
            if(isset($_POST['double'])){
                $space="double";
            }else if(isset($_POST['single'])){
                $space="single";
            }
            //add number of days
            $time = date_create(date('d-m-Y'));
            $expected = $_POST['duration'];
            if($expected==0 || $expected==1){
                $time = timer($time,"Y-m-d","0 days");
            }else if($expected>1 && $expected <8){
                if($expected<5){
                    $time = timer($time,"Y-m-d",($expected+1)." days");
                }else if($expected == 5){
                    $time = timer($time,"Y-m-d","5 days");
                }else if($expected == 6){
                    $time = timer($time,"Y-m-d","7 days");
                }else if($expected == 7){
                    $time = timer($time,"Y-m-d","10 days");        
                }
            }else if($expected==8){
                $time = timer($time,"Y-m-d","14 days");
            }else if($expected>8){
                if($expected==9){
                    $time = timer($time,"Y-m-d","30 days");
                }else if($expected == 10){
                    $time = timer($time, "Y-m-d", "60 days");
                }
            }
            $select_type ="";
            if($_POST['select_type'] ==0) $select_type ="write";
            else if($_POST['select_type'] ==1) $select_type ="rewrite";
            else if($_POST['select_type'] == 2) $select_type = "edit";

            //get all the details and save to database
            //create the connection and save the details of the data
            $db = new UserManager();
            $conn = $db->createConnection();
            $db->saveOrder($conn,$select_type,$type_writing[$_POST['type_writing']],
                            $grade[$_POST['university']],$duration[$_POST['duration']],
                            $space,$pages[$_POST['pages_words']],$_POST['price'],
                        $time,"pending",$_SESSION['user_id']);
                        
            // print_r($select_type.$type_writing[$_POST['type_writing']].
            //                 $grade[$_POST['university']].$duration[$_POST['duration']].
            //                 $space.$pages[$_POST['pages_words']].$_POST['price'].
            //             $time.
            //             "progress".$_SESSION['user_id']);

        }else{
            header("Location: ../calculator.php?error=unclicked");
            exit();
        }
    }else{
        header("Location: ../calculator.php?error=nouser");
        exit();
    }

    function timer($time, $format,$days){
        date_add($time,date_interval_create_from_date_string($days));
        return date_format($time,$format);
    }
<?php
    include 'db.inc.php';

    if(isset($_POST['submit'])){
        //if the button is clicked
        $username = $_POST['username'];
        $fullName = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['tel'];
        $pwd = $_POST['pwd'];
        $r_pwd = $_POST['r-pwd'];

        //check if the fields are empty 
        if(empty($first_name)&&empty($last_name)
        &&empty($email)&&empty($phone)
        &&empty($pwd)&&empty($r_pwd)){
            header("Location: ../signup.php?error=emptyfields");
            exit();
        }else{
            //check for special characters in username
            if(!ctype_alnum($username)){
                header("Location: ../signup.php?error=specialcharacter&user=".$username."&name=".$fullName."&email=".$email."&phone=".$phone);
                exit();
            }else{
                //check for special characters in fullname
                if(!ctype_alnum($fullName)){
                    header("Location: ../signup.php?error=specialcharacter&user=".$username."&name=".$fullName."&email=".$email."&phone=".$phone);
                    exit();       
                }else{
                    //fullname should have two names max
                    if(count(explode(" ",$fullName))!=2){
                        header("Location: ../signup.php?error=nameless&user=".$username."&email=".$email."&phone=".$phone);
                        exit();
                    }else{
                        //check for email format
                        if(!filter_var($email,FILTER_DEFAULT)){
                            header("Location: ../signup.php?error=emailerror&user=".$username."&name=".$fullName."&phone=".$phone);
                            exit();
                        }else{
                            //if they match- the strength of the password would be determined in the html
                            if(!strcmp($pwd,$r_pwd)){
                                header("Location: ../signup.php?error=nonematch&user=".$username."&name=".$fullName."&email=".$email."&phone=".$phone);
                                exit();
                            }else{
                                //say everthing is well and good
                                header("Location: ../signup.php?error=none");
                                exit();
                            }
                        }
                    }
                }
            }
        }

    }else{
        header("Location: ../signup.php?error=unclicked");
        exit();
    }
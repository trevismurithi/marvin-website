<?php
    include 'db.inc.php';
    include  'html.inc.php';
    if(isset($_POST['submit'])){
        //if the button is clicked
        $username = trim($_POST['username']);
        $first_name = trim($_POST['f_name']);
        $last_name = trim($_POST['l_name']);
        $email = trim($_POST['email']);
        $phone = trim($_POST['tel']);
        $pwd = trim($_POST['pwd']);
        $r_pwd = trim($_POST['r-pwd']);

        //check if the fields are empty 
        if(empty($first_name)&&empty($last_name)
        &&empty($email)&&empty($phone)
        &&empty($pwd)&&empty($r_pwd)){
            header("Location: ../signup.php?error=emptyfields");
            exit();
        }else{
            //check for special characters in username
            if(!ctype_alnum($username)){
                header("Location: ../signup.php?error=usernamespecial&f_name=".$first_name."&l_name=".$last_name."&email=".$email."&phone=".$phone);
                exit();
            }else{
                //check for special characters in fullname
                if(!ctype_alnum($first_name)){
                    header("Location: ../signup.php?error=firstspecial&user=".$username."&l_name=".$last_name."&email=".$email."&phone=".$phone);
                    exit();       
                }else{
                    //last name should not have special characters
                    if(!ctype_alnum($last_name)){
                        header("Location: ../signup.php?error=lastspecial&user=".$username."&f_name=".$first_name."&email=".$email."&phone=".$phone);
                        exit();
                    }else{
                        //check for email format
                        if(!filter_var($email,FILTER_DEFAULT)){
                            header("Location: ../signup.php?error=emailerror&user=".$username."&f_name=".$first_name."&l_name=".$last_name."&phone=".$phone);
                            exit();
                        }else{
                            //if they match- the strength of the password would be determined in the html
                            if($pwd!=$r_pwd){
                                header("Location: ../signup.php?error=nonematch&user=".$username."&f_name=".$first_name."&l_name=".$last_name."&email=".$email."&phone=".$phone);
                                exit();
                            }else if(checkPassword($pwd)!="pass"){
                                header("Location: ../signup.php?error=weakpass&user=".$username."&f_name=".$first_name."&l_name=".$last_name."&email=".$email."&phone=".$phone);
                                exit();
                            }else{
                                //say everthing is well and good
                                //create the users account details
                                $db = new UserManager();
                                //create a user connection
                                $conn = $db->createConnection();
                                //confirm the user is unique
                                $db->testNameEmail($conn,$username,$email);
                                //if everything works well then create the users account
                                //after hashing the password
                                $hashed = password_hash($pwd,PASSWORD_DEFAULT);
                                //send email to admin and writer
                                // $to = "trevismurithi@gmail.com";
                                // $subject = "New User Registration";
                                // $headers = "CC: tyresewaithaka@gmail.com\r\n";
                                // $headers .= "MIME-Version: 1.0\r\n";
                                // $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
                                // $msg = "<p>".$username." has registered to your website.</p>
                                // <p>The clients full names are:</p> 
                                // <p>".$first_name." ".$last_name."</p>
                                // <p>".$email."</p>
                                // <p>".$phone."</p>
                                // <p>Kindly contact the client and assign a writer</p>";
                                // mail($to,$subject,messageEdit("Support Team",$msg),$headers);
                                $db->createUser($conn,strtolower($username),$first_name,$last_name,$email,$_POST['submit'].' '.$phone,$hashed);
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

function checkPassword($password) {
    // Validate password strength
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);

    if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
        return 'failed';
    }else{
        return 'pass';
    }
}
<?php
    include_once 'html.inc.php';
    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        //validate the email format then send
        if(!filter_var($email,FILTER_DEFAULT)){
            header("Location: ../forgot.php?error=emailformat");
            exit();
        }else{
            //create time
            $time = date("Y-m-d h:i:sa");
            $time = base64_encode($time);
            $time = bin2hex($time);
            //encode the email
            $user = base64_encode($email);
            $user = bin2hex($user);
            //send the email
            $to = $email;
            $subject = "RESET ESSAYPRO PASSWORD";
            $headers = "CC: tyresewaithaka@gmail.com\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
            $message = "
            <p>We heard that you lost your EssayPro password. Sorry about that!</p>
            <p>But don’t worry! You can use the following link to reset your password:</p>
            <p>http://www.essaypro.website/reset.php?s633352686447553d=".$user."&s5a4746305a513d3d=".$time."</p>
            ";
            mail($to,$subject,messageEdit("User",$message),$headers);
            header("Location: ../forgot.php?state=checkyouremail");
            exit();
        }
    }
<?php 
    include_once 'db.inc.php';
    if(isset($_POST['submit'])){
        $state = $_POST['submit'];
        $pwd = $_POST['pwd'];
        $r_pwd = $_POST['r_pwd'];
        //confirm password strength
        //and if both of them match
        if($pwd != $r_pwd){
            header("Location: ../reset.php?state=".$state."&error=nonematch");
            exit();
        }else{
            if(checkPassword($pwd)!="pass"){
                header("Location: ../reset.php?state=".$state."&error=weakpass");
                exit();
            }else{
                //convert state to binary the decode
                $state = hex2bin($state);
                $state = base64_decode($state);
                //update password
                $db = new UserManager();
                $conn = $db->createConnection();
                $db->updatePassword($conn,$pwd,$email,$_POST['submit']);
            }
        }
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
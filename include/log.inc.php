<?php
    include 'db.inc.php';

    //if the button is clicked
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $pwd = $_POST['pwd'];
        //if the fields are empty
        if(empty($email) && empty($pwd)){
            header("Location: ../login.php?error=emptyfields");
            exit();
        }else{
            //if the fields are not empty then try to login the user
            $db = new UserManager();
            $conn = $db->createConnection();
            $db->logInUser($conn,$username,$pwd);
        }
    }else{
        header('Location: ../login.php?error=unclicked');
        exit();
    }

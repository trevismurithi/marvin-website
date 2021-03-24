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
            //create time
            $time = date("Y-m-d h:i:sa");
            $status="";
            //if the fields are not empty then try to login the user
            $db = new UserManager();
            $conn = $db->createConnection();
            $db->logInUser($conn,$username,$pwd);
            if(isset($_SESSION['user_id'])){
                $user_id = $_SESSION['user_id'];
                $status = $db->viewStatus($conn,$user_id);
                if(empty($status)){
                    //if its empty then create
                    $db->updateStatus($conn,"online",$time,$user_id,$db->getInsertStatus());
                    header("Location: ../chatroom.php?error=newUser");
                    exit();
                }else{
                    //know if the user has a role
                    $roles = $db->rolePlay($conn);
                    if(in_array($_SESSION['user_id'],$roles)){
                        $_SESSION['role'] = "role";
                    }
                    //otherwise update the status of the user
                    $db->updateStatus($conn,"online",$time,$user_id,$db->getUpdateStatus());
                    //locate to an area where they are able to see orders
                    header("Location: ../chatroom.php?error=oldUser");
                    exit();
                }
            }
            //update the status of the user

        }
    }else{
        header('Location: ../login.php?error=unclicked');
        exit();
    }

<?php
    session_start();
    include 'db.inc.php';
    if(isset($_POST['submit'])){
        $file = $_FILES['file'];

        $fileName = $_FILES['file']['name'];//get the full name of the file
        $fileTmp_name = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];

        $fileExt = explode(".",$fileName,2);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('jpg','jpeg','png');

        if(in_array($fileActualExt,$allowed)){
            if($fileError === 0){
                if($fileSize<1000000){
                    $fileNameNew = $_SESSION['user_id'].'-user.'.$fileActualExt;//creates a unique id
                    $fileDestination = "../users/".$fileNameNew;
                    move_uploaded_file($fileTmp_name,$fileDestination);
                    //save image file to database
                    $db=new UserManager();
                    //create the connection
                    $conn = $db->createConnection();
                    //save image to database
                    $link = $db->viewImage($conn,$_SESSION['user_id']);
                    if(empty($link)){
                        //add the image
                        $db->updateImage($conn,substr($fileDestination,3),$_SESSION['user_id'],$db->getInsertImage());
                        header("Location: ../chatroom.php?error=none");
                        exit();
                    }else{
                        //update the link
                        $db->updateImage($conn,substr($fileDestination,3),$_SESSION['user_id'],$db->getUpdateImage());
                        header("Location: ../chatroom.php?error=none");
                        exit();
                    }
                }else{
                    header("Location: ../chatroom.php?error=filebig");
                    exit();
                }

            }else{
                header("Location: ../chatroom.php?error=uploaderror");
                exit();
            }
        }else{
            header("Location: ../chatroom.php?error=filetype");
            exit();
        }
    }
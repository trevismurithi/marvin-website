<?php
session_start();
include 'db.inc.php';
if (isset($_POST['submit'])) {
    $file = $_FILES['file'];

    $fileName = $_FILES['file']['name']; //get the full name of the file
    $fileTmp_name = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode(".", $fileName, 2);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('docx', 'pdf');

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 2000000) {
                $fileNameNew = uniqid('',true) .'.'. $fileActualExt; //creates a unique id
                $fileDestination = "../uploads/" . $fileNameNew;
                move_uploaded_file($fileTmp_name, $fileDestination);
                //save image file to database
                $db = new UserManager();
                //create the connection
                $conn = $db->createConnection();
                //save file
                $db->insertFile($conn,substr($fileDestination,3),$_POST['submit']);
            } else {
                header("Location: ../chatroom.php?error=filebig");
                exit();
            }

        } else {
            header("Location: ../chatroom.php?error=uploaderror");
            exit();
        }
    } else {
        header("Location: ../chatroom.php?error=filetype");
        exit();
    }
}

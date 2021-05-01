<?php
session_start();
include 'db.inc.php';

function uploadfile($fileNames,$fileTmp_names,$fileErrors,$name){
    $fileExt = [];
    $fileActualExt = [];
    $fileNameNew = [];
    $fileDestination = [];
    for ($i = 0; $i < count($fileNames); $i++) {
        $fileExt[$i] = explode(".", $fileNames[$i], 2);
        $fileActualExt[$i] = strtolower(end($fileExt[$i]));
        $fileNameNew[$i] = $_SESSION['user_id'].'-'. uniqid() . '.' . $fileActualExt[$i]; //creates a unique id
        $fileDestination[$i] = "../shared/" . $fileNameNew[$i];
        move_uploaded_file($fileTmp_names[$i], $fileDestination[$i]);
    }
    saveFiles($fileDestination,$name);
}

function saveFiles($fileDestination,$name){
    //save image file to database
    $db = new UserManager();
    //create the connection
    $conn = $db->createConnection();
    //save image to database
    //prepare the sql statement
    $sql="";
    for ($i=0; $i < count($fileDestination); $i++) { 
        $sql .= $db->projectQuery($name,substr($fileDestination[$i],3),$_SESSION['user_id']);
    }
    $db->insertProject($conn,$sql);
}
<?php    
include_once 'multipleAssist.inc.php';
if(isset($_POST['submit'])){
    //get an array of files
    $files = $_FILES['file'];
    $fileNames = $files['name']; //get the full name of the file
    $fileTmp_names = $files['tmp_name'];
    $fileSizes = $files['size'];
    $fileErrors = $files['error'];
    $fileTypes = $files['type'];

    //call upon a function
    uploadfile($fileNames,$fileTmp_names,$fileErrors,$_POST['project_name']);
}
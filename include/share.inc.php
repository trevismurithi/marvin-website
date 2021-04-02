<?php   
include_once 'db.inc.php';

//security
if(isset($_POST['state'])){
    $db = new UserManager();
    //create a connection
    $conn = $db->createConnection();
    //view the shared files
    $projects = $db->viewProject($conn,$_POST['user_id']);
    echo json_encode($projects);
}
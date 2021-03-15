<?php
include 'db.inc.php';
session_start();
//create time
$time = date("Y-m-d h:i:sa");
$user_id = $_SESSION['user_id'];
$db = new UserManager();
$conn = $db->createConnection();
//otherwise update the status of the user
$db->updateStatus($conn,"offline",$time,$user_id, $db->getUpdateStatus());
$conn->close();
session_unset();
session_destroy();
header('Location: ../index.php?user=loggedout');
exit();
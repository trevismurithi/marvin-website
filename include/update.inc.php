<?php

include 'db.inc.php';
$db = new UserManager();
$conn = $db->createConnection();
$arr = $db->listener($conn);

foreach ($arr as $value) {
    echo $value."<br>";
}

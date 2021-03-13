<?php

    // include 'include/db.inc.php';
    // $db = new UserManager();
    // $conn = $db->createConnection();
    // //$db->testNameEmail($conn,"trevis","@gmail.com");
    // $pwd = password_hash("123",PASSWORD_DEFAULT);
    // $db->createUser($conn,"Fanta","jack","right","fanta@gmail.com","254724462514",$pwd);
    // // $db->logInUser($conn,"twevis","123");
?>
<div class="con">
    <div class="re">
        <p>Hi</p>
    </div>
</div>
<button onclick=cause()>reply</button>
<script>
    function cause(){
        var div = document.querySelector(".con");
        console.log(div.textContent);
    }
</script>
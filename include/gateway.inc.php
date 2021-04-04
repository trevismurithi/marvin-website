<?php
    session_start();
    if(isset($_SESSION['user_id']) && isset($_POST['submit'])){
        header("Location: ../gateway.php?order_id=".$_POST['submit']);
        exit();
    }
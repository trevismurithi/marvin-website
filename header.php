<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/home/header.css">
    <link rel="stylesheet" href="css/home/index.css">
    <link rel="stylesheet" href="css/home/benefits.css">
    <link rel="stylesheet" href="css/home/entail.css">
    <link rel="stylesheet" href="css/home/services.css">
    <link rel="stylesheet" href="css/home/testimonials.css">
    <link rel="stylesheet" href="css/home/join.css">
    <link rel="stylesheet" href="css/home/footer.css">
    <link rel="stylesheet" href="css/home/work.css">
    <link rel="stylesheet" href="css/log/log.css">
    <link rel="stylesheet" href="css/sign/sign.css">
    <link rel="stylesheet" href="css/chat/chat.css">
    <link rel="stylesheet" href="css/chat/image.css">
    <link rel="stylesheet" href="css/orders/header.css">
    <link rel="stylesheet" href="css/orders/order.css">
    <title>Essay</title>
</head>
<body>
    <nav>
        <div class="nav-contact">
            <ul>
                <li><h2>TURN YOUR SKILLS INTO MONEY</h2></li>
                <li>Phone 254-724462514</li>
                <li>Email support@essaypro.website</li>
            </ul>
        </div>
        <div class="nav-links">
            <img src="img/ignite.png" width="92vh" alt="ignite-icon">
            <ul>
                <!-- <li><a hearef="#">FAQ</a></li> -->
                <!-- <li><a href="#">Contact Us</a></li> -->
                <?php 
                    if(!isset($_SESSION['username'])){
                        echo'
                            <li><a href="index.php">Home</a></li>
                            <li><a href="index.php#works-row">How it works</a></li>
                            <li><a href="index.php#entail">Why choose us</a></li>
                        ';
                    }else if(!isset($_SESSION['role'])){
                        echo'
                            <li><a href="index.php">Home</a></li>
                            <li><a href="order.php">Orders</a></li>
                            <li><a href="calculator.php">Make Order</a></li>
                            <li><a href="chatroom.php">Chatroom</a></li>
                        ';
                    }else if(isset($_SESSION['role'])){
                        echo'
                            <li><a href="index.php">Home</a></li>
                            <li><a href="myUsers.php">Users</a></li>
                            <li><a href="chatroom.php">Chatroom</a></li>
                        ';
                    }
                ?>
            </ul>
            <div class="user-accounts">
                <?php
                    if(isset($_SESSION['username'])){
                        echo '
                            <li><a class="user-accounts-login" href="#">'.$_SESSION['username'].'</a></li>
                            <form action="include/user.inc.php" method="post">
                                <button type="submit" name="submit">logout</button>
                            </form>
                        ';
                    }else{
                        echo '
                            <li><a class="user-accounts-login" href="login.php">login</a></li>
                            <li><a class="user-accounts-sign-up" href="signup.php">sign up</a></li>
                        ';
                    }
                ?>
            </div>
            <div class="burger">
                <div id="line-1"></div>
                <div id="line-2"></div>
                <div id="line-3"></div>
            </div>
            <div id="vertical_nav" class="vertical-nav move-hide">
            </div>
        </div>
    </nav>
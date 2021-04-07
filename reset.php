<?php include_once 'header.php';
    $email="";
    if(isset($_GET['state'])){
        $email = $_GET['state'];
    }
    $error="";
    if(isset($_GET['error'])){
        $error=$_GET['error'];
    }
    //variables for possible errors
    $execute = "execute";
    $nonMatch = "nonematch";
    $weak = "weakpass";
    //create a switch statement 
    switch ($error) {
        case $execute:
            $message="remove special characters in last name";
            break;
        case $nonMatch:
            $message="passwords do not match";
            break;       
        case $weak:
            $message="
                must contain 8 characters or more<br>
                must have special characters #$!&<br>
                atleast one small letter<br>
                atleast one capital letter
                ";
            break; 
        default:
            $message="";
            break;
    }
?>

<div class="log-in-account">
    <lottie-player src="https://assets9.lottiefiles.com/packages/lf20_yolfhtxf.json"
    background="#E5E6E9"
    speed="1"  style="width:100%"
    loop  autoplay></lottie-player>
    <form action="" method="post">
        <?php 
        if(isset($_GET['error'])) echo'<p id="error">'.$message.'</p>';
        ?>
        <h2>Reset password</h2>
        <input type="password" name="pwd" id="pwd" placeholder="Password" required>
        <input type="password" name="r_pwd" id="r_pwd" placeholder="Confirm Password" required>
        <button class="login-btn" type="submit" name="submit" value=<?php echo $email;?>>Reset</button>
    </form>
</div>
<?php include_once 'footer.php'?>
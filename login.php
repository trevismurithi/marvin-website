<?php require 'header.php';
?>
<?php 
    //redirect the user if they have already logged in
    if(isset($_SESSION['username'])){
        header('Location: index.php');
        exit();
    }
    $message="";
    $error="";
    if(isset($_GET['error'])){
        $error = $_GET['error'];
    }
    $emptyfield = "emptyfields";
    $failedlog = "failedlog";
    $usernull = "usernull";
    $success = "none";
    $click = "unclicked";
    switch ($error) {
        case $emptyfield:
            $message="fill all the fields";
            break;
        case $failedlog:
            $message="wrong password or username";
            break;

        case $usernull:
            $message="wrong password or username";
            break;
        case $click:
            $message="click login button";
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
    <form action="include/log.inc.php" method="post">
        <?php 
        if(isset($_GET['error'])) echo'<p id="error">'.$message.'</p>';
        ?>
        <h2>LOG IN</h2>
        <input type="text" name="username" id="username" placeholder="Username">
        <input type="password" name="pwd" id="pwd" placeholder="Password">
        <div class="forgot"><a href="#">Forgot password</a></div>
        <button class="login-btn" type="submit" name="submit">LOGIN</button>
        <div class="create">
            <p>Don't have an account?</p>
            <a href="#">Create One!</a>
        </div>
    </form>
</div>
<?php require 'footer.php';?>
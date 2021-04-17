<?php include_once 'header.php';
if(isset($_SESSION['user_id'])){
    header('Location: index.php');
    exit();
}
$error="";
$message="";
if(isset($_GET['state'])){
    $error = $_GET['state'];
}
$email = "checkyouremail";
switch ($error) {
    case $email:
        $message="check email to reset password";
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
    <form action="include/forgot.inc.php" method="post">
        <?php 
        if(isset($_GET['state'])) echo'<p id="error">'.$message.'</p>';
        ?>
        <h2 style="color:white;">Reset password</h2>
        <input type="email" name="email" id="email" placeholder="Email addresss" required>
        <button class="login-btn" type="submit" name="submit">send</button>
    </form>
</div>
<?php include_once 'footer.php'?>
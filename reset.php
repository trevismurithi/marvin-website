<?php include_once 'header.php';
    if(isset($_SESSION['user_id'])){
        header('Location: index.php');
        exit();
    }
    $email="";
    if(isset($_GET['s633352686447553d']) && isset($_POST['s5a4746305a513d3d'])){
        //convert state to binary the decode
        $time = hex2bin($_POST['s5a4746305a513d3d']);
        $time = base64_decode($_POST['s5a4746305a513d3d']);
        if(date("Y-m-d h:i:sa") != $time){
            header('Location: index.php');
            exit();
        }else{
            $email = $_GET['s633352686447553d'];
        }
    }else{
        header('Location: index.php');
        exit();
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
    <form action="include/reset.inc.php" method="post">
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
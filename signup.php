<?php 
    require 'header.php';
    //redirect the user if they have already logged in
    if(isset($_SESSION['username'])){
        header('Location: index.php');
        exit();
    }
    $message="";
    $error="";
    $username="";
    $first_name="";
    $last_name= "";
    $email="";
    $phone="";
    if(isset($_GET['error'])){
        $error=$_GET['error'];
    }
    //variables for possible errors
    $empty = "emptyfields";
    $userspecial = "usernamespecial";
    $firstspecial = "firstspecial";
    $lastspecial = "lastspecial";
    $nonMatch = "nonematch";
    $weak = "weakpass";
    $exist = "userexists";
    //create a switch statement 
    switch ($error) {
        case $empty:
            $message="fill all fields";
            break;
         case $userspecial:
            $message="remove special characters in username";
            $first_name = $_GET['f_name'];
            $last_name = $_GET['l_name'];
            $email = $_GET['email'];
            $phone = $_GET['phone'];
            break;
        case $firstspecial:
            $message="remove special characters in first name";
            $username = $_GET['user'];
            $last_name = $_GET['l_name'];
            $email = $_GET['email'];
            $phone = $_GET['phone'];
            break;
        case $lastspecial:
            $message="remove special characters in last name";
            $username = $_GET['user'];
            $email = $_GET['email'];
            $phone = $_GET['phone'];
            break;
        case $nonMatch:
            $message="passwords do not match";
            $username = $_GET['user'];
            $first_name = $_GET['f_name'];
            $last_name = $_GET['l_name'];
            $email = $_GET['email'];
            $phone = $_GET['phone'];
            break;       
        case $weak:
            $message="
                must contain 8 characters or more<br>
                must have special characters #$!&<br>
                atleast one small letter<br>
                atleast one capital letter
                ";
            $username = $_GET['user'];
            $first_name = $_GET['f_name'];
            $last_name = $_GET['l_name'];
            $email = $_GET['email'];
            $phone = $_GET['phone'];
            break; 
        case $exist:
            $message="that username exists use another one";
            $username = "";
            $first_name = "";
            $last_name = "";
            $email = "";
            $phone = "";
            break; 
        default:
            $message="";
            $username = "";
            $first_name = "";
            $last_name = "";
            $email = "";
            $phone = "";
            break;
    }
?>
<div class="create-account">
    <div class="get-started">
        <h1>GET STARTED</h1>
    </div>
    <div class="create-user">
        <form action="include/sign.inc.php" method="post">
            <div>
                <label for="username">Username</label>
                <input type="text" name="username" id="username" placeholder="one word small letters(no numbers or special characters)" value=<?php echo $username;?>>
            </div>
            <div>
                <label for="f_name">First Name</label>
                <input type="text" name="f_name" id="f_name" value=<?php echo $first_name;?>>
            </div>
            <div>
                <label for="l_name">Last Name</label>
                <input type="text" name="l_name" id="l_name" value=<?php echo $last_name;?>>
            </div>
            <div>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value=<?php echo $email;?>>
            </div>
            <div>
                <label for="country">country</label>
                <select name="country" id="country">
                    <option value="254">Kenya +254</option>
                </select>
            </div>
            <div>
                <label for="tel">Phone Number</label>
                <p id="text-country">+254</p>
                <input type="tel" name="tel" id="tel" value=<?php echo $phone;?>>
            </div>
            <div>
                <label for="pwd">Password</label>
                <input type="password" name="pwd" id="pwd">
            </div>
            <div>
                <label for="r-pwd">Confirm Password</label>
                <input type="password" name="r-pwd" id="r-pwd">
            </div>
            <div>
                <label class="contain" for="checkbox"><a href="#">terms and conditions</a></label>
                <input type="checkbox" name="checkbox" id="checkbox" value="agree" required>
            </div>
            <button name="submit" type="submit">Create My Account</button>
        </form>
        <?php 
        if(isset($_GET['error'])){
            if($_GET['error']!="none"){
                echo'<div class="error-message"><p>'.$message.'</p></div>';
            }
        }
        ?>
    </div>
</div>
<?php require 'footer.php'?>
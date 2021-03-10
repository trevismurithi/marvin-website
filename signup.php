<?php 
    require 'header.php';
    $message="";
    $error="";
    $username="";
    $fullName="";
    $email="";
    $phone="";
    if(isset($_GET['error'])){
        $error=$_GET['error'];
    }
    //variables for possible errors
    $empty = "emptyfields";
    $special = "specialcharacter";
    $nameMax = "nameless";
    $nonMatch = "nonematch";
    //create a switch statement 
    switch ($error) {
        case $empty:
            $message="fill all fields";
            break;
         case $special:
            $message="remove special characters in username and name";
            $username = $_GET['user'];
            $fullName = $_GET['name'];
            $email = $_GET['email'];
            $phone = $_GET['phone'];
            break;
        case $nameMax:
            $message="two names required";
            $username = $_GET['user'];
            $email = $_GET['email'];
            $phone = $_GET['phone'];
            break;
        case $nonMatch:
            $message="passwords do not match";
            $username = $_GET['user'];
            $fullName = $_GET['name'];
            $email = $_GET['email'];
            $phone = $_GET['phone'];
            break;       
        default:
            $message="";
            $username = "";
            $fullName = "";
            $email = "";
            $phone = "";
            break;
    }
?>
<div class="create-account">
    <div class="get-started">
        <h1>GET STARTED</h1>
    </div>
    <?php echo($fullName)?>
    <div class="create-user">
        <form action="include/sign.inc.php" method="post">
            <div>
                <label for="username">Username</label>
                <input type="text" name="username" id="username" value=<?php echo $username;?>>
            </div>
            <div>
                <label for="name">Full Name</label>
                <input type="text" name="name" id="name" value=<?php echo $fullName;?>>
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
    </div>
</div>
<?php require 'footer.php'?>
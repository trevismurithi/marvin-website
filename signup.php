<?php require 'header.php'?>
<div class="create-account">
    <div class="get-started">
        <h1>GET STARTED</h1>
    </div>
    <div class="create-user">
        <form action="" method="post">
            <div>
                <label for="first_name">First name</label>
                <input type="text" name="first_name" id="first_name">
            </div>
            <div>
                <label for="name">Last name</label>
                <input type="text" name="last_name" id="last_name">
            </div>
            <div>
                <label for="email">Email</label>
                <input type="email" name="email" id="email">
            </div>
            <div>
                <label for="country">country</label>
                <select name="country" id="country">
                    <option value="254">Kenya +254</option>
                </select>
            </div>
            <div>
                <label for="tel">Phone Number</label>
                <input type="tel" name="tel" id="tel">
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
                <input type="checkbox" name="checkbox" id="checkbox">
            </div>
            <button name="submit" type="submit">Create My Account</button>
        </form>
    </div>
</div>
<?php require 'footer.php'?>
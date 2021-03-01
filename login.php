<?php require 'header.php'?>
<div class="log-in-account">
    <form action="" method="post">
        <h2>LOG IN</h2>
        <input type="email" name="email" id="email" placeholder="Email Address">
        <input type="password" name="pwd" id="pwd" placeholder="Password">
        <div class="forgot"><a href="#">Forgot password</a></div>
        <button type="submit" name="submit">LOGIN</button>
        <div class="create">
            <p>Don't have an account?</p>
            <a href="#">Create One!</a>
        </div>
    </form>
</div>
<?php require 'footer.php'?>
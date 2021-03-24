<?php 
    //check if the button has been clicked
    if(isset($_POST['submit'])){
        header("Location: ../singleUser.php?user_id=".$_POST['submit']);
        exit();
    }else{
        //take the user back to the original 
        header("Location: ../myUsers.php?access=denied");
        exit();
    }
?>
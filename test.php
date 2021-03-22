<?php
    include_once 'include/db.inc.php';
    //make the connection
    $db = new UserManager();
    $conn = $db->createConnection();
    //load the order based by user
    $orders = $db->viewOrder($conn,"progress",8);
    foreach ($orders as $key => $value) {
        echo $value[4];
    }
?>

<button onclick=test()>test</button>

<script>
    // let checker=0;
    // let first=null;
    // let last=null;
    // function test(){
    //     let xttp = new XMLHttpRequest();
    //     xttp.open("POST","include/update.inc.php",true);
    //     xttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    //     param = 'name=Trevis';
    //     xttp.onreadystatechange = function(){
    //         if(this.status == 200 && this.readyState ==4){
    //             // if(checker==0) first = JSON.parse(this.responseText);
    //             // else last = JSON.parse(this.responseText);
    //         }
    //     };
    //     xttp.send(param);
    // }

    // setInterval(() => {
    //     if(checker==0){
    //         test();
    //         console.log(checker);
    //         console.log(first);
    //         checker=1;
    //     }else{
    //         test();
    //         console.log(checker);
    //         console.log(last);
    //         checker=0;
    //     }
    // }, 5000);

</script>

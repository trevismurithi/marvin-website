<?php
    include_once 'include/db.inc.php';
$db = new UserManager();
$conn = $db->createConnection();
echo $db->viewFile($conn,2);
?>

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

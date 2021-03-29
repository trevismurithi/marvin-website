<?php
    include_once 'db.inc.php';
    if(isset($_POST['state'])){
        $db =  new UserManager();
        $conn = $db->createConnection();
        if($_POST['state']=="eject"){
            //get a list of all users
            $users = $db->listener($conn);
            //get the roles with names
            $titles = $db->rolePlay_2($conn);
            foreach ($users as $id => $name) {
                //looking for the writer
                if(array_key_exists($id,$titles)){
                    if($titles[$id]=="Writer"){
                        //assign the user given with the writer
                        $db->assignWriter($conn,$id,$_POST['user_id']);
                    }
                }
            }           
        }else if($_POST['state']=="reject"){
            $db->removeWriter($conn,$_POST['user_id']);
        }
    }
<?php
    include 'db.inc.php';
    if(isset($_POST['user_id'])){
        $receive = $_POST['receiver'];
        $user_id = $_POST['user_id'];
        $db = new UserManager();
        $conn = $db->createConnection();
        $sender = $db->userMessages($conn,$receive,$user_id);
        $receiver = $db->userMessages($conn,$user_id,$receive);
        //merge both of the messages
        $messages = array_merge($sender,$receiver);
        //sort them in the same way they were sent
        ksort($messages);
        foreach ($messages as $key => $value) {
            //depending on the user id it will show text
            if($value[1]==$receive){
                echo'
                    <div class="seller">
                        <div class="receive">
                            <p id=receive>'.$value[0].'</p><br>
                            <div class="time-con">
                                <p id="time">'.date('h:i:s A', strtotime($key)).'</p>
                                <p id="time">'.date('d/m/Y', strtotime($key)).'</p>
                            </div>
                        </div>
                    </div>
                ';
            }else if($value[1]==$user_id){
                echo '
                    <div class="buyer">
                        <div></div>
                        <div class="sent">
                            <p>'.$value[0].'</p>
                            <div class="time-con">
                                <p id="time">'.date('h:i:s A', strtotime($key)).'</p>
                                <p id="time">'.date('d/m/Y', strtotime($key)).'</p>
                            </div>
                        </div>
                    </div>
                ';
            }  
        }
    }

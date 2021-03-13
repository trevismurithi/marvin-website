<?php require 'header.php';?>
<?php 
    if(!isset($_SESSION['username'])){
        header("Location: login.php");
        exit();
    }
?>
<main>
    <div class="chatroom">
        <div class="profile">
            <div class="name-image">
                <img src="img/dwayne.png" alt="">
                <p><?php echo $_SESSION['username'];?></p>
            </div>
            <div class="default-setting">
                <ul>
                    <li><img src="img/write.png" alt=""><p>Writing is a form of art</p></li>
                    <li><img src="img/write.png" alt=""><p><?php echo $_SESSION['email'];?></p></li>
                    <li><img src="img/write.png" alt=""><p><?php echo $_SESSION['phone'];?></p></li>
                </ul>
            </div>
        </div>
        <div class="connect">
            <div class="choose-chat">
                <h2>Chat</h2>
                <div class="user-chat">
                    <div class="user-list">
                        <?php
                            //loading the users available at the moment
                            include 'include/db.inc.php';
                            //create a function that returns a string
                            function chat($id,$name){
                                return'
                                            <div class="one-user">
                                                <div class="user-status">
                                                    <img src="img/admin.jpg" alt="">
                                                    <div class="online"></div>
                                                </div>
                                                <div class="user-content">
                                                    <h6>'.$name.'</h6>
                                                    <p id="short-text">Writing is a form of art...</p>
                                                </div>
                                                <div class="user-time">
                                                    <p>3 March</p>
                                                    <button id='.$id.' onclick=Messages('.$id.','.$_SESSION['user_id'].',"'.$name.'")>text</button>
                                                </div>
                                            </div>
                                        ';
                            }
                            //create a connection and load the users available
                            $db=new UserManager();
                            $conn = $db->createConnection();
                            $users = $db->listener($conn);
                            //create a loop for all users available
                            //the chat should show all users except the main user
                            $role = $db->rolePlay($conn);
                            if(!in_array($_SESSION['user_id'],$role)){
                                foreach ($users as $id => $name) {
                                    //condition not to display same user
                                    //then if admin not to display also the writer
                                    if(in_array($id,$role)){
                                        echo chat($id,$name);
                                    }
                                }
                            }else{
                                foreach ($users as $id => $name) {
                                    //condition not to display same user
                                    //then if admin not to display also the writer
                                    if(!in_array($id,$role)){
                                        echo chat($id,$name);
                                    }
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="chat">
                <div class="current-user">
                    <div class="user-status-chat">
                        <img src="img/writer.jpg" alt="">
                        <div class="online"></div>
                    </div>
                    <h6 id="top-name">.....</h6>
                </div>

                <div id="chat-content" class="chat-content"></div>
                <div class="hide-area">
                    <textarea name="message" id="make-message" cols="30" rows="10" placeholder="type message...."></textarea>
                    <?php
                        echo'
                            <div><button type="submit" onclick=sendMessage('.$_SESSION['user_id'].')>send</button></div>
                        ';
                    ?>
                </div>
            </div>
        </div>
    </div>
</main>
<?php require 'footer.php';?>
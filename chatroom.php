<?php require 'header.php';?>
<?php 
    if(!isset($_SESSION['username'])){
        header("Location: login.php");
        exit();
    }
include 'include/db.inc.php';
$db = new UserManager();
$conn = $db->createConnection();
?>
<main>
    <div class="chatroom">
        <div class="connect">
            <div class="choose-chat">
                <div class="me">
                    <?php
                        $link = $db->viewImage($conn,$_SESSION['user_id']);
                        if(empty($link)){
                            echo '<img src="img/dwayne.png" alt="">';
                        }else{
                            echo '<img src="'.$link.'" alt="">';
                        }
                    ?>
                </div>
                <h2>My Chats</h2>
                <div class="user-chat">
                    <div class="user-list">
                        <?php
                            //loading the users available at the moment
                            $images = $db->viewAllImages($conn);
                            //create a function that returns a string
                            function chat($id,$name,$link,$state){
                                if(empty($state)){
                                    $state="discharged";
                                }else{
                                    $state="allocated";
                                }
                                return'
                                            <div class="one-user">
                                                <div class="user-status">
                                                    <img src="'.$link.'" alt="">
                                                    <div id='.$id.' class="offline"></div>
                                                </div>
                                                <div class="user-content">
                                                    <h6>'.$name.'</h6>
                                                    <p id="short-text">Writing is a form of art...</p>
                                                </div>
                                                <div class="user-time">
                                                    <p id='.$id.'state>'.$state.'</p>
                                                    <button id='.$id.' onclick=Messages('.$id.','.$_SESSION['user_id'].',"'.$name.'","'.$link.'")>text</button>
                                                </div>
                                            </div>
                                        ';
                            }
                            //create a connection and load the users available
                            $users = $db->listener($conn);
                            //create a loop for all users available
                            //the chat should show all users except the main user
                            $role = $db->rolePlay($conn);
                            //get the titles of the roles players
                            $titles = $db->rolePlay_2($conn);
                            if(!in_array($_SESSION['user_id'],$role)){
                                //verify the user if they have been assigned a writer
                                $writerID = $db->verifyUser($conn,$_SESSION['user_id']);
                                //this condition is for user
                                //check if user has a role to play
                                foreach ($users as $id => $name) {
                                    //displays all the users with roles
                                    if(in_array($id,$role)){
                                        if($titles[$id]=="Admin"|| !empty($writerID)){
                                            //check if the key exists
                                            if(array_key_exists($id,$images)){
                                                echo chat($id,$name,$images[$id],$writerID);  
                                            }else{
                                                echo chat($id,$name,"img/unknown.jpg",$writerID);
                                            }
                                        }
                                    }
                                }
                            }else{
                                foreach ($users as $id => $name) {
                                    //this codition is for admin
                                    if(!in_array($id,$role)){
                                        //display only users assigned
                                        $writerID = $db->verifyUser($conn,$id);
                                        if($titles[$_SESSION['user_id']]=="Admin"|| !empty($writerID)){
                                            //display all users without a role
                                            //check if the key exists
                                            if(array_key_exists($id,$images)){
                                                echo chat($id,$name,$images[$id],$writerID);  
                                            }else{
                                                echo chat($id,$name,"img/unknown.jpg",$writerID);
                                            }
                                        }
                                    }
                                }
                            }
                        ?>
                    </div>
                </div>
                <form action="include/upload.inc.php" method="post" enctype="multipart/form-data">
                    <input type="file" name="file" id="file" accept="image/*" required>
                    <button type="submit" name="submit">Change profile</button>
                </form>
            </div>
            <div class="chat">
                <div class="current-user">
                    <div class="user-status-chat">
                        <img id="set-image" src="img/unknown.jpg" alt="">
                        <!-- <div class="offline"></div> -->
                    </div>
                    <h6 id="top-name">.....</h6>
                    <?php
                        if(array_key_exists($_SESSION["user_id"],$titles)){
                            if($titles[$_SESSION["user_id"]]=="Admin"){
                                echo '
                                    <button id="top-id" type="submit">set</button>
                                ';
                            }
                        }
                    ?>
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
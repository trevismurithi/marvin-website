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
        <div class="profile">
            <div class="name-image">
                <?php
                    $link = $db->viewImage($conn,$_SESSION['user_id']);
                    if(empty($link)){
                        echo '<img src="img/dwayne.png" alt="">';
                    }else{
                        echo '<img src="'.$link.'" alt="">';
                    }
                ?>
                <p><?php echo $_SESSION['username'];?></p>
            </div>
            <div class="default-setting">
                <ul>
                    <li><p>Writing is a form of art</p></li>
                    <li><p><?php echo $_SESSION['email'];?></p></li>
                    <li><p><?php echo $_SESSION['phone'];?></p></li>
                </ul>
            </div>
                <form action="include/upload.inc.php" method="post" enctype="multipart/form-data">
                    <p>Image Profile</p>
                    <input type="file" name="file" id="file" accept="image/*" required>
                    <button type="submit" name="submit">upload</button>
                </form>
        </div>
        <div class="connect">
            <div class="choose-chat">
                <h2>Chat</h2>
                <div class="user-chat">
                    <div class="user-list">
                        <?php
                            //loading the users available at the moment
                            $images = $db->viewAllImages($conn);
                            //create a function that returns a string
                            function chat($id,$name,$link){
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
                                                    <p>3 March</p>
                                                    <button id='.$id.' onclick=Messages('.$id.','.$_SESSION['user_id'].',"'.$name.'","'.$link.'")>text</button>
                                                </div>
                                            </div>
                                        ';
                            }
                            //create a connection and load the users available
                            // $db=new UserManager();
                            // $conn = $db->createConnection();
                            $users = $db->listener($conn);
                            //create a loop for all users available
                            //the chat should show all users except the main user
                            $role = $db->rolePlay($conn);
                            if(!in_array($_SESSION['user_id'],$role)){
                                //this condition is for user
                                //check if user has a role to play
                                foreach ($users as $id => $name) {
                                    //displays all the users with roles
                                    if(in_array($id,$role)){
                                        //check if the key exists
                                        if(array_key_exists($id,$images)){
                                            echo chat($id,$name,$images[$id]);  
                                        }else{
                                            echo chat($id,$name,"img/dwayne.png");
                                        }
                                    }
                                }
                            }else{
                                foreach ($users as $id => $name) {
                                    //this codition is for admin
                                    if(!in_array($id,$role)){
                                        //display all users without a role
                                        //check if the key exists
                                        if(array_key_exists($id,$images)){
                                            echo chat($id,$name,$images[$id]);  
                                        }else{
                                            echo chat($id,$name,"img/dwayne.png");
                                        }
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
                        <img id="set-image" src="img/dwayne.png" alt="">
                        <!-- <div class="offline"></div> -->
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
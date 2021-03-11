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
                        <div class="one-user">
                            <div class="user-status">
                                <img src="img/admin.jpg" alt="">
                                <div class="online"></div>
                            </div>
                            <div class="user-content">
                                <h6>Carlos Santino(Admin)</h6>
                                <p>Hello and welcome feel..</p>
                            </div>
                            <div class="user-time">
                                <p>3 March</p>
                                <button>reply</button>
                            </div>
                        </div>

                        <div class="one-user">
                            <div class="user-status">
                                <img src="img/writer.jpg" alt="">
                                <div class="online"></div>
                            </div>
                            <div class="user-content">
                                <h6>Paul John(Writer)</h6>
                                <p>I am here at your service..</p>
                            </div>
                            <div class="user-time">
                                <p>3 March</p>
                                <button>reply</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="chat">
                <div class="current-user">
                    <div class="user-status-chat">
                        <img src="img/writer.jpg" alt="">
                        <div class="online"></div>
                    </div>
                    <h6>Paul John(Writer)</h6>
                </div>
                <div class="chat-content">
                    <div class="seller">
                        <div class="receive"><img src="img/writer.jpg" alt=""><p>Hello Detroit</p></div>
                    </div>
                    <div class="buyer">
                        <div></div>
                        <div class="sent"><img src="img/dwayne.png" alt=""><p>Hello John</p></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php require 'footer.php';?>
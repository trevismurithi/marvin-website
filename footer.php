<footer>
    <?php require_once 'include/details.inc.php'?>
    <div class="navigation">
        <div>
            <h5>Menu</h5>
            <li><a href="#">How it Works</a></li>
            <li><a href="#">Get Started</a></li>
            <li><a href="#">About Us</a></li>
            <li><a href="#">FAQ</a></li>
            <li><a href="#">Contact Us</a></li>
        </div>
        <div>
            <h5>ARTICLES</h5>
            <p>The Neuroscience of Writing
                5 Writing Tips That Will Grab 
                Your Readers Attention
            </p>
        </div>
        <div>
            <h5>ARTICLES</h5>
            <p>The Neuroscience of Writing
                5 Writing Tips That Will Grab 
                Your Readers Attention
            </p>   
        </div>
        <div>
            <h5>Contact Us</h5>
            <li><a href="#">support@essaypro.website</a></li> 
        </div>
    </div>
    <div class="whole-list-service">
        <h5>Services</h5>
        <div class="horizontal"></div>
        <div class="service-columns">
            <div class="service-columns-1">
                <?php
                    foreach ($type_writing as $key => $value) {
                        if($key < 8){
                            echo'<p>'.$value.'</p>';
                        }
                    }
                ?>
            </div>
            <div class="service-columns-2">
                <?php
                    foreach ($type_writing as $key => $value) {
                        if($key > 7 && $key<16){
                            echo'<p>'.$value.'</p>';
                        }
                    }
                ?>
            </div>
            <div class="service-columns-3">
                <?php
                    foreach ($type_writing as $key => $value) {
                        if($key > 15 && $key<24){
                            echo'<p>'.$value.'</p>';
                        }
                    }
                ?>
            </div>
            <div class="service-columns-4">
                <?php
                    foreach ($type_writing as $key => $value) {
                        if($key >24){
                            echo'<p>'.$value.'</p>';
                        }
                    }
                ?>
            </div>
        </div>
    </div>
    <div class="line-hr"></div>
    <div class="rights">
        <li><a href="#">Terms & Conditions</a></li>
        <li><a href="#">@ 2021 essaypro.website All rights reserved</a></li>
    </div>
</footer>
<script src="js/nav.js"></script>
<script src="js/app.js"></script>
<script src="js/chat.js"></script>
<?php 
    if(isset($_SESSION['user_id'])){
        if(!isset($_SESSION['role'])){
            echo'
                <script>
                    requestFiles('.$_SESSION['user_id'].');
                </script>
            ';
        }
    }
?>
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
</body>
</html>
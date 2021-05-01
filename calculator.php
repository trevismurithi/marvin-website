<?php require 'header.php';?>
<?php require_once 'include/details.inc.php'; 
require_once 'include/content.inc.php';
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}else{
    if(isset($_SESSION['role'])){
        header("Location: index.php?access=denied");
        exit();
    }
}
?>
<main>
    <div class="success-page">
        <div class="success-page-1">
            <lottie-player src="https://assets2.lottiefiles.com/packages/lf20_ZofvJX.json"  
            background="transparent"  speed="1"  
            style="width: 400px; height: 400px;"  loop  autoplay>
            </lottie-player>
            <div class="success-page-2">
                <h2>Create An Order Today</h2>
                <p>We take very seriously every order you make.</p>
                <p>Use the form below to select the service you desire.</p>
                <p>The form will calculate for you the price based on the servie.</p>
                <p>Below are further steps to guide you through the whole process.</p>
                <p>You can also reach us through support@essaypro.website for immediate feedback.</p>
            </div>
        </div>
    </div>
    <form class="calculator-form" style="width:50%; height:50vh; margin:auto;" action="include/calculator.inc.php" method="post">
        <h3 style="color:#228B22">Create Order</h3>
        <div class="form-select-0">
            <select id="select_type" name="select_type">
                <option value="0">Write</option>
                <option value="1">Rewrite</option>
                <option value="2">Edit</option>
            </select>
        </div>
        <div class="form-select-1">
            <select id="type_writing" name="type_writing">
                <?php
                    for ($i=0; $i < count($type_writing); $i++) { 
                        echo'<option value="'.$i.'">'.$type_writing[$i].'</option>';
                    }
                ?>
            </select>
        </div>
        <div class="form-select-2">
            <select id="university" name="university">
                <?php
                    for ($i=0; $i < count($grade); $i++) { 
                        echo'<option value="'.$i.'">'.$grade[$i].'</option>';
                    }
                ?>
            </select>

            <select id="duration" name="duration">
                <?php
                    for ($i=0; $i < count($duration); $i++) { 
                        echo'<option value="'.$i.'">'.$duration[$i].'</option>';
                    }
                ?>
            </select>
        </div>
        <div class="form-select-1">
            <select id="pages_words" name="pages_words">
                <?php
                    for ($i=0; $i <400; $i++) { 
                        echo'<option value="'.$i.'">'.($i+1).'page / '.(275*($i+1)).' words</option>';
                    }
                ?>
            </select>
        </div>                   
        <div class="form-check-2">
            <label for="double">Double spaces</label>
            <input type="radio" name="double" value="double" id="double">
            <label for="single">Single spaces</label>
            <input type="radio" name="single" value="single" id="single">
        </div>
        <div class="cut-off">
            <lottie-player id="lottie" class="hide" src="https://assets8.lottiefiles.com/packages/lf20_Cemmpu.json"  
            background="transparent"  
            speed="1"  
            style="width: 30px; height: 30px;"  
            loop  autoplay></lottie-player>
            <p id="price">$...</p>
            <input type="text" name="price" id="h-price" style="display:none">
        </div>
        <button class="btn-submit" name="submit" type="submit">Create Order</button>
    </form>
    <br>
    <div class="steps-demo">
        <!-- <img src="img/cover_banner.jpg" alt=""> -->
        <lottie-player src="https://assets9.lottiefiles.com/packages/lf20_yolfhtxf.json" 
        background="#E5E6E9"  
        speed="1"  style="width:100%"  
        loop  autoplay></lottie-player>
        <div id="works-row" class="works-row">
            <?php
                for ($i=0; $i <count($work); $i++) {
                    $index = $i+1; 
                    echo'
                        <div class="step">
                            <div class="step-img">
                                <img src="img/file'.$index.'.png" alt="">
                            </div><br>
                            <h4>'.$work[$i][0].'</h4><br>
                            <p>
                                '.$work[$i][1].'
                            </p>
                            <div class="step-num"><p>'.$index.'</p></div>
                        </div>
                    ';
                }
            ?>
        </div>
    </div>
    <br>
    <br>
</main>

<?php require 'footer.php';?>
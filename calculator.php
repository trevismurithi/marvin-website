<?php require 'header.php';?>
<?php require_once 'include/details.inc.php'; 
if(isset($_SESSION['role'])){
    header("Location: index.php?access=denied");
    exit();
}
?>
<main>
    <div class="container">
        <div class="image-content">
            <!-- <img src="img/cover_banner.jpg" alt=""> -->
            <lottie-player src="https://assets9.lottiefiles.com/packages/lf20_yolfhtxf.json"
            background="#E5E6E9"
            speed="1"  style="width:100%"
            loop  autoplay></lottie-player>
            <div class="image-context">
                <div class="image-details">
                    <p><span>Writing service</span> at your own convinience</p>
                    <h1>Hire Your Personal Essay Writer Today</h1><br>
                    <h5>Essay writing service for students who want to see results twice as fast.</h5><br>
                    <p><a href="#">Records</a></p>
                </div>
                <form class="calculator-form" action="include/calculator.inc.php" method="post">
                    <h3>calculate the price</h3>
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
                    <button class="btn-submit" name="submit" type="submit">Write My Paper</button>
                </form>
            </div>
        </div>
    </div>
</main>

<?php require 'footer.php';?>
<?php require 'header.php';?>
<?php 
    require_once 'include/details.inc.php'; 
    require_once 'include/content.inc.php';
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
                    <p><a href="#">Write My Paper</a></p>
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
                    <button class="btn-submit" name="write-paper" type="submit">Write My Paper</button>
                </form>
            </div>
        </div>
        <div class="benefits">
            <h2>Why Choose Us</h2>
        </div>
        <div id="entail" class="entail">
            <?php
                for ($i=0; $i < count($entail); $i++) { 
                    echo'
                        <div class="row1">';
                        foreach ($entail[$i] as $content) {
                            echo '
                                <ul>
                                    <li><img src="'.$content[0].'" width="70px" alt=""></li>
                                    <li>
                                        <h4>'.$content[1].'</h4><br>
                                        <p>'.$content[2].'</p>
                                    </li>
                                </ul> 
                            ';
                        }            
                        echo'</div>';
                }
            ?>
        </div>
        <div class="work">
            <h2>How it Works</h2>
        </div>
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
        <div class="services">
            <h2>Available Samples</h2>
        </div>
        <div class="available-services">
            <div class="projects">
                <?php 
                foreach ($samples as $link=>$sample) {
                    echo '<div class="single">';
                    foreach ($sample as $key => $value) {
                        echo'
                            <p><span>'.$key.':</span>'.$value.'</p>                                
                        ';
                    }
                    echo '
                            <div class="horizontal"></div>
                            <p><a href="'.$link.'">view sample</a></p>
                            </div>
                        ';
                    }
                ?>
            </div>
            <div class="view-projects">
                <a href="#">view all samples</a>
            </div>
            <br>
        </div>
        <div class="testimonials">
            <h2>Testimonials</h2>
        </div>
        <div class="direct">
            <a href="#slide1">1</a>
            <a href="#slide2">2</a>
            <a href="#slide3">3</a>
        </div>
        <div class="holder">
            <button id="next">&#8250;</button>
            <button id="back">&#8249;</button>
            <div class="benecont">
            <?php
                $i = 1;
                foreach ($testimonies as $value) {
                    echo '<div class="beneficiary-main" id="slide'.$i.'">';
                    foreach ($value as $content) {
                        echo 
                        '
                            <div class="beneficiary-card">
                                <div class="img-details">
                                    <img src="'.$content[0].'" alt="">
                                    <div class="name-rating">
                                        <h5>'.$content[1].'</h5>
                                        <i class="fa fa-star checked" aria-hidden="true"></i>
                                        <i class="fa fa-star checked" aria-hidden="true"></i>
                                        <i class="fa fa-star checked" aria-hidden="true"></i>
                                        <i class="fa fa-star checked" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <hr style="border-top: dotted 2px;" />
                                <div class="beneficiary-body">
                                    <h4>'.$content[2].'</h4>
                                    <br>
                                    <p>
                                        '.$content[3].'
                                    </p>
                                </div>
                                <hr style="border-top: dotted 2px;" />
                                <div class="beneficiary-footer">
                                    <img src="https://assets.website-files.com/5e5d4354e4bb2065e7524459/5f7f2282fe19c04c8f6c6224_Group%207062.svg" 
                                    alt="" loading="lazy" aria-hidden="true">
                                    <p>'.$content[4].'</p>
                                </div>
                            </div>
                        ';
                    }
                    echo '</div>';
                    $i++;
                }
            ?>
            </div>
        </div>
        <div class="join-us"><br>
            <a href="#">Join Us</a><br>
        </div><br>
    </div>
</main>
<img src="img/whatsapp.png" width="50px" style="position: fixed; left:2%; bottom:5%;" alt="">
<script src="js/slide.js"></script>
<?php require 'footer.php';?>
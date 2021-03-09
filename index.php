<?php require 'header.php';?>

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
                <form class="calculator-form" action="" method="post">
                    <h3>calculate the price</h3>
                    <div class="form-btn-3">
                        <input id="write" type="button" value="Writing">
                        <input id="rewrite" type="button" value="Rewriting">
                        <input id="edit" type="button" value="Editing">
                    </div>
                    <div class="form-select-1">
                        <select id="select-type" name="article">
                            <option value="1">Essay</option>
                            <option value="2">Admission</option>
                        </select>
                    </div>
                    <div class="form-select-2">
                        <select id="university" name="university">
                            <option value="1">school</option>
                            <option value="2">college</option>
                        </select>

                        <select id="week" name="Week">
                            <option value="1">1 week</option>
                            <option value="2">2 week</option>
                        </select>
                    </div>
                    <div class="form-select-1">
                        <select id="article" name="article">
                            <option value="1">Accounts</option>
                            <option value="2">Research</option>
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
                        <p id="price">$16.60</p>
                    </div>
                    <button class="btn-submit" name="write-paper" type="submit">Write My Paper</button>
                </form>
            </div>
        </div>
        <div class="benefits">
            <h2>Why Choose Us</h2>
            <img src="img/graph.png" alt="">
        </div>
        <div class="entail">
            <?php
                for ($i=0; $i < 3; $i++) { 
                    echo'
                        <div class="row1">
                            <ul>
                                <li><img src="img/benefit1.png" alt=""></li>
                                <li>
                                    <h4>Outstanding Quality</h4><br>
                                    <p>All our works have one thing in common - the highest quality. We work hard to deliver you only the best papers.</p>
                                </li>
                            </ul>      
                            <ul>
                                <li><img src="img/benefit2.png" alt=""></li>
                                <li>
                                    <h4>Outstanding Quality</h4><br>
                                    <p>All our works have one thing in common - the highest quality. We work hard to deliver you only the best papers.</p>
                                </li>
                            </ul> 
                            <ul>
                                <li><img src="img/benefit3.png" alt=""></li>
                                <li>
                                    <h4>Outstanding Quality</h4><br>
                                    <p>All our works have one thing in common - the highest quality. We work hard to deliver you only the best papers.</p>
                                </li>
                            </ul>           
                        </div>
                    ';
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
            <div class="works-row">
                <?php
                    for ($i=0; $i <4; $i++) {
                        $index = $i+1; 
                        echo'
                            <div class="step">
                                <div class="step-img">
                                    <img src="img/benefit'.$index.'.png" alt="">
                                </div><br>
                                <h4>You place your order</h4><br>
                                <p>
                                    To get started, you need to complete an order form on our website. 
                                    Ask our Support managers for help if you got stuck on one of the steps. 
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
                    for ($i=0; $i < 4; $i++) { 
                        echo'
                            <div class="single">
                                <p><span>Type of paper:</span> Lifestyle Article</p>
                                <p><span>Topic: </span>Fashion Race</p>
                                <p><span>Due Date: </span>March 5</p>
                                <div class="horizontal"></div>
                                <p><a href="#">view sample</a></p>
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
        <div class="beneficiary">
            <img src="img/dwayne.png" alt="">
            <div class="beneficiary-details">
                <h5>Dwayne Johnson</h6>
                <p><span>Joined in April 2016</span></p>
                <br>
                <p>I have been using WritersHub since 2016, 
                    and I have to say that it is a very useful platform for those who want to transform skills into earning. 
                    I would like to express my sincere gratitude to the QA team for their professional guidance 
                    and Support Department for their 24/7 help. Also, I am espe...
                </p>
                <br>
                <a href="#">Show more</a>
            </div>
        </div>
        <div class="join-us"><br>
            <a href="#">Join Us</a><br>
        </div><br>
    </div>
</main>

<?php require 'footer.php';?>
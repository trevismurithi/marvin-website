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
                    <p><a href="#">Records</a></p>
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
    </div>
</main>

<?php require 'footer.php';?>
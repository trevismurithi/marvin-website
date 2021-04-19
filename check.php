<?php include 'header.php'?>
<style>
.beneficiary-main{
    margin: 8px;
    display: flex;
    flex-direction: row;
}

.beneficiary-card{
    width: 300px;
    height: 300px;
    background-color: white;
    padding: 16px;
    border-radius: 10px;
    display: flex;
    flex-direction: column;
    justify-content: space-around;
    flex-shrink: 0;
    margin: 10px;
}

.img-details{
    display: flex;
    flex-direction: row;
    align-items: center;
    width: 100%;
    padding: 8px;
}

.img-details img{
    width: 50px;
    height: 50px;
    border-radius: 100%;
    margin-right: 8px;
}

.beneficiary-body{
    padding: 8px;
    font-family: Arial, Helvetica, sans-serif;
}
.beneficiary-footer{
    padding: 8px;
    font-family: Arial, Helvetica, sans-serif;
    display: flex;
    justify-content: space-between;
}
</style>
<main>
    <?php
        include 'include/content.inc.php';
        $i = 0;
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
    <div class="beneficiary-main" id="slide'.$i.'">
        <div class="beneficiary-card">
            <div class="img-details">
                <img src="img/grandma.jpg" alt="">
                <div class="name-rating">
                    <h5>Nana Johnson</h5>
                    <i class="fa fa-star checked" aria-hidden="true"></i>
                    <i class="fa fa-star checked" aria-hidden="true"></i>
                    <i class="fa fa-star checked" aria-hidden="true"></i>
                    <i class="fa fa-star checked" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                </div>
            </div>
            <hr style="border-top: dotted 2px;" />
            <div class="beneficiary-body">
                <h4>The easiest way to finish things</h4>
                <br>
                <p>
                    I had a million requirements from my professor that I just copy-pasted into the order form.
                </p>
            </div>
            <hr style="border-top: dotted 2px;" />
            <div class="beneficiary-footer">
                <img src="https://assets.website-files.com/5e5d4354e4bb2065e7524459/5f7f2282fe19c04c8f6c6224_Group%207062.svg" 
                alt="" loading="lazy" aria-hidden="true">
                <p>24 Sept 2020</p>
            </div>
        </div>
    </div>
</main>
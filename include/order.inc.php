<?php
    include 'db.inc.php';
    session_start();
    //load the orders based on the users request
    if(isset($_POST['user_id'])){
        //load the connections
        $db = new UserManager();
        $conn = $db->createConnection();
        //load the orders
        $orders = $db->viewOrder($conn,$_POST['state'],$_POST['user_id']);
        //determine the name of the button
        $btnName = "";
        //determine the fuction that will be called
        $caller = "";
        //disable button text
        $numb = "";
        //transfer text
        $transfer = "";
        //button
        $button="";
        
        if($_POST['state']=="progress"){
            $btnName="Confirm";
            //if not admin then display
            if(!isset($_SESSION['role'])){
                $caller='class="hide_"';
            }
            $transfer="complete";
        }
        else if($_POST['state']=="cancel") {$btnName="Renew";$caller='';$transfer="progress";}
        else if($_POST['state']=="pending") {
            $btnName="Purchase";$caller='';$transfer="progress";
        }
        else if($_POST['state']=="complete") {
            $btnName="Upload";
            if(!isset($_SESSION['role'])){
                $caller='class="hide_"';
            }
            $numb='disabled="disabled"';
            $transfer="complete";}
        echo'
                <tr>
                    <th id="mobile">ORDER</th>
                    <th>SECTOR</th>
                    <th>TYPE</th>
                    <th>CATEGORY</th>
                    <th>DURATION</th>
                    <th id="mobile">SPACING</th>
                    <th id="mobile">PAGES</th>
                    <th id="mobile">DEADLINE</th>
                    <th id="mobile">FEE</th>
                    <th>ACTION</th>
                </tr>
        ';
        foreach ($orders as $key => $value) {
            echo'
                <tr>
                    <td id="mobile">'.$value[0].'</td>
                    <td>'.$value[1].'</td>
                    <td>'.$value[2].'</td>
                    <td>'.$value[3].'</td>
                    <td>'.$value[4].'</td>
                    <td id="mobile">'.$value[5].'</td>
                    <td id="mobile">'.$value[6].'</td>
                    <td id="mobile">'.$value[7].'</td>
                    <td id="mobile">'.$value[8].'</td>
                    <td>';

            if($_POST['state']=="pending" || $_POST['state']=="progress"){
                echo '<button id="'.$value[0].'_" onclick=progressOrder('.$value[0].','.$_POST['user_id'].',"'.$_POST['state'].'","cancel")>Cancel</button>';
            }
            if($_POST['state']=="progress" && isset($_SESSION['role'])){
                echo'
                        <button id="'.$value[0].'_" '.$caller.' onclick=progressOrder('.$value[0].','.$_POST['user_id'].',"'.$_POST['state'].'","'.$transfer.'")>'.$btnName.'</button>
                        </td>
                    </tr>
                ';
            }else if($_POST['state']=="complete" && isset($_SESSION['role'])){
                $link = $db->viewFile($conn,$value[0]);
                if(empty($link)){
                        echo'   
                                <form action="include/file.inc.php" method="post" enctype="multipart/form-data">
                                    <input type="file" name="file" id="file" class="file-select" accept="application/pdf,application/msword" required>
                                    <button type="submit" name="submit" id="'.$value[0].'_" value="'.$value[0].'">'.$btnName.'</button>
                                </form>
                                </td>
                            </tr>
                        ';
                }else{
                    echo '
                        <a href="'.$link.'">Download file</a>
                    ';
                }
            }else if($_POST['state']=="complete" && !isset($_SESSION['role'])){
                //if this is the user
                $link = $db->viewFile($conn, $value[0]);
                if(!empty($link)){
                    echo '
                        <a href="'.$link.'">Download file</a>
                    ';                 
                }

            }else if($_POST['state']=="pending"){
                echo'
                        <button id="'.$value[0].'_" '.$caller.' onclick=paymentSytem('.$value[0].','.$_POST['user_id'].',"'.$_POST['state'].'","'.$transfer.'")>'.$btnName.'</button>
                        </td>
                    </tr>
                ';
            }else if($_POST['state']=="cancel"){
                echo'
                        <button id="'.$value[0].'_" '.$caller.' onclick=progressOrder('.$value[0].','.$_POST['user_id'].',"'.$_POST['state'].'","'.$transfer.'")>'.$btnName.'</button>
                        </td>
                    </tr>
                ';
            }

        }
    }


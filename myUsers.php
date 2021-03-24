<?php include_once 'header.php';
    include_once 'include/db.inc.php';
//only allow an admin
if(!isset($_SESSION['role'])){
    header("Location: order.php?access=denied");
    exit();
}
?>
<main>
  <div class="order">
        <div class="butt-header">
            <div></div>
            <h3 id="order-header">Users with Orders</h3>
        </div>
        <div class="records">
            <table id="table_main">
                <tr>
                    <th>USERNAME</th>
                    <th>DISPLAY NAME</th>
                    <th>EMAIL</th>
                    <th>PROGRESS</th>
                    <th>COMPLETED</th>
                    <th>ACTION</th>
                </tr>
                <?php
                    //display names of users we have
                    $db = new UserManager();
                    //create the connection
                    $conn = $db->createConnection();
                    //get users details
                    $users = $db->userDetails($conn);
                    //only display users who do not have roles
                    $roles = $db->rolePlay($conn);
                    foreach ($users as $key => $value) {
                        if(!in_array($key,$roles)){
                            //get order from user
                            $progress = $db->viewOrder($conn,"progress",$key);
                            $complete = $db->viewOrder($conn,"complete",$key);
                            echo'<tr>';
                            echo '<td>'.$value[0].'</td>';
                            echo '<td>'.$value[1].'</td>';
                            echo '<td>'.$value[2].'</td>';
                            echo '<td>'.count($progress).'</td>';
                            echo '<td>'.count($complete).'</td>';
                            if(count($progress) != 0 && count($complete)!=0){
                                echo '  <form action="include/open.inc.php" method="POST">
                                            <td><button type="submit" name="submit" value="'.$key.'">view</button></td>
                                        </form>';
                            }
                            echo'</tr>';
                        }
                    }
                ?>
            </table>
        </div>
  </div>  
</main>
<script src="js/order.js"></script>
<?php include_once 'footer.php';?>
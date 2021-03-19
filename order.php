<?php require 'header.php';?>
<?php require_once 'include/db.inc.php';
?>
<main>
    <div class="order">
        <div class="butt-header">
            <button id="progress" onclick=loadData(<?php echo $_SESSION['user_id'].','.'"progress"';?>,)>Progress Order</button>
            <button id="complete" onclick=loadData(<?php echo $_SESSION['user_id'].','.'"complete"';?>)>Completed Order</button>
            <button id="cancel" onclick=loadData(<?php echo $_SESSION['user_id'].','.'"cancel"';?>)>Cancelled Order</button>
            <button id="pending" onclick=loadData(<?php echo $_SESSION['user_id'].','.'"pending"';?>)>Pending Order</button>
        </div>
        <div class="records">
            <table id="table_main">
                <tr>
                    <th>ORDER</th>
                    <th>SECTOR</th>
                    <th>TYPE</th>
                    <th>CATEGORY</th>
                    <th>DURATION</th>
                    <th>SPACING</th>
                    <th>PAGES</th>
                    <th>DEADLINE</th>
                    <th>FEE</th>
                    <th>ACTION</th>
                </tr>
                <?php 
                    //make the connection
                    $db = new UserManager();
                    $conn = $db->createConnection();
                    //know if the user has a role
                    $roles = $db->rolePlay($conn);
                    if(in_array($_SESSION['user_id'],$roles)){
                        $_SESSION['role'] = "role";
                    }
                    //load the order based by user
                    $orders = $db->viewOrder($conn,"progress",$_SESSION['user_id']);
                    foreach ($orders as $key => $value) {
                        echo'
                            <tr>
                                <td>'.$value[0].'</td>
                                <td>'.$value[1].'</li>
                                <td>'.$value[2].'</td>
                                <td>'.$value[3].'</td>
                                <td>'.$value[4].'</td>
                                <td>'.$value[5].'</td>
                                <td>'.$value[6].'</td>
                                <td>'.$value[7].'</td>
                                <td>'.$value[8].'</td>
                                <td>
                                    <button id="'.$value[0].'" onclick=progressOrder('.$value[0].','.$_SESSION['user_id'].',"progress","cancel")>Cancel</button>
                                    <button id="'.$value[0].'" class="hide_" onclick=progressOrder('.$value[0].','.$_SESSION['user_id'].',"progress","complete")>Confirm</button>
                                </td>
                            </tr>
                        ';
                    }
                ?>
            </table>
        </div>
    </div>
</main>
<script src="js/order.js"></script>
<?php require 'footer.php';?>

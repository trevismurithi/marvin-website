<?php include_once 'header.php';?>
<?php require_once 'include/db.inc.php';?>
<?php require_once 'include/db.inc.php';
//only allow an admin
if (!isset($_SESSION['role'])) {
    header("Location: order.php?access=denielrole");
    exit();
} else {
    $db = new UserManager();
    $conn = $db->createConnection();
    //confirm if the user records exists
    $complete = $db->viewOrder($conn, "complete", $_GET['user_id']);
    $progress = $db->viewOrder($conn, "progress", $_GET['user_id']);
    if (count($complete) == 0 && count($progress) == 0) {
        header("Location: myUsers.php?access=norecords", true);
        exit();
    }
}
?>
<main>
    <div class="order">
        <div class="butt-header">
            <div>
                <button id="progress" onclick=loadData(<?php echo $_GET['user_id'].','.'"progress"';?>)>Progress Order</button>
                <button id="complete" onclick=loadData(<?php echo $_GET['user_id'].','.'"complete"';?>)>Completed Order</button>
            </div>
            <h3 id="order-header">progress order</h3>
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
                    //load the order based by user
                    $orders = $db->viewOrder($conn,"progress",$_GET['user_id']);
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
                                    <button id="'.$value[0].'" onclick=progressOrder('.$value[0].','.$_GET['user_id'].',"progress","cancel")>Cancel</button>
                                    <button id="'.$value[0].'" onclick=progressOrder('.$value[0].','.$_GET['user_id'].',"progress","complete")>Confirm</button>
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
<?php include_once 'header.php';?>
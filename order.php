<?php require 'header.php';?>
<main>
    <div class="order">
        <div class="butt-header">
            <button id="record">Progress Order</button>
            <button id="record">Completed Order</button>
            <button id="record">Cancelled Order</button>
            <button id="record">Pending Order</button>
        </div>
        <div class="records">
            <table>
                <tr>
                    <th>ORDER</th>
                    <th>DETAILS</th>
                    <th>DEADLINE</th>
                    <th>FEE</th>
                    <th>ACTION</th>
                </tr>
                <tr>
                    <td>001</td>
                    <td><li>Essay writing</li>
                    <li>duration one week</li></td>
                    <td>3/16/2021</td>
                    <td>$56.90</td>
                    <td><button>EDIT</button><button>CANCEL</button></td>
                </tr>
            </table>
        </div>
    </div>
</main>

<?php require 'footer.php';?>
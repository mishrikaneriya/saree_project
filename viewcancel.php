<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>

        <style>
            h1{
                text-align: center;
            }
            table, th, td {
                border: 1px solid black;
                border-collapse: collapse;
            }
            th, td {
                padding: 10px;
                text-align: left;
            }

        </style>

    </head>
    <body>
        <h1>CANCEL ORDER DETAILS</h1>
        <form method="GET"></form>
        <?php
        
        $con = mysqli_connect("localhost", "root", "", "sareeproject")or die(mysqli_connect_error());
        echo '<center>';

        $query = "select tbl_cancelorder.cancelorder_id ,tbl_cancelorder.reason,tbl_product.price,tbl_order.total_amount,tbl_product.pname,tbl_product.description from tbl_cancelorder JOIN tbl_order ON tbl_cancelorder.order_id=tbl_order.order_id JOIN tbl_product ON tbl_order.product_id=tbl_product.product_id";
        $qyr = mysqli_query($con, $query);
        /*if($qyr)
        {
            echo 'success';
        }
        else{
            echo mysqli_error($qyr);
        }*/
        /*if ($qyr->num_rows > 0) {
            while ($row = $qyr->fetch_assoc()) {
                $total_amount = $row['price'] * $row['quantity'];  // Calculation for the specific ID
            }
            
        }*/
        if (mysqli_num_rows($qyr) > 0) {

            echo '<table>';

            echo '<tr>';
            echo '<th>Cancel Order ID</th>';
            echo '<th>Reason</th>';
            echo '<th>Price</th>';
            echo '<th>Total amount</th>';
            echo '<th>product name</th>';
            echo '<th>description</th>';
            echo '</tr>';

            while ($row = mysqli_fetch_assoc($qyr)) {
                echo '<tr>';
                echo '<td>', $order_id = $row['cancelorder_id'], '</td>';
                echo '<td>', $reason = $row['reason'], '</td>';
                echo '<td>', $price = $row['price'], '</td>';
                echo '<td>', $total_amount = $row['total_amount'], '</td>';
                echo '<td>', $pname = $row['pname'], '</td>';
                echo '<td>', $description = $row['description'], '</td>';

                echo '</tr>';
            }
            echo '</table>';
        }
        echo '</center>';
        ?>

    </body>
</html>
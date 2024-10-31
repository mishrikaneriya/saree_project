
<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Order Details</title>

        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f0f0f0;
            }

            .container {
                max-width: 800px;
                margin: 40px auto;
                padding: 20px;
                background-color: #fff;
                border-radius: 10px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }

            h1 {
                text-align: center;
                margin-bottom: 20px;
            }

            table {
                border-collapse: collapse;
                width: 100%;
                margin-bottom: 20px;
            }

            th, td {
                border: 1px solid #ddd;
                padding: 10px;
                text-align: left;
            }

            th {
                background-color: #f0f0f0;
            }

            tr:nth-child(even) {
                background-color: #f9f9f9;
            }

            tr:hover {
                background-color: #f2f2f2;
            }

            .glassmorphism {
                background-color: rgba(255, 255, 255, 0.2);
                border-radius: 10px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                backdrop-filter: blur(10px);
            }
        </style>

    </head>
    <body>
        <div class="container glassmorphism">
            <h1>ORDER DETAILS</h1>
            <form method="GET"></form>
            <?php
        
            $con = mysqli_connect("localhost", "root", "", "sareeproject")or die(mysqli_connect_error());

            $query = "select tbl_order.order_id ,tbl_order.quantity,tbl_product.price,tbl_order.total_amount,tbl_product.pname,tbl_product.description from tbl_order JOIN tbl_product ON tbl_order.product_id=tbl_product.product_id";
            $qyr = mysqli_query($con, $query);
            
            if (mysqli_num_rows($qyr) > 0) {

                echo '<table>';

                echo '<tr>';
                echo '<th>Order ID</th>';
                echo '<th>Quantity</th>';
                echo '<th>Price</th>';
                echo '<th>Total amount</th>';
                echo '<th>product name</th>';
                echo '<th>description</th>';
                echo '</tr>';

                while ($row = mysqli_fetch_assoc($qyr)) {
                    echo '<tr>';
                    echo '<td>', $order_id = $row['order_id'], '</td>';
                    echo '<td>', $quantity = $row['quantity'], '</td>';
                    echo '<td>', $price = $row['price'], '</td>';
                    echo '<td>', $total_amount = $row['total_amount'], '</td>';
                    echo '<td>', $pname = $row['pname'], '</td>';
                    echo '<td>', $description = $row['description'], '</td>';

                    echo '</tr>';
                }
                echo '</table>';
            }
            ?>
        </div>

      <script>
    function printDiv() {
        var divContents = document.getElementById("printDiv").innerHTML;
        var a = window.open('', '', 'height=500, width=500');
        a.document.write('<html>');
        a.document.write('<body >');
        a.document.write(divContents);
        a.document.write('</body></html>');
        a.document.close();
        a.print();
    }
</script>
    </body>  
</html>

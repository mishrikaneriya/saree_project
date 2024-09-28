
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Saree selling</title>
        <style>
            .error{
                color:#ff3333;
            }
            body {
                font-family: Arial, sans-serif;
                font-size: 16px;
                background-color: #f4f4f4;
                color: #333;
                padding: 15px;
            }
            h1 {
                color: #555;
            }
            table {
                width: 100%;
                margin: 8px auto;
                border-collapse: collapse;
                box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
                background-color: #fff;


            }
            th, td {
                padding: 10px;
                text-align: left;
                border:2px solid #E1C3C8;

            }
            th {
                color: white;
                background-color: #B76E79;
                border-radius: 5px;
            }

            form {
                width: 80%;
                margin: 20px auto;
                padding: 20px;
                background-color: #fff;
                border: 1px solid #ddd;
                border-radius: 5px;
                box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            }
            label {
                display: inline-block;
                width: 150px;
                font-weight: bold;
            }
            input[type="text"], input[type="file"] {
                width: calc(100% - 160px);
                padding: 8px;
                margin-bottom: 10px;
                border: 2px solid #ddd;
                border-radius: 4px;
                font-size: 16px;
            }
            input[type="submit"], input[type="reset"] {
                padding: 10px 20px;
                margin-top: 10px;
                background-color: #B76E79;
                border: none;
                color: white;
                cursor: pointer;
                border-radius: 5px;
                box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            }
            input[type="submit"]:hover, input[type="reset"]:hover {
                background-color: #8c2246;
            }
            select {
                width: 60px ;
                padding: 8px;
                margin-bottom: 10px;
                border: 2px solid #ddd;
                border-radius: 4px;
                font-size: 16px;
            }
            .csv {
                background-color: #5bc0de;
                padding: 15px;
                border-radius: 5px;
                margin-top: 30px;
            }
        </style>
        <script>
            function validateForm() {
                var pname = document.forms["sareeForm"]["txtname"].value;
                var price = document.forms["sareeForm"]["txtprice"].value;
                var description = document.forms["sareeForm"]["txtdesc"].value;
                var fabric = document.forms["sareeForm"]["txtfabric"].value;
                var color = document.forms["sareeForm"]["txtcolor"].value;
                var type = document.forms["sareeForm"]["txttype"].value;

                var nameErr = priceErr = descErr = fabricErr = colorErr = typeErr = "";
                var isValid = true;

                var namePattern = /^[a-zA-Z' -]+$/;
                if (pname == "") {
                    nameErr = "product name is required.";
                    isValid = false;
                } else if (!namePattern.test(pname)) {
                    nameErr = "name must be in correct format.";
                    isValid = false;
                }

                var pricePattern = /^\d+(\.\d{1,2})?$/;
                if (price == "") {
                    priceErr = "price is required.";
                    isValid = false;
                } else if (!pricePattern.test(price)) {
                    priceErr = "price must be in correct format.";
                    isValid = false;
                }

                var descPattern = /^[a-zA-Z' -]+$/;
                if (description == "") {
                    descErr = "Description is required.";
                    isValid = false;
                } else if (!descPattern.test(description)) {
                    descErr = "description must be in correct format.";
                    isValid = false;
                }

                var fabricPattern = /^[a-zA-Z' -]+$/;
                if (fabric == "") {
                    fabricErr = "fabric is required.";
                    isValid = false;
                } else if (!fabricPattern.test(fabric)) {
                    fabricErr = "fabric must be in correct format.";
                    isValid = false;
                }

                var colorPattern = /^[a-zA-Z' -]+$/;
                if (color == "") {
                    colorErr = "color is required.";
                    isValid = false;
                } else if (!colorPattern.test(color)) {
                    colorErr = "color must be in correct format.";
                    isValid = false;
                }

                var typePattern = /^[a-zA-Z' -]+$/;
                if (type == "") {
                    typeErr = "type is required.";
                    isValid = false;
                } else if (!typePattern.test(type)) {
                    typeErr = "type must be in correct format.";
                    isValid = false;
                }

                document.getElementById("nameErr").innerText = nameErr;
                document.getElementById("priceErr").innerText = priceErr;
                document.getElementById("descErr").innerText = descErr;
                document.getElementById("fabricErr").innerText = fabricErr;
                document.getElementById("colorErr").innerText = colorErr;
                document.getElementById("typeErr").innerText = typeErr;

                return isValid;
            }
        </script>
    </head>
    <body>
    <center>

        <?php
        $conn = mysqli_connect("localhost", "root", "", "sareeproject") or die("Connection failed.");
        $pname = $price = $description = $fabric = $color = $type = "";
        $nameErr = $priceErr = $descErr = $fabricErr = $colorErr = $typeErr = "";

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $valid = true;

            if (empty($_POST['txtname'])) {
                $nameErr = "product name is required.";
                $valid = false;
            } else {
                $pname = $_POST['txtname'];
            }

            if (empty($_POST['txtprice'])) {
                $priceErr = "price is required.";
                $valid = false;
            } else {
                $price = $_POST['txtprice'];
            }

            if (empty($_POST['txtdesc'])) {
                $descErr = "Description is required.";
                $valid = false;
            } else {
                $description = $_POST['txtdesc'];
            }
            if (empty($_POST['txtfabric'])) {
                $fabricErr = "fabric is required.";
                $valid = false;
            } else {
                $fabric = $_POST['txtfabric'];
            }
            if (empty($_POST['txtcolor'])) {
                $colorErr = "color is required.";
                $valid = false;
            } else {
                $color = $_POST['txtcolor'];
            }if (empty($_POST['txttype'])) {
                $typeErr = "type is required.";
                $valid = false;
            } else {
                $type = $_POST['txttype'];
            }

            if ($valid) {
                if (isset($_POST['btninsert'])) {
                    $pname = $_POST['txtname'];
                    $price = $_POST['txtprice'];
                    $description = $_POST['txtdesc'];
                    $fabric = $_POST['txtfabric'];
                    $color = $_POST['txtcolor'];
                    $type = $_POST['txttype'];

                    $qu = "INSERT INTO tbl_product (pname, price, description,fabric,color,type) VALUES ('$pname', '$price','$description','$fabric','$color','$type')";
                    $q = mysqli_query($conn, $qu);

                    if (!$q) {
                        echo "<script>alert('Something went wrong while adding the record.')</script>";
                    } else {
                        echo "<script>alert('Added successfully.')</script>";
                        $pname = $price = $description = $fabric = $color = $type = "";
                    }
                }
            }

            if (isset($_POST['btnedit'])) {
                $id = $_POST['product_id'];
                $query = "SELECT * FROM tbl_product WHERE product_id='$id'";
                $result = mysqli_query($conn, $query);
                if ($result) {

                    $row = mysqli_fetch_assoc($result);

                    $pname = $row['pname'];
                    $price = $row['price'];
                    $description = $row['description'];
                    $fabric = $row['fabric'];
                    $color = $row['color'];
                    $type = $row['type'];
                } else {
                    echo "<script>alert('Data not fetch.')</script>";
                }
            }

            if (isset($_POST['btnupdate'])) {
                $id = $_POST['id'];
                $pname = $_POST['txtname'];
                $price = $_POST['txtprice'];
                $description = $_POST['txtdesc'];
                $fabric = $_POST['txtfabric'];
                $color = $_POST['txtcolor'];
                $type = $_POST['txttype'];
                $query = "UPDATE tbl_product SET pname='$pname', price='$price', description='$description',fabric='$fabric', color='$color', type='$type' WHERE product_id='$id'";
                $update = mysqli_query($conn, $query);

                if (!$update) {
                    echo "<script>alert('Something went wrong while updating the record.')</script>";
                } else {
                    echo "<script>alert('Updated successfully.')</script>";
                    $pname  = $price = $description = $fabric = $color = $type = "";
                    $id = "";
                }
            }

            if (isset($_POST['btndelete'])) {
                $id = $_POST['product_id'];
                $query = "UPDATE tbl_product SET `deleteData` = 'Yes' WHERE product_id = '$id'";
                $delete = mysqli_query($conn, $query);

                if (!$delete) {
                    echo "<script>alert('Something went wrong while deleting the data.')</script>";
                } else {
                    echo "<script>alert('Deleted successfully.')</script>";
                    $pname = $price = $description = $fabric = $color = $type = "";
                    $id = "";
                }
            }
        }
        ?>

        <form name="sareeForm" action="" method="post" enctype="multipart/form-data">
            <h1>Saree Selling</h1>

            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <table style="border: 0px;">
                <tr>
                    <td><label>product Name:</label></td>
                    <td><input type="text" name="txtname" value="<?php echo $pname; ?>"></td>
                    <td><span id="nameErr"><?php echo $nameErr; ?></span></td>
                </tr>

                <tr>
                    <td><label>Price:</label></td>
                    <td><input type="text" name="txtprice" value="<?php echo $price; ?>"></td>
                    <td><span id="priceErr"><?php echo $priceErr; ?></span></td>
                </tr>

                <tr>
                    <td><label>Description:</label></td>
                    <td><input type="text" name="txtdesc" value="<?php echo $description; ?>"></td>
                    <td><span id="descErr"><?php echo $descErr; ?></span></td>
                </tr>

                <tr>
                    <td><label>Fabric:</label></td>
                    <td><input type="text" name="txtfabric" value="<?php echo $fabric; ?>"></td>
                    <td><span id="fabricErr"><?php echo $fabricErr; ?></span></td>
                </tr>

                <tr>
                    <td><label>Color:</label></td>
                    <td><input type="text" name="txtcolor" value="<?php echo $color; ?>"></td>
                    <td><span id="colorErr"><?php echo $colorErr; ?></span></td>
                </tr>

                <tr>
                    <td><label>Type:</label></td>
                    <td><input type="text" name="txttype" value="<?php echo $type; ?>"></td>
                    <td><span id="typeErr"><?php echo $typeErr; ?></span></td>
                </tr>

                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="btninsert" value="Insert" onclick="return validateForm();">
                        <input type="submit" name="btnupdate" value="Update" onclick="return validateForm();">
                    </td>
                </tr>
            </table>
            <div class="csvdiv">
                <h4>CSV file</h4>
                <input type="file" name="csvfile" accept=".csv">
                <input type="submit" name="btnupload" value="Upload File"><br><br><br>
            </div>

            <br><br><br>
        </form>

        <?php
        // Displaying the table data
        echo '<center>';
        $query = "select * from tbl_product"; 
        $qyr = mysqli_query($conn, $query);

        if (mysqli_num_rows($qyr) > 0) {

            echo '<table>';

            echo '<tr>';
            echo '<th>Product ID</th>';
            echo '<th>Product Name</th>';
            echo '<th>Product Price</th>';
            echo '<th>Description</th>';
            echo '<th>Fabric</th>';
            echo '<th>Color</th>';
            echo '<th>Type</th>';
            echo '<th>Manage</th>';
            echo '</tr>';

            while ($row = mysqli_fetch_assoc($qyr)) {
                echo '<tr>';
                echo "<td>", $row["product_id"], "</td>";
                echo "<td>", $row["pname"], "</td>";
                echo "<td>", $row["price"], "</td>";
                echo "<td>", $row["description"], "</td>";
                echo "<td>", $row["fabric"], "</td>";
                echo "<td>", $row["color"], "</td>";
                echo "<td>", $row["type"], "</td>";
                echo '<td>
                <form method="post" style="display:inline;">
                    <input type="hidden" name="product_id" value="' . $row['product_id'] . '">
                    <input type="submit" name="btndelete" value="Delete" onclick="return confirm(\'Are you sure you want to delete this item?\');">
                </form>&nbsp;&nbsp;&nbsp;
                
                <form method="post" style="display:inline;">
                    <input type="hidden" name="product_id" value="' . $row['product_id'] . '">
                    <input type="submit" name="btnedit" value="Edit">
                </form>
              </td>';
                echo '</tr>';
            }
            echo '</table>';
        }
        echo '</center>';
        ?>

    </center>
</body>
</html>

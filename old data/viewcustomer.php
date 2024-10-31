<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Customer Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7f6
            height: 100vh;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 0 auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
        }
        th, td {
            padding: 15px;
            text-align: left;
        }
        th {
            background-color: #007bff;
            color: white;
            cursor: pointer;
        }
        td {
            border: 1px solid #ddd;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        table caption {
            caption-side: top;
            font-size: 1.5em;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

<h1>CUSTOMER DETAILS</h1>

<?php
$con = mysqli_connect("localhost", "root", "", "sareeproject") or die(mysqli_connect_error());
echo '<center>';
$q = "select * from tbl_registration";
$r = mysqli_query($con, $q);

if (mysqli_num_rows($r) > 0) {
    echo "<table id='customerTable'>";
    echo "<thead>";
    echo "<tr><th onclick='sortTable(0)'>Customer ID</th>
              <th onclick='sortTable(1)'>First Name</th>
              <th onclick='sortTable(2)'>Last Name</th>
              <th onclick='sortTable(3)'>Contact No</th>
              <th onclick='sortTable(4)'>Email</th>
              <th onclick='sortTable(5)'>Gender</th>
              <th onclick='sortTable(6)'>Address</th>
              <th onclick='sortTable(7)'>State</th>
              <th onclick='sortTable(8)'>City</th>
              <th onclick='sortTable(9)'>Pincode</th>
          </tr>"; // Clickable headers for sorting
    echo "</thead>";
    echo "<tbody>";

    while ($row = mysqli_fetch_assoc($r)) {
        echo "<tr>";
        echo "<td>" . $row["customer_id"] . "</td>";
        echo "<td>" . $row["fname"] . "</td>";
        echo "<td>" . $row["lname"] . "</td>";
        echo "<td>" . $row["contact_no"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["gender"] . "</td>";
        echo "<td>" . $row["address"] . "</td>";
        echo "<td>" . $row["state"] . "</td>";
        echo "<td>" . $row["city"] . "</td>";
        echo "<td>" . $row["pincode"] . "</td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
    echo '</center>';
} else {
    echo "0 results";
}
?>

<script>
    // Sort table by clicking on the headers
    function sortTable(n) {
        const table = document.getElementById("customerTable");
        let rows, switching, i, x, y, shouldSwitch, direction, switchcount = 0;
        switching = true;
        direction = "asc"; // Start with ascending order
        while (switching) {
            switching = false;
            rows = table.rows;
            for (i = 1; i < (rows.length - 1); i++) {
                shouldSwitch = false;
                x = rows[i].getElementsByTagName("TD")[n];
                y = rows[i + 1].getElementsByTagName("TD")[n];
                if (direction === "asc") {
                    if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                        shouldSwitch = true;
                        break;
                    }
                } else if (direction === "desc") {
                    if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                        shouldSwitch = true;
                        break;
                    }
                }
            }
            if (shouldSwitch) {
                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                switching = true;
                switchcount++;
            } else {
                if (switchcount === 0 && direction === "asc") {
                    direction = "desc";
                    switching = true;
                }
            }
        }
    }
</script>

</body>
</html>

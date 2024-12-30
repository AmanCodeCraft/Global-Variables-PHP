<?php 
include 'connection.php';
?>

<?php
session_start();

if (isset($_SESSION['user-id'])) {
    echo "";
}else{
    header('location: user.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Records</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 20px;
            background-color: #f8f9fa;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #ffffff;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th {
            background-color: #007bff;
            color: white;
            text-align: left;
            padding: 10px;
        }

        td {
            padding: 10px;
            text-align: left;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .no-results {
            text-align: center;
            margin-top: 20px;
            color: #ff0000;
            font-size: 18px;
        }

        h3 {
            display: inline-block;
            position: relative;
            background-color: #007bff;
            padding: 20px;
            border-radius: 15px;
            left: 70%;
            bottom: 70px;
        }

        h3>a {
            text-decoration: none;
            color: white;
        }

    </style>
</head>
<body>
    <h1>Student Records</h1>
    <h3><a href="./userLogout.php">User Logout</a></h3>
    <?php
    $id= $_SESSION['user-id'];

    $sql = "SELECT file, id, password, sname, fname, mname, phone, address FROM student_data WHERE id=$id";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<table>
                <tr>
                    <th>Profile</th>
                    <th>ID</th>
                    <th>Password</th>
                    <th>Student Name</th>
                    <th>Father Name</th>
                    <th>Mother Name</th>
                    <th>Phone</th>
                    <th>Address</th>
                </tr>";
        
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['file'] . "</td>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['password'] . "</td>";
            echo "<td>" . $row['sname'] . "</td>";
            echo "<td>" . $row['fname'] . "</td>";
            echo "<td>" . $row['mname'] . "</td>";
            echo "<td>" . $row['phone'] . "</td>";
            echo "<td>" . $row['address'] . "</td>";
            echo "</tr>";   
        }

        echo "</table>";
    } else {
        echo "<p class='no-results'>No results found.</p>";
    }
    ?>
</body>
</html>

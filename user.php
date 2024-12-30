<?php
session_start();

if (isset($_SESSION['user-id'])) {
    header('location:onlyTable.php');
}

?>

<!--.... starting html code here.... -->
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./style.css">
    <style>
        h3 {
            display: inline-block;
            position: relative;
            left: 55%;
            top: 60px;
        }

        h3>a {
            text-decoration: none;
            color: white;
        }

    </style>
</head>

<body>
    <h1>User Login Page</h1>
    <h3><a href="./admin.php">Admin Login</a></h3>
    <form action="" method="post">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">User Name</label>
            <input type="text" name="username" class="form-control" id="exampleInputEmail1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="text" name="password" class="form-control" id="exampleInputPassword1">
        </div>
        <button type="submit" name="submit" class="login-btn flexo">Login</button>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<!--...... php code start from here..... -->

<?php
include 'connection.php';

if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM student_data WHERE sname = '$username' AND password = '$password'";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_num_rows($result);

    if ($row < 1) {
        echo "no record!";
    } else {
        $newStuff = mysqli_fetch_assoc($result);
        $id = $newStuff['id'];
        $_SESSION['user-id'] = $id;
        header("location:onlyTable.php");
    }
}
?>

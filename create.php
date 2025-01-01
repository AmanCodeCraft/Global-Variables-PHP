<?php 
    session_start();
    if(isset($_SESSION['user-id'])){
        echo "";
    }else{
        header ('location:admin.php');
    }
?>
<!--.... starting html code here.... -->
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create or Update</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <div class="navigation flexo">
        <div class="nav-btn"><a href="./adminDashboard.php">Admin Dashboard</a></div>
        <div class="nav-btn"><a href="./logout.php">Admin logout</a></div>
    </div>
    <h1>New Student</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputEmail1">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Student Name</label>
            <input type="text" name="sname" class="form-control" id="exampleInputEmail1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Father Name</label>
            <input type="text" name="fname" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Mother Name</label>
            <input type="text" name="mname" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Phone num.</label>
            <input type="number" name="phone" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Address</label>
            <input type="text" name="address" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">File</label>
            <input type="file" name="file" class="form-control" id="exampleInputPassword1">
        </div>

        <button type="login" name="submit" class="login-btn flexo">Submit</button>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php

@include 'connection.php';
@include 'file.php';

if (isset($_POST['submit'])) {

    $password=$_POST['password'];
    $sname = $_POST['sname'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $file = $_FILES['file'];
    $filename = $file['name'];

    $sql = "INSERT INTO `student_data`(`password`, `sname`, `fname`, `mname`, `phone`, `address`,`file`) VALUES ( '$password','$sname','$fname','$mname','$phone','$address', '$filename')";

    $result = mysqli_query($conn, $sql);

    if ($result == true) {
        echo "Inserted Successful";
    } else {
        echo "Data Not Inserted!";
    }
} else {
    echo "Your are not submit form yet!";
}

?>

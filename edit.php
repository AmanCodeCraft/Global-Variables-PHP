<?php 
    session_start();
    if(isset($_SESSION['user-id'])){
        echo "";
    }else{
        header ('location:admin.php');
    }
?>
<?php

@include("./connection.php");

$id = $_GET['id'];
$sql = "SELECT * FROM student_data WHERE id=$id";
$result = mysqli_query($conn, $sql);


if (isset($_POST['submit'])) {
    $sname = $_POST['sname'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $sql = "UPDATE student_data SET sname='$sname', fname='$fname', mname='$mname', phone='$phone' ,address='$address' WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        ?>
        <script>   alert('Updated Successfull!');
        window.open('updatetable.php','_self');
        </script>
        <?php
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
</head>

<body>
<h1>Update Student Data</h1>
    <form action="" method="post" enctype="multipart/form-data">
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
        <button type="login" name="submit" class="login-btn flexo">Submit</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
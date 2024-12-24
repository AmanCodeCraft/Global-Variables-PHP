<?php 
    session_start();
    if(isset($_SESSION['user-id'])){
        echo "";
    }else{
        header ('location:admin.php');
    }
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
</head>


<body>
    <h1>Admin Dashboard</h1>
    <div class="flexo">
    <a href="create.php" target="_blank"><div class="box flexo">Insert new Student</div></a>
    <a href="updatetable.php" target="_blank"><div class="box flexo">Update Student data</div></a>
    </div>
    <div class="flexo">
    <a href="logout.php" target="_blank"><div class="box flexo">logout</div></a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php 
    session_start();
    if(isset($_SESSION['user-id'])){
        header ('location:adminDashboard.php');
    }
?>

<!--.... starting html code here.... -->
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>admin login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <h1>Admin Login Page</h1>
    <form action="admin.php" method="post">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">User Name</label>
            <input type="text" name="username" class="form-control" id="exampleInputEmail1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="text" name="password" class="form-control" id="exampleInputPassword1">
        </div>
        <button type="login" name="login" class="login-btn flexo">Login</button>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php   
include 'connection.php';

if(isset($_POST['login'])){

$username= $_POST['username'];
$password= $_POST['password'];

$sql = "SELECT * FROM admin_login WHERE username = '$username' AND password = '$password'";

$result = mysqli_query($conn, $sql);
$row = mysqli_num_rows($result);

if($row<1){
    echo "no record!";
}else{
    
    $var= mysqli_fetch_assoc($result);

    $id= $var['id'];
    $_SESSION['user-id']= $id;
    header ("location:adminDashboard.php");
}
}
?>
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
    $sql = "DELETE FROM student_data WHERE id = $id";
    
    if (mysqli_query($conn, $sql)) {
        ?>
        <script>    alert('Record deleted!');
        window.open('updatetable.php','_self');
        </script>
        <?php
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }

?>


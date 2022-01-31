<?php
require_once "config.php";

if(isset($_POST['deletedata']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM bill WHERE id='$id'";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        echo '<script>alert "Bill Data Deleted");</script>';
        header('location:billing.php');
    }
    else{
        echo'<script>alert("Bill Data Not Deleted");</script>';
    }

}
?>
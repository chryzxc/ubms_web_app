<?php
require_once "config.php";

if(isset($_POST['deletedata']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM user WHERE id='$id'";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        echo '<script>alert "User Account Deleted");</script>';
        header('location:accounts.php');
    }
    else{
        echo'<script>alert("User Account Not Deleted");</script>';
    }

}
?>
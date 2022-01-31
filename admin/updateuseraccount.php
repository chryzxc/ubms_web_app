<?php
require_once "config.php";

if(isset($_POST['updatedata']))
{
    $id = $_POST['update_id'];
    $account_type = $_POST['account_type'];
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $contact_no= $_POST['contact_no'];
    $status = $_POST['status'];



    $query = "UPDATE user SET account_type='$account_type',fullname='$fullname',
    username='$username',password='$password',contact_no='$contact_no',status='$status'  WHERE id='$id'";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        echo '<script>alert ("Data Updated");</script>';
        header('location:accounts.php');
    }
    else{
        echo'<script>alert("User Account Not Updated");</script>';
    }

}
?>
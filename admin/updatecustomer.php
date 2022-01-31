<?php
require_once "config.php";

if(isset($_POST['updatedata']))
{
    $id = $_POST['update_id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $contact = $_POST['contact'];
    $addr = $_POST['addr'];
    $conn_status = $_POST['conn_status'];


    $query = "UPDATE customer SET fname='$fname',lname='$lname',contact='$contact',addr='$addr'
     ,conn_status='$conn_status' WHERE id='$id'";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        echo '<script>alert ("Data Updated");</script>';
        header('location:customer.php');
    }
    else{
        echo'<script>alert("Customer Data Not Updated");</script>';
    }

}
?>
<?php
require_once "config.php";

if(isset($_POST['insertdata']))
{
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $contact = $_POST['contact'];
    $addr = $_POST['addr'];
    $conn_status = $_POST['conn_status'];
    $encoded_by = $_POST['encoded_by'];
    $username = uniqid();
    $acc_number = uniqid();
    
    $query = "INSERT INTO customer (`fname`,`lname`,`contact`,`addr`,`conn_status`,`encoded_by`,`acc_number`,`user_name`) VALUES 
    ('$fname','$lname','$contact','$addr','$conn_status','$encoded_by','$acc_number','$username')";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        echo'<script>alert("Customer Data Saved" );</script>';
        header('location:customer.php');
        
    }
    else{
        echo'<script>alert("Customer Data Not Saved" );</script>';
        echo mysqli_error($conn);
    }

}
?>
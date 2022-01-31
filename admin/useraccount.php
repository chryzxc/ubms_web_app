<?php
require_once "config.php";

if(isset($_POST['insertdata']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    $fullname = $_POST['fullname'];
    $contact_no = $_POST['contact_no'];
    $account_type = $_POST['account_type'];
    $status = $_POST['status'];


    $query = "INSERT INTO user (`username`,`password`,`fullname`,`contact_no`,
    `account_type`,`status`)
     VALUES ('$username','$password','$fullname','$contact_no','$account_type',
     '$status')";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        echo'<script>alert("User Account Registered" );</script>';
        header('location:accounts.php');
        
    }
    else{
        echo'<script>alert("User Not Registered" );</script>';
        echo mysqli_error($conn);
    }

}
?>
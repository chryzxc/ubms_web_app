<?php
require_once "config.php";

if(isset($_POST['insertdata']))
{
    $customer_id = $_POST['customer_id'];
    $bill_no = $_POST['bill_no'];
    $meter_no = $_POST['meter_no'];
    $period_from = $_POST['period_from'];
    $period_to = $_POST['period_to'];
    $bill_amount = $_POST['bill_amount'];
    $bill_date = $_POST['bill_date'];
    $due_date = $_POST['due_date'];
    $encoded_by = $_POST['encoded_by'];
    $status = $_POST['status'];

    $query = "INSERT INTO bill (`customer_id`,`bill_no`,`meter_no`,`period_from`,`period_to`
    ,`bill_amount`,`bill_date`,`due_date`,`encoded_by`,`status`) 
    VALUES ('$customer_id','$bill_no','$meter_no','$period_from','$period_to'
    ,'$bill_amount','$bill_date','$due_date','$encoded_by','$status' )";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        echo'<script>alert("Billing Data Saved" );</script>';
        header('location:billing.php');
        
    }
    else{
        echo'<script>alert("Billing Data Not Saved" );</script>';
        echo mysqli_error($conn);
    }

}
?>
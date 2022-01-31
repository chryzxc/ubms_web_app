<?php
require_once "config.php";

if(isset($_POST['deletedata']))
{
    $id = $_POST['delete_id'];

    $query ="SELECT bill.id, bill.customer_id, customer.fname, customer.lname,
                bill.bill_no, bill.meter_no, bill.period_from, bill.period_to, bill.bill_amount,
                bill.bill_date, bill.due_date, bill.encoded_by FROM bill 
                INNER JOIN customer ON bill.customer_id=customer.id 
                WHERE id='$id'";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        echo '<script>alert "Data Deleted");</script>';
        header('location:customer.php');
    }
    else{
        echo'<script>alert("Customer Data Not Deleted");</script>';
    }

}
?>
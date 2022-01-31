<?php
require_once "config.php";

if(isset($_POST['updatedata']))
{
    $id = $_POST['update_id'];
    $bill_no = $_POST['bill_no'];
    $meter_no = $_POST['meter_no'];
    $period_from = $_POST['period_from'];
    $period_to = $_POST['period_to'];
    $bill_amount = $_POST['bill_amount'];
    $bill_date = $_POST['bill_date'];
    $due_date = $_POST['due_date'];




    $query = "UPDATE bill SET bill_no='$bill_no',meter_no='$meter_no',
    period_from='$period_from',period_to='$period_to',bill_amount='$bill_amount',
    bill_date='$bill_date',due_date='$due_date' WHERE id='$id'";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        echo '<script>alert ("Data Updated");</script>';
        header('location:billing.php');
    }
    else{
        echo'<script>alert("Bill Data Not Updated");</script>';
    }

}
?>
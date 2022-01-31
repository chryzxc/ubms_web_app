<?php
require_once "config.php";

if(isset($_POST['updatedata']))
{
    $id = $_POST['update_id'];
    $amount_tendered = $_POST['amount_tendered'];
    $encoded_by = $_POST['encoded_by'];





    $query = "UPDATE invoice SET amount_tendered='$amount_tendered',
    encoded_by='$encoded_by' WHERE id='$id'";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        echo '<script>alert ("Invoice Data Updated");</script>';
        header('location:invoice.php');
    }
    else{
        echo'<script>alert("Invoice Data Not Updated");</script>';
    }

}
?>
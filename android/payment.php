<?php
require_once "config.php";


 if (mysqli_connect_errno())
 {
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }else{
     
    $id = $_POST['id'];
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
    $amount_tendered = $_POST['amount_tendered'];
    $payment_method = $_POST['payment_method'];
    $balance= $_POST['balance'];
   
    
    $query = "UPDATE bill SET status='Paid', amount_tendered='$amount_tendered'
    WHERE customer_id='$customer_id' and bill_no='$bill_no'";
    $query_run = mysqli_query($conn, $query);



    $payment_query = "INSERT INTO payment (`bill_id`,`customer_id`,`amount_tendered`,`encoded_by`,`payment_method`) 
    VALUES ('$bill_no','$customer_id','$amount_tendered','$encoded_by','$payment_method' )";
    $query_run = mysqli_query($conn, $payment_query);

    $invoice_query = "INSERT INTO invoice (`customer_id`,`bill_no`,`amount_tendered`,`encoded_by`) 
    VALUES ('$customer_id','$bill_no','$amount_tendered','$encoded_by' )";
    $query_run = mysqli_query($conn, $invoice_query);    

    if($query_run){

       echo "Success";
 
    }
    else
    {
      echo mysqli_error($conn);
    }
     
}


?>
<?php
require_once "config.php";


if(isset($_POST['savepayment']))
{
    if  ($_POST['amount_tendered'] != $_POST['bill_amount']){
         echo'<script>alert("Payment must be equal to the amount" );</script>';
        
         echo'<script type="text/javascript"> 
    alert("Payment must be equal to the amount"); 
    window.location.href = "customer_info.php?page=record&id='.$_POST['customer_id'].
    '&cust='.$_POST['fname']." ".$_POST['lname'].'";
                                        </script>';
      
        
    }else{
        
    $id = $_POST['update_id'];
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
    $payment_method = 'Walk-in';
    $balance= $_POST['balance'];
    $amount_paid = ($_POST['amount_tendered']-$_POST['bill_amount']);
    
    
    
    $a = strtotime($period_from);
    $autogen_period_from = date("Y-m-d", strtotime("+1 month", $a));

    $b = strtotime($period_to);
    $autogen_period_to = date("Y-m-d", strtotime("+1 month", $b));

    $c = strtotime($bill_date);
    $autogen_bill_date = date("Y-m-d", strtotime("+1 month", $c));

    $d = strtotime($due_date);
    $autogen_due_date = date("Y-m-d", strtotime( "+1 month", $d));

    $result = mysqli_query($conn, "SELECT MAX(bill_no) bill_no FROM bill");
    if (!$result) { 
    } else {
        $row = mysqli_fetch_object($result);
        $autogen_bill_no = $row->bill_no;
        $autogen_bill_no += 1;
    }
    
  


    
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
        
  
    
    echo'<script>alert("Payment Data Saved" );</script>';
    header('location:customer_info.php?page=record&id='.$_POST['customer_id'].
    '&cust='.$_POST['fname']." ".$_POST['lname'].'');

  
    }

    else
    {
        echo '<script>alert("Payment Not Saved" );</script>';
        echo mysqli_error($conn);
        echo $amount_tendered;
        echo $balance;
        echo $bill_amount; 
        echo $total_paid; 
    }


        
        
    }
   
  
  
    
}



?>


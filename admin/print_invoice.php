<?php
 require_once 'config.php';
 ?>
<?php 
$id = $_GET['id']; 
$fname = $_GET['cust']; 
$lname = $_GET['sur']; 
$bill = $_GET['bill']; 

$query =mysqli_query($conn, "SELECT DISTINCT * FROM bill
WHERE bill_no='$bill' ");
while($row = mysqli_fetch_array($query)) {
  $bill_date =  $row['bill_date']; 
  $bill_amount =  $row['bill_amount']; 
  $balance =  $row['balance'];  
  }

 $query =mysqli_query($conn, "SELECT * FROM payment
WHERE bill_id='$bill' ");
while($row = mysqli_fetch_array($query)) {
  $amount_tendered=  $row['amount_tendered']; 
  $date_paid=  $row['date_paid']; 
  }

  $query =mysqli_query($conn, "SELECT * FROM customer
WHERE fname='$fname' ");
while($row = mysqli_fetch_array($query)) {
  $addr=  $row['addr']; 
  $contact=  $row['contact']; 
  
  }
?>
<?php session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $fname." ".$lname." Invoice"?></title>
	<link rel="stylesheet" href="styles.css">
	<script src="js/fontawesome.js"></script> 
    <link rel="stylesheet" href="css/bootstrap.min.css">    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.2/css/jquery.dataTables.min.css">    
    
    



    
</head>
<body style="background-color:#F5F5F5; ">

<div class="wrapper">
    
   <div class="main_content">
   
        <div class="header" style="margin-left:-200px;"> <img src="pwlm.png" style=" height:60px; position:absolute; margin-top:-20px; margin-left:-12px;">&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  
    
    </div>  
       
        <div class="info" style="margin-left:-150px;">

<!-- ======================================================- -->

<div class="container" style="color:black;"> 
          <div class="card" >
          <div class="card-body" >
          <p class="card-title text-md-center text-xl-left">Invoice Details</p><hr>
          <p style=" font-size:15px;">[A Mabini Street]</p>
        <p style=" font-size:15px; margin-left:250px; margin-top:-42px;">Invoice #<?php echo $id;?></p>
        <p style=" font-size:15px; margin-left:350px; margin-top:-42px;">Date <?php echo date("Y/m/d");?></p>

        <br>
        <p style=" font-size:15px; margin-top:-42px;">[Tacloban City, Philippines]</p>
        <p style=" font-size:15px; margin-top:-20px;">Telephone: +53 32 12480</p>
        <p style=" font-size:15px; margin-top:-20px;">Email: primewaterleytemetro.org</p>
        <p style=" font-size:15px; margin-top:-20px;">Website: primewatercorp.com</p><hr>
        <p style=" font-size:15px; margin-top: 2px;">CLIENT</p>
        <p style=" font-size:15px; margin-top: -10px;">Name: <?php echo $fname." ".$lname ?></p>
        <p style=" font-size:15px; margin-top: -20px;">Address: <?php echo $addr ?></p>
        <p style=" font-size:15px; margin-top: -20px;">Mobile Number: <?php echo $contact ?></p>
        <p style=" font-size:15px; margin-top: -20px;">Email Address: N/A</p> <hr>

        <p style=" font-size:15px; margin-top: 20px;">Bill Date <?php echo $bill_date?></p>
        <p style=" font-size:15px; margin-top: -40px; margin-left:250px;">Date Paid: <?php echo $date_paid?></p>
        <p style=" font-size:15px; margin-top: -20px;">Bill Amount <?php echo $bill_amount?></p>
        <p style=" font-size:15px; margin-top: -40px; margin-left:250px;">Amount Paid: <?php echo $amount_tendered?> PHP</p>
      <?php if($balance<0){
          echo ' <p style= "font-size:15px; margin-top: -20px;  margin-left:250px; ">Total Due: '.$balance.' PHP</p><hr>
          ';
       }
       else if($balance>0)
       echo ' <p style= "font-size:15px; margin-top: -20px;  margin-left:250px; ">Credit: '.$balance.' PHP</p><hr>
       ';
       else if ($balance==0){
        echo ' <p style= "font-size:15px; margin-top: -20px;  margin-left:250px; ">Total: '.$amount_tendered.' PHP</p><hr>';

       }
       ?>
    <br> <br> 
    <center><p style=" font-size:15px;">We truly appreciate your business and look forward to serving you again!</p>


        <div class="text-right">
          <button onclick="window.print()" class="btn btn-primary">Print</button>
        </div>
       


      
        
</div>
        </div>          
          </div>
   


<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js" ></script>
<script src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js" ></script>





<script>
$(document).ready(function() {
  $('#datatableid').DataTable()
    
} );
</script>

<script>
$(document).ready(function(){
  $('.addpaymentbtn').on('click',function(){
      $('#addpaymentmodal').modal('show');
      
      $tr = $(this).closest('tr');
      var data = $tr.children("td").map(function(){
      return $(this).text();
      }).get();
      console.log(data);

  $('#update_id').val(data[0]);
  $('#customer_id').val(data[1]);
  $('#customer_name').val(data[2]);
  $('#bill_no').val(data[3]);
  $('#meter_no').val(data[4]);
  $('#period_from').val(data[5]);
  $('#period_to').val(data[6]);
  $('#bill_amount').val(data[7]);
  $('#bill_date').val(data[8]);
  $('#due_date').val(data[9]);
  $('#encoded_by').val(data[10]);
  $('#status').val(data[11]);
  $('#amount_tendered').val(data[12]);
  $('#balance').val(data[13]);
  $('#fname').val(data[14]);
  $('#lname').val(data[15]);



  
  });
});

</script>


<script >
$(document).ready(function(){
  $('.deletebtn').on('click',function(){
      $('#deletemodal').modal('show');
      
      $tr = $(this).closest('tr');
      var data = $tr.children("td").map(function(){
      return $(this).text();
      }).get();
      console.log(data);
  
  $('#delete_id').val(data[0]);

  });
});

</script>

      
      
      
    </div>
  </div>
</div>

</body>
</html>
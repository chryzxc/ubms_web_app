<?php 
session_start();

$name= $_SESSION['username'];
if  (is_null($name)){
    header("Location: ../index.php");
}
//if($name==0){
//header("Location: ../index.php");
//}
?>
<!DOCTYPE html>
<html lang="en" >
<head>
<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Utility Billing Management System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/adminlte.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

    <script
  src="http://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" ></script>
	<title>Utility Billing Management System</title>
	<link rel="stylesheet" href="styles.css">
	<script src="js/fontawesome.js"></script> 
 
    
    
    



    
</head>


<body style="background-color:#3B1E080D;"  >
    
     <div class="header" style="height: 70px; padding: 20px; background: #fff; color: #717171; border-bottom: 1px solid #e0e4e8"> <img src="pwlm.png" style=" height:60px; position:absolute; margin-top:-20px; margin-left:-12px;">
     
       <a href="logout.php" style="text-decoration:none; color: #94787a; float:right;"><i class="fas fa-sign-out-alt" style="margin-left:10px;"></i> Logout</a>

    </div>  
    
  <div class="wrapper">
    
    <div class="sidebar" style="background-color:#fff; height: 100%; border-right: 1px solid #e0e4e8; border-top: 1px solid #e0e4e8;">
        <h5 style="text-align: center; color: #94787a; text-transform: uppercase; margin-top:10px;">   <i class="fas fa-user-circle"><a style="margin-left:5px;"><?php echo $name?></a></i></h5>
       
        <ul>
            <li class="dashboard"><a href="dashboard.php"><i class="fas fa-home"></i>Dashboard</a></li>
            <li class="customer"><a href="customer.php"><i class="fas fa-users"></i>Customer</a></li>
            <li class="billing"><a href="billing.php"><i class="fas fa-shopping-cart"></i>Billing</a></li>
            <li class="inv"><a href="invoice.php"><i class="fas fa-sticky-note"></i>Invoice</a></li>
            <li class="account"><a href="accounts.php"><i class="fas fa-user-alt"></i>Account</a></li>
            <li class="reports"><a  href="reports.php"><i class="fas fa-file-alt"></i>Reports</a></li>
			<li><a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
        </ul> 
        
    </div>
   <div class="main_content">
   
  

       
        <div class="info" >
    
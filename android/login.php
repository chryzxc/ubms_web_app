<?php                                                                                                   

$acc_number = $_POST["acc_number"];


require_once "config.php";


if($conn){
  
    $sql = "SELECT * FROM customer WHERE acc_number='$acc_number'";
    $accQuery = mysqli_query($conn,$sql);
    if(mysqli_num_rows($accQuery) > 0){
         echo "Login Success";
    }
    else{
         echo "Account number does not exist";
          }
        
      }

else{
echo "Connection Error";
} ?>
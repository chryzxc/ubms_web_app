<?php                                                                                                   

$customer_id = $_POST["customer_id"];


require_once "config.php";


 // Check connection
 if (mysqli_connect_errno())
 {
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }

 $sql = "SELECT * FROM customer where id='$customer_id'";

  if ($result = mysqli_query($conn, $sql))
   {
   $resultArray = array();
   $tempArray = array();

   while($row = $result->fetch_object())
   {
   // Add each result into the results array
   $tempArray = $row;
   array_push($resultArray, $tempArray);
   }
   echo json_encode($resultArray);
   }
   // Close connections
   mysqli_close($conn);

?>
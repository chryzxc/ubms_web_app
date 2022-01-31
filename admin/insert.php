<?php
//insert.php;

if(isset($_POST["date"]))
{
 $connect = new PDO("mysql:host=localhost;dbname=pwlm", "root", "");
 $order_id = uniqid();
 for($count = 0; $count < count($_POST["date"]); $count++)
 {  
  $query = "INSERT INTO journal 
  (unique_id, date, title, type, amount) 
  VALUES (:unique_id, :date, :title, :type, :amount)
  ";
  $statement = $connect->prepare($query);
  $statement->execute(
   array(
    ':unique_id'   => $order_id,
    ':date'  => $_POST["date"][$count], 
    ':title' => $_POST["title"][$count], 
    ':type'  => $_POST["type"][$count],
    ':amount'  => $_POST["amount"][$count]

   )
  );
 }
 $result = $statement->fetchAll();
 if(isset($result))
 {
  echo 'ok';
 }
}
?>

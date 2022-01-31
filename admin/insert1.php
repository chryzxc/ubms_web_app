<?php
//insert.php;

if(isset($_POST["date"]))
{
 $connect = new PDO("mysql:host=localhost;dbname=pwlm", "root", "");
 $order_id = uniqid();
 $title = $_POST['title'];
 for($count = 0; $count < count($_POST["date"]); $count++)
 {  
  $query = "INSERT INTO ledger 
  (unique_id, title, date, debit, credit) 
  VALUES (:unique_id, :title, :date, :debit, :credit)
  ";
  $statement = $connect->prepare($query);
  $statement->execute(
   array(
    ':unique_id'   => $order_id,
    ':title'  => $title, 
    ':date'  => $_POST["date"][$count], 
    ':debit' => $_POST["debit"][$count], 
    ':credit'  => $_POST["credit"][$count]

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

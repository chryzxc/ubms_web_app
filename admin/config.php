<?php
$server = "localhost";
$user = "id18158940_root";
$pass = "p2]et1I%7b9nZqY2";
$database = "id18158940_ubms";

$conn = new mysqli($server, $user, $pass, $database );


if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>



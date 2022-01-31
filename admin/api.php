<?php

//##########################################################################
// ITEXMO SEND SMS API - PHP - CURL-LESS METHOD
// Visit www.itexmo.com/developers.php for more info about this API
//##########################################################################
function itexmo($number,$message,$apicode,$password){
    $url = 'https://www.itexmo.com/php_api/api.php';
    $itexmo = array('1' => $number, '2' => $message, '3' => $apicode, 'password' => $password);
    $param = array(
      'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($itexmo),
      ),
    );
    $context  = stream_context_create($param);
    return file_get_contents($url, false, $context);
  }
  //##########################################################################

$number = $_POST['contact'];
$name = $_POST['name'];
$balance = $_POST['balance'];
$due_date = $_POST['due_date'];


$msg = 'Hello, '.$name.', your balance is' .$balance.' Due date is on'.$due_date;
$api = "TR-PAULO864356_P52FJ";
$password="amsyc{x@up";
$text = $msg;

if(!empty($_POST['contact']) && ($msg)){
$result = itexmo($number,$text,$api,$password);
if ($result == ""){
echo "iTexMo: No response from server!!!
Please check the METHOD used (CURL or CURL-LESS). If you are using CURL then try CURL-LESS and vice versa.	
Please CONTACT US for help. ";	
}else if ($result == 0){

    echo'<script>alert("Bill Sent" );</script>';

}
else{	

echo'<script>alert("Error Num '. $result . ' was encountered!");</script>';

}
}		
?>
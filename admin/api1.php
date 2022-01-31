<?php

require __DIR__ . '../admin/vendor/autoload.php';
use Twilio\Rest\Client;
// Your Account SID and Auth Token from twilio.com/console
$account_sid = 'ACXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$auth_token = 'your_auth_token';


// you need to buy from twilio
$twilio_number = "+15017122661";

$client = new Client($account_sid, $auth_token);
$client->messages->create(
        // recipient number
        '+15558675310', array(
    'from' => $twilio_number,
    'body' => 'I sent this message in under 10 minutes!'
        )
);
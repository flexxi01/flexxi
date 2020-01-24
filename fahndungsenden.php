<?php

include './config.php';

$text = "TEXTMESSAGE";  // This is the variable for the content of the message.

$data = array(
  'chat_id' => $chatid,
  'text' => $text,
  'parse_mode' => 'HTML',
  /*'reply_markup' => $reply_markup*/
  'remove_keyboard' => true
);

$payload = json_encode($data);

// Prepare new cURL resource
$ch = curl_init('https://api.telegram.org/bot'.$botnumber.'/sendMessage');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLINFO_HEADER_OUT, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

// Set HTTP Header for POST request
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($payload))
);

// Submit the POST request
$result = curl_exec($ch);

// Close cURL session handle
curl_close($ch);
echo 'Message successfully sent.';  // Message, when successfully sent

?>

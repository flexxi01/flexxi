<!DOCTYPE html>
<html lang="de">
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<META NAME=”robots” CONTENT=”noindex, nofollow”>
</head>
<body>

<?php

include './img/config.php';

$fahndungstext2 = str_replace(",","\n",$_POST["fahndungstext"]);
$fahndungstext = strtolower($fahndungstext2);
// EINGABEFELD für Einsatznachricht
$text = "<b>Personenfahndung:</b>\n\n$fahndungstext\n\nBei Antreffen Kontrolle und Nachricht nach hier.\nStaufer Ende.";

/*
$keyboard = [
    ['Kenntnisnahme']
];
*/

/*
$reply_markup = array(
    'keyboard' => $keyboard,
    'resize_keyboard' => true,
    'one_time_keyboard' => false
);
*/

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
echo '<div class="alert alert-success" role="alert">Fahndung gesteuert!</div>';

?>
<br><br><br>
<div class="d-flex justify-content-center">
	<a href="./index.php">Zurück</a>
</div>

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>

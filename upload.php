<?php

// TODO: Hier die :SenderID mit der SenderID austauschen
$jDaten = '{
  ":SenderID": "123"
}';


// TODO: Hier den Sicherheitsschlüssel eingeben
$authToken = '123456789';
// TODO: Hier :Boxid mit der BoxId austauschen 
$ch = curl_init('https://api.opensensemap.org/boxes/ :Boxid /data');
curl_setopt_array($ch, array(
  CURLOPT_POST => TRUE,
  CURLOPT_RETURNTRANSFER => TRUE,
  CURLOPT_HTTPHEADER => array(
    'Authorization: ' . $authToken,
    'Content-Type: application/json'
  ),
  CURLOPT_POSTFIELDS => json_encode($jDaten)
));

// Sende 
$rueckgabe = curl_exec($ch);

if ($rueckgabe === FALSE) {
  die(curl_error($ch));
}

// Decode the rueckgabe
$rueckgabeData = json_decode($rueckgabe, TRUE);

// Schließe cURL
curl_close($ch);

// Ausgabe
echo "Ausgabe von der Box '$box'<br>";
echo "Daten:<br>";
echo "<pre>";
print_r($jDaten);
echo "</pre>";
echo "<hr>";
var_dump($rueckgabeData);
echo "<hr>";

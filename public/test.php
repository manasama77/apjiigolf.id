<?php

$a = new DateTime();
$clientId = "BRN-0202-1721198739155";
$requestId = "mtRPwJ3hHVsKbrid";
$requestDate = $a->format('c');
$targetPath = "/checkout/v1/payment"; // For merchant request to Jokul, use Jokul path here. For HTTP Notification, use merchant path here
$secretKey = "SK-dP0NTGEj55cK1RoSab6K";
$requestBody = array(
    'order' => array(
        'amount' => 15000,
        'invoice_number' => 'INV-20210124-0001',
    ),
    'virtual_account_info' => array(
        'expired_time' => 60,
        'reusable_status' => false,
        'info1' => 'Merchant Demo Store',
    ),
    'customer' => array(
        'name' => 'Taufik Ismail',
        'email' => 'taufik@example.com',
    ),
);

echo "Request Body: " . json_encode($requestBody);
echo "\r\n\n<br/><br/>";

// Generate Digest
$digestValue = base64_encode(hash('sha256', json_encode($requestBody), true));
echo "Digest: " . $digestValue;
echo "\r\n\n<br/><br/>";

// Prepare Signature Component
$componentSignature = "Client-Id:" . $clientId . "\n<br/>" .
    "Request-Id:" . $requestId . "\n<br/>" .
    "Request-Timestamp:" . $requestDate . "\n<br/>" .
    "Request-Target:" . $targetPath . "\n<br/>" .
    "Digest:" . $digestValue;
echo "Component Signature: \n" . $componentSignature;
echo "\r\n\n<br/><br/>";

// Calculate HMAC-SHA256 base64 from all the components above
$signature = base64_encode(hash_hmac('sha256', $componentSignature, $secretKey, true));
echo "Signature: " . $signature;
echo "\r\n\n<br/><br/>";

// Sample of Usage
$headerSignature =  "Client-Id:" . $clientId . "\n<br/>" .
    "Request-Id:" . $requestId . "\n<br/>" .
    "Request-Timestamp:" . $requestDate . "\n<br/>" .
    // Prepend encoded result with algorithm info HMACSHA256=
    "Signature:" . "HMACSHA256=" . $signature;
echo "your header request look like: \n" . $headerSignature;
echo "\r\n\n<br/><br/>";


//The url you wish to send the POST request to
$url = "https://api-sandbox.doku.com/checkout/v1/payment";

//The data you want to send via POST

//url-ify the data for the POST
$fields_string = http_build_query($requestBody);

//open connection
$ch = curl_init();

//set the url, number of POST vars, POST data
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);

//So that curl_exec returns the contents of the cURL; rather than echoing it
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//execute post
$result = curl_exec($ch);
echo $result;

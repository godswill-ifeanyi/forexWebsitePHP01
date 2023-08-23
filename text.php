<?php
$amount=1000;
$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL => "https://blockchain.info/tobtc?currency=USD&value=" . $amount,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
        "cache-control: no-cache",
        "postman-token: fc62ebce-6d0b-ef4f-ba02-fcb05e284a02"
    ),
));
$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);
echo $amount = json_decode($response);
?>
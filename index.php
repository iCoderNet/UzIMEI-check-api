<?php

header('Content-Type: application/json; charset=utf-8');

if(!isset($_GET['imei'])) {
    echo json_encode(array(
        'status' => 'error',
        'message' => 'IMEI kiritilmagan'
    ));
    exit();
}

$curl = curl_init();

$url = "https://api.uzimei.uz/api/v1/imei/check";
$headers = array(
    "Content-Type: application/json",
    "User-Agent: Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36",
);

$data = array(
    "imei" => $_GET['imei'],
    "locale" => "uz",
    "isResident" => true,
);

$options = array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => json_encode($data),
    CURLOPT_HTTPHEADER => $headers,
);

curl_setopt_array($curl, $options);

$response = curl_exec($curl);
$status_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);

if ($status_code == 200) {
    $json_data = json_decode($response, true);
    echo json_encode($json_data);
} else {
    echo "Xato yuz berdi. Status kod: " . $status_code . PHP_EOL;
    $json_data = json_decode($response, true);
    echo json_encode($json_data);
}

curl_close($curl);
?>

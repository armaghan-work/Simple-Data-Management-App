<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: Content-Type');

$filePath = 'serverData.json';

if (file_exists($filePath)) {
    $data = json_decode(file_get_contents($filePath), true);
    echo json_encode($data ?: []);
} else {
    echo json_encode([]);
}
?>
<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

$filePath = 'serverData.json';

// Get the JSON data from the request
$requestData = json_decode(file_get_contents('php://input'), true);
$indexToDelete = $requestData['index'];

// Check if the file exists and read the existing data
if (file_exists($filePath)) {
    $existingData = json_decode(file_get_contents($filePath), true);
} else {
    echo 'File not found';
    exit;
}

// Remove the entry at the specified index
if (isset($existingData[$indexToDelete])) {
    array_splice($existingData, $indexToDelete, 1);
    
    // Save the updated data back to the JSON file
    if (file_put_contents($filePath, json_encode($existingData, JSON_PRETTY_PRINT))) {
        echo 'Server deleted successfully';
    } else {
        echo 'Error deleting server';
    }
} else {
    echo 'Server not found';
}
?>
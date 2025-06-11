<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

$filePath = 'serverData.json';

// Get the JSON data from the request
$requestData = json_decode(file_get_contents('php://input'), true);
$indexToUpdate = $requestData['index'];

// Remove index from the data to update
unset($requestData['index']);

// Check if the file exists and read the existing data
if (file_exists($filePath)) {
    $existingData = json_decode(file_get_contents($filePath), true);
} else {
    echo 'File not found';
    exit;
}

// Update the entry at the specified index
if (isset($existingData[$indexToUpdate])) {
    $existingData[$indexToUpdate] = $requestData;
    
    // Save the updated data back to the JSON file
    if (file_put_contents($filePath, json_encode($existingData, JSON_PRETTY_PRINT))) {
        echo 'Server updated successfully';
    } else {
        echo 'Error updating server';
    }
} else {
    echo 'Server not found';
}
?>
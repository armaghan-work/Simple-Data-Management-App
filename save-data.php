<?php
// Specify the file path
$filePath = 'serverData.json';

// Check if the file exists and read the existing data
if (file_exists($filePath)) {
    $existingData = json_decode(file_get_contents($filePath), true);
} else {
    $existingData = []; // Initialize an empty array if the file doesn't exist
}

// Get the JSON data from the request
$newData = json_decode(file_get_contents('php://input'), true);

// Append the new entry to the existing data
$existingData[] = $newData;

// Save the updated data back to the JSON file
if (file_put_contents($filePath, json_encode($existingData, JSON_PRETTY_PRINT))) {
    echo 'Data saved successfully';
} else {
    echo 'Error saving data';
}
?>

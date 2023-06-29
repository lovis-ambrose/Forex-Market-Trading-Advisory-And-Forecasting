<?php
$data = $_POST['data'];  // Get the data sent from the Python script

// Process the data or perform any desired operations
$response = 'Processed data: ' . $data;

// Send the response back to the Python script
echo $response;
?>

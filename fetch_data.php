<?php
// Example PHP script to fetch data
$data = [
    ['id' => 1, 'name' => 'Item 1'],
    ['id' => 2, 'name' => 'Item 2'],
    ['id' => 3, 'name' => 'Item 3'],
];

// Set header to indicate JSON response
header('Content-Type: application/json');

// Output JSON response
echo json_encode($data);
?>

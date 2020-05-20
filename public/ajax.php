<?php

$availableFields = [
    ['id' => 'id', 'text' => 'The Id of customer'],
    ['id' => 'first_name', 'text' => 'first customer name', "selected" => true],
    ['id' => 'last_name', 'text' => 'last customer name'],
    ['id' => 'company', 'text' => "company name"],
];

echo json_encode(['results' => $availableFields]);

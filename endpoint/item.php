<?php

require_once '../_database.php';


// CREATE NEW ITEM
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

}

// UPDATE EXISTING ITEM
if ($_SERVER['REQUEST_METHOD'] === 'PUT') {

}

// DELETE ITEM
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {

}

// READ ITEMS
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $sql = "
      SELECT * FROM item
    ";

    $stmt = $db->prepare($sql);
    $stmt->execute(array());
    $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);

    return prepareResponse($result);
}


function prepareResponse($data) {
    header('Content-Type: application/json"');
    header('Access-Control-Allow-Methods: POST, GET, PUT, DELETE, OPTIONS');
    header('Access-Control-Allow-Headers: Content-Type, Accept');

    return json_encode($data);
}
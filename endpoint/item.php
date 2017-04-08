<?php

require_once '../_database.php';


// CREATE NEW ITEM
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sql = "INSERT INTO item(title, quantity, fulfilled)
VALUES (?,?,?)";
    $params = $_POST['title'], $_POST['quantity'], $_POST['fulfilled'];
    $stmt = $db->prepare($sql);
    $result = $stmt->execute($params);

}

// UPDATE EXISTING ITEM
if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    $sql = "UPDATE item SET title = ? quantity = ? fulfilled = ? WHERE id = ?";
    $params = $_PUT["title"], $_PUT["quantity"], $_PUT["fulfilled"], $_PUT["id"];
    $stmt = $db->prepare($sql);
    $result = $stmt->execute($params);

}

// DELETE ITEM
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $id = $_REQUEST["id"];
    $sql = "DELETE FROM item WHERE  id = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute(array($id));
    $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);

    echo prepareResponse($result);
}

// READ ITEMS
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $sql = "
      SELECT * FROM item
    ";

    $stmt = $db->prepare($sql);
    $stmt->execute(array());
    $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);

    echo prepareResponse($result);
}


function prepareResponse($data) {
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST, GET, PUT, DELETE, OPTIONS');
    header('Access-Control-Allow-Headers: Content-Type, Accept');

    return json_encode($data);
}
<?php

require_once '../_database.php';


// CREATE NEW LIST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sql = "INSERT INTO list VALUES(?)";
    $params = $_POST['title'];
    $stmt = $db->prepare($sql);
    $result = $stmt->execute($params);


}
// UPDATE EXISTING LIST
if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    $sql = "UPDATE list SET title = ? WHERE id = ?";
    $params = $_PUT["title"], $_PUT["id"];
    $stmt = $db->prepare($sql);
    $result = $stmt->execute($params);
}
// DELETE LIST
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $id = $_REQUEST["id"];
    $sql = "DELETE FROM list WHERE  id = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute(array($id));
}

// READ LIST
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $sql = "
      SELECT * FROM list
    ";
    $populatedLists = [];
    $stmt = $db->prepare($sql);
    $stmt->execute(array());
    $lists = $stmt->fetchAll(\PDO::FETCH_ASSOC);

    foreach ($lists as $key => $list) {
        $sql = "SELECT * FROM item WHERE list = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute(array($list['id']));
        $list["items"] = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        array_push($populatedLists, $list);

    }

    echo prepareResponse($populatedLists);
}


function prepareResponse($data) {
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST, GET, PUT, DELETE, OPTIONS');
    header('Access-Control-Allow-Headers: Content-Type, Accept');

    return json_encode($data);
}